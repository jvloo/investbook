## Import common modules
import sys
import base64, json

## Import NLTK modules
import nltk

from nltk.tokenize import sent_tokenize, word_tokenize
from nltk.probability import FreqDist

try:
    nltk.data.find('sentiment/vader_lexicon.zip')
except :
    # print('Downloading... vader module')
    nltk.download('vader_lexicon')
from nltk.sentiment.vader import SentimentIntensityAnalyzer

try:
    nltk.data.find('/corpora/stopwords')
except:
    # print('Downloading... stopwords module')
    nltk.download('stopwords')
from nltk.corpus import stopwords

try:
    nltk.data.find('/tokenizers/punkt')
except:
    # print('Downloading... punkt module')
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

def getVideoKeywords(comments):
    # Set stopwords
    stopWords  = set(stopwords.words('english'))
    stopWords |= {'.', 'All', 'is', ' ', ',', 'I', '<', '>', '~', '!', '1', '2', '3', '4', '5', '6', '7', '8', '9', '0'}

    # Get TOP 5 keywords
    wordsFiltered = []
    topkeywords = []

    newStrings = [', '.join(word) for word in [word_tokenize(comment) for comment in comments]]

    for newString in newStrings:
        newString = word_tokenize(newString)
        for keyword in newString:
            if keyword not in stopWords:
                wordsFiltered.append(keyword)
                fdist = FreqDist(wordsFiltered)
                topkeywords = fdist.most_common(5)

    # Record top keywords and their frequency
    # for topkeyword in topkeywords:
        # content = topkeyword[0]
        # count   = topkeyword[1]

    # print('Top Keywords : ', topkeywords)
    return topkeywords


## =========================================================================
## Run the program..
## =========================================================================
if __name__ == '__main__':
    # Get JSON data
    data = json.loads(base64.b64decode(sys.argv[1]))

    content  = data['content']
    comments = data['comments']

    # DEBUG
    # content  = "Hello everyone"
    # comments = [
    #     "This is a neutral comment",
    #     "Hi hello",
    #     "lier haha",
    #     "test",
    #     "test again",
    #     "This is a neutral comment",
    #     "This is a negative comment lier",
    #     "This is a positive comment",
    #     "get the fucking keywords "
    # ]

    # Analyze comment content and get the metric score
    score = textAnalysis(content)

    # Extract keywords from all comments of the video
    keywords = getVideoKeywords(comments)

    # Generate results
    results = {
        "score": score,
        "keywords": keywords
    }

    print(json.dumps(results))
