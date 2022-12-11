# CPE400 Semester Project - Server Car
Semester Project by Michael Kerr, Kyle Knotek, and Cole Renfro

# Introduction
This is a semester project for the CPE 400 class. For our project, we elected to create an IOT RC Car that is controlled over Wi-Fi

# Required Components
Below is a list of components required for this project.
- Raspberry Pi 4/3 Model B
- [5V 2A Battery](https://www.amazon.com/Portable-10000mAh-Odec-Capacity-External/dp/B08HGGWKF9/ref=sr_1_8?keywords=external+phone+battery+5v+2a&qid=1670718659&refinements=p_36%3A2491156011&rnid=2491154011&s=wireless&sr=1-8)
- RC Car
- [RC Car Battery](https://www.amazon.com/Zeee-Batteries-Dean-Style-Connector-Vehicles/dp/B076Z778MJ)
- Jumper Wires
- [Pi Camera](https://www.amazon.com/Arducam-Megapixels-Sensor-OV5647-Raspberry/dp/B012V1HEP4/ref=sr_1_3?crid=2LCJ4FVP3UYML&keywords=pi%2Bcamera&qid=1670718974&s=electronics&sprefix=pi%2Bcamera%2Celectronics%2C174&sr=1-3&th=1)
- Router with Port Forwarding Capabilities

# Required Software
Below is the software that was utilized in this project. These libraries are required to replicate functionality, and are all installed directly to the Raspberry Pi.
- Apache2 Server Package
- Apache PHP package
- Python 3
- Raspbian OS

#How this works
This project works by first allowing individuals to access the webpage through the utilization of port forwarding through a router. Once the router handles this request, they are connected to the Apache2 web server running on the Raspberry Pi. On this webserver, there are four buttons, and a simple livestream. Pressing any of the buttons on this web server allows the user to make a POST request over the server. PHP gets this POST request, and runs the relevant python script on a seperate thread to allow the live stream to continue. The live stream runs on a seperate Flask instance running on the raspberry pi, which works by pulling individual .jpg files, and sending those frames to port 8000. These are then turned into .mjpg files, which are sent to the Flask server. This stream can seen individually if the user navigates to  `http://webserver-ip:8000/stream.mjpg`.

# Directions to Replicate functionality.
This guide assumes that you are super cool and have already set up WiFi over your local network. If you haven't, a guide can be found [here](https://www.seeedstudio.com/blog/2021/01/25/three-methods-to-configure-raspberry-pi-wifi/).
1. Run the following command

`sudo apt update && sudo apt upgrade -y`

2. Next, we'll install apache. Run the following command

`sudo apt install apache2`

3. Say yes when the relevant dialogue box appears

4. Upon completion, navigate to web browser on Raspberry Pi and type in `localhost` to the browser search bar. You should see an apache server default page.

5. Find IP/hostname of Apache server using the following command

`hostname -I`

6. From a seperate computer, test functionality of web sever on the network by navigating to the IP address in your web browser.

7. Navigate to router IP in a web browser. We will be setting up port forwarding to the raspberry pi with the following steps.

8. Find Port Forwarding in your router settings. Mine was in Advanced > Advanced Setup > Port Forwarding, however, every router configuration is different, so this may take some time

9. In Port Forwarding, add a custom service. The external and internal ports must be 80, and the internal IP address should be set to the IP address of the Raspberry Pi.

10. Add another custom service. The external and internal ports must be 8000, and the internal IP address should be set the the IP address of the Raspberry Pi.

11. Navigate to your public IP address in your browser. If you don't know your IP address, it can be found [here](https://www.whatismyip.com/). If everything has been done correctly, you should be able to see the Apache2 default page in your web browser.

12. Install PHP using the following command.

`sudo apt install php`

13. To test PHP, navigate to /var/www/html on your Rapberry Pi. Open `index.html`, and rename it to `index.php`. Then, open the `index.php` file, and add the following php code. You may need to run `chmod -R g+rwx /var/www/html` to allow scripts to run. While this isn't best practice as it allows anyone to edit files on your server car webserver, 
`<?php echo "hello world"; ?>`

14. Save this file, and then you will restart the apache2 webserver by running this command `sudo service apache2 restart`. Check functionality by accessing the IP of the Pi through any of the methods previously described.

15. Once functionality is confirmed, delete index.php, and clone this repository into `/var/html/www`. Be sure to allow all python scripts to be executed by anyone.

16. Enter index.php, and on line 79, change the `some-ip` in `<iframe src="http://some-ip:8000/stream.mjpg` to your IP.
