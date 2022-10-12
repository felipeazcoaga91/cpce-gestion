git pull max master
php app/console assets:install
rm -rf app/cache/*
chown -R cpcechaco:cpcechaco *
chown -R www-data:www-data app/cache/ app/logs/ app/archivos app/varios
