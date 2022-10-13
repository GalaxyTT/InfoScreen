import RPi.GPIO as GPIO 
import pycurl
import certifi
from io import BytesIO

def button_callback(channel):
    c.perform()
    print("Button was pushed!")

GPIO.setwarnings(False) 
GPIO.setmode(GPIO.BCM) 
GPIO.setup(22, GPIO.IN, pull_up_down=GPIO.PUD_DOWN)
GPIO.add_event_detect(22,GPIO.RISING,callback=button_callback) 

buffer = BytesIO()
c = pycurl.Curl()
c.setopt(c.URL, 'http://127.0.0.1:8000/gpio')
c.setopt(c.WRITEDATA, buffer)
c.setopt(c.CAINFO, certifi.where())

message = input("Press enter to quit\n\n") 
GPIO.cleanup() 
c.close()