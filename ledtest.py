#!/usr/bin/env python
import RPi.GPIO as GPIO
import time
import sys

print(str(sys.argv))
#LED ON option is 0
if(sys.argv[1] == 0)
	GPIO.setmode(GPIO.BCM)

	GPIO.setup(2, GPIO.OUT)

	GPIO.output(2, True)

	time.sleep(5)

	GPIO.output(2, False)

#Left Option
if(sys.argv[1] == 1)
	GPIO.setmode(GPIO.BCM)

	GPIO.setup(5, GPIO.OUT)

	GPIO.output(5, True)

	time.sleep(5)

	GPIO.output(5, False)
	
#Right Option
if(sys.argv[1] == 2)
	GPIO.setmode(GPIO.BCM)

	GPIO.setup(6, GPIO.OUT)

	GPIO.output(6, True)

	time.sleep(5)

	GPIO.output(6, False)
	
#Left Option
if(sys.argv[1] == 3)
	GPIO.setmode(GPIO.BCM)

	GPIO.setup(7, GPIO.OUT)

	GPIO.output(7, True)

	time.sleep(5)

	GPIO.output(7, False)
GPIO.cleanup()
