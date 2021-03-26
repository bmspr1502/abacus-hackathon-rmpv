import json

import sys, json

# Load the data that PHP sent us
try:
    data = json.loads(sys.argv[1])
except:
    print "ERROR"
    sys.exit(1)


#subtitles = json.loads("./data.json")
#subtitles = subtitles["content"]
print ('hello world')

#from rake_nltk import Rake
#r = Rake()
#r.extract_keywords_from_text(subtitles)
#data = r.get_ranked_phrases()[0:10]


