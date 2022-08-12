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

