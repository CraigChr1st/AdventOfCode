#!/usr/bin/env bash

apt-get update
apt-get install -y apache2
apt-get install mysql-server libapache2-mod-auth-mysql php5-mysql
apt-get install php5 libapache
apt-get install php5-mcrypt php5-curl

sudo a2enmod php5

service apache2 restart
if ! [ -L /var/www ]; then
  rm -rf /var/www
  ln -fs /vagrant /var/www
fi