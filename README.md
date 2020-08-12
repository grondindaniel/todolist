# todolist project

## How to install
_________________

<h4>Requirements</h4>

    * PHP >= 7.4.8
    * MySQL 5.7
    * Composer
    * For the server i recommend to use Symfony CLI 
    (if you want https in local run : symfony server:ca:install)
    
<h4>First in your terminal </h4>

    git clone https://github.com/grondindaniel/todolist.git

    cd todolist

    composer install 

<h4>Next </h4>

    in .env file configure your own database db_name, db_user and db_password with yours credentials :

    DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7

<h4>Then </h4>

    php bin/console doctrine:database:create

    php bin/console doctrine:schema:create

    symfony server:start -d

    php bin/console doctrine:fixtures:load

<h4>Finally, credentials for using the app</h4>

    username : root
    password : Xkeyscore
    role : admin
    _____________________
    
    username : claire
    password : Xkeyscore
    role : user
    
 ## For testing the app

<h4>First </h4>

    in .env.test file configure your own database db_name, db_user and db_password with yours credentials :

    DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7
    
<h4>Then </h4>

    php bin/console doctrine:database:create --env=test

    php bin/console doctrine:schema:create --env=test

<h4>Finally in your terminal just run</h4>

    ./bin/phpunit
it will updates some dependencies and all fixtures will be load with user.yaml.

<h4>To see coverage, run :</h4>

    ./bin/phpunit --coverage-html public/test-coverage
