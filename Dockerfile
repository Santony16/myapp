# Imagen base con PHP, Composer y extensiones comunes
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

# Instalar dependencias PHP
RUN composer install --no-dev --optimize-autoloader

# Opcional: establecer permisos
RUN chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache

# Puerto expuesto (para Laravel serve)
EXPOSE 10000

# Comando de inicio (en Settings → Start Command)
# php artisan serve --host 0.0.0.0 --port 10000
