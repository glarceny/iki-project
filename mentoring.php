<?php
$whatsapp_link = 'https://chat.whatsapp.com/YOUR_ACTUAL_GROUP_LINK_HERE';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <title>Program Mentoring - IKI</title>
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
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%); 
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
        .info-section { 
            background: #fff; 
            border-radius: 12px; 
            padding: 1.5rem 1rem; 
            margin-bottom: 1.5rem;
            border: 1px solid #e5e7eb;
        }
        .info-section h2 { 
            font-size: 1.1rem; 
            font-weight: 800; 
            color: #111827; 
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .benefit-grid { 
            display: grid; 
            gap: 1rem; 
            margin-bottom: 1.5rem;
        }
        .benefit-item { 
            display: flex; 
            align-items: flex-start; 
            gap: 0.75rem;
            padding: 0.75rem;
            background: #f9fafb;
            border-radius: 8px;
        }
        .benefit-icon { 
            width: 40px; 
            height: 40px; 
            border-radius: 8px; 
            display: flex; 
            align-items: center; 
            justify-content: center;
            flex-shrink: 0;
            font-size: 1.25rem;
        }
        .benefit-text h3 { font-size: 0.9rem; font-weight: 700; color: #111827; margin-bottom: 0.25rem; }
        .benefit-text p { font-size: 0.8rem; color: #6b7280; line-height: 1.4; }
        .mentor-card { 
            background: #fff; 
            border-radius: 12px; 
            padding: 1rem; 
            margin-bottom: 1rem; 
            border: 1px solid #e5e7eb;
            box-shadow: 0 1px 3px rgba(0,0,0,0.08);
        }
        .mentor-header { 
            display: flex; 
            gap: 1rem; 
            margin-bottom: 0.75rem;
        }
        .mentor-avatar { 
            width: 64px; 
            height: 64px; 
            border-radius: 12px; 
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%); 
            display: flex; 
            align-items: center; 
            justify-content: center;
            color: #fff;
            font-size: 1.75rem;
            font-weight: 700;
            flex-shrink: 0;
        }
        .mentor-info h3 { font-size: 1rem; font-weight: 800; color: #111827; margin-bottom: 0.25rem; }
        .mentor-info p { font-size: 0.75rem; color: #6b7280; margin-bottom: 0.375rem; }
        .mentor-tags { 
            display: flex; 
            flex-wrap: wrap; 
            gap: 0.375rem;
        }
        .mentor-tag { 
            padding: 0.25rem 0.5rem; 
            background: #cffafe; 
            color: #0891b2; 
            border-radius: 4px; 
            font-size: 0.7rem; 
            font-weight: 600;
        }
        .mentor-bio { 
            font-size: 0.875rem; 
            color: #374151; 
            line-height: 1.5; 
            margin-bottom: 0.75rem;
        }
        .mentor-stats { 
            display: flex; 
            gap: 1rem; 
            padding-top: 0.75rem; 
            border-top: 1px solid #f3f4f6;
        }
        .stat { 
            display: flex; 
            align-items: center; 
            gap: 0.375rem; 
            font-size: 0.75rem; 
            color: #6b7280;
        }
        .stat svg { width: 14px; height: 14px; }
        .steps-container { 
            background: #f9fafb; 
            border-radius: 12px; 
            padding: 1rem;
        }
        .step { 
            display: flex; 
            gap: 1rem; 
            margin-bottom: 1.5rem;
        }
        .step:last-child { margin-bottom: 0; }
        .step-number { 
            width: 36px; 
            height: 36px; 
            border-radius: 50%; 
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%); 
            color: #fff; 
            display: flex; 
            align-items: center; 
            justify-content: center;
            font-weight: 800;
            font-size: 0.9rem;
            flex-shrink: 0;
        }
        .step-content h3 { font-size: 0.9rem; font-weight: 700; color: #111827; margin-bottom: 0.375rem; }
        .step-content p { font-size: 0.8rem; color: #6b7280; line-height: 1.4; }
        @media (min-width: 640px) {
            .hero h1 { font-size: 2rem; }
            .container { padding: 1.5rem; }
            .benefit-grid { grid-template-columns: repeat(2, 1fr); }
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
            <a href="studygroups.php"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg> Kelompok Belajar</a>
            <a href="mentoring.php" class="active"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> Program Mentoring</a>
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
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
                BIMBINGAN PERSONAL DARI EXPERT
            </div>
            <h1>Program Mentoring IKI</h1>
            <p>Dapatkan guidance 1-on-1 dari mentor berpengalaman untuk mencapai tujuan akademikmu</p>
        </div>

        <div class="container">
            <div class="info-section">
                <h2>
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                    Apa itu Program Mentoring IKI?
                </h2>
                <p style="color: #374151; line-height: 1.6; margin-bottom: 1rem;">
                    Program Mentoring IKI adalah program bimbingan personal one-on-one dimana kamu akan dipasangkan dengan mentor yang sesuai dengan kebutuhanmu. Mentor kami adalah mahasiswa dan profesional berprestasi yang siap berbagi ilmu dan pengalaman untuk membantumu reach your full potential!
                </p>
                <p style="color: #374151; line-height: 1.6;">
                    Setiap mentee akan mendapat dedicated mentor yang akan membantu dalam bidang akademik, persiapan ujian, pengembangan skill, hingga career planning. Sesi mentoring dilakukan secara fleksibel menyesuaikan dengan jadwalmu.
                </p>
            </div>

            <div class="info-section">
                <h2>
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                    Benefit Program Mentoring
                </h2>
                <div class="benefit-grid">
                    <div class="benefit-item">
                        <div class="benefit-icon" style="background: #dbeafe;">🎯</div>
                        <div class="benefit-text">
                            <h3>Personal Guidance</h3>
                            <p>Bimbingan khusus sesuai kebutuhan dan goals pribadimu</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon" style="background: #d1fae5;">📚</div>
                        <div class="benefit-text">
                            <h3>Customized Learning Plan</h3>
                            <p>Kurikulum dan materi yang disesuaikan dengan level & targetmu</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon" style="background: #fef3c7;">💡</div>
                        <div class="benefit-text">
                            <h3>Expert Knowledge</h3>
                            <p>Belajar langsung dari yang terbaik di bidangnya</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon" style="background: #fce7f3;">🚀</div>
                        <div class="benefit-text">
                            <h3>Career Insights</h3>
                            <p>Dapatkan insight tentang karir dan industri dari praktisi</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon" style="background: #e0e7ff;">⏰</div>
                        <div class="benefit-text">
                            <h3>Flexible Schedule</h3>
                            <p>Jadwal mentoring yang bisa disesuaikan dengan kesibukanmu</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon" style="background: #cffafe;">🎓</div>
                        <div class="benefit-text">
                            <h3>Proven Track Record</h3>
                            <p>Mentor dengan prestasi dan pengalaman yang terbukti</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="info-section">
                <h2>
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M12 2L2 7l10 5 10-5-10-5z"></path>
                        <path d="M2 17l10 5 10-5"></path>
                        <path d="M2 12l10 5 10-5"></path>
                    </svg>
                    Cara Mendaftar Program Mentoring
                </h2>
                <div class="steps-container">
                    <div class="step">
                        <div class="step-number">1</div>
                        <div class="step-content">
                            <h3>Isi Form Pendaftaran</h3>
                            <p>Submit form mentoring melalui link yang disediakan. Ceritakan goals, kebutuhan, dan preferensi mentormu.</p>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-number">2</div>
                        <div class="step-content">
                            <h3>Matching dengan Mentor</h3>
                            <p>Tim IKI akan mencarikan mentor yang paling sesuai dengan kebutuhanmu berdasarkan expertise dan availability.</p>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-number">3</div>
                        <div class="step-content">
                            <h3>Kick-off Meeting</h3>
                            <p>Kenalan dengan mentormu, diskusikan goals dan expectations, serta tentukan jadwal mentoring.</p>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-number">4</div>
                        <div class="step-content">
                            <h3>Sesi Mentoring Rutin</h3>
                            <p>Mulai sesi mentoring regular sesuai jadwal yang disepakati. Biasanya 1-2x per minggu, 60-90 menit per sesi.</p>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-number">5</div>
                        <div class="step-content">
                            <h3>Progress Tracking & Evaluation</h3>
                            <p>Mentor akan track progress dan memberikan feedback berkala untuk memastikan kamu on track mencapai goals.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="info-section">
                <h2>
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    Daftar Mentor Kami
                </h2>

                <div class="mentor-card">
                    <div class="mentor-header">
                        <div class="mentor-avatar">AR</div>
                        <div class="mentor-info">
                            <h3>Arif Rahman</h3>
                            <p>📍 Mahasiswa S2 Informatika ITB | Ex-Software Engineer Gojek</p>
                            <div class="mentor-tags">
                                <span class="mentor-tag">Programming</span>
                                <span class="mentor-tag">Data Science</span>
                                <span class="mentor-tag">Web Dev</span>
                            </div>
                        </div>
                    </div>
                    <p class="mentor-bio">
                        5+ tahun pengalaman di tech industry. Spesialisasi dalam Python, JavaScript, dan Machine Learning. Pernah menjuarai berbagai hackathon nasional dan internasional. Passionate dalam mengajar programming untuk pemula hingga advanced level.
                    </p>
                    <div class="mentor-stats">
                        <span class="stat">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
                            28 Mentees
                        </span>
                        <span class="stat">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
                            Rating 4.9/5.0
                        </span>
                    </div>
                </div>

                <div class="mentor-card">
                    <div class="mentor-header">
                        <div class="mentor-avatar">SN</div>
                        <div class="mentor-info">
                            <h3>Siti Nurhaliza</h3>
                            <p>📍 Mahasiswa Kedokteran UI | Lulusan SNBP Nilai 100</p>
                            <div class="mentor-tags">
                                <span class="mentor-tag">Biologi</span>
                                <span class="mentor-tag">Kimia</span>
                                <span class="mentor-tag">UTBK Prep</span>
                            </div>
                        </div>
                    </div>
                    <p class="mentor-bio">
                        Alumnus SMAN 8 Jakarta dengan prestasi akademik cemerlang. Expert dalam persiapan UTBK khususnya Saintek. Metodologi belajar yang terbukti efektif membantu puluhan siswa masuk PTN impian. Pengalaman mengajar les privat 3 tahun.
                    </p>
                    <div class="mentor-stats">
                        <span class="stat">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
                            35 Mentees
                        </span>
                        <span class="stat">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
                            Rating 5.0/5.0
                        </span>
                    </div>
                </div>

                <div class="mentor-card">
                    <div class="mentor-header">
                        <div class="mentor-avatar">BP</div>
                        <div class="mentor-info">
                            <h3>Budi Prasetyo</h3>
                            <p>📍 Teknik Elektro ITB | Juara 1 Olimpiade Matematika Nasional</p>
                            <div class="mentor-tags">
                                <span class="mentor-tag">Matematika</span>
                                <span class="mentor-tag">Fisika</span>
                                <span class="mentor-tag">Olimpiade</span>
                            </div>
                        </div>
                    </div>
                    <p class="mentor-bio">
                        Peraih medali emas Olimpiade Matematika tingkat nasional dan perak tingkat internasional (IMO). Passionate dalam competitive mathematics dan problem solving. Metode pengajaran fokus pada pemahaman konsep fundamental dan teknik problem-solving advanced.
                    </p>
                    <div class="mentor-stats">
                        <span class="stat">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
                            22 Mentees
                        </span>
                        <span class="stat">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
                            Rating 4.8/5.0
                        </span>
                    </div>
                </div>

                <div class="mentor-card">
                    <div class="mentor-header">
                        <div class="mentor-avatar">DW</div>
                        <div class="mentor-info">
                            <h3>Dewi Wijaya</h3>
                            <p>📍 IELTS 8.5 | Study Abroad Consultant</p>
                            <div class="mentor-tags">
                                <span class="mentor-tag">English</span>
                                <span class="mentor-tag">IELTS/TOEFL</span>
                                <span class="mentor-tag">Study Abroad</span>
                            </div>
                        </div>
                    </div>
                    <p class="mentor-bio">
                        Expert dalam persiapan IELTS dan TOEFL dengan track record membantu 100+ students achieve their target scores. Pengalaman study di UK dengan full scholarship. Spesialisasi dalam Writing dan Speaking module. Memberikan feedback detail dan actionable untuk improvement.
                    </p>
                    <div class="mentor-stats">
                        <span class="stat">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
                            42 Mentees
                        </span>
                        <span class="stat">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
                            Rating 4.9/5.0
                        </span>
                    </div>
                </div>

                <div class="mentor-card">
                    <div class="mentor-header">
                        <div class="mentor-avatar">RF</div>
                        <div class="mentor-info">
                            <h3>Reza Fauzi</h3>
                            <p>📍 FEB UI | Founder Startup Edtech | Business Consultant</p>
                            <div class="mentor-tags">
                                <span class="mentor-tag">Business</span>
                                <span class="mentor-tag">Economics</span>
                                <span class="mentor-tag">Entrepreneurship</span>
                            </div>
                        </div>
                    </div>
                    <p class="mentor-bio">
                        Entrepreneur muda dengan startup valued $500K. Expert dalam business strategy, economics, dan entrepreneurship. Berpengalaman sebagai consultant untuk berbagai UMKM. Passionate dalam mengajarkan business fundamentals dan mindset entrepreneurial.
                    </p>
                    <div class="mentor-stats">
                        <span class="stat">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
                            19 Mentees
                        </span>
                        <span class="stat">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
                            Rating 4.7/5.0
                        </span>
                    </div>
                </div>

                <div class="mentor-card">
                    <div class="mentor-header">
                        <div class="mentor-avatar">LM</div>
                        <div class="mentor-info">
                            <h3>Linda Meilani</h3>
                            <p>📍 Psikologi UGM | Counselor & Study Skills Coach</p>
                            <div class="mentor-tags">
                                <span class="mentor-tag">Study Skills</span>
                                <span class="mentor-tag">Time Management</span>
                                <span class="mentor-tag">Motivation</span>
                            </div>
                        </div>
                    </div>
                    <p class="mentor-bio">
                        Certified counselor dengan fokus pada student development dan academic success. Expert dalam teknik belajar efektif, time management, dan stress management. Membantu siswa develop healthy study habits dan overcome academic challenges dengan pendekatan psikologis.
                    </p>
                    <div class="mentor-stats">
                        <span class="stat">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
                            31 Mentees
                        </span>
                        <span class="stat">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
                            Rating 5.0/5.0
                        </span>
                    </div>
                </div>

                <div class="mentor-card">
                    <div class="mentor-header">
                        <div class="mentor-avatar">TH</div>
                        <div class="mentor-info">
                            <h3>Tommy Hartono</h3>
                            <p>📍 Design UX/UI Lead di Tokopedia | Portfolio Winner Awwwards</p>
                            <div class="mentor-tags">
                                <span class="mentor-tag">UI/UX Design</span>
                                <span class="mentor-tag">Graphic Design</span>
                                <span class="mentor-tag">Portfolio</span>
                            </div>
                        </div>
                    </div>
                    <p class="mentor-bio">
                        Professional designer dengan 7 tahun pengalaman di tech industry. Expert dalam UI/UX design, design thinking, dan visual design. Pemenang berbagai design awards internasional. Passionate dalam mengajarkan design principles dan membantu build strong portfolios.
                    </p>
                    <div class="mentor-stats">
                        <span class="stat">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle"></svg>
                            26 Mentees
                        </span>
                        <span class="stat">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
                            Rating 4.9/5.0
                        </span>
                    </div>
                </div>

                <div class="mentor-card">
                    <div class="mentor-header">
                        <div class="mentor-avatar">AP</div>
                        <div class="mentor-info">
                            <h3>Andini Putri</h3>
                            <p>📍 Sastra Inggris UI | Content Writer & Editor</p>
                            <div class="mentor-tags">
                                <span class="mentor-tag">Writing</span>
                                <span class="mentor-tag">Literature</span>
                                <span class="mentor-tag">Essay</span>
                            </div>
                        </div>
                    </div>
                    <p class="mentor-bio">
                        Professional writer dan editor dengan portfolio di berbagai media nasional. Expert dalam academic writing, creative writing, dan content creation. Pemenang lomba essay writing tingkat nasional. Spesialisasi dalam membantu improve writing skills dan essay untuk scholarship applications.
                    </p>
                    <div class="mentor-stats">
                        <span class="stat">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
                            24 Mentees
                        </span>
                        <span class="stat">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
                            Rating 4.8/5.0
                        </span>
                    </div>
                </div>

                <div class="mentor-card">
                    <div class="mentor-header">
                        <div class="mentor-avatar">FN</div>
                        <div class="mentor-info">
                            <h3>Fajar Nugroho</h3>
                            <p>📍 Teknik Kimia ITB | Process Engineer at Pertamina</p>
                            <div class="mentor-tags">
                                <span class="mentor-tag">Chemistry</span>
                                <span class="mentor-tag">Engineering</span>
                                <span class="mentor-tag">Career Prep</span>
                            </div>
                        </div>
                    </div>
                    <p class="mentor-bio">
                        Engineer professional di industri oil & gas dengan strong background kimia dan matematika. Expert dalam chemistry concepts dan engineering fundamentals. Passionate dalam membimbing siswa yang tertarik engineering careers. Pengalaman recruitment di perusahaan multinational.
                    </p>
                    <div class="mentor-stats">
                        <span class="stat">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
                            18 Mentees
                        </span>
                        <span class="stat">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
                            Rating 4.7/5.0
                        </span>
                    </div>
                </div>

                <div class="mentor-card">
                    <div class="mentor-header">
                        <div class="mentor-avatar">MS</div>
                        <div class="mentor-info">
                            <h3>Maya Sari</h3>
                            <p>📍 Awardee LPDP | Master's Student at Stanford University</p>
                            <div class="mentor-tags">
                                <span class="mentor-tag">Scholarship</span>
                                <span class="mentor-tag">Study Abroad</span>
                                <span class="mentor-tag">Application</span>
                            </div>
                        </div>
                    </div>
                    <p class="mentor-bio">
                        LPDP and Fulbright awardee dengan pengalaman mendaftar ke 15+ universities globally. Expert dalam scholarship hunting, application strategy, dan essay writing. Successfully helped 50+ students secure scholarships. Insider tips tentang admission process dan interview preparation.
                    </p>
                    <div class="mentor-stats">
                        <span class="stat">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
                            38 Mentees
                        </span>
                        <span class="stat">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
                            Rating 5.0/5.0
                        </span>
                    </div>
                </div>

                <div class="mentor-card">
                    <div class="mentor-header">
                        <div class="mentor-avatar">HK</div>
                        <div class="mentor-info">
                            <h3>Hendra Kusuma</h3>
                            <p>📍 Data Scientist at Google Singapore | PhD Candidate NUS</p>
                            <div class="mentor-tags">
                                <span class="mentor-tag">Data Science</span>
                                <span class="mentor-tag">Statistics</span>
                                <span class="mentor-tag">AI/ML</span>
                            </div>
                        </div>
                    </div>
                    <p class="mentor-bio">
                        Data scientist professional dengan publikasi di top-tier conferences. Expert dalam machine learning, statistics, dan data analytics. Pengalaman mengajar di university level. Passionate dalam democratizing AI/ML education dan membantu students enter the field of data science.
                    </p>
                    <div class="mentor-stats">
                        <span class="stat">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
                            20 Mentees
                        </span>
                        <span class="stat">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
                            Rating 4.9/5.0
                        </span>
                    </div>
                </div>

                <div class="mentor-card">
                    <div class="mentor-header">
                        <div class="mentor-avatar">NK</div>
                        <div class="mentor-info">
                            <h3>Nurul Kamila</h3>
                            <p>📍 Hubungan Internasional UGM | Diplomat & Foreign Affairs Analyst</p>
                            <div class="mentor-tags">
                                <span class="mentor-tag">International Relations</span>
                                <span class="mentor-tag">Political Science</span>
                                <span class="mentor-tag">Public Speaking</span>
                            </div>
                        </div>
                    </div>
                    <p class="mentor-bio">
                        Professional diplomat dengan pengalaman di berbagai negara. Expert dalam international relations, geopolitics, dan diplomacy. Juara berbagai Model United Nations (MUN). Passionate dalam mengajarkan critical thinking, public speaking, dan global awareness.
                    </p>
                    <div class="mentor-stats">
                        <span class="stat">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
                            16 Mentees
                        </span>
                        <span class="stat">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
                            Rating 4.8/5.0
                        </span>
                    </div>
                </div>

                <div class="mentor-card">
                    <div class="mentor-header">
                        <div class="mentor-avatar">VL</div>
                        <div class="mentor-info">
                            <h3>Vina Lestari</h3>
                            <p>📍 Akuntansi UI | CPA | Financial Analyst</p>
                            <div class="mentor-tags">
                                <span class="mentor-tag">Accounting</span>
                                <span class="mentor-tag">Finance</span>
                                <span class="mentor-tag">Investment</span>
                            </div>
                        </div>
                    </div>
                    <p class="mentor-bio">
                        Certified Public Accountant (CPA) dengan pengalaman di Big 4 accounting firm. Expert dalam accounting, financial analysis, dan investment. Passionate dalam financial literacy education. Membantu students understand finance fundamentals dan career paths dalam dunia finance & accounting.
                    </p>
                    <div class="mentor-stats">
                        <span class="stat">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
                            21 Mentees
                        </span>
                        <span class="stat">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
                            Rating 4.7/5.0
                        </span>
                    </div>
                </div>

                <div class="mentor-card">
                    <div class="mentor-header">
                        <div class="mentor-avatar">GP</div>
                        <div class="mentor-info">
                            <h3>Gilang Prasetya</h3>
                            <p>📍 Arsitektur ITB | Lead Architect di Firm Internasional</p>
                            <div class="mentor-tags">
                                <span class="mentor-tag">Architecture</span>
                                <span class="mentor-tag">Design</span>
                                <span class="mentor-tag">3D Modeling</span>
                            </div>
                        </div>
                    </div>
                    <p class="mentor-bio">
                        Award-winning architect dengan proyek di berbagai negara. Expert dalam architectural design, 3D modeling (SketchUp, Revit), dan sustainable design. Passionate dalam mengajarkan design thinking dan creative problem solving. Portfolio showcases berbagai award-winning projects.
                    </p>
                    <div class="mentor-stats">
                        <span class="stat">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
                            14 Mentees
                        </span>
                        <span class="stat">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
                            Rating 4.9/5.0
                        </span>
                    </div>
                </div>

                <div class="mentor-card">
                    <div class="mentor-header">
                        <div class="mentor-avatar">IA</div>
                        <div class="mentor-info">
                            <h3>Irfan Aditya</h3>
                            <p>📍 Teknik Mesin ITS | Mechanical Engineer at Tesla</p>
                            <div class="mentor-tags">
                                <span class="mentor-tag">Mechanical Engineering</span>
                                <span class="mentor-tag">Physics</span>
                                <span class="mentor-tag">CAD</span>
                            </div>
                        </div>
                    </div>
                    <p class="mentor-bio">
                        Mechanical engineer di salah satu tech company terbesar dunia. Expert dalam thermodynamics, mechanics, dan CAD design. Pengalaman di automotive dan aerospace industry. Passionate dalam STEM education dan membantu students discover their passion in engineering.
                    </p>
                    <div class="mentor-stats">
                        <span class="stat">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
                            17 Mentees
                        </span>
                        <span class="stat">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
                            Rating 4.8/5.0
                        </span>
                    </div>
                </div>
            </div>

            <div class="info-section" style="background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%); color: #fff; text-align: center;">
                <h2 style="color: #fff; margin-bottom: 1rem;">Ready to Start Your Mentoring Journey?</h2>
                <p style="opacity: 0.95; margin-bottom: 1.5rem;">
                    Bergabung dengan 400+ mentees yang sudah merasakan manfaat program mentoring IKI!
                </p>
                <button style="padding: 0.75rem 2rem; background: #fff; color: #0891b2; border: none; border-radius: 8px; font-weight: 700; font-size: 0.9rem; cursor: pointer;" onclick="window.location.href='<?php echo $whatsapp_link; ?>'">
                    Daftar Sekarang
                </button>
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
    </script>
</body>
</html>
