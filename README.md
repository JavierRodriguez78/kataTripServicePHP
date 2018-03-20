# Trip Service Kata
Kata for legacy code hands-on session. The objective is to test and refactor the legacy TripService class.

The end result should be well-crafted code that express the domain.

## Running tests
To execute the unit tests you need run this from the *php* directory

    php bin/phpunit

## Coverage

If your IDE doesn't handle it you can launch and visualize it from the command line. Given you are in  the *php* folder
just run

    php bin/phpunit --coverage-text

If you want to visualize it from the browser you have to run PHPUnit with this parameters

    php bin/phpunit --coverage-html coverage/

Then visualize

    open coverage/index.html

in a browser

Enjoy

