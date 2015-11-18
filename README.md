A Symfony2 Hive test project:

1. Extract file.
2. Please run below commands. Those are Symfony standard commands if there is a problem with cache:
	
	#ACL
	HTTPDUSER=`ps aux | grep -E '[a]pache|[h]ttpd|[_]www|[w]ww-data|[n]ginx' | grep -v root | head -1 | cut -d\  -f1`
	sudo setfacl -R -m u:"$HTTPDUSER":rwX -m u:`whoami`:rwX app/cache app/logs
	sudo setfacl -dR -m u:"$HTTPDUSER":rwX -m u:`whoami`:rwX app/cache app/logs

3. In root directory run composer update: php composer.phar update
4. Run web server: php app/console server:run
5. Go to http://localhost:8000/start
6. Click Hit and watch HP.

Requirements:

1. Linux OS (recommended)
2. PHP installed (min PHP 5.x)