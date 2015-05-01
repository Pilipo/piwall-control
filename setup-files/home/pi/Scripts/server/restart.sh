#!/bin/bash

for server in $( cat ips.txt ); do
	ssh -n pi@$server sudo killall pwomxplayer.bin;
done
