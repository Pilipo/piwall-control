#!/bin/bash
### BEGIN INIT INFO
# Provides:
# Required-Start:
# Required-Stop:
# Should-Start:
# Default-Start:	2
# Default-Stop:
# Short-Description:
# Description:
### END INIT INFO

source /boot/piwall.txt

#SET NETWORK INTERFACE
writeif()
{
mkdir -p /home/pi/backups/network
cp /etc/network/interfaces /home/pi/backups/network/interfaces

cat << EOF > /etc/network/interfaces
auto lo

iface lo inet loopback

iface eth0 inet static
address $IP
netmask $MASK

up route add -net 224.0.0.0 netmask 240.0.0.0 eth0
EOF
}

#SET HOSTNAME
writehostname()
{
cat << EOF > /etc/hostname
panel-$UNIT
EOF
}

writehosts()
{
mkdir -p /home/pi/backups/hosts
cp /etc/hosts /home/pi/backups/hosts

cat << EOF > /etc/hosts
127.0.0.1	localhost	panel-$UNIT
::1		localhost ip6-localhost ip6-loopback
fe00::0		ip6-localnet
ff00::0		ip6-mcastprefix
ff02::1		ip6-allnodes
ff02::2		ip6-allrouters

# 127.0.1.1	raspberrypi

$IP		panel-$UNIT
EOF
}

writeif;
writehostname;
writehosts;
/etc/init.d/hostname.sh
ifdown eth0
ifup eth0
