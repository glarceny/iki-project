<?php
$whatsapp_link = 'https://chat.whatsapp.com/YOUR_ACTUAL_GROUP_LINK_HERE';

$success = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');
    
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        $error = 'validation';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'email';
    } else {
        $report_data = [
            'id' => uniqid('report_', true),
            'name' => htmlspecialchars($name, ENT_QUOTES, 'UTF-8'),
            'email' => htmlspecialchars($email, ENT_QUOTES, 'UTF-8'),
            'phone' => htmlspecialchars($phone, ENT_QUOTES, 'UTF-8'),
            'subject' => htmlspecialchars($subject, ENT_QUOTES, 'UTF-8'),
            'message' => htmlspecialchars($message, ENT_QUOTES, 'UTF-8'),
            'submitted_at' => date('Y-m-d H:i:s'),
            'ip_address' => $_SERVER['REMOTE_ADDR'] ?? 'unknown'
        ];
        
        $storage_dir = __DIR__ . '/storage';
        if (!is_dir($storage_dir)) {
            mkdir($storage_dir, 0755, true);
        }
        
        $reports_file = $storage_dir . '/reports.json';
        $reports = [];
        if (file_exists($reports_file)) {
            $content = file_get_contents($reports_file);
            $reports = json_decode($content, true) ?: [];
        }
        
        $reports[] = $report_data;
        
        if (file_put_contents($reports_file, json_encode($reports, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE))) {
            $success = true;
            $_POST = [];
        } else {
            $error = 'system';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <title>Laporan & Kontak - IKI</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background: #fff; color: #1f2937; font-size: 14px; line-height: 1.5; }
        .header { background: #fff; box-shadow: 0 2px 4px rgba(0,0,0,0.1); position: sticky; top: 0; z-index: 100; border-bottom: 2px solid #2563eb; }
        .header-content { display: flex; justify-content: space-between; align-items: center; padding: 0.75rem 1rem; }
        .logo { display: flex; align-items: center; gap: 0.5rem; }
        .logo-circle { width: 40px; height: 40px; background: #111827; border-radius: 50%; display: flex; align-items: center; justify-content: center; }
        .logo-text h1 { font-size: 0.9rem; font-weight: 800; color: #111827; }
        .logo-text p { font-size: 0.7rem; color: #6b7280; font-weight: 600; }
        .hamburger { background: none; border: none; width: 40px; height: 40px; display: flex; flex-direction: column; justify-content: center; align-items: center; cursor: pointer; gap: 4px; }
        .hamburger span { width: 24px; height: 3px; background: #1f2937; border-radius: 2px; transition: 0.3s; }
        .hamburger.active span:nth-child(1) { transform: rotate(45deg) translate(5px, 5px); }
        .hamburger.active span:nth-child(2) { opacity: 0; }
        .hamburger.active span:nth-child(3) { transform: rotate(-45deg) translate(7px, -6px); }
        .sidebar { position: fixed; top: 0; right: -280px; width: 280px; height: 100vh; background: #fff; box-shadow: -2px 0 8px rgba(0,0,0,0.15); transition: 0.3s; z-index: 999; overflow-y: auto; }
        .sidebar.active { right: 0; }
        .sidebar-header { padding: 1rem; background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%); color: #fff; }
        .sidebar-header h2 { font-size: 1rem; font-weight: 800; margin-bottom: 0.25rem; }
        .sidebar-header p { font-size: 0.75rem; opacity: 0.9; }
        .nav-links { list-style: none; padding: 0.5rem 0; }
        .nav-links a { display: flex; align-items: center; gap: 0.75rem; padding: 0.875rem 1rem; color: #374151; text-decoration: none; font-weight: 600; transition: 0.2s; }
        .nav-links a:hover, .nav-links a.active { background: #eff6ff; color: #2563eb; }
        .nav-links svg { width: 20px; height: 20px; flex-shrink: 0; }
        .overlay { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 998; }
        .overlay.active { display: block; }
        .page-header { background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%); color: #fff; padding: 2rem 1rem; text-align: center; }
        .page-header h1 { font-size: 1.5rem; font-weight: 800; margin-bottom: 0.5rem; }
        .page-header p { font-size: 0.875rem; opacity: 0.95; }
        .container { padding: 1rem; max-width: 100%; }
        .alert { padding: 1rem; border-radius: 8px; margin-bottom: 1rem; font-size: 0.875rem; }
        .alert-success { background: #d1fae5; color: #065f46; border: 1px solid #10b981; }
        .alert-error { background: #fee2e2; color: #991b1b; border: 1px solid #ef4444; }
        .section { background: #fff; border-radius: 12px; padding: 1rem; margin-bottom: 1rem; border: 1px solid #e5e7eb; }
        .section h2 { font-size: 1.125rem; font-weight: 800; margin-bottom: 0.75rem; color: #111827; }
        .section p { font-size: 0.875rem; color: #4b5563; margin-bottom: 0.75rem; line-height: 1.6; }
        .form-group { margin-bottom: 1rem; }
        .form-label { display: block; font-size: 0.875rem; font-weight: 700; color: #374151; margin-bottom: 0.5rem; }
        .form-input, .form-select, .form-textarea { width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 8px; font-size: 0.875rem; font-family: 'Inter', sans-serif; transition: 0.2s; }
        .form-input:focus, .form-select:focus, .form-textarea:focus { outline: none; border-color: #2563eb; box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1); }
        .form-textarea { min-height: 120px; resize: vertical; }
        .btn { display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.75rem 1.25rem; border-radius: 8px; text-decoration: none; font-weight: 700; font-size: 0.875rem; transition: 0.2s; border: none; cursor: pointer; justify-content: center; }
        .btn-primary { background: #2563eb; color: #fff; }
        .btn-primary:hover { background: #1e40af; }
        .btn svg { width: 18px; height: 18px; }
        .footer { background: #111827; color: #fff; padding: 1.5rem 1rem; margin-top: 2rem; }
        .footer h3 { font-size: 1rem; font-weight: 800; margin-bottom: 0.5rem; }
        .footer p { font-size: 0.8rem; color: #d1d5db; margin-bottom: 0.75rem; }
        .footer-bottom { text-align: center; padding-top: 1rem; border-top: 1px solid #374151; color: #9ca3af; font-size: 0.75rem; margin-top: 1rem; }
        @media (min-width: 640px) {
            .page-header h1 { font-size: 2rem; }
            .container { padding: 1.5rem; max-width: 1200px; margin: 0 auto; }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="header-content">
            <div class="logo">
                <div class="logo-circle">
                    <svg width="28" height="28" viewBox="0 0 50 50" fill="none">
                        <text x="5" y="32" font-family="Inter" font-size="28" font-weight="800" fill="#2563eb">i</text>
                        <text x="15" y="32" font-family="Inter" font-size="28" font-weight="800" fill="#10b981">K</text>
                        <text x="28" y="32" font-family="Inter" font-size="28" font-weight="800" fill="#2563eb">I</text>
                    </svg>
                </div>
                <div class="logo-text">
                    <h1>IKI</h1>
                    <p>Komunitas Pelajar</p>
                </div>
            </div>
            <button class="hamburger" id="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </header>

    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h2>Menu Navigasi</h2>
            <p>Indonesian Knowledge Institute</p>
        </div>
        <nav class="nav-links">
            <a href="index.php">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                </svg>
                Beranda
            </a>
            <a href="about.php">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="16" x2="12" y2="12"></line>
                    <line x1="12" y1="8" x2="12.01" y2="8"></line>
                </svg>
                Tentang Kami
            </a>
            <a href="rules.php">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                    <polyline points="14 2 14 8 20 8"></polyline>
                </svg>
                Aturan Grup
            </a>
            <a href="faq.php">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10"></circle>
                    <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                    <line x1="12" y1="17" x2="12.01" y2="17"></line>
                </svg>
                FAQ
            </a>
            <a href="admin.php">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M12 2L2 7l10 5 10-5-10-5z"></path>
                    <path d="M2 17l10 5 10-5"></path>
                </svg>
                Jadi Admin
            </a>
            <a href="report.php" class="active">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                    <polyline points="14 2 14 8 20 8"></polyline>
                    <line x1="12" y1="18" x2="12" y2="12"></line>
                </svg>
                Laporan
            </a>
        </nav>
    </div>
    <div class="overlay" id="overlay"></div>

    <main>
        <div class="page-header">
            <h1>Laporan & Kontak</h1>
            <p>Laporkan masalah, berikan saran, atau hubungi kami</p>
        </div>

        <div class="container">
            <?php if ($success): ?>
            <div class="alert alert-success">
                <strong>Terima kasih!</strong> Laporan Anda telah berhasil dikirim. Admin akan menindaklanjuti secepatnya.
            </div>
            <?php endif; ?>

            <?php if ($error): ?>
            <div class="alert alert-error">
                <strong>Terjadi kesalahan!</strong>
                <?php
                if ($error == 'validation') {
                    echo 'Harap isi semua field yang wajib diisi.';
                } elseif ($error == 'email') {
                    echo 'Format email tidak valid.';
                } else {
                    echo 'Gagal mengirim laporan. Silakan coba lagi.';
                }
                ?>
            </div>
            <?php endif; ?>

            <div class="section">
                <h2>Kirim Laporan atau Saran</h2>
                <p>Gunakan formulir di bawah untuk melaporkan pelanggaran aturan, memberikan saran, mengajukan pertanyaan, atau keperluan lainnya. Semua laporan akan ditangani dengan serius dan rahasia.</p>

                <form method="POST" action="report.php">
                    <div class="form-group">
                        <label for="name" class="form-label">Nama Lengkap *</label>
                        <input type="text" id="name" name="name" class="form-input" placeholder="Masukkan nama lengkap Anda" required value="<?php echo htmlspecialchars($_POST['name'] ?? '', ENT_QUOTES); ?>">
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">Email *</label>
                        <input type="email" id="email" name="email" class="form-input" placeholder="contoh@email.com" required value="<?php echo htmlspecialchars($_POST['email'] ?? '', ENT_QUOTES); ?>">
                    </div>

                    <div class="form-group">
                        <label for="phone" class="form-label">Nomor WhatsApp (Opsional)</label>
                        <input type="text" id="phone" name="phone" class="form-input" placeholder="08xxxxxxxxxx" value="<?php echo htmlspecialchars($_POST['phone'] ?? '', ENT_QUOTES); ?>">
                    </div>

                    <div class="form-group">
                        <label for="subject" class="form-label">Kategori Laporan *</label>
                        <select id="subject" name="subject" class="form-select" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="pelanggaran" <?php echo (isset($_POST['subject']) && $_POST['subject'] == 'pelanggaran') ? 'selected' : ''; ?>>Pelanggaran Aturan</option>
                            <option value="saran" <?php echo (isset($_POST['subject']) && $_POST['subject'] == 'saran') ? 'selected' : ''; ?>>Saran & Masukan</option>
                            <option value="pertanyaan" <?php echo (isset($_POST['subject']) && $_POST['subject'] == 'pertanyaan') ? 'selected' : ''; ?>>Pertanyaan</option>
                            <option value="admin" <?php echo (isset($_POST['subject']) && $_POST['subject'] == 'admin') ? 'selected' : ''; ?>>Pendaftaran Admin</option>
                            <option value="teknis" <?php echo (isset($_POST['subject']) && $_POST['subject'] == 'teknis') ? 'selected' : ''; ?>>Masalah Teknis</option>
                            <option value="lainnya" <?php echo (isset($_POST['subject']) && $_POST['subject'] == 'lainnya') ? 'selected' : ''; ?>>Lainnya</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message" class="form-label">Pesan / Detail Laporan *</label>
                        <textarea id="message" name="message" class="form-textarea" placeholder="Jelaskan secara detail laporan, saran, atau pertanyaan Anda..." required><?php echo htmlspecialchars($_POST['message'] ?? '', ENT_QUOTES); ?></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" style="width: 100%;">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <line x1="22" y1="2" x2="11" y2="13"></line>
                                <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                            </svg>
                            Kirim Laporan
                        </button>
                    </div>
                </form>
            </div>

            <div class="section">
                <h2>Panduan Melaporkan Pelanggaran</h2>
                <p>Jika Anda melaporkan pelanggaran aturan, mohon sertakan informasi berikut:</p>
                <ol style="margin-left:1.25rem;">
                    <li style="margin-bottom:0.5rem;"><strong>Waktu kejadian</strong> - Kapan pelanggaran terjadi</li>
                    <li style="margin-bottom:0.5rem;"><strong>Deskripsi detail</strong> - Apa yang terjadi dan siapa yang terlibat</li>
                    <li style="margin-bottom:0.5rem;"><strong>Screenshot (jika ada)</strong> - Bukti visual sangat membantu</li>
                    <li style="margin-bottom:0.5rem;"><strong>Dampak</strong> - Bagaimana pelanggaran ini mempengaruhi Anda</li>
                </ol>
                <p style="margin-top:1rem;padding:1rem;background:#eff6ff;border-radius:8px;border-left:4px solid #2563eb;font-size:0.875rem;">
                    <strong>Catatan:</strong> Semua laporan akan ditangani dengan rahasia. Identitas pelapor akan dilindungi kecuali diperlukan untuk investigasi.
                </p>
            </div>
        </div>
    </main>

    <footer class="footer">
        <h3>Indonesian Knowledge Institute</h3>
        <p>Kami siap membantu Anda. Jangan ragu untuk menghubungi kami!</p>
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> Indonesian Knowledge Institute (IKI)</p>
        </div>
    </footer>

    <script>
        const hamburger = document.getElementById('hamburger');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        hamburger.addEventListener('click', () => {
            hamburger.classList.toggle('active');
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
        });

        overlay.addEventListener('click', () => {
            hamburger.classList.remove('active');
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
        });

        let touchStartY = 0;
        document.addEventListener('touchstart', (e) => {
            touchStartY = e.touches[0].clientY;
        }, { passive: true });

        document.addEventListener('touchmove', (e) => {
            const touchEndY = e.touches[0].clientY;
            if (sidebar.classList.contains('active') && touchEndY < touchStartY - 50) {
                sidebar.classList.remove('active');
                overlay.classList.remove('active');
                hamburger.classList.remove('active');
            }
        }, { passive: true });
    </script>
</body>
</html>
