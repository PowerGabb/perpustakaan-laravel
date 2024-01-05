# Laravel Peminjaman Buku



Sebuah aplikasi web yang memfasilitasi peminjaman buku secara digital dengan integrasi database dan berbagai fitur yang mempermudah penggunaan.

## Daftar Isi

- [Cara Install](#cara-install)
- [Fitur](#fitur)
- [Kontribusi](#kontribusi)
- [Lisensi](#lisensi)

## Cara Install

Berikut adalah langkah-langkah untuk menginstal dan menjalankan aplikasi:

1. Lakukan git clone repository ini:

    ```bash
    git clone https://github.com/PowerGabb/perpustakaan-laravel.git
    ```

2. Pindah ke dalam folder yang telah di-clone:

    ```bash
    cd nama_folder
    ```

3. Buka terminal di folder tersebut dan jalankan:

    ```bash
    composer install
    ```

4. Setelah itu, jalankan:

    ```bash
    php artisan key:generate
    ```

5. Buat database dan setup file `.env` dengan mengisi informasi yang diperlukan:

    ```bash
    cp .env.example .env
    ```

    Sesuaikan informasi database pada file `.env`:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nama_database
    DB_USERNAME=nama_pengguna_database
    DB_PASSWORD=sandi_database
    ```

6. Lakukan migration dan seeding:

    ```bash
    php artisan migrate --seed
    ```

7. Buat symbolic link untuk storage:

    ```bash
    php artisan storage:link
    ```

## Fitur

- Login Register 
- 3 Role Admin,Client,Guest
- Maximan Meminjam 3 Buku
- Batas Meminjam 3 Hari
- Register Memerlukan Izin Admin

## Kontribusi

Jika Anda ingin berkontribusi pada proyek ini, silakan buka chat di social media saya.

## Lisensi

Proyek ini dilisensikan di bawah lisensi [Nama Lisensi]. Lihat berkas [LISENSI](LISENSI) untuk detail lebih lanjut.
