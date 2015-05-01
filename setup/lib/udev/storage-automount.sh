#!/bin/sh

# set the mountpoint name according to partition or device name
mount_point=$ID_FS_LABEL
if [ -z $mount_point ]; then

   exit 1
    #mount_point=${DEVNAME##*/}
fi

# if a plugdev group exist, retrieve it's gid set & it as owner of mountpoint
plugdev_gid="$(grep plugdev /etc/group|cut -f3 -d:)"
if [ -z $plugdev_gid ]; then
    gid=''
else
    chown root:plugdev $mount_point
    gid=",gid=$plugdev_gid"
fi

# create the mountpoint directory in /media/ (if not empty)
if [ -n $mount_point ]; then
    mkdir -p /media/$mount_point
    # other options (breaks POSIX): noatime,nodiratime,nosuid,nodev
    mount -t $ID_FS_TYPE \
      -o ro,flush,user,uid=0$gid,umask=002,dmask=002,fmask=002 \
      $DEVNAME /media/$mount_point
fi
