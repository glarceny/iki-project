<?php
$whatsapp_link = 'https://chat.whatsapp.com/YOUR_ACTUAL_GROUP_LINK_HERE';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <title>Materi Belajar - IKI</title>
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
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%); 
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
        .tab.active { background: #2563eb; color: #fff; border-color: #2563eb; }
        .tab-content { display: none; }
        .tab-content.active { display: block; }
        .subject-card { 
            background: #fff; 
            border-radius: 12px; 
            padding: 1rem; 
            margin-bottom: 1rem; 
            border: 1px solid #e5e7eb;
        }
        .subject-header { 
            display: flex; 
            align-items: center; 
            gap: 0.75rem; 
            margin-bottom: 0.75rem;
        }
        .subject-icon { 
            width: 48px; 
            height: 48px; 
            border-radius: 10px; 
            display: flex; 
            align-items: center; 
            justify-content: center;
            flex-shrink: 0;
        }
        .subject-icon svg { width: 28px; height: 28px; }
        .subject-title h3 { font-size: 1rem; font-weight: 800; color: #111827; margin-bottom: 0.25rem; }
        .subject-title p { font-size: 0.75rem; color: #6b7280; }
        .topic-list { list-style: none; margin: 0.75rem 0; }
        .topic-list li { 
            padding: 0.5rem 0; 
            border-bottom: 1px solid #f3f4f6; 
            font-size: 0.85rem;
            color: #374151;
        }
        .topic-list li:last-child { border-bottom: none; }
        .resource-links { 
            display: flex; 
            flex-wrap: wrap; 
            gap: 0.5rem; 
            margin-top: 0.75rem;
        }
        .resource-link { 
            display: inline-flex; 
            align-items: center; 
            gap: 0.375rem; 
            padding: 0.375rem 0.75rem; 
            background: #eff6ff; 
            color: #2563eb; 
            border-radius: 6px; 
            text-decoration: none; 
            font-size: 0.75rem; 
            font-weight: 600;
            transition: 0.2s;
        }
        .resource-link:hover { background: #dbeafe; }
        .resource-link svg { width: 14px; height: 14px; }
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
            <a href="materials.php" class="active"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg> Materi Belajar</a>
            <a href="events.php"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> Kalender Acara</a>
            <a href="achievements.php"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5z"></path><path d="M2 17l10 5 10-5"></path></svg> Galeri Prestasi</a>
            
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
                    <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                    <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                </svg>
                MATERI BELAJAR LENGKAP
            </div>
            <h1>Materi Belajar IKI</h1>
            <p>Koleksi lengkap materi pelajaran dari berbagai mata pelajaran dengan sumber daya berkualitas</p>
        </div>

        <div class="container">
            <div class="tabs">
                <button class="tab active" onclick="showTab('sains')">Sains</button>
                <button class="tab" onclick="showTab('bahasa')">Bahasa</button>
                <button class="tab" onclick="showTab('sosial')">Sosial</button>
                <button class="tab" onclick="showTab('teknologi')">Teknologi</button>
            </div>

            <div id="sains" class="tab-content active">
                <div class="subject-card">
                    <div class="subject-header">
                        <div class="subject-icon" style="background: #dbeafe; color: #2563eb;">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="2" y1="12" x2="22" y2="12"></line>
                                <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                            </svg>
                        </div>
                        <div class="subject-title">
                            <h3>Matematika</h3>
                            <p>Dasar hingga tingkat lanjut</p>
                        </div>
                    </div>
                    <ul class="topic-list">
                        <li>📐 Aljabar: Persamaan linear, kuadrat, dan polinomial</li>
                        <li>📊 Statistika & Probabilitas: Analisis data, distribusi, sampling</li>
                        <li>🔺 Geometri: Bangun datar & ruang, trigonometri, vektor</li>
                        <li>∞ Kalkulus: Limit, turunan, integral, dan aplikasinya</li>
                        <li>🔢 Teori Bilangan: Bilangan prima, modular arithmetic</li>
                    </ul>
                    <div class="resource-links">
                        <a href="https://www.khanacademy.org/math" target="_blank" class="resource-link">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                            Khan Academy
                        </a>
                        <a href="https://www.wolframalpha.com" target="_blank" class="resource-link">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                            Wolfram Alpha
                        </a>
                        <a href="https://www.youtube.com/c/3blue1brown" target="_blank" class="resource-link">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                            3Blue1Brown
                        </a>
                    </div>
                </div>

                <div class="subject-card">
                    <div class="subject-header">
                        <div class="subject-icon" style="background: #d1fae5; color: #10b981;">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path>
                            </svg>
                        </div>
                        <div class="subject-title">
                            <h3>Fisika</h3>
                            <p>Mekanika hingga fisika modern</p>
                        </div>
                    </div>
                    <ul class="topic-list">
                        <li>⚙️ Mekanika: Kinematika, dinamika, energi, momentum</li>
                        <li>🌊 Gelombang & Optik: Cahaya, bunyi, interferensi</li>
                        <li>⚡ Listrik & Magnet: Hukum Coulomb, medan listrik, arus</li>
                        <li>🔥 Termodinamika: Kalor, entropi, mesin kalor</li>
                        <li>⚛️ Fisika Modern: Relativitas, kuantum, atom</li>
                    </ul>
                    <div class="resource-links">
                        <a href="https://www.khanacademy.org/science/physics" target="_blank" class="resource-link">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                            Khan Academy Physics
                        </a>
                        <a href="https://phet.colorado.edu" target="_blank" class="resource-link">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                            PhET Simulations
                        </a>
                        <a href="https://www.hyperphysics.phy-astr.gsu.edu/" target="_blank" class="resource-link">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                            HyperPhysics
                        </a>
                    </div>
                </div>

                <div class="subject-card">
                    <div class="subject-header">
                        <div class="subject-icon" style="background: #fef3c7; color: #f59e0b;">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                            </svg>
                        </div>
                        <div class="subject-title">
                            <h3>Kimia</h3>
                            <p>Struktur materi dan reaksi kimia</p>
                        </div>
                    </div>
                    <ul class="topic-list">
                        <li>🧪 Stoikiometri: Mol, perhitungan kimia, larutan</li>
                        <li>⚗️ Struktur Atom: Konfigurasi elektron, sistem periodik</li>
                        <li>🔗 Ikatan Kimia: Kovalen, ionik, logam, intermolekular</li>
                        <li>↔️ Kesetimbangan: Kesetimbangan kimia, asam-basa, redoks</li>
                        <li>🧬 Kimia Organik: Hidrokarbon, senyawa karbon, polimer</li>
                    </ul>
                    <div class="resource-links">
                        <a href="https://www.khanacademy.org/science/chemistry" target="_blank" class="resource-link">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                            Khan Academy Chemistry
                        </a>
                        <a href="https://www.chemguide.co.uk" target="_blank" class="resource-link">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                            ChemGuide
                        </a>
                    </div>
                </div>

                <div class="subject-card">
                    <div class="subject-header">
                        <div class="subject-icon" style="background: #dcfce7; color: #16a34a;">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="3"></circle>
                                <path d="M12 1v6m0 6v6"></path>
                            </svg>
                        </div>
                        <div class="subject-title">
                            <h3>Biologi</h3>
                            <p>Kehidupan dan ekosistem</p>
                        </div>
                    </div>
                    <ul class="topic-list">
                        <li>🧬 Sel & Molekuler: Struktur sel, DNA, RNA, protein</li>
                        <li>🌱 Fisiologi Tumbuhan: Fotosintesis, respirasi, hormon</li>
                        <li>🦴 Anatomi Manusia: Sistem organ, homeostasis</li>
                        <li>🧪 Genetika: Hereditas, mutasi, bioteknologi</li>
                        <li>🌍 Ekologi: Ekosistem, evolusi, konservasi</li>
                    </ul>
                    <div class="resource-links">
                        <a href="https://www.khanacademy.org/science/biology" target="_blank" class="resource-link">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                            Khan Academy Biology
                        </a>
                        <a href="https://www.nature.com/scitable" target="_blank" class="resource-link">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                            Nature Scitable
                        </a>
                    </div>
                </div>
            </div>

            <div id="bahasa" class="tab-content">
                <div class="subject-card">
                    <div class="subject-header">
                        <div class="subject-icon" style="background: #e0e7ff; color: #6366f1;">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                            </svg>
                        </div>
                        <div class="subject-title">
                            <h3>Bahasa Inggris</h3>
                            <p>Grammar, vocabulary, dan conversation</p>
                        </div>
                    </div>
                    <ul class="topic-list">
                        <li>📝 Grammar: Tenses, modals, passive voice, conditional</li>
                        <li>📖 Reading: Comprehension, analysis, critical reading</li>
                        <li>✍️ Writing: Essay, paragraph, academic writing</li>
                        <li>🗣️ Speaking: Pronunciation, conversation, presentation</li>
                        <li>👂 Listening: Comprehension, note-taking, TOEFL/IELTS</li>
                    </ul>
                    <div class="resource-links">
                        <a href="https://www.duolingo.com" target="_blank" class="resource-link">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                            Duolingo
                        </a>
                        <a href="https://www.bbc.co.uk/learningenglish" target="_blank" class="resource-link">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                            BBC Learning English
                        </a>
                        <a href="https://www.cambridgeenglish.org" target="_blank" class="resource-link">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                            Cambridge English
                        </a>
                    </div>
                </div>

                <div class="subject-card">
                    <div class="subject-header">
                        <div class="subject-icon" style="background: #fecaca; color: #dc2626;">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                            </svg>
                        </div>
                        <div class="subject-title">
                            <h3>Bahasa Indonesia</h3>
                            <p>Tata bahasa dan sastra Indonesia</p>
                        </div>
                    </div>
                    <ul class="topic-list">
                        <li>📚 Tata Bahasa: EYD, kalimat efektif, kata baku</li>
                        <li>📜 Sastra: Puisi, prosa, drama, analisis karya</li>
                        <li>✏️ Menulis: Esai, artikel, karya ilmiah</li>
                        <li>🎭 Apresiasi: Kritik sastra, resensi buku</li>
                        <li>📰 Jurnalistik: Berita, feature, opini</li>
                    </ul>
                    <div class="resource-links">
                        <a href="https://badanbahasa.kemdikbud.go.id" target="_blank" class="resource-link">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                            Badan Bahasa
                        </a>
                        <a href="https://kbbi.kemdikbud.go.id" target="_blank" class="resource-link">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                            KBBI Online
                        </a>
                    </div>
                </div>
            </div>

            <div id="sosial" class="tab-content">
                <div class="subject-card">
                    <div class="subject-header">
                        <div class="subject-icon" style="background: #fef3c7; color: #d97706;">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            </svg>
                        </div>
                        <div class="subject-title">
                            <h3>Sejarah</h3>
                            <p>Indonesia dan dunia</p>
                        </div>
                    </div>
                    <ul class="topic-list">
                        <li>🏛️ Sejarah Indonesia: Pra-sejarah hingga reformasi</li>
                        <li>🌍 Sejarah Dunia: Peradaban kuno, revolusi, perang dunia</li>
                        <li>📜 Historiografi: Metode penelitian sejarah</li>
                        <li>🗿 Arkeologi: Penemuan dan pelestarian</li>
                    </ul>
                </div>

                <div class="subject-card">
                    <div class="subject-header">
                        <div class="subject-icon" style="background: #dbeafe; color: #0284c7;">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg>
                        </div>
                        <div class="subject-title">
                            <h3>Geografi</h3>
                            <p>Bumi dan fenomena alam</p>
                        </div>
                    </div>
                    <ul class="topic-list">
                        <li>🗺️ Geografi Fisik: Litosfer, atmosfer, hidrosfer</li>
                        <li>🏙️ Geografi Manusia: Penduduk, urbanisasi, ekonomi</li>
                        <li>🌋 Geologi: Tektonik, vulkanisme, gempa</li>
                        <li>🛰️ Pemetaan: GIS, kartografi, penginderaan jauh</li>
                    </ul>
                </div>

                <div class="subject-card">
                    <div class="subject-header">
                        <div class="subject-icon" style="background: #fce7f3; color: #db2777;">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                            </svg>
                        </div>
                        <div class="subject-title">
                            <h3>Sosiologi</h3>
                            <p>Masyarakat dan interaksi sosial</p>
                        </div>
                    </div>
                    <ul class="topic-list">
                        <li>👥 Struktur Sosial: Stratifikasi, diferensiasi</li>
                        <li>🔄 Perubahan Sosial: Modernisasi, globalisasi</li>
                        <li>⚖️ Konflik & Integrasi: Penyelesaian konflik</li>
                        <li>📊 Metode Penelitian: Kuantitatif, kualitatif</li>
                    </ul>
                </div>
            </div>

            <div id="teknologi" class="tab-content">
                <div class="subject-card">
                    <div class="subject-header">
                        <div class="subject-icon" style="background: #dbeafe; color: #2563eb;">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                                <line x1="8" y1="21" x2="16" y2="21"></line>
                            </svg>
                        </div>
                        <div class="subject-title">
                            <h3>Pemrograman</h3>
                            <p>Berbagai bahasa pemrograman</p>
                        </div>
                    </div>
                    <ul class="topic-list">
                        <li>🐍 Python: Syntax, data structures, OOP, libraries</li>
                        <li>☕ Java: Fundamentals, OOP, Spring framework</li>
                        <li>💻 JavaScript: ES6+, React, Node.js, TypeScript</li>
                        <li>🦀 Rust: Memory safety, concurrency</li>
                        <li>🔷 C++: Algorithms, data structures, STL</li>
                    </ul>
                    <div class="resource-links">
                        <a href="https://www.codecademy.com" target="_blank" class="resource-link">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                            Codecademy
                        </a>
                        <a href="https://www.freecodecamp.org" target="_blank" class="resource-link">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                            FreeCodeCamp
                        </a>
                        <a href="https://leetcode.com" target="_blank" class="resource-link">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                            LeetCode
                        </a>
                    </div>
                </div>

                <div class="subject-card">
                    <div class="subject-header">
                        <div class="subject-icon" style="background: #d1fae5; color: #059669;">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="3"></circle>
                                <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                            </svg>
                        </div>
                        <div class="subject-title">
                            <h3>Data Science & AI</h3>
                            <p>Machine learning dan analisis data</p>
                        </div>
                    </div>
                    <ul class="topic-list">
                        <li>📊 Data Analysis: Pandas, NumPy, Matplotlib</li>
                        <li>🤖 Machine Learning: Sklearn, TensorFlow, PyTorch</li>
                        <li>🧠 Deep Learning: Neural networks, CNN, RNN</li>
                        <li>📈 Statistics: Hypothesis testing, regression</li>
                        <li>💡 AI Applications: NLP, Computer Vision, Reinforcement Learning</li>
                    </ul>
                    <div class="resource-links">
                        <a href="https://www.kaggle.com/learn" target="_blank" class="resource-link">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                            Kaggle Learn
                        </a>
                        <a href="https://www.fast.ai" target="_blank" class="resource-link">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                            Fast.ai
                        </a>
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

        function showTab(tabName) {
            const tabs = document.querySelectorAll('.tab');
            const tabContents = document.querySelectorAll('.tab-content');
            
            tabs.forEach(tab => {
                if (tab.textContent.toLowerCase().includes(tabName.toLowerCase()) || 
                    tab.onclick.toString().includes(tabName)) {
                    tab.classList.add('active');
                } else {
                    tab.classList.remove('active');
                }
            });
            
            tabContents.forEach(content => {
                if (content.id === tabName) {
                    content.classList.add('active');
                } else {
                    content.classList.remove('active');
                }
            });
        }
    </script>
</body>
</html>
