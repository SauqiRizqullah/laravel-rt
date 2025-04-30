# 📦 Backend (Laravel)

## ✅ Langkah Instalasi

1. **Install Laragon**  
   Unduh dan install Laragon dari https://laragon.org/

2. **Clone project**  
   Clone repository ini:
   ```bash
   git clone https://github.com/SauqiRizqullah/laravel-rt.git 
   ```

3. **Jalankan MySQL via Laragon**

4. **Install TablePlus (opsional, untuk kemudahan akses DB)**  
   Download: https://tableplus.com/

5. **Buat database baru**  
   Contoh: `kost_app`  
   Bisa buat lewat TablePlus atau phpMyAdmin (yang disediakan Laragon).

6. **Sesuaikan konfigurasi `.env`**  
   Ganti pengaturan berikut di file `.env`:
   ```env
   DB_DATABASE=kost_app
   DB_USERNAME=root
   DB_PASSWORD=
   ```

7. **Install dependensi Laravel**  
   Jalankan di root folder project:
   ```bash
   composer install
   ```

8. **Generate app key**
   ```bash
   php artisan key:generate
   ```

9. **Migrasi dan seeding database**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

10. **Simpan dan tampilkan file (misalnya KTP penghuni)**  
    Pastikan kamu sudah menjalankan:
   ```bash
   php artisan storage:link
   ```

11. **Jalankan server**
   ```bash
   php artisan serve
   ```
