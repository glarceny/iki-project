<?php
$whatsapp_link = 'https://chat.whatsapp.com/YOUR_ACTUAL_GROUP_LINK_HERE';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <title>Galeri Prestasi - IKI</title>
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
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); 
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
        .filter-tabs { 
            display: flex; 
            gap: 0.5rem; 
            margin-bottom: 1rem; 
            overflow-x: auto; 
            padding-bottom: 0.5rem;
        }
        .filter-tab { 
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
        .filter-tab.active { background: #f59e0b; color: #fff; border-color: #f59e0b; }
        .achievement-card { 
            background: #fff; 
            border-radius: 12px; 
            overflow: hidden; 
            margin-bottom: 1rem; 
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        .achievement-image { 
            width: 100%; 
            height: 200px; 
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%); 
            display: flex; 
            align-items: center; 
            justify-content: center;
            font-size: 4rem;
        }
        .achievement-content { padding: 1rem; }
        .achievement-header { 
            display: flex; 
            justify-content: space-between; 
            align-items: flex-start; 
            margin-bottom: 0.75rem;
        }
        .achievement-title { font-size: 1rem; font-weight: 800; color: #111827; margin-bottom: 0.25rem; }
        .achievement-name { font-size: 0.85rem; color: #6b7280; font-weight: 600; }
        .achievement-badge { 
            padding: 0.375rem 0.75rem; 
            background: #fef3c7; 
            color: #d97706; 
            border-radius: 6px; 
            font-size: 0.7rem; 
            font-weight: 700; 
            white-space: nowrap;
        }
        .achievement-badge.akademik { background: #dbeafe; color: #2563eb; }
        .achievement-badge.olahraga { background: #d1fae5; color: #059669; }
        .achievement-badge.seni { background: #fce7f3; color: #db2777; }
        .achievement-date { 
            font-size: 0.75rem; 
            color: #9ca3af; 
            margin-bottom: 0.5rem;
        }
        .achievement-description { 
            font-size: 0.875rem; 
            color: #374151; 
            line-height: 1.5; 
            margin-bottom: 0.75rem;
        }
        .achievement-stats { 
            display: flex; 
            gap: 1rem; 
            padding-top: 0.75rem; 
            border-top: 1px solid #f3f4f6;
        }
        .stat-item { 
            display: flex; 
            align-items: center; 
            gap: 0.375rem; 
            font-size: 0.75rem; 
            color: #6b7280;
        }
        .stat-item svg { width: 14px; height: 14px; }
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
            <a href="achievements.php" class="active"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5z"></path><path d="M2 17l10 5 10-5"></path></svg> Galeri Prestasi</a>
            
            <div class="nav-category">Akademik</div>
            <a href="studygroups.php"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg> Kelompok Belajar</a>
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
                    <circle cx="12" cy="8" r="7"></circle>
                    <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                </svg>
                PRESTASI ANGGOTA IKI
            </div>
            <h1>Galeri Prestasi</h1>
            <p>Bangga dengan pencapaian luar biasa dari anggota komunitas IKI</p>
        </div>

        <div class="container">
            <div class="filter-tabs">
                <button class="filter-tab active" onclick="filterCategory('semua')">Semua Prestasi</button>
                <button class="filter-tab" onclick="filterCategory('akademik')">Akademik</button>
                <button class="filter-tab" onclick="filterCategory('olahraga')">Olahraga</button>
                <button class="filter-tab" onclick="filterCategory('seni')">Seni & Kreativitas</button>
            </div>

            <div class="achievement-card" data-category="akademik">
                <div class="achievement-image">🏆</div>
                <div class="achievement-content">
                    <div class="achievement-header">
                        <div>
                            <h3 class="achievement-title">Juara 1 Olimpiade Matematika Nasional</h3>
                            <p class="achievement-name">Andi Pratama</p>
                        </div>
                        <span class="achievement-badge akademik">Akademik</span>
                    </div>
                    <p class="achievement-date">📅 Oktober 2025</p>
                    <p class="achievement-description">
                        Andi berhasil meraih medali emas pada Olimpiade Matematika Tingkat Nasional yang diselenggarakan oleh KEMENDIKBUD. Kompetisi diikuti oleh 500+ peserta dari seluruh Indonesia. Kunci sukses Andi adalah latihan soal rutin setiap hari dan konsisten mengikuti sesi mentoring di IKI.
                    </p>
                    <div class="achievement-stats">
                        <span class="stat-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
                            500+ Peserta
                        </span>
                        <span class="stat-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path></svg>
                            Tingkat Nasional
                        </span>
                    </div>
                </div>
            </div>

            <div class="achievement-card" data-category="akademik">
                <div class="achievement-image">🎓</div>
                <div class="achievement-content">
                    <div class="achievement-header">
                        <div>
                            <h3 class="achievement-title">Lolos SNBP Universitas Indonesia</h3>
                            <p class="achievement-name">Siti Nurhaliza</p>
                        </div>
                        <span class="achievement-badge akademik">Akademik</span>
                    </div>
                    <p class="achievement-date">📅 September 2025</p>
                    <p class="achievement-description">
                        Siti diterima di jurusan Kedokteran Universitas Indonesia melalui jalur SNBP dengan nilai rapor sempurna 100. Perjalanan Siti sangat inspiring - dari awalnya kesulitan di mata pelajaran Kimia, namun dengan bantuan kelompok belajar IKI dan mentoring rutin, ia berhasil meningkatkan pemahamannya.
                    </p>
                    <div class="achievement-stats">
                        <span class="stat-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 10v6M2 10l10-5 10 5-10 5z"></path></svg>
                            Universitas Indonesia
                        </span>
                        <span class="stat-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path></svg>
                            Nilai 100
                        </span>
                    </div>
                </div>
            </div>

            <div class="achievement-card" data-category="olahraga">
                <div class="achievement-image">⚽</div>
                <div class="achievement-content">
                    <div class="achievement-header">
                        <div>
                            <h3 class="achievement-title">Juara Futsal Piala Pelajar Jakarta</h3>
                            <p class="achievement-name">Tim IKI Futsal</p>
                        </div>
                        <span class="achievement-badge olahraga">Olahraga</span>
                    </div>
                    <p class="achievement-date">📅 Agustus 2025</p>
                    <p class="achievement-description">
                        Tim futsal IKI yang terdiri dari 10 anggota komunitas berhasil menjuarai turnamen futsal Piala Pelajar Jakarta. Dalam perjalanan menuju juara, tim kami mengalahkan 24 tim dari berbagai sekolah di Jakarta. Ini membuktikan bahwa IKI bukan hanya tentang akademik, tapi juga tentang membangun karakter melalui olahraga!
                    </p>
                    <div class="achievement-stats">
                        <span class="stat-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
                            10 Anggota Tim
                        </span>
                        <span class="stat-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="8" r="7"></circle></svg>
                            24 Tim
                        </span>
                    </div>
                </div>
            </div>

            <div class="achievement-card" data-category="seni">
                <div class="achievement-image">🎨</div>
                <div class="achievement-content">
                    <div class="achievement-header">
                        <div>
                            <h3 class="achievement-title">Juara 2 Lomba Desain Poster Nasional</h3>
                            <p class="achievement-name">Maya Sari</p>
                        </div>
                        <span class="achievement-badge seni">Seni & Kreativitas</span>
                    </div>
                    <p class="achievement-date">📅 Juli 2025</p>
                    <p class="achievement-description">
                        Maya meraih juara 2 dalam Lomba Desain Poster bertema "Pelestarian Lingkungan" yang diadakan oleh Kementerian Lingkungan Hidup. Karyanya dipilih dari 800+ submission karena pesan yang kuat dan estetika yang menarik. Maya belajar desain grafis secara otodidak melalui platform online yang direkomendasikan di IKI.
                    </p>
                    <div class="achievement-stats">
                        <span class="stat-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path></svg>
                            800+ Submission
                        </span>
                        <span class="stat-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="8" r="7"></circle></svg>
                            Juara 2
                        </span>
                    </div>
                </div>
            </div>

            <div class="achievement-card" data-category="akademik">
                <div class="achievement-image">💻</div>
                <div class="achievement-content">
                    <div class="achievement-header">
                        <div>
                            <h3 class="achievement-title">Juara Hackathon Tech For Good 2025</h3>
                            <p class="achievement-name">Team DevIKI</p>
                        </div>
                        <span class="achievement-badge akademik">Akademik</span>
                    </div>
                    <p class="achievement-date">📅 Juni 2025</p>
                    <p class="achievement-description">
                        Tim yang terdiri dari 4 anggota IKI berhasil menjuarai hackathon dengan membuat aplikasi edutech untuk membantu anak-anak di daerah terpencil belajar. Aplikasi "BelajarKu" mendapat apresiasi dari juri karena solusinya yang inovatif dan impact yang besar. Hadiah: 50 juta rupiah + mentoring dari startup unicorn.
                    </p>
                    <div class="achievement-stats">
                        <span class="stat-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle"></svg>
                            4 Anggota Tim
                        </span>
                        <span class="stat-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                            Hadiah 50 Juta
                        </span>
                    </div>
                </div>
            </div>

            <div class="achievement-card" data-category="seni">
                <div class="achievement-image">🎭</div>
                <div class="achievement-content">
                    <div class="achievement-header">
                        <div>
                            <h3 class="achievement-title">Best Writer - Kompetisi Essay ASEAN</h3>
                            <p class="achievement-name">Rizki Ramadhani</p>
                        </div>
                        <span class="achievement-badge seni">Seni & Kreativitas</span>
                    </div>
                    <p class="achievement-date">📅 Mei 2025</p>
                    <p class="achievement-description">
                        Rizki terpilih sebagai Best Writer dalam kompetisi essay tingkat ASEAN dengan tema "Youth Leadership in Digital Era". Essaynya yang berjudul "Leading with Empathy in the Age of AI" mendapat pujian dari panel juri internasional. Rizki mendapat kesempatan fully-funded trip ke Singapura untuk konferensi youth leadership.
                    </p>
                    <div class="achievement-stats">
                        <span class="stat-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle></svg>
                            Tingkat ASEAN
                        </span>
                        <span class="stat-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path></svg>
                            Trip ke Singapura
                        </span>
                    </div>
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

        let startY;
        sidebar.addEventListener('touchstart', (e) => {
            startY = e.touches[0].clientY;
        });
        sidebar.addEventListener('touchmove', (e) => {
            const deltaY = e.touches[0].clientY - startY;
            if (deltaY > 50 && sidebar.scrollTop === 0) {
                hamburger.classList.remove('active');
                sidebar.classList.remove('active');
                overlay.classList.remove('active');
            }
        });

        function filterCategory(category) {
            const filterTabs = document.querySelectorAll('.filter-tab');
            const achievementCards = document.querySelectorAll('.achievement-card');
            
            filterTabs.forEach(tab => {
                if (tab.onclick.toString().includes(category)) {
                    tab.classList.add('active');
                } else {
                    tab.classList.remove('active');
                }
            });
            
            achievementCards.forEach(card => {
                if (category === 'semua' || card.getAttribute('data-category') === category) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }
    </script>
</body>
</html>
