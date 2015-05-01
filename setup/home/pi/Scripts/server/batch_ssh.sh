#!/bin/bash

server_list=/home/pi/server_list.txt

for server in $( cat $server_list ); do
	ssh pi@$server $1
done

exit 0
