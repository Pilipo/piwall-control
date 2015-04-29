# piwall-control
Establishes a server and clients for video distribution across multiple monitors using the PiWall and omxplayer projects.

# The Server
Streams UDP multicast based on setting defined in a web based admin interface. 

# The Clients
Distribute video across individual monitors using omxplayer subscribing to the multicast feed. 

# The Dependencies
The Server
Apache2
MySQL
Avconv
Dsh

The Clients
Omxplayer
Pwomxplayer
Pwomxplayer-lib
Rsa public key from server

