#!/usr/bin/python3

#Michael "Mickey" Kerr
#2022
import RPi.GPIO as GPIO
import time
import sys

#LED On option
if len(sys.argv) == 1:
	print("Bruh, no args")
	quit()
	
if sys.argv[1] == 'ledon':
	GPIO.setmode(GPIO.BCM)
	GPIO.setup(2, GPIO.OUT)
	GPIO.output(2, True)

	
#LED Off option

if sys.argv[1] == 'ledoff':
	GPIO.setmode(GPIO.BCM)
	GPIO.setup(2, GPIO.OUT)
	GPIO.output(2, False)


