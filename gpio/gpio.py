import RPi.GPIO as GPIO 


def button_callback(channel):
    print("Button was pushed!")

GPIO.setwarnings(False) 
GPIO.setmode(GPIO.BCM) 
GPIO.setup(22, GPIO.IN, pull_up_down=GPIO.PUD_DOWN)
GPIO.add_event_detect(22,GPIO.RISING,callback=button_callback) 



message = input("Press enter to quit\n\n") 
GPIO.cleanup() 