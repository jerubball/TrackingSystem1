#!/bin/bash
git pull
#if [[ ! -d /var/www/html1/ ]]
#then
#    mkdir /var/www/html1/
#fi
cp -rf ./Application/* /var/www/html1/
