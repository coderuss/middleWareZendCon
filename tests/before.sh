sudo apt-get install software-properties-common


sudo apt-get update

sudo apt-get install default-jre -y
sudo apt-get install firefox -y

sudo npm install selenium-standalone@latest -g

sudo selenium-standalone install --drivers.chrome.version=2.15 --drivers.chrome.baseURL=https://chromedriver.storage.googleapis.com
#sudo selenium-standalone install

sudo apt-get install xvfb -y

#./start-selenium.sh &