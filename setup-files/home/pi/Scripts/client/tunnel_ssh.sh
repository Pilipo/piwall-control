#!/bin/bash

createTunnel() {
        /usr/bin/ssh -p 24 -f -N -T -R22280:192.168.75.70:80 tunnel@philliplehner.com
        if [[ $? -eq 0 ]]; then
                echo "Tunnel created."
        else
                echo "Tunnel failed with error: $?"
        fi
}

/bin/netstat -tanp | grep 205.186.156.217:24 | grep ESTABLISHED
if [[ $? -ne 0 ]]; then
        echo "Creating a new tunnel"
        createTunnel
fi

