1. copy .env.example as .env
2. configure .env
(2) configure database entry
(3) configure REDIS entry
3. composer install
4. php artisan key:generate
5. php artisan module:v6:migrate <== 產生 modules_statuses.json檔案, 記錄module啟用狀態
6. php artisan vendor:publish --all
7. php artisan migrate
8. php artisan passport:keys
9. php artisan db:seed
10. php artisan config:cache <== 此指令在你有修改 any config file 時 記得要在執行過,讓laravel cache住
