#!/bin/bash
### Obtenemos ejecucion
ACTION=$(/bin/sh /home/pcarrs/repos/sim/script/get_execution_now.sh | awk '{print $2}')
DISP=$(/bin/sh /home/pcarrs/repos/sim/script/get_execution_now.sh | awk '{print $3}')
if [ ! -z "$ACTION" ]
then
    /bin/echo $ACTION > /home/pcarrs/repos/sim/servers/test1/status/$DISP
fi
