## Development DB
# dbHost = "localhost"
# dbUser = "root"
# dbPwd  = ""
# dbName = "investbook_v1"

# Production DB
dbHost = "35.213.150.200:3306"
dbUser = "uykq9nz44e6q2"
dbPwd  = "belinked4u@1234"
dbName = "dbtwj24s7ugn5p"

################################################################################
##                          END OF CONFIGURATION                              ##
################################################################################

## Import common modules
import sys
import base64, json

## Import MySQL modules
import MySQLdb
import MySQLdb.cursors

## Import NLTK modules
import nltk

from nltk.tokenize import sent_tokenize, word_tokenize
from nltk.probability import FreqDist

try:
    nltk.data.find('sentiment/vader_lexicon.zip')
except :
    print('Downloading... vader module')
    nltk.download('vader_lexicon')
from nltk.sentiment.vader import SentimentIntensityAnalyzer

try:
    nltk.data.find('/corpora/stopwords')
except:
    print('Downloading... stopwords module')
    nltk.download('stopwords')
from nltk.corpus import stopwords

try:
    nltk.data.find('/tokenizers/punkt')
except:
    print('Downloading... punkt module')
    nltk.download('punkt')


## Connect to database
conn = MySQLdb.connect(host=dbHost, user=dbUser, passwd=dbPwd, db=dbName, cursorclass=MySQLdb.cursors.DictCursor)
db   = conn.cursor()

## =========================================================================
## Functions
## =========================================================================
def textAnalysis(message):
    """
    Text processing by using nltk vader library
    Args:
        message (str): message input for text processing

    Returns:
        (dict): returns dictionary with 'neg' & 'pos' key
    """
    vader     = SentimentIntensityAnalyzer()

    scoreData = vader.polarity_scores(message)
    score     = scoreData['compound']

    # print(scoreData)
    return score


def setCommentScore(commentId):
    # Fetch comment by commentId
    db.execute("SELECT * FROM comment WHERE id = %s", (commentId,))
    comment = db.fetchone()

    # Run text analysis on the content
    commentScore = textAnalysis(comment['content'])

    # Update the comment score
    db.execute("UPDATE comment SET score = %s WHERE id = %s", (commentScore, commentId))

    # Return the score
    return commentScore

def setVideoKeywords(videoId):
    # Fetch all comments by videoId
    db.execute("SELECT * FROM comment WHERE video_id = %s", (videoId,))
    comments = db.fetchall()

    # Set stopwords
    stopWords  = set(stopwords.words('english'))
    stopWords |= {'.', 'All', 'is', ' ', ',', 'I', '<', '>', '~', '!', '1', '2', '3', '4', '5', '6', '7', '8', '9', '0'}

    # Get TOP 5 keywords
    wordsFiltered = []
    # topkeywords = []

    newStrings = [', '.join(word) for word in [word_tokenize(comment['content']) for comment in comments]]

    for newString in newStrings:
        newString = word_tokenize(newString)
        for keyword in newString:
            if keyword not in stopWords:
                wordsFiltered.append(keyword)
                fdist = FreqDist(wordsFiltered)
                topkeywords = fdist.most_common(5)

    # Record top keywords and their frequency
    for topkeyword in topkeywords:
        content = topkeyword[0]
        count   = topkeyword[1]

        # Check if keyword already exists
        db.execute("SELECT * FROM keyword WHERE video_id = %s AND content LIKE %s", (videoId, content))
        keyword = db.fetchone()

        if (keyword):
            # Update keyword count
            db.execute("UPDATE keyword SET count = %s WHERE id = %s", (count, keyword['id']))
        else:
            # Create new keyword
            db.execute("INSERT INTO keyword (video_id, content, count) VALUES (%s, %s, %s)", (videoId, content, count))

    # print('Top Keywords : ', topkeywords)
    return topkeywords

def setVideoLastComment(commentId, videoId):
    # Get metric of the video
    db.execute("SELECT * FROM metric WHERE video_id = %s", (videoId,))
    metric = db.fetchone()

    # Check if metric already exists
    if (metric):
        metricId = metric['id']
    else:
        # Create new metric
        db.execute("INSERT INTO metric (video_id, reaction_pos_count, reaction_neg_count, reaction_pos_percent, reaction_neg_percent, reaction_last_id, comment_pos_count, comment_neg_count, comment_pos_percent, comment_neg_percent, comment_last_id, positiveness, negativeness) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)", (videoId, 0, 0, 50, 50, 0, 0, 0, 50, 50, 0, 50, 50))
        metricId = db.lastrowid()

    # Set last comment id
    db.execute("UPDATE metric SET comment_last_id = %s WHERE id = %s", (commentId, metricId))


## =========================================================================
## Run the program..
## =========================================================================
if __name__ == '__main__':
    # Get JSON data
    data = json.loads(base64.b64decode(sys.argv[1]))

    videoId   = data['videoId']
    commentId = data['commentId']

    # videoId = 2
    # commentId = 13

    # Analyze comment and set the metric score
    commentMetricScore = setCommentScore(commentId)

    # Set the last comment analyzed
    setVideoLastComment(commentId, videoId)

    # Refresh keywords of the video
    setVideoKeywords(videoId)

    # return comment metric score
    print(commentMetricScore)
