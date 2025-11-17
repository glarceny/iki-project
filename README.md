# Indonesian Knowledge Institute (IKI) Website

Website platform informasi untuk grup WhatsApp **Indonesian Knowledge Institute (IKI)** - Komunitas Pelajar Indonesia.

## Fitur Utama

- **Halaman Beranda** - Informasi dasar grup, visi, misi, tujuan, dan aturan dengan card interaktif
- **Tentang Kami** - Sejarah, latar belakang, dan informasi lengkap tentang komunitas
- **Aturan Lengkap** - Panduan detail aturan grup dan sanksi pelanggaran
- **FAQ** - Pertanyaan yang sering ditanyakan dengan accordion interaktif
- **Cara Jadi Admin** - Syarat, prosedur, dan tanggung jawab admin
- **Laporan & Kontak** - Form pelaporan dengan validasi dan sistem penyimpanan aman
- **Desain Responsif** - Tampilan optimal di desktop dan mobile
- **Modal Interaktif** - Card yang dapat diklik untuk melihat informasi detail

## Teknologi

- **Backend**: PHP 8.3 (Native, tanpa framework)
- **Frontend**: HTML5, CSS3, JavaScript (Vanilla)
- **Font**: Google Fonts (Inter)
- **Icons**: SVG inline (custom design)
- **Storage**: JSON file-based (protected)

## Instalasi

### Persyaratan
- PHP 8.3 atau lebih tinggi
- Web server (Apache/Nginx dengan PHP-FPM atau PHP built-in server)

### Setup Lokal

1. Clone atau download repository ini

2. Install PHP jika belum ada:
   ```bash
   # Pada Replit, PHP sudah terinstall otomatis
   ```

3. **Konfigurasi WhatsApp Link**:
   Edit file `config.php` dan ganti `YOUR_ACTUAL_GROUP_LINK_HERE` dengan link grup WhatsApp yang sebenarnya:
   ```php
   'whatsapp_group_link' => 'https://chat.whatsapp.com/KODE_GRUP_ANDA',
   ```

4. Jalankan PHP Development Server:
   ```bash
   php -S 0.0.0.0:5000
   ```

5. Buka browser dan akses:
   ```
   http://localhost:5000
   ```

## Struktur File

```
.
├── index.php                 # Halaman utama
├── about.php                 # Halaman tentang kami
├── rules.php                 # Halaman aturan lengkap
├── become-admin.php          # Halaman cara jadi admin
├── faq.php                   # Halaman FAQ
├── report.php                # Halaman form laporan
├── process-report.php        # Handler form laporan
├── get-whatsapp-link.php     # API endpoint untuk WhatsApp link
├── config.php                # File konfigurasi (PROTECTED)
├── includes/
│   ├── header.php            # Header komponen
│   └── footer.php            # Footer komponen
├── assets/
│   ├── css/
│   │   └── style.css         # Styling lengkap
│   └── js/
│       └── main.js           # JavaScript interaktif
├── storage/                  # Folder penyimpanan data (PROTECTED)
│   ├── .htaccess            # Deny all access
│   └── reports.json         # Data laporan (auto-generated)
├── .htaccess                 # Apache access control
└── .gitignore               # Git ignore rules
```

## Keamanan

### Proteksi Data
- File laporan disimpan di folder `storage/` yang di-protect dengan `.htaccess`
- Input user disanitasi dengan `htmlspecialchars()` dan `stripslashes()`
- Email divalidasi dengan `filter_var()`
- File konfigurasi di-protect agar tidak bisa diakses langsung

### Konfigurasi .htaccess
Website sudah dilengkapi dengan `.htaccess` untuk:
- Mencegah akses langsung ke file JSON dan log
- Mencegah directory listing
- Melindungi file konfigurasi

## Kustomisasi

### Mengubah Warna Tema
Edit file `assets/css/style.css` pada bagian `:root`:
```css
:root {
    --primary-blue: #2563eb;    /* Warna biru utama */
    --primary-green: #10b981;   /* Warna hijau utama */
    /* ... */
}
```

### Mengubah Informasi Grup
Edit file `config.php`:
```php
'group_info' => [
    'name' => 'Indonesian Knowledge Institute (IKI)',
    'members_count' => '315+',
    'founded_year' => '2024'
]
```

### Menambah/Mengubah Konten
Semua konten berada dalam file PHP di root directory. Edit sesuai kebutuhan.

## Cara Menggunakan

### Untuk Admin Grup

1. **Setup WhatsApp Link**: Edit `config.php` dan masukkan link grup yang benar
2. **Monitoring Laporan**: Cek file `storage/reports.json` untuk melihat laporan yang masuk
3. **Update Konten**: Edit file PHP untuk update informasi grup

### Untuk Pengunjung

1. **Navigasi**: Gunakan menu navigasi di header untuk menjelajahi website
2. **Card Interaktif**: Klik pada card di halaman beranda untuk melihat detail
3. **FAQ**: Klik pertanyaan untuk melihat jawaban
4. **Laporan**: Isi form di halaman "Lapor" untuk mengirim laporan atau saran

## Deployment

Website ini sudah siap untuk di-deploy ke:
- **Replit**: Sudah ter-konfigurasi dengan workflow
- **Shared Hosting**: Upload semua file, pastikan PHP 8.3+ tersedia
- **VPS/Cloud**: Setup Apache/Nginx dengan PHP-FPM

### Catatan Deployment
- Pastikan folder `storage/` memiliki permission 700
- Pastikan `.htaccess` aktif (Apache) atau konfigurasikan Nginx rules
- Jangan lupa edit `config.php` dengan link grup yang benar

## Lisensi

Website ini dibuat untuk komunitas **Indonesian Knowledge Institute (IKI)** dan dapat digunakan secara bebas untuk keperluan pendidikan.

## Kontributor

Dikembangkan untuk komunitas pelajar Indonesia dengan fokus pada pendidikan dan pengembangan diri.

---

**Indonesian Knowledge Institute (IKI)**  
*Komunitas Pelajar Indonesia yang Positif, Aktif, Disiplin, dan Bermanfaat*
