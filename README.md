QA is a question & answer engine
=================================

QA is a open source question & answer engine based on symfony2. 
In early develope stage, you can use it for free.

How to Contribute/Setup
------------------------
* Setup your database parameters in `parameters.ini`
* Perfome `sudo chmod +a "yourname allow delete,write,append,file_inherit,directory_inherit" app/cache app/logs` 
  to setup write permissions for cache and logs folder, read more http://symfony.com/doc/current/book/installation.html
* Install vendors `bin/vendors install`
* Run `php app/console doctrine:schema:update --force` to setup your first DB structure
* Run `php app/console doctrine:fixtures:load` to add fixtures. More about how to waht is fixtures 
  and how to work with read at http://symfony.com/doc/current/bundles/DoctrineFixturesBundle/index.html

License
-------
QA is under the MIT license.

Have a good day!