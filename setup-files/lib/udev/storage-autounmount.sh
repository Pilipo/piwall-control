#!/bin/sh

# set the mountpoint name according to partition or device name
mount_point=$ID_FS_LABEL
if [ -z $mount_point ]; then
	exit 1
    #mount_point=${DEVNAME##*/}
fi

# remove the mountpoint directory from /media/ (if not empty)
if [ -n $mount_point ]; then
    umount -l /media/$mount_point
    rm -R /media/$mount_point
fi

# kill player process and batch ssh (dsh) kill client players
