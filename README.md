<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# Laravel Library Management System

## Quick Start 
clone the repo
```
git clone https://github.com/Pfftz/AkuPemweb.git
```
change current directory
```
cd Laravel-libraray-management-system
```
install dependencies
```
composer install
```
install js dependencies
```
npm install
````
create .env file
```
cp (unix) or copy (Windows) .env.example .env
```
generate env key
```
php artisan key:generate
```
Create Database named "perpus"
```
CREATE DATABASE perpus;
```
migrate the migration and seed the database
```
php artisan migrate:fresh --seed
```
start server
```
php artisan serve
```
credentails
```
Admin
username: akusigma
password: password

User
Anggota 1
'name' => 'el laravel',
'username' => 'royan',
'password' => Hash::make('password1'),
Anggota 2
'name' => 'fufufafa',
'username' => 'gibran',
'password' => Hash::make('password2'),
Anggota 3
'name' => 'ppn 12%',
'username' => 'srimulyani',
'password' => Hash::make('password3'),
Anggota 4
'name' => 'Om Gemoy',
'username' => 'prabowo',
'password' => Hash::make('password4'),
Anggota 5
'name' => 'Si Ahok',
'username' => 'ahok',
'password' => Hash::make('password5'),
```
