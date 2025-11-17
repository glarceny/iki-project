<?php
$whatsapp_link = 'https://chat.whatsapp.com/IqaxunRrj9lKtlCtmrv8vV';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <title>Kelompok Belajar - IKI</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: 'Inter', sans-serif; 
            background: #f9fafb; 
            color: #1f2937;
            font-size: 14px;
            line-height: 1.5;
        }
        .header { 
            background: #fff; 
            box-shadow: 0 2px 4px rgba(0,0,0,0.1); 
            position: sticky; 
            top: 0; 
            z-index: 100;
            border-bottom: 2px solid #2563eb;
        }
        .header-content { 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            padding: 0.75rem 1rem;
        }
        .logo { display: flex; align-items: center; gap: 0.5rem; }
        .logo-circle { 
            width: 40px; 
            height: 40px; 
            background: #111827; 
            border-radius: 50%; 
            display: flex; 
            align-items: center; 
            justify-content: center;
        }
        .logo-text h1 { font-size: 0.9rem; font-weight: 800; color: #111827; }
        .logo-text p { font-size: 0.7rem; color: #6b7280; font-weight: 600; }
        .hamburger { 
            background: none; 
            border: none; 
            width: 40px; 
            height: 40px; 
            display: flex; 
            flex-direction: column; 
            justify-content: center; 
            align-items: center; 
            cursor: pointer;
            gap: 4px;
        }
        .hamburger span { 
            width: 24px; 
            height: 3px; 
            background: #1f2937; 
            border-radius: 2px;
            transition: 0.3s;
        }
        .hamburger.active span:nth-child(1) { transform: rotate(45deg) translate(5px, 5px); }
        .hamburger.active span:nth-child(2) { opacity: 0; }
        .hamburger.active span:nth-child(3) { transform: rotate(-45deg) translate(7px, -6px); }
        .sidebar { 
            position: fixed; 
            top: 0; 
            right: -320px; 
            width: 320px; 
            height: 100vh; 
            background: #fff; 
            box-shadow: -2px 0 8px rgba(0,0,0,0.15); 
            transition: 0.3s; 
            z-index: 999;
            overflow-y: auto;
        }
        .sidebar.active { right: 0; }
        .sidebar-header { 
            padding: 1rem; 
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%); 
            color: #fff;
        }
        .sidebar-header h2 { font-size: 1rem; font-weight: 800; margin-bottom: 0.25rem; }
        .sidebar-header p { font-size: 0.75rem; opacity: 0.9; }
        .nav-links { list-style: none; padding: 0.5rem 0; }
        .nav-links a { 
            display: flex; 
            align-items: center; 
            gap: 0.75rem; 
            padding: 0.875rem 1rem; 
            color: #374151; 
            text-decoration: none; 
            font-weight: 600;
            font-size: 0.85rem;
            transition: 0.2s;
        }
        .nav-links a:hover, .nav-links a.active { background: #eff6ff; color: #2563eb; }
        .nav-links svg { width: 18px; height: 18px; flex-shrink: 0; }
        .nav-category { 
            padding: 0.75rem 1rem 0.5rem; 
            font-size: 0.7rem; 
            font-weight: 800; 
            color: #9ca3af; 
            text-transform: uppercase; 
            letter-spacing: 0.5px;
        }
        .overlay { 
            display: none; 
            position: fixed; 
            top: 0; 
            left: 0; 
            width: 100%; 
            height: 100%; 
            background: rgba(0,0,0,0.5); 
            z-index: 998;
        }
        .overlay.active { display: block; }
        .hero { 
            background: linear-gradient(135deg, #8b5cf6 0%, #6d28d9 100%); 
            color: #fff; 
            padding: 2rem 1rem;
            text-align: center;
        }
        .hero-badge { 
            display: inline-flex; 
            align-items: center; 
            gap: 0.5rem; 
            background: rgba(255,255,255,0.2); 
            padding: 0.4rem 1rem; 
            border-radius: 20px; 
            font-size: 0.7rem; 
            font-weight: 700; 
            margin-bottom: 1rem;
        }
        .hero h1 { font-size: 1.5rem; font-weight: 800; margin-bottom: 0.75rem; line-height: 1.2; }
        .hero p { font-size: 0.875rem; margin-bottom: 1.5rem; opacity: 0.95; }
        .container { padding: 1rem; max-width: 100%; margin-bottom: 2rem; }
        .tabs { 
            display: flex; 
            gap: 0.5rem; 
            margin-bottom: 1rem; 
            overflow-x: auto; 
            padding-bottom: 0.5rem;
        }
        .tab { 
            padding: 0.625rem 1rem; 
            background: #fff; 
            border: 2px solid #e5e7eb; 
            border-radius: 8px; 
            font-weight: 700; 
            font-size: 0.8rem; 
            cursor: pointer;
            white-space: nowrap;
            transition: 0.2s;
        }
        .tab.active { background: #8b5cf6; color: #fff; border-color: #8b5cf6; }
        .tab-content { display: none; }
        .tab-content.active { display: block; }
        .group-card { 
            background: #fff; 
            border-radius: 12px; 
            padding: 1rem; 
            margin-bottom: 1rem; 
            border: 1px solid #e5e7eb;
            box-shadow: 0 1px 3px rgba(0,0,0,0.08);
        }
        .group-header { 
            display: flex; 
            align-items: center; 
            gap: 0.75rem; 
            margin-bottom: 0.75rem;
        }
        .group-icon { 
            width: 48px; 
            height: 48px; 
            border-radius: 10px; 
            display: flex; 
            align-items: center; 
            justify-content: center;
            flex-shrink: 0;
            font-size: 1.5rem;
        }
        .group-title h3 { font-size: 1rem; font-weight: 800; color: #111827; margin-bottom: 0.25rem; }
        .group-title p { font-size: 0.75rem; color: #6b7280; }
        .group-meta { 
            display: flex; 
            flex-wrap: wrap; 
            gap: 0.75rem; 
            margin-bottom: 0.75rem;
        }
        .meta-item { 
            display: flex; 
            align-items: center; 
            gap: 0.375rem; 
            font-size: 0.75rem; 
            color: #6b7280;
        }
        .meta-item svg { width: 14px; height: 14px; }
        .group-description { 
            font-size: 0.875rem; 
            color: #374151; 
            line-height: 1.5; 
            margin-bottom: 0.75rem;
        }
        .member-list { 
            display: flex; 
            align-items: center; 
            gap: 0.5rem; 
            margin-bottom: 0.75rem;
        }
        .member-avatar { 
            width: 32px; 
            height: 32px; 
            border-radius: 50%; 
            background: linear-gradient(135deg, #8b5cf6 0%, #6d28d9 100%); 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            color: #fff; 
            font-size: 0.75rem; 
            font-weight: 700;
        }
        .member-count { 
            font-size: 0.75rem; 
            color: #6b7280; 
            font-weight: 600;
        }
        .join-btn { 
            width: 100%; 
            padding: 0.625rem; 
            background: #8b5cf6; 
            color: #fff; 
            border: none; 
            border-radius: 8px; 
            font-weight: 700; 
            font-size: 0.85rem; 
            cursor: pointer;
            transition: 0.2s;
        }
        .join-btn:hover { background: #7c3aed; }
        @media (min-width: 640px) {
            .hero h1 { font-size: 2rem; }
            .container { padding: 1.5rem; }
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
            <div class="nav-category">Menu Utama</div>
            <a href="index.php"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path></svg> Beranda</a>
            <a href="about.php"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line></svg> Tentang Kami</a>
            <a href="rules.php"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path></svg> Aturan</a>
            <a href="faq.php"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path></svg> FAQ</a>
            
            <div class="nav-category">Fitur Unggulan</div>
            <a href="chatai.php"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg> Chat AI</a>
            <a href="materials.php"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg> Materi Belajar</a>
            <a href="events.php"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> Kalender Acara</a>
            <a href="achievements.php"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5z"></path><path d="M2 17l10 5 10-5"></path></svg> Galeri Prestasi</a>
            
            <div class="nav-category">Akademik</div>
            <a href="studygroups.php" class="active"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg> Kelompok Belajar</a>
            <a href="mentoring.php"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> Program Mentoring</a>
            <a href="studytips.php"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg> Tips Belajar</a>
            <a href="examprep.php"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line></svg> Persiapan Ujian</a>
            
            <div class="nav-category">Karir & Beasiswa</div>
            <a href="career.php"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg> Panduan Karir</a>
            <a href="scholarships.php"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg> Info Beasiswa</a>
            <a href="competitions.php"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"></path><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"></path><path d="M4 22h16"></path><path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22"></path></svg> Kompetisi</a>
            <a href="universities.php"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 10v6M2 10l10-5 10 5-10 5z"></path><path d="M6 12v5c3 3 9 3 12 0v-5"></path></svg> Info Universitas</a>
            <a href="majors.php"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg> Panduan Jurusan</a>
            
            <div class="nav-category">Sumber Daya</div>
            <a href="books.php"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg> Rekomendasi Buku</a>
            <a href="courses.php"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg> Kursus Online</a>
            <a href="library.php"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg> Perpustakaan</a>
            
            <div class="nav-category">Komunitas</div>
            <a href="articles.php"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline></svg> Artikel</a>
            <a href="success.php"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg> Kisah Sukses</a>
            <a href="statistics.php"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="12" y1="20" x2="12" y2="10"></line><line x1="18" y1="20" x2="18" y2="4"></line><line x1="6" y1="20" x2="6" y2="16"></line></svg> Statistik</a>
            <a href="admin.php"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5z"></path></svg> Jadi Admin</a>
            <a href="report.php"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><line x1="12" y1="18" x2="12" y2="12"></line></svg> Laporan</a>
        </nav>
    </div>
    <div class="overlay" id="overlay"></div>

    <main>
        <div class="hero">
            <div class="hero-badge">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
                BELAJAR BERSAMA LEBIH EFEKTIF
            </div>
            <h1>Kelompok Belajar IKI</h1>
            <p>Bergabunglah dengan study group sesuai minatmu. Belajar bersama, tumbuh bersama!</p>
        </div>

        <div class="container">
            <div class="tabs">
                <button class="tab active" onclick="showTab('matematika')">Matematika & Sains</button>
                <button class="tab" onclick="showTab('bahasa')">Bahasa</button>
                <button class="tab" onclick="showTab('teknologi')">Teknologi</button>
                <button class="tab" onclick="showTab('lainnya')">Lainnya</button>
            </div>

            <div id="matematika" class="tab-content active">
                <div class="group-card">
                    <div class="group-header">
                        <div class="group-icon" style="background: #dbeafe;">📐</div>
                        <div class="group-title">
                            <h3>Matematika Lanjut & Olimpiade</h3>
                            <p>Fokus: Aljabar, Kalkulus, Geometri</p>
                        </div>
                    </div>
                    <div class="group-meta">
                        <span class="meta-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            Senin & Kamis, 19:00 WIB
                        </span>
                        <span class="meta-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path></svg>
                            Online - Discord
                        </span>
                    </div>
                    <p class="group-description">
                        Kelompok belajar intensif untuk persiapan Olimpiade Matematika dan materi advanced. Dipandu oleh mentor berpengalaman yang pernah menjuarai berbagai kompetisi matematika tingkat nasional. Cocok untuk siswa SMA yang ingin mengasah kemampuan problem solving.
                    </p>
                    <div class="member-list">
                        <div class="member-avatar">AR</div>
                        <div class="member-avatar">BW</div>
                        <div class="member-avatar">CP</div>
                        <div class="member-avatar">DN</div>
                        <span class="member-count">+24 anggota</span>
                    </div>
                    <button class="join-btn" onclick="window.location.href='<?php echo $whatsapp_link; ?>'">Gabung Grup</button>
                </div>

                <div class="group-card">
                    <div class="group-header">
                        <div class="group-icon" style="background: #d1fae5;">⚡</div>
                        <div class="group-title">
                            <h3>Fisika Eksperimental</h3>
                            <p>Fokus: Mekanika, Listrik-Magnet, Fisika Modern</p>
                        </div>
                    </div>
                    <div class="group-meta">
                        <span class="meta-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            Rabu & Sabtu, 16:00 WIB
                        </span>
                        <span class="meta-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path></svg>
                            Online - Zoom
                        </span>
                    </div>
                    <p class="group-description">
                        Belajar Fisika dengan pendekatan eksperimen virtual dan simulasi! Menggunakan PhET simulations dan berbagai tools interaktif. Mentor kami adalah alumni ITB Jurusan Fisika. Setiap sesi ada demo eksperimen dan pembahasan soal-soal menantang.
                    </p>
                    <div class="member-list">
                        <div class="member-avatar">EM</div>
                        <div class="member-avatar">FH</div>
                        <div class="member-avatar">GK</div>
                        <span class="member-count">+18 anggota</span>
                    </div>
                    <button class="join-btn" onclick="window.location.href='<?php echo $whatsapp_link; ?>'">Gabung Grup</button>
                </div>

                <div class="group-card">
                    <div class="group-header">
                        <div class="group-icon" style="background: #fef3c7;">🧪</div>
                        <div class="group-title">
                            <h3>Kimia Organik & Anorganik</h3>
                            <p>Fokus: Stoikiometri, Reaksi Kimia, Ikatan</p>
                        </div>
                    </div>
                    <div class="group-meta">
                        <span class="meta-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            Selasa & Jumat, 18:00 WIB
                        </span>
                        <span class="meta-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path></svg>
                            Online - Google Meet
                        </span>
                    </div>
                    <p class="group-description">
                        Study group Kimia untuk siswa SMA yang ingin menguasai konsep fundamental sampai advanced. Menggunakan metode visualisasi molekul 3D dan animasi reaksi. Mentor berpengalaman dengan background Kimia UI. Bonus: tips & trik menghafal sistem periodik!
                    </p>
                    <div class="member-list">
                        <div class="member-avatar">HI</div>
                        <div class="member-avatar">JK</div>
                        <div class="member-avatar">LM</div>
                        <div class="member-avatar">NO</div>
                        <span class="member-count">+22 anggota</span>
                    </div>
                    <button class="join-btn" onclick="window.location.href='<?php echo $whatsapp_link; ?>'">Gabung Grup</button>
                </div>

                <div class="group-card">
                    <div class="group-header">
                        <div class="group-icon" style="background: #e0e7ff;">🧮</div>
                        <div class="group-title">
                            <h3>Statistika & Probabilitas</h3>
                            <p>Fokus: Analisis Data, Distribusi, Sampling</p>
                        </div>
                    </div>
                    <div class="group-meta">
                        <span class="meta-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            Minggu, 15:00 WIB
                        </span>
                        <span class="meta-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path></svg>
                            Online - Discord
                        </span>
                    </div>
                    <p class="group-description">
                        Khusus untuk yang ingin mahir statistika! Dari konsep dasar hingga aplikasi data science. Cocok untuk persiapan ujian dan juga untuk yang tertarik dengan data analytics. Menggunakan tools seperti Excel, Google Sheets, dan pengenalan Python untuk analisis data.
                    </p>
                    <div class="member-list">
                        <div class="member-avatar">PQ</div>
                        <div class="member-avatar">RS</div>
                        <div class="member-avatar">TU</div>
                        <span class="member-count">+15 anggota</span>
                    </div>
                    <button class="join-btn" onclick="window.location.href='<?php echo $whatsapp_link; ?>'">Gabung Grup</button>
                </div>

                <div class="group-card">
                    <div class="group-header">
                        <div class="group-icon" style="background: #fce7f3;">🧬</div>
                        <div class="group-title">
                            <h3>Biologi Molekuler & Genetika</h3>
                            <p>Fokus: Sel, DNA, Evolusi, Ekologi</p>
                        </div>
                    </div>
                    <div class="group-meta">
                        <span class="meta-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            Kamis, 17:00 WIB
                        </span>
                        <span class="meta-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path></svg>
                            Online - Zoom
                        </span>
                    </div>
                    <p class="group-description">
                        Jelajahi dunia mikroskopis kehidupan! Study group ini fokus pada biologi tingkat molekuler dengan pendekatan modern. Dipandu mentor lulusan Biologi UGM. Sesi interaktif dengan video animasi, virtual lab, dan diskusi paper ilmiah sederhana.
                    </p>
                    <div class="member-list">
                        <div class="member-avatar">VW</div>
                        <div class="member-avatar">XY</div>
                        <div class="member-avatar">ZA</div>
                        <span class="member-count">+19 anggota</span>
                    </div>
                    <button class="join-btn" onclick="window.location.href='<?php echo $whatsapp_link; ?>'">Gabung Grup</button>
                </div>
            </div>

            <div id="bahasa" class="tab-content">
                <div class="group-card">
                    <div class="group-header">
                        <div class="group-icon" style="background: #dbeafe;">🇬🇧</div>
                        <div class="group-title">
                            <h3>English Conversation Club</h3>
                            <p>Level: Intermediate to Advanced</p>
                        </div>
                    </div>
                    <div class="group-meta">
                        <span class="meta-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            Senin, Rabu, Jumat - 20:00 WIB
                        </span>
                        <span class="meta-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path></svg>
                            Online - Discord Voice
                        </span>
                    </div>
                    <p class="group-description">
                        Improve your English speaking skills through daily conversation practice! Topics include current events, culture, technology, and academic discussions. Facilitator adalah native speaker dan IELTS 8.5 scorer. Suasana friendly dan supportive, no judgment zone!
                    </p>
                    <div class="member-list">
                        <div class="member-avatar">BC</div>
                        <div class="member-avatar">DE</div>
                        <div class="member-avatar">FG</div>
                        <div class="member-avatar">HI</div>
                        <span class="member-count">+31 anggota</span>
                    </div>
                    <button class="join-btn" onclick="window.location.href='<?php echo $whatsapp_link; ?>'">Gabung Grup</button>
                </div>

                <div class="group-card">
                    <div class="group-header">
                        <div class="group-icon" style="background: #fef3c7;">📝</div>
                        <div class="group-title">
                            <h3>IELTS & TOEFL Preparation</h3>
                            <p>Target Score: 7.0+ (IELTS) / 100+ (TOEFL)</p>
                        </div>
                    </div>
                    <div class="group-meta">
                        <span class="meta-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            Selasa & Sabtu, 19:00 WIB
                        </span>
                        <span class="meta-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path></svg>
                            Online - Zoom
                        </span>
                    </div>
                    <p class="group-description">
                        Intensive preparation untuk IELTS & TOEFL test. Covers all sections: Listening, Reading, Writing, Speaking. Mentor dengan skor IELTS 8.0 dan TOEFL 110. Weekly mock test dan detailed feedback. Bonus: tips & strategies untuk maximize score dan scholarship applications.
                    </p>
                    <div class="member-list">
                        <div class="member-avatar">JK</div>
                        <div class="member-avatar">LM</div>
                        <div class="member-avatar">NO</div>
                        <span class="member-count">+27 anggota</span>
                    </div>
                    <button class="join-btn" onclick="window.location.href='<?php echo $whatsapp_link; ?>'">Gabung Grup</button>
                </div>

                <div class="group-card">
                    <div class="group-header">
                        <div class="group-icon" style="background: #fecaca;">📖</div>
                        <div class="group-title">
                            <h3>Bahasa Indonesia & Sastra</h3>
                            <p>Fokus: Tata Bahasa, Analisis Teks, Menulis Kreatif</p>
                        </div>
                    </div>
                    <div class="group-meta">
                        <span class="meta-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            Rabu, 16:30 WIB
                        </span>
                        <span class="meta-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path></svg>
                            Online - Google Meet
                        </span>
                    </div>
                    <p class="group-description">
                        Mendalami keindahan Bahasa Indonesia! Dari tata bahasa formal hingga sastra kontemporer. Diskusi karya sastra, latihan menulis esai dan cerpen, serta persiapan Olimpiade Bahasa Indonesia. Mentor adalah pemenang lomba cipta cerpen nasional.
                    </p>
                    <div class="member-list">
                        <div class="member-avatar">PQ</div>
                        <div class="member-avatar">RS</div>
                        <div class="member-avatar">TU</div>
                        <span class="member-count">+14 anggota</span>
                    </div>
                    <button class="join-btn" onclick="window.location.href='<?php echo $whatsapp_link; ?>'">Gabung Grup</button>
                </div>

                <div class="group-card">
                    <div class="group-header">
                        <div class="group-icon" style="background: #e0e7ff;">🇯🇵</div>
                        <div class="group-title">
                            <h3>Nihongo Study Group - 日本語</h3>
                            <p>Level: N5 to N3 (JLPT)</p>
                        </div>
                    </div>
                    <div class="group-meta">
                        <span class="meta-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            Jumat, 19:30 WIB
                        </span>
                        <span class="meta-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path></svg>
                            Online - Discord
                        </span>
                    </div>
                    <p class="group-description">
                        Belajar Bahasa Jepang dari dasar! Hiragana, Katakana, Kanji, Grammar, dan Conversation. Persiapan JLPT N5-N3. Mentor pernah study di Jepang dan lulus JLPT N2. Fun activities: nonton anime dengan subtitle Jepang, baca manga, dan Japanese culture sharing!
                    </p>
                    <div class="member-list">
                        <div class="member-avatar">VW</div>
                        <div class="member-avatar">XY</div>
                        <div class="member-avatar">ZA</div>
                        <span class="member-count">+21 anggota</span>
                    </div>
                    <button class="join-btn" onclick="window.location.href='<?php echo $whatsapp_link; ?>'">Gabung Grup</button>
                </div>
            </div>

            <div id="teknologi" class="tab-content">
                <div class="group-card">
                    <div class="group-header">
                        <div class="group-icon" style="background: #dbeafe;">💻</div>
                        <div class="group-title">
                            <h3>Python Programming Bootcamp</h3>
                            <p>Dari Basic sampai Data Science</p>
                        </div>
                    </div>
                    <div class="group-meta">
                        <span class="meta-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            Senin & Kamis, 20:00 WIB
                        </span>
                        <span class="meta-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path></svg>
                            Online - Discord + Live Coding
                        </span>
                    </div>
                    <p class="group-description">
                        Learn Python from scratch! Syntax dasar, OOP, web scraping, data analysis dengan Pandas, dan intro to Machine Learning. Mentor adalah software engineer di tech company. Setiap sesi ada hands-on coding projects. Perfect untuk yang mau masuk jurusan IT atau start career di tech!
                    </p>
                    <div class="member-list">
                        <div class="member-avatar">AB</div>
                        <div class="member-avatar">CD</div>
                        <div class="member-avatar">EF</div>
                        <div class="member-avatar">GH</div>
                        <span class="member-count">+35 anggota</span>
                    </div>
                    <button class="join-btn" onclick="window.location.href='<?php echo $whatsapp_link; ?>'">Gabung Grup</button>
                </div>

                <div class="group-card">
                    <div class="group-header">
                        <div class="group-icon" style="background: #fef3c7;">🎨</div>
                        <div class="group-title">
                            <h3>Web Development (HTML, CSS, JS)</h3>
                            <p>Build Your First Website!</p>
                        </div>
                    </div>
                    <div class="group-meta">
                        <span class="meta-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            Rabu & Sabtu, 19:00 WIB
                        </span>
                        <span class="meta-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path></svg>
                            Online - Zoom + Screen Share
                        </span>
                    </div>
                    <p class="group-description">
                        Belajar membuat website dari nol! HTML untuk struktur, CSS untuk styling, JavaScript untuk interactivity. Project-based learning - bikin portfolio website, landing page, dan simple web apps. Mentor adalah full-stack developer dengan 5 tahun pengalaman. No coding background needed!
                    </p>
                    <div class="member-list">
                        <div class="member-avatar">IJ</div>
                        <div class="member-avatar">KL</div>
                        <div class="member-avatar">MN</div>
                        <span class="member-count">+28 anggota</span>
                    </div>
                    <button class="join-btn" onclick="window.location.href='<?php echo $whatsapp_link; ?>'">Gabung Grup</button>
                </div>

                <div class="group-card">
                    <div class="group-header">
                        <div class="group-icon" style="background: #d1fae5;">📱</div>
                        <div class="group-title">
                            <h3>Mobile App Development</h3>
                            <p>Flutter & React Native</p>
                        </div>
                    </div>
                    <div class="group-meta">
                        <span class="meta-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            Selasa, 20:00 WIB
                        </span>
                        <span class="meta-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path></svg>
                            Online - Discord
                        </span>
                    </div>
                    <p class="group-description">
                        Create mobile apps untuk Android & iOS! Belajar Flutter atau React Native, dari UI design sampai backend integration. Build real apps seperti todo list, weather app, dan social media clone. Mentor adalah mobile developer di startup unicorn Indonesia.
                    </p>
                    <div class="member-list">
                        <div class="member-avatar">OP</div>
                        <div class="member-avatar">QR</div>
                        <div class="member-avatar">ST</div>
                        <span class="member-count">+23 anggota</span>
                    </div>
                    <button class="join-btn" onclick="window.location.href='<?php echo $whatsapp_link; ?>'">Gabung Grup</button>
                </div>

                <div class="group-card">
                    <div class="group-header">
                        <div class="group-icon" style="background: #fce7f3;">🤖</div>
                        <div class="group-title">
                            <h3>AI & Machine Learning</h3>
                            <p>Intro to Artificial Intelligence</p>
                        </div>
                    </div>
                    <div class="group-meta">
                        <span class="meta-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            Minggu, 16:00 WIB
                        </span>
                        <span class="meta-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path></svg>
                            Online - Google Meet
                        </span>
                    </div>
                    <p class="group-description">
                        Dive into the world of AI! Learn machine learning basics, neural networks, computer vision, dan NLP. Menggunakan Python, TensorFlow, dan scikit-learn. Projects include: image classification, chatbot, dan recommendation system. Mentor lulusan S2 Computer Science.
                    </p>
                    <div class="member-list">
                        <div class="member-avatar">UV</div>
                        <div class="member-avatar">WX</div>
                        <div class="member-avatar">YZ</div>
                        <span class="member-count">+20 anggota</span>
                    </div>
                    <button class="join-btn" onclick="window.location.href='<?php echo $whatsapp_link; ?>'">Gabung Grup</button>
                </div>
            </div>

            <div id="lainnya" class="tab-content">
                <div class="group-card">
                    <div class="group-header">
                        <div class="group-icon" style="background: #dbeafe;">📊</div>
                        <div class="group-title">
                            <h3>Economics & Business Study</h3>
                            <p>Mikro, Makro, dan Business Strategy</p>
                        </div>
                    </div>
                    <div class="group-meta">
                        <span class="meta-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            Kamis, 19:00 WIB
                        </span>
                        <span class="meta-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path></svg>
                            Online - Zoom
                        </span>
                    </div>
                    <p class="group-description">
                        Pelajari ekonomi dan bisnis dari konsep fundamental! Supply-demand, market structure, financial analysis, dan business case studies. Cocok untuk yang mau masuk fakultas ekonomi atau tertarik entrepreneurship. Diskusi current economic issues dan startup ecosystem.
                    </p>
                    <div class="member-list">
                        <div class="member-avatar">AA</div>
                        <div class="member-avatar">BB</div>
                        <div class="member-avatar">CC</div>
                        <span class="member-count">+17 anggota</span>
                    </div>
                    <button class="join-btn" onclick="window.location.href='<?php echo $whatsapp_link; ?>'">Gabung Grup</button>
                </div>

                <div class="group-card">
                    <div class="group-header">
                        <div class="group-icon" style="background: #fef3c7;">🌏</div>
                        <div class="group-title">
                            <h3>Geografi & Lingkungan</h3>
                            <p>Physical & Human Geography</p>
                        </div>
                    </div>
                    <div class="group-meta">
                        <span class="meta-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            Sabtu, 15:00 WIB
                        </span>
                        <span class="meta-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path></svg>
                            Online - Discord
                        </span>
                    </div>
                    <p class="group-description">
                        Jelajahi planet Bumi kita! Dari geologi, iklim, sampai isu lingkungan global. Menggunakan Google Earth, GIS tools, dan virtual field trips. Diskusi climate change, sustainable development, dan disaster management. Mentor adalah geographer dengan pengalaman research.
                    </p>
                    <div class="member-list">
                        <div class="member-avatar">DD</div>
                        <div class="member-avatar">EE</div>
                        <div class="member-avatar">FF</div>
                        <span class="member-count">+12 anggota</span>
                    </div>
                    <button class="join-btn" onclick="window.location.href='<?php echo $whatsapp_link; ?>'">Gabung Grup</button>
                </div>

                <div class="group-card">
                    <div class="group-header">
                        <div class="group-icon" style="background: #fce7f3;">🎭</div>
                        <div class="group-title">
                            <h3>Sejarah & Budaya Indonesia</h3>
                            <p>Dari Masa Klasik hingga Kontemporer</p>
                        </div>
                    </div>
                    <div class="group-meta">
                        <span class="meta-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            Minggu, 14:00 WIB
                        </span>
                        <span class="meta-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path></svg>
                            Online - Google Meet
                        </span>
                    </div>
                    <p class="group-description">
                        Menyelami kekayaan sejarah dan budaya nusantara! Dari kerajaan Hindu-Buddha, Islam, kolonialisme, sampai kemerdekaan dan era modern. Diskusi interaktif dengan dokumenter, virtual museum tours, dan analisis sumber sejarah. Perfect untuk pecinta sejarah!
                    </p>
                    <div class="member-list">
                        <div class="member-avatar">GG</div>
                        <div class="member-avatar">HH</div>
                        <div class="member-avatar">II</div>
                        <span class="member-count">+16 anggota</span>
                    </div>
                    <button class="join-btn" onclick="window.location.href='<?php echo $whatsapp_link; ?>'">Gabung Grup</button>
                </div>

                <div class="group-card">
                    <div class="group-header">
                        <div class="group-icon" style="background: #d1fae5;">🎨</div>
                        <div class="group-title">
                            <h3>Digital Art & Design</h3>
                            <p>Graphic Design, UI/UX, Illustration</p>
                        </div>
                    </div>
                    <div class="group-meta">
                        <span class="meta-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            Jumat, 18:00 WIB
                        </span>
                        <span class="meta-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path></svg>
                            Online - Discord
                        </span>
                    </div>
                    <p class="group-description">
                        Unleash your creativity! Belajar desain grafis menggunakan Figma, Adobe Illustrator, dan Canva. Dari design principles, typography, color theory, sampai membuat portfolio. Weekly design challenges dan constructive feedback session. Mentor adalah professional UI/UX designer.
                    </p>
                    <div class="member-list">
                        <div class="member-avatar">JJ</div>
                        <div class="member-avatar">KK</div>
                        <div class="member-avatar">LL</div>
                        <span class="member-count">+25 anggota</span>
                    </div>
                    <button class="join-btn" onclick="window.location.href='<?php echo $whatsapp_link; ?>'">Gabung Grup</button>
                </div>
            </div>
        </div>
    </main>

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

        function showTab(tabName) {
            const tabs = document.querySelectorAll('.tab');
            const contents = document.querySelectorAll('.tab-content');
            
            tabs.forEach(tab => tab.classList.remove('active'));
            contents.forEach(content => content.classList.remove('active'));
            
            event.target.classList.add('active');
            document.getElementById(tabName).classList.add('active');
        }
    </script>
</body>
</html>
