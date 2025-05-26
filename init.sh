#!/bin/bash

echo "Iniciando script ..."

set -e

echo "🧹 Limpando caches anteriores..."
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

echo "📦 Rodando migrations com seeders..."
php artisan migrate:fresh --seed

echo "Gerando cache das rotas, config, e views"
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "✅ Script concluído com sucesso!"
