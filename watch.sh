#!/bin/bash

killall php
php build.php
php -S localhost:8080 -t web/ &

while [ true ]
do
    inotifywait -e modify -r pages/
    php build.php
done