# cameRAs

A RTSP/RTMP Camera Viewer through Webpage for Linux or Rasspbery Pi

<div align="center"><p>
    <a href="https://github.com/rallyrabbit/cameRAs/releases/latest">
      <img alt="Latest release" src="https://img.shields.io/github/v/release/rallyrabbit/cameRAs" />
    </a>
    <a href="https://github.com/rallyrabbit/cameRAs/pulse">
      <img alt="Last commit" src="https://img.shields.io/github/last-commit/rallyrabbit/cameRAs"/>
    </a>
</p></div>

## Purpose
I had a bunch of Wyze and Reolink network cameras that use their own custom Wyze and Reolink applications for iOS or Android (and Web for Reolink).  However, I wanted a way to aggregate the video feeds and show on the TV or Amazon Echo Show.  I thought, surely someone has done this, especially for Raspberry Pi.

For some background, I attempted this with MotionEye on Linux for Raspberry Pi (https://github.com/motioneye-project/motioneye).  I initially tried to use this on a Raspberry Pi 2B, but this failed due to performance.  I got a Libre Potato (in between a Raspberry Pi 3B and 4B) and this also failed as it was way too laggy.  This is due to MotionEy using the motion toolset to actually try and detect motion frame by frame.  As I am not interested in motion detection and only dispalying video, this solution did not work.  Although I really like the MotionEye UI.

I then attempted to use an older project for displaying RTSP feeds Ubquitti Cameras, called displaycameras (https://github.com/Anonymousdog/displaycameras).  Very nice, works great in the Libre Potato.  Howver, no web page displaying.

So, I ripped out the UI on MotionEye (thank you) and started my own customization.  This solution uses:
 * Nginx - To basically take RTSP feeds and convert to RTMP
 * ffmpeg - Uses ffmpeg to then take the RTMP feeds and convert those to file based "live" feeds
 * MotionEye UI - A UI I based on the MotionEye UI that takes the video feeds and displays them using video.js

## First and Foremost
This is but one way you can get your camera streams locally (in this case, on a website/page that could be viewed anywhere in house; meaning on my local network).  There is very little other security that I am putting in place here other than what is on my local network.  So, with that said, you use this solution at your won risk.

## Getting Started
What do you need?  A machine running Linux, I used a Raspberry Pi 2B, Raspberry Pi 3B and Libre Potato with this solution with 8 cameras.  So far, this is ok.  To get RTSP or RTMP streamed to HLS for ffmpeg to work ahs the following requirements.

> sudo apt update
> sudo apt upgrade
> sudo apt install build-essential
> sudo apt install libpcre3
> sudo apt install libpcre3-dev
> sudo apt install libssl-dev
> sudo apt install unzip

Optional depending:
> sudo apt install nginx

Or better yet, you can get nginx from source.
> cd ~
> mkdir working
> wget http://nginx.org/download/nginx-1.17.9.tar.gz
> wget https://github.com/arut/nginx-rtmp-module/archive/master.zip
> cd working
> tar -zxvf nginx-1.17.9.tar.gz
> unzip master.zip
> cd nginx-1.17.9
> ./configure --with-http_ssl_module --with-http_stub_status_module --add-module=../nginx-rtmp-module-master
> make
> sudo make install
> Get the file here in nginx/nginx and put it into /etc/init.d
> sudo chmod 655 /etc/init.d/nginx
> Get the file here in nginx/nginx.conf and put it into the nginx configuration directy /usr/local/nginx/conf
> There are some tips on the nginx.conf coming, but, if you just want to take what's there for 4 cameras, here ya go, this is what you need.
> sudo service nginx start
> sudo service nginx stop

Create the temporary HLS directories, you need one for each camera that you'll be dealing with.  Note that I am putting these in the home directory, this will need to be reflected in nginx.conf.
> mkdir ~/HLS
> mkdir ~/HLS/live
> mkdir ~/HLS/cam1
> mkdir ~/HLS/cam2
> mkdir ~/HLS/cam3
> mkdir ~/HLS/cam4
> chmod 775 HLS
> chmod 775 HLS/live
> chmod 775 HLS/cam1
> chmod 775 HLS/cam2
> chmod 775 HLS/cam3
> chmod 775 HLS/cam4

nginx.conf will need to be updated for the hls_path for each RTSP feed to be represented from above.  Each cam location needs to be updated with the HLS path above.  And the path to the root www directory for the web server should be represented here too.  All these need to be manually updated, as well as the destination cam feed url.

Set up you www root directory.  I used local account.
> mdkir ~/www
> chmod 775 ~/www
> mkdir ~/www/cam1
> chmod 775 ~/www/cam1
> repeat for each camera

Reboot to have nginx start automatically.  Now we are ready to set up more for ffmpg and web site next.

## ffmpeg

## website

