import sys
import requests
from time import sleep
sleep(30)
url = "http://127.0.0.1/close_docker.php?arg1="+sys.argv[1]+"&arg2="+sys.argv[2]
print(requests.get(url).text)
# http://192.168.64.129/pyapi.php?arg1=./TEMP/CandyShop0001&arg2=./TEMP/CandyShop0001
# python3 countDown.py path