import sys
import base64, json

data = json.loads(base64.b64decode(sys.argv[1]))
print(data['videoId'])
