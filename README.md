# [nama program]

## About [Nama Program]

[Nama Program] ini merupakan program peghintung indeks massa tubuh dan asupan kalori harian.

## Pengunduhan 

- Melakukan clone dari repository (disarankan menginstall git).

```bash
git clone https://github.com/hendrawanap/daking.git
```

- Melalui download `.zip`. Kemudian extract file

## penginstallan

1. Jalankan database mysql dan buatlah database dengan `daking` (nama database dapat diganti).

2. Membuat file `.env` pada folder root project menggunakan text editor.

3. Copy isi [`.env.example`](https://github.com/laravel/laravel/blob/master/.env.example) kemudian paste pada file `.env`.

4. Di dalam file `.env`, sesuaikan informasi database yang dibuat.

```
DB_DATABASE=daking
DB_USERNAME=root
DB_PASSWORD=
```

5. Buka terminal jalankan perintah berikut

```bash
composer install
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan serve
```
