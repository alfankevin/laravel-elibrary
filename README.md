<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## How to Install

1. Clone Repository

```sh
git clone https://github.com/alfankevin/laravel-elibrary.git && cd laravel-elibrary
```

2. Install & Update Composer

```sh
composer update
```

3. Copy .env.example to .env

```sh
cp .env.example .env
```

4. Generate Key

```sh
php artisan key:generate
```

5. Migrate Database

```sh
php artisan migrate:fresh
```

6. Seed Database

```sh
php artisan db:seed
```

7. Run Laravel

```sh
php artisan serve
```
