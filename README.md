#llama
###To setup project remember to:
- run `composer install` command (and run it every time someone installs a new library)
- create new database in mysql (for example `llama`) using phpmyadmin or any other mysql tool
- copy llama/config/autoload/doctrine.local.php.dist to llama/config/autoload/doctrine.local.php
- in copied file change this line:
`                    'url' => 'mysql://username:password@localhost/database',
`
to your local setup (for example `mysql://root:@localhost/llama`)
- run command `vendor\bin\doctrine.bat orm:schema-tool:update --force --dump-sql` to generate database tables from models / entities

#####Sidenote: all commands have to be run from inside ./llama directory

### To test if everything was set up correctly:
- run command `composer run --timeout=0 serve` and open http://localhost:8080/

You should see "Welcome to zend-expressive" page with "no users in database" message at the bottom

Now try to add an entry to database table `users` and refresh main page - it should show user you have added at the bottom of the page.