#!/bin/bash
git pull
if [[ ! -d /var/www/html/TrackingSystem ]]
then
    mkdir /var/www/html/TrackingSystem
fi
cp -rf ./Application/* /var/www/html/TrackingSystem/
