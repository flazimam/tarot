# Website Pricelist Tarot (Laravel + Blade + Bootstrap 5 + MySQL)

Cocok untuk Laravel 10, 11, dan 12.

## Pasang
1. Di Terminal Laragon:
   cd C:\\laragon\\www
   composer create-project laravel/laravel tarot-pricelist
2. Salin isi zip ini ke folder `tarot-pricelist`, timpa file yang sama
   (routes/web.php dan database/seeders/DatabaseSeeder.php akan tertimpa).
3. Buat database kosong `tarot_pricelist` (tombol Database di Laragon), lalu edit `.env`.
   Di Laravel 11/12 baris DB bawaannya SQLite dan sebagian dikomentari: ubah jadi
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=tarot_pricelist
   DB_USERNAME=root
   DB_PASSWORD=
   lalu tambahkan di bagian bawah:
   TAROT_BRAND="Nama Brand Kamu"
   TAROT_TELEGRAM_USERNAME=username_telegram_kamu
4. php artisan migrate --seed
5. php artisan serve  -> buka http://127.0.0.1:8000

## Struktur Blade
- resources/views/layouts/app.blade.php   kerangka halaman (@yield, @stack)
- resources/views/home.blade.php          @extends layout + @include tiap section
- resources/views/partials/*              navbar, hero, about, pricelist, steps, faq, cta, footer
- resources/views/components/price-card.blade.php   komponen <x-price-card :service="$s" />

## Ubah data
- Harga/paket: database/seeders/ServiceSeeder.php lalu `php artisan migrate:fresh --seed`,
  atau edit tabel `services` langsung (is_active = 0 untuk menyembunyikan).
- Kartu tarot: database/seeders/TarotCardSeeder.php (atau tabel `tarot_cards`).
