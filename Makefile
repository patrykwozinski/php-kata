check: php-cs-fixer phpstan phpunit

php-cs-fixer:
	./vendor/bin/php-cs-fixer fix

phpstan:
	./vendor/bin/phpstan analyse

phpunit:
	./vendor/bin/phpunit
