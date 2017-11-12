BUILD

The application was built using PHP 5.6.30 and Composer 1.5.2.  Testing is built with PHPunit version 3.7.38.

The Composer directories have been excluded via .gitignore.



RUN

The application can be run using the following command from the root directory:
	
	$ php -index.php

This will dump the output for question one, and immediately prompt the user for inputs on question two.

Unit testing can be run with the following command from the root directory:

	$ ./vendor/bin/phpunit