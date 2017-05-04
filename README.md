Chat
========================

Chat that is designed for test task https://gist.github.com/smirik/22d26ed316705caf1e08

In order to install:

  1. git clone git@github.com:Kudgo/TestWork.git my_project_name/

  2. install composer For example (Install Composer on Linux and Mac OS X): curl -sS https://getcomposer.org/installer | php sudo mv composer.phar /usr/local/bin/composer Read for more information: https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx
    
  3. cd my_project_name/; 

  4. composer install

  5. Specify parameters:
        facebook_client_id 
        facebook_client_secret 
        locale ("en" for default)

  6. assetic:dump