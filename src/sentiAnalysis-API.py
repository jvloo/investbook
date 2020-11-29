## API Endpoint
apiUrl = "http://dev.senangprint.com/investbook/api-py"

################################################################################
##                          END OF CONFIGURATION                              ##
################################################################################

## Import common modules
import sys
import base64, json
import requests

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
    response = requests.get(apiUrl+"/comment/get?comment_id="+str(commentId))
    print(response.text)
    exit()
    comment  = json.loads(response.text)

    # Run text analysis on the content
    commentScore = textAnalysis(comment[0]['content'])

    # Update the comment score
    requests.post(apiUrl+"/comment/update?comment_id="+str(commentId)+"&score="+str(commentScore))

    # Return the score
    return commentScore

def setVideoKeywords(videoId):
    # Fetch all comments by videoId
    response  = requests.get(apiUrl+"/comment/get?video_id="+str(videoId))
    comments  = json.loads(response.text)

    # Set stopwords
    stopWords  = set(stopwords.words('english'))
    stopWords |= {'.', 'All', 'is', ' ', ',', 'I', '<', '>', '~', '!', '1', '2', '3', '4', '5', '6', '7', '8', '9', '0'}

    # Get TOP 5 keywords
    wordsFiltered = []
    topkeywords = []

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
        response = requests.get(apiUrl+"/keyword/get?video_id="+str(videoId)+"&content="+str(content))
        keyword  = json.loads(response.text)

        if (keyword):
            # Update keyword count
            requests.post(apiUrl+"/keyword/update?keyword_id="+str(keyword[0]['id'])+"&count="+str(count))
        else:
            # Create new keyword
            requests.post(apiUrl+"/keyword/post?video_id="+str(videoId)+"&content="+str(content)+"&count="+str(count))

    # print('Top Keywords : ', topkeywords)
    return topkeywords

def setVideoLastComment(commentId, videoId):
    # Get metric of the video
    response = requests.get(apiUrl+"/metric/get?video_id="+str(videoId))
    metric   = json.loads(response.text)

    # Check if metric already exists
    if (metric):
        metricId = metric[0]['id']
    else:
        # Create new metric
        response = requests.post(apiUrl+"/metric/post?video_id="+str(videoId))
        metricId = response.text

    # Set last comment id
    requests.post(apiUrl+"/metric/update?metric_id="+str(metricId)+"&comment_last_id="+str(commentId))

## =========================================================================
## Run the program..
## =========================================================================
if __name__ == '__main__':
    # Get JSON data
    # data = json.loads(base64.b64decode(sys.argv[1]))

    # videoId   = data['videoId']
    # commentId = data['commentId']

    videoId = 1
    commentId = 2

    # Analyze comment and set the metric score
    commentMetricScore = setCommentScore(commentId)

    # Set the last comment analyzed
    setVideoLastComment(commentId, videoId)

    # Refresh keywords of the video
    setVideoKeywords(videoId)

    # return comment metric score
    print(commentMetricScore)
