#!/bin/bash
TIME_NOW=$(date | awk {'print $4'} | awk -F ':' {'print $1 $2}')
#cat /home/pcarrs/repos/sim/servers/test1/config.cnf | grep -v '#' | grep $TIME_NOW
COMMAND="/bin/grep -v '#' /home/pcarrs/repos/sim/servers/test1/config.cnf | awk '{if(\$1==\$1+0 && \$1< $TIME_NOW)print \$1 \" \" \$2 \" \" \$3}' | sort -nk1 | tail -1"
#COMMAND="grep -v '\#' /home/pcarrs/repos/sim/servers/test1/config.cnf"
#EXECUTION=$(grep -v '#' /home/pcarrs/repos/sim/servers/test1/config.cnf | awk '{if(\$1==\$1+0 && \$1< $TIME_NOW)print \$1 \" \" \$2 \" \" \$3}' | sort -nk1 | tail -1)
eval "$COMMAND"
