import os

os.environ['DISPLAY'] = ':0'

import RPi.GPIO as GPIO 
import pycurl
import certifi
from io import BytesIO
import pyautogui


def setWerbungFalseButton_callback(channel):
    c.setopt(c.URL, 'http://127.0.0.1:8000/gpio/0')
    c.perform()
    print("set werbung flag to false")
    pyautogui.press('f5') 


def setWerbungTrueButton_callback(channel):
    c.setopt(c.URL, 'http://127.0.0.1:8000/gpio/1')
    c.perform()
    print("set werbung flag to true")
    pyautogui.press('f5') 

flag = 0
def toggleWerbung_callback(channel):
    global flag 
    flag = flag ^ 1
    c.setopt(c.URL, 'http://127.0.0.1:8000/gpio/' + str(flag))
    c.perform()
    print("set werbung flag to " + str(flag))
    pyautogui.press('f5')
 

GPIO.setwarnings(False) 
GPIO.setmode(GPIO.BCM)

GPIO.setup(17, GPIO.IN, pull_up_down=GPIO.PUD_DOWN)
GPIO.add_event_detect(17,GPIO.RISING,callback=setWerbungTrueButton_callback,bouncetime=500) 


buffer = BytesIO()
c = pycurl.Curl()
c.setopt(c.WRITEDATA, buffer)
c.setopt(c.CAINFO, certifi.where())

message = input("Press enter to quit\n\n") 
GPIO.cleanup() 
c.close()