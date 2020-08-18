# todolist project

[![Maintainability](https://api.codeclimate.com/v1/badges/2f1016d052e389ea984d/maintainability)](https://codeclimate.com/github/grondindaniel/todolist/maintainability)
[![Build Status](https://travis-ci.com/grondindaniel/todolist.svg?branch=master)](https://travis-ci.com/grondindaniel/todolist)
## How to install
_________________

### Requirements

    * PHP >= 7.4.8
    * MySQL 5.7
    * Composer
    * For the server i recommend to use Symfony CLI 
    (if you want https in local run : symfony server:ca:install)
    
### First in your terminal

    git clone https://github.com/grondindaniel/todolist.git

    cd todolist

    composer install 

### Next

    in .env file configure your own database db_name, db_user and db_password with yours credentials :

    DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7

### Then

    php bin/console doctrine:database:create

    php bin/console doctrine:schema:create

    symfony server:start -d

    php bin/console doctrine:fixtures:load

### Finally, credentials for using the app

    username : root
    password : Xkeyscore
    role : admin
    _____________________
    
    username : claire
    password : Xkeyscore
    role : user
    
 ## For testing the app

### First

    in .env.test file configure your own database db_name, db_user and db_password with yours credentials :

    DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7
    
### Then

    php bin/console doctrine:database:create --env=test

    php bin/console doctrine:schema:create --env=test

### Finally in your terminal just run

    ./bin/phpunit
it will updates some dependencies and all fixtures will be load with user.yaml.

<h4>To see coverage, run :</h4>

    ./bin/phpunit --coverage-html public/test-coverage
