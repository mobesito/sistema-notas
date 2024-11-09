Instrucciones Sistema-notas

1. Clonar repositorio de github:

>git clone [repositorio]

2. instalar dependencias

>composer install

3. crear base de datos con el nombre

"sistema_notas"

(importante elegir InnoDB como motor de base de datos)

4. ajustar archivo .env segun sea necesario

5. ejecutar migraciones

>php artisan migrate

6.

> Remove-Item -Path node_modules -Recurse -Force

> Remove-Item -Path package-lock.json -Force

> npm install

7. php artisan key:generate

8. correr proyecto en modo dev
>npm run dev
