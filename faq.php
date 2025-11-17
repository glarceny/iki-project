<?php
$whatsapp_link = 'https://chat.whatsapp.com/YOUR_ACTUAL_GROUP_LINK_HERE';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <title>FAQ - IKI</title>
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
        .faq-item { margin-bottom: 0.75rem; border: 1px solid #e5e7eb; border-radius: 8px; overflow: hidden; }
        .faq-question { width: 100%; padding: 0.875rem 1rem; background: #f9fafb; border: none; text-align: left; font-size: 0.875rem; font-weight: 700; color: #1f2937; cursor: pointer; display: flex; justify-content: space-between; align-items: center; transition: 0.2s; }
        .faq-question:hover { background: #f3f4f6; }
        .faq-question.active { background: #eff6ff; color: #2563eb; }
        .faq-icon { transition: transform 0.3s; }
        .faq-question.active .faq-icon { transform: rotate(180deg); }
        .faq-answer { max-height: 0; overflow: hidden; transition: max-height 0.3s ease; }
        .faq-answer.active { max-height: 800px; }
        .faq-answer-content { padding: 1rem; font-size: 0.875rem; color: #4b5563; line-height: 1.6; }
        .faq-answer-content ul, .faq-answer-content ol { margin-left: 1.25rem; margin-top: 0.5rem; }
        .faq-answer-content li { margin-bottom: 0.5rem; }
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
            <a href="faq.php" class="active">
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
            <h1>FAQ - Pertanyaan Umum</h1>
            <p>Pertanyaan yang sering ditanyakan tentang IKI</p>
        </div>

        <div class="container">
            <div class="section">
                <h2>Tentang Grup</h2>
                <div class="faq-item">
                    <button class="faq-question">
                        Apa itu Indonesian Knowledge Institute (IKI)?
                        <svg class="faq-icon" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            IKI adalah komunitas pelajar Indonesia yang didirikan untuk menciptakan ruang belajar yang positif, aktif, disiplin, dan bermanfaat. Kami adalah tempat berkumpulnya pelajar dari berbagai daerah untuk saling belajar, berbagi ilmu, dan mendukung satu sama lain.
                        </div>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="faq-question">
                        Siapa saja yang bisa bergabung?
                        <svg class="faq-icon" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            Semua pelajar Indonesia dari berbagai jenjang (SMP, SMA, Mahasiswa) dapat bergabung. Yang penting adalah memiliki niat untuk belajar, berbagi, dan berkontribusi positif.
                        </div>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="faq-question">
                        Apakah ada biaya untuk bergabung?
                        <svg class="faq-icon" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            Tidak ada biaya sama sekali! IKI adalah komunitas yang 100% gratis. Kami percaya bahwa akses ke pendidikan dan pembelajaran kolaboratif harus tersedia untuk semua.
                        </div>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="faq-question">
                        Berapa jumlah anggota IKI saat ini?
                        <svg class="faq-icon" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            Saat ini IKI memiliki lebih dari 315 anggota aktif dari berbagai daerah di Indonesia. Jumlah ini terus bertambah seiring dengan semakin banyaknya pelajar yang bergabung.
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <h2>Bergabung & Partisipasi</h2>
                <div class="faq-item">
                    <button class="faq-question">
                        Bagaimana cara bergabung dengan grup IKI?
                        <svg class="faq-icon" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            Klik tombol "Gabung Grup WhatsApp" di website ini. Anda akan diarahkan ke link grup WhatsApp IKI. Setelah bergabung, baca aturan grup dan perkenalkan diri Anda.
                        </div>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="faq-question">
                        Apa yang harus saya lakukan setelah bergabung?
                        <svg class="faq-icon" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            <ol>
                                <li>Baca aturan grup yang ada di deskripsi</li>
                                <li>Perkenalkan diri (nama, asal, jenjang pendidikan)</li>
                                <li>Mulai berpartisipasi dalam diskusi</li>
                                <li>Jangan ragu bertanya atau berbagi ilmu</li>
                                <li>Hormati semua anggota dan patuhi aturan</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="faq-question">
                        Topik apa saja yang bisa dibahas?
                        <svg class="faq-icon" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            <ul>
                                <li>Materi pelajaran (Matematika, IPA, IPS, Bahasa)</li>
                                <li>Tips belajar efektif</li>
                                <li>Beasiswa dan kompetisi</li>
                                <li>Info kampus dan jurusan</li>
                                <li>Motivasi dan pengalaman belajar</li>
                                <li>Soft skills (public speaking, leadership)</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <h2>Aturan & Moderasi</h2>
                <div class="faq-item">
                    <button class="faq-question">
                        Apa saja aturan utama grup?
                        <svg class="faq-icon" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            (1) Gunakan bahasa sopan, (2) Tidak SARA atau bullying, (3) Konten relevan dengan pendidikan, (4) Tidak spam atau promosi tanpa izin, (5) Hormati semua anggota. Lihat halaman Aturan untuk detail lengkap.
                        </div>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="faq-question">
                        Apa yang terjadi jika melanggar aturan?
                        <svg class="faq-icon" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            <ul>
                                <li><strong>Ringan:</strong> Peringatan lisan/tertulis</li>
                                <li><strong>Sedang:</strong> Peringatan keras, bisa di-kick sementara</li>
                                <li><strong>Berat:</strong> Langsung di-banned permanen</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="faq-question">
                        Bagaimana cara melaporkan pelanggaran?
                        <svg class="faq-icon" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            Hubungi admin secara pribadi atau gunakan halaman Laporan di website. Screenshot bukti pelanggaran jika perlu. Admin akan menindaklanjuti dengan cepat.
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <h2>Admin & Manajemen</h2>
                <div class="faq-item">
                    <button class="faq-question">
                        Bagaimana cara menjadi admin?
                        <svg class="faq-icon" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            Syarat: Aktif minimal 1 bulan, tidak pernah melanggar aturan, komunikatif dan bertanggung jawab. Lihat halaman "Cara Jadi Admin" untuk informasi lengkap.
                        </div>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="faq-question">
                        Apa tugas admin IKI?
                        <svg class="faq-icon" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            Moderasi konten, menegakkan aturan, memfasilitasi diskusi, mengelola anggota baru, menyelesaikan konflik, update informasi penting, dan koordinasi dengan admin lain.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer">
        <h3>Indonesian Knowledge Institute</h3>
        <p>Masih ada pertanyaan? Jangan ragu untuk menghubungi kami!</p>
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

        document.querySelectorAll('.faq-question').forEach(question => {
            question.addEventListener('click', () => {
                const answer = question.nextElementSibling;
                question.classList.toggle('active');
                answer.classList.toggle('active');
            });
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
