## Online Shop Berbasis Website (Laravel) "php": ">=5.5.9"

### Deskripsi

E-Shop adalah aplikasi web yang dibuat dengan menggunakan framework Laravel dan Bootstrap. Aplikasi ini bertujuan untuk memudahkan pengguna dalam berbelanja produk-produk secara online.

### Fitur

Beberapa fitur yang terdapat pada E-Shop antara lain:

-   Authentication (login, register, dan logout)
-   CRUD produk
-   Cart dan checkout
-   Riwayat transaksi
-   Cetak Laporan

### Instalasi

Untuk menginstal E-Shop, ikuti langkah-langkah berikut:

1. Clone repository ini dengan menggunakan command `git clone https://github.com/adptra01/E-Shop.git`
2. Pindah ke direktori project dengan command `cd E-Shop`
3. Install dependency yang dibutuhkan dengan command `composer install` dan `npm install`
4. Copy file `.env.example` dan ubah nama file menjadi `.env`. Kemudian, sesuaikan konfigurasi database di file tersebut beserta `.apikey RajaOngkir`.
5. Generate key aplikasi dengan command `php artisan key:generate`
6. Migrasi database dengan command `php artisan migrate --seed`
7. Jalankan aplikasi dengan command `php artisan serve`

### Kontribusi

Anda dapat melakukan kontribusi pada repository ini dengan melakukan fork dan pull request. Pastikan untuk melakukan perubahan pada branch yang sesuai.

### Lisensi

E-Shop dilisensikan di bawah [MIT License](https://opensource.org/licenses/MIT).
