FROM php:8.2-cli

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    git zip unzip curl libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Crear directorio de trabajo
WORKDIR /var/www/html

# Copiar archivos del proyecto
COPY . .

# Instalar dependencias de PHP
RUN composer install --no-dev --optimize-autoloader

# Establecer permisos necesarios
RUN chmod -R 755 storage bootstrap/cache

# Exponer puerto
EXPOSE 10000

# Comando de inicio (reemplaza Pre-Deploy + Start)
CMD php artisan config:cache && php artisan migrate --force && php artisan serve --host 0.0.0.0 --port 10000
