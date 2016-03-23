#!/bin/bash

apt-get -y update

apt-get -y install apache2

debconf-set-selections <<< 'mysql-server-5.5 mysql-server/root_password password root'
debconf-set-selections <<< 'mysql-server-5.5 mysql-server/root_password_again password root'
apt-get -y install mysql-server libapache2-mod-auth-mysql php5-mysql
echo "create database texwp" | mysql -u root -proot

apt-get -y install php5 libapache2-mod-php5 php5-mcrypt

sed -i '12s@.*@\tDocumentRoot /var/www/public@' /etc/apache2/sites-available/000-default.conf
service apache2 restart
