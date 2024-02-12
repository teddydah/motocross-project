docker compose down --remove-orphans
docker compose up -d
docker compose run --rm npmlaravel install
docker compose exec phplaravel composer install
docker compose exec phplaravel php artisan migrate --force
docker compose exec phplaravel php artisan migrate:fresh --seed
docker compose run --rm npmlaravel run build
