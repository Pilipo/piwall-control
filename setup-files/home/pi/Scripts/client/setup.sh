#!/bin/bash

#COPY needed scripts from 192.168.1.242
scp pi@192.168.1.242:/boot/[b-c]* /boot/
scp pi@192.168.1.242:/boot/p* /boot/
scp pi@192.168.1.242:/boot/

#INSTALL piwall network and hostname config script
ln -s /boot/piwall.sh /etc/init.d/apiwall.sh
update-rc.d apiwall.sh defaults

#INSTALL piwall client startup script
ln -s /boot/poll_panel.sh /etc/init.d/poll_panel_startup.sh
update-rc.d poll_panel_startup.sh defaults
