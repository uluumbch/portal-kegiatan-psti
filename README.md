

# Tentang Website
<p>Website PortiKePSTI atau Portal Kegiatan PSTI adalah sebuah website yang kami buat untuk menyelesaikan tugas akhir dari mata kuliah LSV di Program Studi Teknologi Informasi Universitas Lambung Mangkruat</p>
<p>Website ini dibuat agar dapat digunakan untuk mempermudah terkumpulnya informasi tentang kegiatan yang ada di PSTI.</p>
<p>Dengan adanya website ini pengguna dapat mendaftar ke kegiatan yang ada dan  mendapatkan informasi tentang kegiatan yang ada di PSTI</p>
<p>Setelah pengguna mendaftar ke sebuah kegiatan, admin akan dapat mengetahui pengguna mana saja yang telah mendaftar ke sebuah kegaitan.</p>
<p>Dengan demikian seluruh administrasi untuk pendaftaran sebuah kegiatan atau event dapat lebih mudah dan terpusat.</p>
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="200" alt="Laravel Logo"></a></p>
Website ini dibuat dengan Laravel sebagai inti dan beberapa teknologi dan library lainnya, diantaranya : 

- Tailwind CSS
- DaisyUI sebagai plugin Tailwind CSS
- Laravel breeze
- Spatie Permission
- Mailgun
- laravel-share dari [jorenvanhocht](https://github.com/jorenvh/laravel-share)
- Tiny MCE editor

# Instalasi
## Prasyarat
untuk dapat menginstal projek ini ada beberapa prasyarat yang harus dipenuhi, perangkat anda harus terinstall : 
- php>=8.0
- Node JS>=16.0
- composer
- Mysql(MariaDB)

## Proses instalasi
 1. download source code atau clone repository ini 
    ```sh
    git clone https://github.com/uluumbch/portal-kegiatan-psti.git
    ```
 2. buka terminal dan masuk ke dalam source code yang telah didownload, misal :
    ```sh
    cd portal-kegiatan-psti
    ```
3. instalasai package yang dibutuhkan dengan composer
    ```sh
    composer install
    ```
4. instalasai package yang dibutuhkan dengan npm
    ```sh
    npm install
    ```
5. Jalankan perintah artisan untuk generate key php
    ```sh
    php artisan key:generate
    ```
6. Jalankan perintah berikut untuk copy file env
    ```sh
    cp .env.example .env
    ```
    atau 
    ```sh
    php -r "copy('.env.example', '.env');"
    ```
7. Atur konfigurasi untuk datbase pada file `.env` di baris berikut
    ```
    DB_HOST=localhost
    DB_PORT=3306
    DB_DATABASE=portal-kegiatan-psti
    DB_USERNAME=root
    DB_PASSWORD=root
    ```
    sesuaikan baris diatas dengan konfigurasi database anda

8. Terakhir jalankan development server
    ```sh
    php artisan serve
    ```


