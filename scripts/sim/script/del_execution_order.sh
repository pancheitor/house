#!/bin/bash
echo Borrando $1 ...
COMMAND="sed '/$1/d' /home/pcarrs/repos/h/house/scripts/sim/servers/test1/config.cnf"
echo ejecutando $COMMAND
eval $COMMAND
