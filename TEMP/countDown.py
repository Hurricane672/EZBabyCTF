import sys
import requests
from time import sleep
sleep(1800)
url = "http://127.0.0.1/close_docker.php?arg="+sys.argv[1]
print(requests.get(url).text)
# python3 countDown.py path