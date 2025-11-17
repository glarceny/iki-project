<?php
$whatsapp_link = 'https://chat.whatsapp.com/YOUR_ACTUAL_GROUP_LINK_HERE';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <title>Kalender Acara - IKI</title>
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
            background: linear-gradient(135deg, #10b981 0%, #059669 100%); 
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
        .month-selector { 
            display: flex; 
            gap: 0.5rem; 
            margin-bottom: 1rem; 
            overflow-x: auto; 
            padding-bottom: 0.5rem;
        }
        .month-btn { 
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
        .month-btn.active { background: #10b981; color: #fff; border-color: #10b981; }
        .month-content { display: none; }
        .month-content.active { display: block; }
        .event-card { 
            background: #fff; 
            border-radius: 12px; 
            padding: 1rem; 
            margin-bottom: 1rem; 
            border-left: 4px solid #10b981;
            box-shadow: 0 1px 3px rgba(0,0,0,0.08);
        }
        .event-header { 
            display: flex; 
            justify-content: space-between; 
            align-items: flex-start; 
            margin-bottom: 0.75rem;
        }
        .event-date { 
            display: flex; 
            flex-direction: column; 
            align-items: center; 
            background: #f3f4f6; 
            padding: 0.5rem; 
            border-radius: 8px; 
            min-width: 60px;
        }
        .event-date .day { font-size: 1.5rem; font-weight: 800; color: #10b981; line-height: 1; }
        .event-date .month { font-size: 0.75rem; color: #6b7280; font-weight: 600; text-transform: uppercase; }
        .event-info { flex: 1; margin-left: 1rem; }
        .event-title { font-size: 1rem; font-weight: 800; color: #111827; margin-bottom: 0.375rem; }
        .event-meta { 
            display: flex; 
            flex-wrap: wrap; 
            gap: 0.75rem; 
            margin-bottom: 0.5rem;
        }
        .event-meta-item { 
            display: flex; 
            align-items: center; 
            gap: 0.375rem; 
            font-size: 0.75rem; 
            color: #6b7280;
        }
        .event-meta-item svg { width: 14px; height: 14px; }
        .event-description { font-size: 0.875rem; color: #374151; line-height: 1.5; }
        .event-tag { 
            display: inline-block; 
            padding: 0.25rem 0.625rem; 
            background: #d1fae5; 
            color: #059669; 
            border-radius: 4px; 
            font-size: 0.7rem; 
            font-weight: 700; 
            margin-top: 0.5rem;
        }
        .event-tag.workshop { background: #dbeafe; color: #2563eb; }
        .event-tag.webinar { background: #fef3c7; color: #d97706; }
        .event-tag.competition { background: #fecaca; color: #dc2626; }
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
            <a href="events.php" class="active"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> Kalender Acara</a>
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
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                    <line x1="16" y1="2" x2="16" y2="6"></line>
                    <line x1="8" y1="2" x2="8" y2="6"></line>
                    <line x1="3" y1="10" x2="21" y2="10"></line>
                </svg>
                JADWAL KEGIATAN IKI
            </div>
            <h1>Kalender Acara IKI</h1>
            <p>Ikuti berbagai kegiatan edukatif, workshop, webinar, dan kompetisi yang kami selenggarakan</p>
        </div>

        <div class="container">
            <div class="month-selector">
                <button class="month-btn active" onclick="showMonth('november')">November 2025</button>
                <button class="month-btn" onclick="showMonth('december')">Desember 2025</button>
                <button class="month-btn" onclick="showMonth('januari')">Januari 2026</button>
            </div>

            <div id="november" class="month-content active">
                <div class="event-card">
                    <div class="event-header">
                        <div class="event-date">
                            <span class="day">15</span>
                            <span class="month">NOV</span>
                        </div>
                        <div class="event-info">
                            <h3 class="event-title">Workshop Python untuk Pemula</h3>
                            <div class="event-meta">
                                <span class="event-meta-item">
                                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                    14:00 - 16:00 WIB
                                </span>
                                <span class="event-meta-item">
                                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                    Online - Zoom
                                </span>
                            </div>
                            <p class="event-description">Belajar dasar-dasar Python dari nol! Cocok untuk yang ingin memulai programming. Materi mencakup syntax, variables, loops, functions, dan mini project.</p>
                            <span class="event-tag workshop">Workshop</span>
                        </div>
                    </div>
                </div>

                <div class="event-card">
                    <div class="event-header">
                        <div class="event-date">
                            <span class="day">18</span>
                            <span class="month">NOV</span>
                        </div>
                        <div class="event-info">
                            <h3 class="event-title">Webinar Persiapan UTBK 2026</h3>
                            <div class="event-meta">
                                <span class="event-meta-item">
                                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                    19:00 - 21:00 WIB
                                </span>
                                <span class="event-meta-item">
                                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                    Online - Google Meet
                                </span>
                            </div>
                            <p class="event-description">Tips dan trik menghadapi UTBK dari alumni yang berhasil masuk PTN impian. Pembicara: Alumni UI, ITB, dan UGM. Bonus: e-book strategi belajar!</p>
                            <span class="event-tag webinar">Webinar</span>
                        </div>
                    </div>
                </div>

                <div class="event-card">
                    <div class="event-header">
                        <div class="event-date">
                            <span class="day">22</span>
                            <span class="month">NOV</span>
                        </div>
                        <div class="event-info">
                            <h3 class="event-title">Sesi Mentoring Matematika</h3>
                            <div class="event-meta">
                                <span class="event-meta-item">
                                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                    16:00 - 17:30 WIB
                                </span>
                                <span class="event-meta-item">
                                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                    Online - Discord
                                </span>
                            </div>
                            <p class="event-description">Mentoring rutin untuk materi Kalkulus dan Aljabar Linear. Tanya jawab langsung dengan mentor berpengalaman. Slot terbatas!</p>
                            <span class="event-tag">Mentoring</span>
                        </div>
                    </div>
                </div>

                <div class="event-card">
                    <div class="event-header">
                        <div class="event-date">
                            <span class="day">25</span>
                            <span class="month">NOV</span>
                        </div>
                        <div class="event-info">
                            <h3 class="event-title">Kompetisi Essay Writing</h3>
                            <div class="event-meta">
                                <span class="event-meta-item">
                                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                    Deadline 23:59 WIB
                                </span>
                                <span class="event-meta-item">
                                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                    Submit via Email
                                </span>
                            </div>
                            <p class="event-description">Tema: "Pendidikan Indonesia di Era Digital". Total hadiah 3 juta rupiah untuk 3 pemenang! Open untuk semua anggota IKI.</p>
                            <span class="event-tag competition">Kompetisi</span>
                        </div>
                    </div>
                </div>

                <div class="event-card">
                    <div class="event-header">
                        <div class="event-date">
                            <span class="day">28</span>
                            <span class="month">NOV</span>
                        </div>
                        <div class="event-info">
                            <h3 class="event-title">Book Club Discussion: Atomic Habits</h3>
                            <div class="event-meta">
                                <span class="event-meta-item">
                                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                    20:00 - 21:30 WIB
                                </span>
                                <span class="event-meta-item">
                                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                    Online - Zoom
                                </span>
                            </div>
                            <p class="event-description">Diskusi buku "Atomic Habits" karya James Clear. Bagaimana membangun kebiasaan baik dan menghilangkan kebiasaan buruk. Wajib sudah membaca buku!</p>
                            <span class="event-tag">Book Club</span>
                        </div>
                    </div>
                </div>
            </div>

            <div id="december" class="month-content">
                <div class="event-card">
                    <div class="event-header">
                        <div class="event-date">
                            <span class="day">05</span>
                            <span class="month">DES</span>
                        </div>
                        <div class="event-info">
                            <h3 class="event-title">Workshop Web Development dengan React</h3>
                            <div class="event-meta">
                                <span class="event-meta-item">
                                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                    14:00 - 17:00 WIB
                                </span>
                                <span class="event-meta-item">
                                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                    Online - Zoom
                                </span>
                            </div>
                            <p class="event-description">Belajar membuat aplikasi web modern dengan React.js! Dari setup environment hingga deploy. Project: Todo App dengan Firebase.</p>
                            <span class="event-tag workshop">Workshop</span>
                        </div>
                    </div>
                </div>

                <div class="event-card">
                    <div class="event-header">
                        <div class="event-date">
                            <span class="day">10</span>
                            <span class="month">DES</span>
                        </div>
                        <div class="event-info">
                            <h3 class="event-title">Sharing Session: Beasiswa LPDP</h3>
                            <div class="event-meta">
                                <span class="event-meta-item">
                                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                    19:00 - 21:00 WIB
                                </span>
                                <span class="event-meta-item">
                                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                    Online - Google Meet
                                </span>
                            </div>
                            <p class="event-description">Tips lolos seleksi LPDP dari awardee yang sedang studi di luar negeri. Cara membuat essay, persiapan interview, dan dokumen yang dibutuhkan.</p>
                            <span class="event-tag webinar">Webinar</span>
                        </div>
                    </div>
                </div>

                <div class="event-card">
                    <div class="event-header">
                        <div class="event-date">
                            <span class="day">15</span>
                            <span class="month">DES</span>
                        </div>
                        <div class="event-info">
                            <h3 class="event-title">IKI Year End Gathering 2025</h3>
                            <div class="event-meta">
                                <span class="event-meta-item">
                                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                    15:00 - 18:00 WIB
                                </span>
                                <span class="event-meta-item">
                                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                    Hybrid: Jakarta & Online
                                </span>
                            </div>
                            <p class="event-description">Perayaan akhir tahun IKI! Games, doorprize, penghargaan member terbaik, dan networking session. Jangan sampai ketinggalan!</p>
                            <span class="event-tag">Special Event</span>
                        </div>
                    </div>
                </div>
            </div>

            <div id="januari" class="month-content">
                <div class="event-card">
                    <div class="event-header">
                        <div class="event-date">
                            <span class="day">08</span>
                            <span class="month">JAN</span>
                        </div>
                        <div class="event-info">
                            <h3 class="event-title">New Year Motivation Session</h3>
                            <div class="event-meta">
                                <span class="event-meta-item">
                                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                    19:00 - 20:30 WIB
                                </span>
                                <span class="event-meta-item">
                                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                    Online - Zoom
                                </span>
                            </div>
                            <p class="event-description">Mulai tahun dengan semangat baru! Goal setting, productivity hacks, dan strategi mencapai target akademik 2026. Guest speaker: Motivator & Life Coach.</p>
                            <span class="event-tag webinar">Webinar</span>
                        </div>
                    </div>
                </div>

                <div class="event-card">
                    <div class="event-header">
                        <div class="event-date">
                            <span class="day">12</span>
                            <span class="month">JAN</span>
                        </div>
                        <div class="event-info">
                            <h3 class="event-title">Workshop Data Science dengan Python</h3>
                            <div class="event-meta">
                                <span class="event-meta-item">
                                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                    13:00 - 16:00 WIB
                                </span>
                                <span class="event-meta-item">
                                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                    Online - Zoom
                                </span>
                            </div>
                            <p class="event-description">Intro to Data Science: Pandas, NumPy, Matplotlib, dan Machine Learning dasar. Hands-on project menganalisis real dataset!</p>
                            <span class="event-tag workshop">Workshop</span>
                        </div>
                    </div>
                </div>

                <div class="event-card">
                    <div class="event-header">
                        <div class="event-date">
                            <span class="day">20</span>
                            <span class="month">JAN</span>
                        </div>
                        <div class="event-info">
                            <h3 class="event-title">IKI Coding Competition 2026</h3>
                            <div class="event-meta">
                                <span class="event-meta-item">
                                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                    10:00 - 14:00 WIB
                                </span>
                                <span class="event-meta-item">
                                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                    Online - HackerRank
                                </span>
                            </div>
                            <p class="event-description">Kompetisi pemrograman tahunan IKI! 10 soal algorithm & data structures. Total hadiah 5 juta rupiah. Kategori: Beginner & Advanced.</p>
                            <span class="event-tag competition">Kompetisi</span>
                        </div>
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

        function showMonth(monthName) {
            const months = document.querySelectorAll('.month-btn');
            const monthContents = document.querySelectorAll('.month-content');
            
            months.forEach(btn => {
                if (btn.onclick.toString().includes(monthName)) {
                    btn.classList.add('active');
                } else {
                    btn.classList.remove('active');
                }
            });
            
            monthContents.forEach(content => {
                if (content.id === monthName) {
                    content.classList.add('active');
                } else {
                    content.classList.remove('active');
                }
            });
        }
    </script>
</body>
</html>
