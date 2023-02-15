import RPi.GPIO as GPIO 


def button_callback(channel):
    global i
    i += 1 
    print(i)

GPIO.setwarnings(False) 
GPIO.setmode(GPIO.BCM) 
GPIO.setup(17, GPIO.IN, pull_up_down=GPIO.PUD_DOWN)
GPIO.add_event_detect(17,GPIO.RISING,callback=button_callback, bouncetime=500) 

i = 0

message = input("Press enter to quit\n\n") 
GPIO.cleanup() 
