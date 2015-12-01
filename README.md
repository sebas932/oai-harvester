# oai-harvester
Test harvest of OAI-PMH interoperability protocol

#Install

// Clone GIT project
git clone https://github.com/sebas932/oai-harvester.git

// Installing nodejs and npm(package manager for JavaScript)
curl -sL https://deb.nodesource.com/setup | sudo bash -
sudo apt-get install -y nodejs

// Install Bower (JS Libraries)
npm install -g bower

// Install composer globally (PHP Libraries)
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer

// Configurate OAI-Harvester project
sudo bower install --allow-root
sudo composer update
