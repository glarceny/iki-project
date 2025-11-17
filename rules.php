<?php
$whatsapp_link = 'https://chat.whatsapp.com/YOUR_ACTUAL_GROUP_LINK_HERE';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <title>Aturan Grup - IKI</title>
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
        .section { background: #fff; border-radius: 12px; padding: 1rem; margin-bottom: 1rem; border: 1px solid #e5e7eb; }
        .section h2 { font-size: 1.125rem; font-weight: 800; margin-bottom: 0.75rem; color: #111827; }
        .section h3 { font-size: 1rem; font-weight: 700; margin: 1rem 0 0.5rem; color: #374151; }
        .section p { font-size: 0.875rem; color: #4b5563; margin-bottom: 0.75rem; line-height: 1.6; }
        .section ul, .section ol { margin-left: 1.25rem; margin-bottom: 0.75rem; }
        .section li { font-size: 0.875rem; color: #4b5563; margin-bottom: 0.5rem; line-height: 1.5; }
        .rule-item { background: #f9fafb; border-radius: 8px; padding: 0.875rem; margin-bottom: 0.75rem; border-left: 4px solid #2563eb; }
        .rule-item h4 { font-size: 0.875rem; font-weight: 800; margin-bottom: 0.5rem; color: #1f2937; display: flex; align-items: center; gap: 0.5rem; }
        .rule-number { width: 24px; height: 24px; background: #2563eb; color: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.75rem; font-weight: 800; flex-shrink: 0; }
        .rule-item p { font-size: 0.8rem; color: #6b7280; margin: 0; }
        .warning-box { background: #fef2f2; border: 1px solid #fecaca; border-radius: 8px; padding: 1rem; margin-top: 1rem; }
        .warning-box h3 { color: #dc2626; font-size: 1rem; margin-bottom: 0.5rem; display: flex; align-items: center; gap: 0.5rem; }
        .warning-box p { color: #991b1b; font-size: 0.875rem; margin: 0; }
        .warning-box ul { margin-left: 1.25rem; margin-top: 0.5rem; }
        .warning-box li { color: #991b1b; font-size: 0.85rem; }
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
            <a href="rules.php" class="active">
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
            <a href="report.php">
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
            <h1>Aturan Grup IKI</h1>
            <p>Panduan untuk menjaga lingkungan positif & produktif</p>
        </div>

        <div class="container">
            <div class="section">
                <h2>Aturan Komunikasi</h2>
                <div class="rule-item">
                    <h4><span class="rule-number">1</span> Gunakan Bahasa yang Sopan</h4>
                    <p>Berkomunikasi dengan bahasa yang santun dan menghormati semua anggota tanpa terkecuali.</p>
                </div>
                <div class="rule-item">
                    <h4><span class="rule-number">2</span> Tidak SARA</h4>
                    <p>Dilarang membuat komentar yang mengandung unsur Suku, Agama, Ras, dan Antar Golongan.</p>
                </div>
                <div class="rule-item">
                    <h4><span class="rule-number">3</span> Tidak Bullying/Body Shaming</h4>
                    <p>Dilarang melakukan perundungan, mengejek fisik, atau merendahkan anggota lain.</p>
                </div>
                <div class="rule-item">
                    <h4><span class="rule-number">4</span> Tidak Menyebarkan Hate Speech</h4>
                    <p>Dilarang menyebarkan ujaran kebencian atau provokatif yang dapat memicu konflik.</p>
                </div>
            </div>

            <div class="section">
                <h2>Aturan Konten</h2>
                <div class="rule-item">
                    <h4><span class="rule-number">1</span> Konten Relevan dengan Pendidikan</h4>
                    <p>Pastikan konten yang dibagikan relevan dengan topik pendidikan, pembelajaran, atau pengembangan diri.</p>
                </div>
                <div class="rule-item">
                    <h4><span class="rule-number">2</span> Tidak Spam</h4>
                    <p>Dilarang mengirim pesan berulang, stiker berlebihan, atau voice note tidak penting.</p>
                </div>
                <div class="rule-item">
                    <h4><span class="rule-number">3</span> Tidak Promosi Tanpa Izin</h4>
                    <p>Dilarang mempromosikan produk, jasa, atau grup lain tanpa izin admin terlebih dahulu.</p>
                </div>
                <div class="rule-item">
                    <h4><span class="rule-number">4</span> Tidak Konten Dewasa</h4>
                    <p>Dilarang membagikan konten pornografi, kekerasan, atau tidak pantas lainnya.</p>
                </div>
            </div>

            <div class="section">
                <h2>Aturan Diskusi</h2>
                <div class="rule-item">
                    <h4><span class="rule-number">1</span> Diskusi Konstruktif</h4>
                    <p>Berdiskusi dengan cara yang membangun, hindari perdebatan tidak produktif atau menyinggung.</p>
                </div>
                <div class="rule-item">
                    <h4><span class="rule-number">2</span> Hormat Pendapat Orang Lain</h4>
                    <p>Hormati perbedaan pendapat, jangan memaksakan pandangan pribadi kepada orang lain.</p>
                </div>
                <div class="rule-item">
                    <h4><span class="rule-number">3</span> Tidak Hoax/Berita Palsu</h4>
                    <p>Pastikan informasi yang dibagikan valid dan bersumber jelas, cek fakta sebelum berbagi.</p>
                </div>
                <div class="rule-item">
                    <h4><span class="rule-number">4</span> Gunakan Reply untuk Topik Spesifik</h4>
                    <p>Gunakan fitur reply/balas untuk menjawab pertanyaan tertentu agar diskusi lebih terstruktur.</p>
                </div>
            </div>

            <div class="section">
                <h2>Aturan Waktu & Aktivitas</h2>
                <div class="rule-item">
                    <h4><span class="rule-number">1</span> Perhatikan Jam Istirahat</h4>
                    <p>Hindari mengirim pesan tidak penting pada jam istirahat (22:00 - 06:00 WIB).</p>
                </div>
                <div class="rule-item">
                    <h4><span class="rule-number">2</span> Aktif Berpartisipasi</h4>
                    <p>Anggota diharapkan aktif berdiskusi, minimal membaca pesan dan memberi respon jika diperlukan.</p>
                </div>
                <div class="rule-item">
                    <h4><span class="rule-number">3</span> Update Profil</h4>
                    <p>Gunakan nama asli atau nama yang jelas (bukan nomor/simbol), serta foto profil yang sopan.</p>
                </div>
            </div>

            <div class="warning-box">
                <h3>
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                        <line x1="12" y1="9" x2="12" y2="13"></line>
                        <line x1="12" y1="17" x2="12.01" y2="17"></line>
                    </svg>
                    Sanksi Pelanggaran
                </h3>
                <p><strong>Jika melanggar aturan, akan dikenakan sanksi sebagai berikut:</strong></p>
                <ul>
                    <li><strong>Pelanggaran Ringan:</strong> Peringatan 1 dari admin</li>
                    <li><strong>Pelanggaran Sedang:</strong> Peringatan 2 atau mute sementara</li>
                    <li><strong>Pelanggaran Berat:</strong> Kick/remove dari grup</li>
                </ul>
            </div>
        </div>
    </main>

    <footer class="footer">
        <h3>Indonesian Knowledge Institute</h3>
        <p>Aturan dibuat untuk kenyamanan bersama. Mari jaga kualitas grup!</p>
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
