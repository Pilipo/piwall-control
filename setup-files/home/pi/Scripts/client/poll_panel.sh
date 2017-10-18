#!/bin/bash

# until pwomxplayer udp://226.1.1.1:1234?buffer_size=1200000B -T 1280x1024+0+0; do

until pwomxplayer -W 3072x1536+0+0 -T 1024x768+0+0 udp://226.1.1.1:1234; do

#until omxplayer --win "0 0 1380 1024" udp://226.1.1.1:1234; do
	echo "Server stopped with message: $?. Respawning..." >&2
	sleep 1
done
