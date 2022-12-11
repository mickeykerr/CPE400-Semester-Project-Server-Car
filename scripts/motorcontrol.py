#!/usr/bin/python3

#Cole Renfro
#2022

import RPi.GPIO as GPIO
import sys, os
from time import sleep

steerpin = 32             # PWM pin connected to Steering
motorpin = 12             # PWM pin connected to motor
GPIO.setwarnings(False)         #disable warnings
GPIO.setmode(GPIO.BOARD)        #set pin numbering system
GPIO.setup(motorpin,GPIO.OUT)
GPIO.setup(steerpin, GPIO.OUT)
motor_pwm = GPIO.PWM(motorpin, 666)      #create PWM instance with frequency
steer_pwm = GPIO.PWM(steerpin, 666)
pawn_mid = 666
pwn_max = 500
pwn_min = 1000
motor_pwm.start(0)#start PWM of required Duty Cycle
steer_pwm.start(0)


for duty in range(0,101,1):
    motor_pwm.ChangeDutyCycle(duty)
    sleep(.02)
