git pull origin master
php -d memory_limit=-1 composer.phar install
php app/console assets:install
rm -rf app/cache/*
chown -R cpcechaco:cpcechaco *
chown -R www-data:www-data app/cache/ app/logs/ app/archivos app/varios
