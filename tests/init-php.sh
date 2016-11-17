sudo apt-get update && sudo apt-get install python-software-properties
sudo add-apt-repository ppa:ondrej/php5-5.6

# Use single quotes instead of double quotes to make it work with special-character passwords
PASSWORD='test'
PROJECTFOLDER='myproject'

# create project folder
#sudo mkdir "/var/www/html/${PROJECTFOLDER}"




# install apache 2.5 and php 5.5
sudo apt-get install -y apache2
sudo apt-get install -y php5
sudo apt-get install php5-mcrypt -y
sudo apt-get install php5-curl -y
sudo apt-get install php5-xdebug -y
sudo apt-get install php5-imagick -y
sudo php5enmod imagick
sudo php5dismod xdebug

sudo php5enmod mcrypt


sudo apt-get upgrade