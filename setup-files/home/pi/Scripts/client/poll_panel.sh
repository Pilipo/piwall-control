#!/bin/bash

#testing playback of position 1
until pwomxplayer udp://226.1.1.1:1234?buffer_size=1200000B -T 1280x1024+0+0; do
	echo "Server stopped with message: $?. Respawning..." >&2
	sleep 1
done
