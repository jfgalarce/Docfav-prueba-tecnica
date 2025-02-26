# Docfav-prueba-tecnica
Requisitos
1. Docker y Docker Compose instalados.
2. Git para clonar el repositorio.

Instalación
1. Clonar el repositorio

git clone https://github.com/jfgalarce/Docfav-prueba-tecnica.git
cd Docfav-prueba-tecnica

2. Iniciar el entorno con Docker
docker-compose up -d

3. Instalar dependencias de Composer
composer install

4. Configurar la base de datos
MYSQL_ROOT_PASSWORD=rootpassword
MYSQL_DATABASE=mydatabase
MYSQL_USER=myuser
MYSQL_PASSWORD=mypassword

5. migraciones 
php vendor/bin/doctrine-migrations migrate

6. Pruebas Unitarias
./vendor/bin/phpunit

