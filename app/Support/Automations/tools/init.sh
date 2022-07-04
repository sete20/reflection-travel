#!/usr/bin/env bash

if [ $# -gt 0 ]; then
    FILE="`dirname "$0"`/$1.sh"
    if [ -f "$FILE" ]; then

        if [[ ! -x "$FILE"   ]];then
            chmod +x $FILE;
           echo "script is not executable trying to fix it";
        fi

         exec $FILE;
      else
      echo "Cant find this script"
      fi

else
    echo "Script not found"
fi
