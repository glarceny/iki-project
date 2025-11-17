<?php
$whatsapp_link = 'https://chat.whatsapp.com/YOUR_ACTUAL_GROUP_LINK_HERE';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <title>Panduan Karir - IKI</title>
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
            background: linear-gradient(135deg, #ec4899 0%, #db2777 100%); 
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
        .tab.active { background: #ec4899; color: #fff; border-color: #ec4899; }
        .tab-content { display: none; }
        .tab-content.active { display: block; }
        .career-card { 
            background: #fff; 
            border-radius: 12px; 
            padding: 1rem; 
            margin-bottom: 1rem; 
            border: 1px solid #e5e7eb;
            box-shadow: 0 1px 3px rgba(0,0,0,0.08);
        }
        .career-header { 
            display: flex; 
            align-items: center; 
            gap: 0.75rem; 
            margin-bottom: 0.75rem;
        }
        .career-icon { 
            width: 48px; 
            height: 48px; 
            border-radius: 10px; 
            display: flex; 
            align-items: center; 
            justify-content: center;
            flex-shrink: 0;
            font-size: 1.5rem;
        }
        .career-title h3 { font-size: 1rem; font-weight: 800; color: #111827; margin-bottom: 0.25rem; }
        .career-title p { font-size: 0.75rem; color: #6b7280; }
        .career-description { 
            font-size: 0.875rem; 
            color: #374151; 
            line-height: 1.5; 
            margin-bottom: 0.75rem;
        }
        .career-path { 
            background: #f9fafb; 
            border-radius: 8px; 
            padding: 0.75rem; 
            margin-bottom: 0.75rem;
        }
        .career-path h4 { 
            font-size: 0.85rem; 
            font-weight: 700; 
            color: #111827; 
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.375rem;
        }
        .path-steps { list-style: none; }
        .path-steps li { 
            padding: 0.375rem 0; 
            font-size: 0.8rem; 
            color: #374151;
            display: flex;
            align-items: flex-start;
            gap: 0.5rem;
        }
        .career-stats { 
            display: flex; 
            flex-wrap: wrap; 
            gap: 0.75rem; 
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
        .skills-list { 
            display: flex; 
            flex-wrap: wrap; 
            gap: 0.375rem;
            margin-top: 0.75rem;
        }
        .skill-tag { 
            padding: 0.25rem 0.5rem; 
            background: #fce7f3; 
            color: #db2777; 
            border-radius: 4px; 
            font-size: 0.7rem; 
            font-weight: 600;
        }
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
            <a href="studygroups.php"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg> Kelompok Belajar</a>
            <a href="mentoring.php"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> Program Mentoring</a>
            <a href="studytips.php"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg> Tips Belajar</a>
            <a href="examprep.php"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line></svg> Persiapan Ujian</a>
            
            <div class="nav-category">Karir & Beasiswa</div>
            <a href="career.php" class="active"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg> Panduan Karir</a>
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
                    <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                    <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                </svg>
                RENCANAKAN MASA DEPANMU
            </div>
            <h1>Panduan Karir IKI</h1>
            <p>Explore berbagai jalur karir, pahami requirement dan prospek setiap profesi</p>
        </div>

        <div class="container">
            <div class="tabs">
                <button class="tab active" onclick="showTab('tech')">Tech & Engineering</button>
                <button class="tab" onclick="showTab('healthcare')">Healthcare</button>
                <button class="tab" onclick="showTab('business')">Business & Finance</button>
                <button class="tab" onclick="showTab('creative')">Creative & Media</button>
            </div>

            <div id="tech" class="tab-content active">
                <div class="career-card">
                    <div class="career-header">
                        <div class="career-icon" style="background: #dbeafe;">💻</div>
                        <div class="career-title">
                            <h3>Software Engineer / Developer</h3>
                            <p>Build apps, websites, dan software solutions</p>
                        </div>
                    </div>
                    <p class="career-description">
                        Software Engineer bertanggung jawab untuk design, develop, test, dan maintain software applications. Profesi ini sangat diminati dengan salary range yang kompetitif dan work-life balance yang baik. Bisa bekerja di startup, big tech companies, atau sebagai freelancer.
                    </p>
                    <div class="career-path">
                        <h4>🎯 Career Roadmap:</h4>
                        <ul class="path-steps">
                            <li>→ Junior Developer (0-2 years): Fresh graduate, fokus belajar tech stack dan best practices</li>
                            <li>→ Mid-Level Developer (2-5 years): Handle complex features, mentor juniors</li>
                            <li>→ Senior Developer (5-8 years): Lead technical decisions, architecture design</li>
                            <li>→ Tech Lead / Engineering Manager (8+ years): Manage team, strategic planning</li>
                        </ul>
                    </div>
                    <div class="skills-list">
                        <span class="skill-tag">Programming (Python, JavaScript, Java)</span>
                        <span class="skill-tag">Database (SQL, NoSQL)</span>
                        <span class="skill-tag">Git Version Control</span>
                        <span class="skill-tag">Problem Solving</span>
                        <span class="skill-tag">Teamwork</span>
                    </div>
                    <div class="career-stats">
                        <span class="stat-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                            Rp 8jt - 50jt/bulan
                        </span>
                        <span class="stat-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>
                            Demand: Very High
                        </span>
                    </div>
                </div>

                <div class="career-card">
                    <div class="career-header">
                        <div class="career-icon" style="background: #d1fae5;">🤖</div>
                        <div class="career-title">
                            <h3>Data Scientist / AI Engineer</h3>
                            <p>Extract insights from data dan build AI models</p>
                        </div>
                    </div>
                    <p class="career-description">
                        Data Scientist analyze complex data untuk uncover patterns, build predictive models, dan drive business decisions. Combine expertise dalam statistics, programming, dan domain knowledge. Salah satu profesi paling hot di era big data!
                    </p>
                    <div class="career-path">
                        <h4>🎯 Career Roadmap:</h4>
                        <ul class="path-steps">
                            <li>→ Data Analyst (0-2 years): Data visualization, basic analytics, reporting</li>
                            <li>→ Data Scientist (2-5 years): Machine learning, predictive modeling, A/B testing</li>
                            <li>→ Senior Data Scientist (5-8 years): Complex ML projects, research</li>
                            <li>→ Chief Data Officer / Head of AI (8+ years): Data strategy, team leadership</li>
                        </ul>
                    </div>
                    <div class="skills-list">
                        <span class="skill-tag">Python / R</span>
                        <span class="skill-tag">Machine Learning</span>
                        <span class="skill-tag">Statistics</span>
                        <span class="skill-tag">SQL & Big Data</span>
                        <span class="skill-tag">Data Visualization</span>
                    </div>
                    <div class="career-stats">
                        <span class="stat-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                            Rp 12jt - 60jt/bulan
                        </span>
                        <span class="stat-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>
                            Demand: Extremely High
                        </span>
                    </div>
                </div>

                <div class="career-card">
                    <div class="career-header">
                        <div class="career-icon" style="background: #fef3c7;">📱</div>
                        <div class="career-title">
                            <h3>Product Manager</h3>
                            <p>Define product vision dan strategy</p>
                        </div>
                    </div>
                    <p class="career-description">
                        Product Manager adalah CEO of the product - responsible untuk product strategy, roadmap, dan success metrics. Bridge antara technical team, designers, dan business stakeholders. Requires strong analytical, communication, dan leadership skills.
                    </p>
                    <div class="career-path">
                        <h4>🎯 Career Roadmap:</h4>
                        <ul class="path-steps">
                            <li>→ Associate PM (0-2 years): Support senior PMs, manage small features</li>
                            <li>→ Product Manager (2-5 years): Own product areas, define roadmap</li>
                            <li>→ Senior PM (5-8 years): Lead major products, mentor junior PMs</li>
                            <li>→ VP of Product / CPO (8+ years): Company-wide product strategy</li>
                        </ul>
                    </div>
                    <div class="skills-list">
                        <span class="skill-tag">Product Strategy</span>
                        <span class="skill-tag">User Research</span>
                        <span class="skill-tag">Data Analysis</span>
                        <span class="skill-tag">Communication</span>
                        <span class="skill-tag">Leadership</span>
                    </div>
                    <div class="career-stats">
                        <span class="stat-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                            Rp 15jt - 70jt/bulan
                        </span>
                        <span class="stat-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>
                            Demand: High
                        </span>
                    </div>
                </div>

                <div class="career-card">
                    <div class="career-header">
                        <div class="career-icon" style="background: #e0e7ff;">⚙️</div>
                        <div class="career-title">
                            <h3>Mechanical Engineer</h3>
                            <p>Design dan develop mechanical systems</p>
                        </div>
                    </div>
                    <p class="career-description">
                        Mechanical Engineers design, analyze, dan manufacture mechanical systems - dari engines, machines, hingga robotics. Work di berbagai industries: automotive, aerospace, manufacturing, energy. Requires strong physics dan math foundation.
                    </p>
                    <div class="career-path">
                        <h4>🎯 Career Roadmap:</h4>
                        <ul class="path-steps">
                            <li>→ Junior Engineer (0-2 years): CAD design, testing, quality control</li>
                            <li>→ Mechanical Engineer (2-5 years): Project lead, system design</li>
                            <li>→ Senior Engineer (5-10 years): Complex projects, R&D leadership</li>
                            <li>→ Engineering Manager / Director (10+ years): Strategic planning, team management</li>
                        </ul>
                    </div>
                    <div class="skills-list">
                        <span class="skill-tag">CAD (AutoCAD, SolidWorks)</span>
                        <span class="skill-tag">Thermodynamics</span>
                        <span class="skill-tag">Materials Science</span>
                        <span class="skill-tag">Manufacturing Processes</span>
                        <span class="skill-tag">Problem Solving</span>
                    </div>
                    <div class="career-stats">
                        <span class="stat-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                            Rp 7jt - 40jt/bulan
                        </span>
                        <span class="stat-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>
                            Demand: Medium-High
                        </span>
                    </div>
                </div>
            </div>

            <div id="healthcare" class="tab-content">
                <div class="career-card">
                    <div class="career-header">
                        <div class="career-icon" style="background: #fecaca;">⚕️</div>
                        <div class="career-title">
                            <h3>Medical Doctor (Dokter)</h3>
                            <p>Diagnose dan treat patients</p>
                        </div>
                    </div>
                    <p class="career-description">
                        Dokter is one of the most respected professions. Diagnose illnesses, prescribe treatment, perform procedures, dan provide patient care. Requires 6+ years education (S1 + Profesi) dan potentially 3-5 years specialization. Highly rewarding but demanding career.
                    </p>
                    <div class="career-path">
                        <h4>🎯 Career Roadmap:</h4>
                        <ul class="path-steps">
                            <li>→ Medical Student (6 years): S1 Kedokteran (4 tahun) + Profesi (2 tahun)</li>
                            <li>→ General Practitioner: Practice medicine, consider specialization</li>
                            <li>→ Specialist (+ 3-5 years residency): Choose specialty (cardiology, pediatrics, etc)</li>
                            <li>→ Sub-Specialist / Consultant: Further specialization, academic positions</li>
                        </ul>
                    </div>
                    <div class="skills-list">
                        <span class="skill-tag">Medical Knowledge</span>
                        <span class="skill-tag">Clinical Skills</span>
                        <span class="skill-tag">Communication</span>
                        <span class="skill-tag">Empathy</span>
                        <span class="skill-tag">Critical Thinking</span>
                    </div>
                    <div class="career-stats">
                        <span class="stat-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                            Rp 10jt - 100jt+/bulan
                        </span>
                        <span class="stat-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>
                            Demand: High
                        </span>
                    </div>
                </div>

                <div class="career-card">
                    <div class="career-header">
                        <div class="career-icon" style="background: #d1fae5;">💊</div>
                        <div class="career-title">
                            <h3>Pharmacist (Apoteker)</h3>
                            <p>Medication expert dan patient counseling</p>
                        </div>
                    </div>
                    <p class="career-description">
                        Apoteker adalah medication expert - dispense prescriptions, counsel patients tentang proper drug use, manage pharmacy operations. Work di hospital pharmacies, retail, pharmaceutical industry, atau research. Requires S1 Farmasi + Profesi Apoteker.
                    </p>
                    <div class="career-path">
                        <h4>🎯 Career Roadmap:</h4>
                        <ul class="path-steps">
                            <li>→ Pharmacy Student (5 years): S1 Farmasi + Profesi Apoteker</li>
                            <li>→ Staff Pharmacist: Practice pharmacy, patient counseling</li>
                            <li>→ Senior Pharmacist: Specialize (clinical, industrial, research)</li>
                            <li>→ Pharmacy Manager / Director: Leadership, strategic management</li>
                        </ul>
                    </div>
                    <div class="skills-list">
                        <span class="skill-tag">Pharmacology</span>
                        <span class="skill-tag">Patient Counseling</span>
                        <span class="skill-tag">Attention to Detail</span>
                        <span class="skill-tag">Pharmaceutical Care</span>
                        <span class="skill-tag">Regulatory Knowledge</span>
                    </div>
                    <div class="career-stats">
                        <span class="stat-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                            Rp 5jt - 25jt/bulan
                        </span>
                        <span class="stat-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>
                            Demand: Medium-High
                        </span>
                    </div>
                </div>

                <div class="career-card">
                    <div class="career-header">
                        <div class="career-icon" style="background: #fef3c7;">🧬</div>
                        <div class="career-title">
                            <h3>Biomedical Engineer</h3>
                            <p>Develop medical devices dan healthcare technology</p>
                        </div>
                    </div>
                    <p class="career-description">
                        Biomedical Engineers combine engineering principles dengan medical sciences untuk develop healthcare technology - medical devices, diagnostic equipment, prosthetics, etc. Exciting field at intersection of technology dan healthcare!
                    </p>
                    <div class="career-path">
                        <h4>🎯 Career Roadmap:</h4>
                        <ul class="path-steps">
                            <li>→ Junior Engineer (0-2 years): Device testing, quality assurance, R&D support</li>
                            <li>→ Biomedical Engineer (2-5 years): Device design, clinical trials</li>
                            <li>→ Senior Engineer (5-10 years): Lead projects, regulatory approval</li>
                            <li>→ Principal Engineer / Director (10+ years): Innovation strategy, IP management</li>
                        </ul>
                    </div>
                    <div class="skills-list">
                        <span class="skill-tag">Biomedical Devices</span>
                        <span class="skill-tag">CAD/CAM</span>
                        <span class="skill-tag">Biology & Physiology</span>
                        <span class="skill-tag">Signal Processing</span>
                        <span class="skill-tag">Regulatory Standards</span>
                    </div>
                    <div class="career-stats">
                        <span class="stat-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                            Rp 8jt - 35jt/bulan
                        </span>
                        <span class="stat-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>
                            Demand: Medium
                        </span>
                    </div>
                </div>

                <div class="career-card">
                    <div class="career-header">
                        <div class="career-icon" style="background: #fce7f3;">🧠</div>
                        <div class="career-title">
                            <h3>Clinical Psychologist (Psikolog Klinis)</h3>
                            <p>Mental health assessment dan therapy</p>
                        </div>
                    </div>
                    <p class="career-description">
                        Psikolog Klinis assess dan treat mental health disorders melalui therapy dan counseling. Help people cope dengan stress, trauma, anxiety, depression, dan various psychological issues. Requires S1 Psikologi + S2 Profesi Psikolog (total 6 years).
                    </p>
                    <div class="career-path">
                        <h4>🎯 Career Roadmap:</h4>
                        <ul class="path-steps">
                            <li>→ Psychology Student (6 years): S1 (4 tahun) + S2 Profesi (2 tahun)</li>
                            <li>→ Junior Psychologist: Supervised practice, assessment, therapy</li>
                            <li>→ Clinical Psychologist: Independent practice, specialization</li>
                            <li>→ Senior Psychologist: Own practice, supervision, training</li>
                        </ul>
                    </div>
                    <div class="skills-list">
                        <span class="skill-tag">Psychological Assessment</span>
                        <span class="skill-tag">Therapy Techniques</span>
                        <span class="skill-tag">Active Listening</span>
                        <span class="skill-tag">Empathy</span>
                        <span class="skill-tag">Ethics</span>
                    </div>
                    <div class="career-stats">
                        <span class="stat-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                            Rp 5jt - 30jt/bulan
                        </span>
                        <span class="stat-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>
                            Demand: Medium-High
                        </span>
                    </div>
                </div>
            </div>

            <div id="business" class="tab-content">
                <div class="career-card">
                    <div class="career-header">
                        <div class="career-icon" style="background: #dbeafe;">📊</div>
                        <div class="career-title">
                            <h3>Management Consultant</h3>
                            <p>Solve business problems untuk clients</p>
                        </div>
                    </div>
                    <p class="career-description">
                        Management Consultants help organizations solve complex business problems, improve performance, dan implement strategies. Work dengan diverse clients across industries. Prestigious career dengan excellent learning opportunities dan high compensation. Top firms: McKinsey, BCG, Bain.
                    </p>
                    <div class="career-path">
                        <h4>🎯 Career Roadmap:</h4>
                        <ul class="path-steps">
                            <li>→ Business Analyst (0-2 years): Research, analysis, presentation</li>
                            <li>→ Consultant / Associate (2-4 years): Client management, project leadership</li>
                            <li>→ Manager / Senior Consultant (4-6 years): Manage teams, client relationships</li>
                            <li>→ Partner / Director (8+ years): Business development, firm strategy</li>
                        </ul>
                    </div>
                    <div class="skills-list">
                        <span class="skill-tag">Problem Solving</span>
                        <span class="skill-tag">Business Analysis</span>
                        <span class="skill-tag">Presentation</span>
                        <span class="skill-tag">Excel & PowerPoint</span>
                        <span class="skill-tag">Strategic Thinking</span>
                    </div>
                    <div class="career-stats">
                        <span class="stat-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                            Rp 15jt - 100jt+/bulan
                        </span>
                        <span class="stat-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>
                            Demand: High
                        </span>
                    </div>
                </div>

                <div class="career-card">
                    <div class="career-header">
                        <div class="career-icon" style="background: #d1fae5;">💰</div>
                        <div class="career-title">
                            <h3>Investment Banker</h3>
                            <p>Corporate finance, M&A, capital raising</p>
                        </div>
                    </div>
                    <p class="career-description">
                        Investment Bankers help companies raise capital, execute mergers & acquisitions, dan provide financial advisory. High-pressure, high-reward career. Long hours but excellent compensation dan exit opportunities. Top firms: Goldman Sachs, JP Morgan, Morgan Stanley.
                    </p>
                    <div class="career-path">
                        <h4>🎯 Career Roadmap:</h4>
                        <ul class="path-steps">
                            <li>→ Analyst (0-3 years): Financial modeling, pitch books, due diligence</li>
                            <li>→ Associate (3-5 years): Client interaction, deal execution</li>
                            <li>→ Vice President (5-8 years): Lead deals, manage teams</li>
                            <li>→ Managing Director (10+ years): Business development, client relationships</li>
                        </ul>
                    </div>
                    <div class="skills-list">
                        <span class="skill-tag">Financial Modeling</span>
                        <span class="skill-tag">Valuation</span>
                        <span class="skill-tag">Excel & PowerPoint</span>
                        <span class="skill-tag">Attention to Detail</span>
                        <span class="skill-tag">Work Ethic</span>
                    </div>
                    <div class="career-stats">
                        <span class="stat-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                            Rp 20jt - 150jt+/bulan
                        </span>
                        <span class="stat-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>
                            Demand: Medium
                        </span>
                    </div>
                </div>

                <div class="career-card">
                    <div class="career-header">
                        <div class="career-icon" style="background: #fef3c7;">📈</div>
                        <div class="career-title">
                            <h3>Financial Analyst</h3>
                            <p>Analyze financial data untuk investment decisions</p>
                        </div>
                    </div>
                    <p class="career-description">
                        Financial Analysts evaluate investment opportunities, create financial models, dan provide recommendations. Work di investment firms, banks, corporations, atau as independent analyst. CFA (Chartered Financial Analyst) is highly valued certification.
                    </p>
                    <div class="career-path">
                        <h4>🎯 Career Roadmap:</h4>
                        <ul class="path-steps">
                            <li>→ Junior Analyst (0-2 years): Data gathering, basic modeling, reporting</li>
                            <li>→ Financial Analyst (2-5 years): Investment research, recommendations</li>
                            <li>→ Senior Analyst (5-8 years): Portfolio management, client advisory</li>
                            <li>→ Portfolio Manager / Director (8+ years): Strategic investment decisions</li>
                        </ul>
                    </div>
                    <div class="skills-list">
                        <span class="skill-tag">Financial Analysis</span>
                        <span class="skill-tag">Excel & Bloomberg</span>
                        <span class="skill-tag">Economics</span>
                        <span class="skill-tag">Report Writing</span>
                        <span class="skill-tag">CFA</span>
                    </div>
                    <div class="career-stats">
                        <span class="stat-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                            Rp 8jt - 50jt/bulan
                        </span>
                        <span class="stat-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>
                            Demand: Medium-High
                        </span>
                    </div>
                </div>

                <div class="career-card">
                    <div class="career-header">
                        <div class="career-icon" style="background: #fce7f3;">🚀</div>
                        <div class="career-title">
                            <h3>Entrepreneur / Startup Founder</h3>
                            <p>Build your own business</p>
                        </div>
                    </div>
                    <p class="career-description">
                        Entrepreneurs identify opportunities, build businesses, dan create value. High risk, high reward. Requires vision, persistence, resilience. Can start while still in college atau after gaining industry experience. Ecosystem Indonesia semakin supportive dengan banyak accelerators dan VCs.
                    </p>
                    <div class="career-path">
                        <h4>🎯 Startup Journey:</h4>
                        <ul class="path-steps">
                            <li>→ Ideation: Identify problem, validate market need, build MVP</li>
                            <li>→ Pre-Seed / Seed Stage: Fundraise, build team, product-market fit</li>
                            <li>→ Growth Stage: Scale operations, expand market, Series A/B funding</li>
                            <li>→ Mature Stage: IPO, acquisition, atau sustainable profitability</li>
                        </ul>
                    </div>
                    <div class="skills-list">
                        <span class="skill-tag">Vision & Strategy</span>
                        <span class="skill-tag">Leadership</span>
                        <span class="skill-tag">Sales & Marketing</span>
                        <span class="skill-tag">Fundraising</span>
                        <span class="skill-tag">Resilience</span>
                    </div>
                    <div class="career-stats">
                        <span class="stat-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                            Variable (0 - Unlimited)
                        </span>
                        <span class="stat-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>
                            Demand: Self-Created
                        </span>
                    </div>
                </div>
            </div>

            <div id="creative" class="tab-content">
                <div class="career-card">
                    <div class="career-header">
                        <div class="career-icon" style="background: #dbeafe;">🎨</div>
                        <div class="career-title">
                            <h3>UI/UX Designer</h3>
                            <p>Design user-friendly digital experiences</p>
                        </div>
                    </div>
                    <p class="career-description">
                        UI/UX Designers create intuitive, beautiful, dan functional digital products. Combine creativity dengan user psychology dan business goals. High demand di tech companies, agencies, atau freelance. Portfolio is king!
                    </p>
                    <div class="career-path">
                        <h4>🎯 Career Roadmap:</h4>
                        <ul class="path-steps">
                            <li>→ Junior Designer (0-2 years): UI design, prototyping, design systems</li>
                            <li>→ UX Designer (2-5 years): User research, interaction design, testing</li>
                            <li>→ Senior Designer (5-8 years): Lead projects, mentor juniors</li>
                            <li>→ Design Lead / Director (8+ years): Design strategy, team management</li>
                        </ul>
                    </div>
                    <div class="skills-list">
                        <span class="skill-tag">Figma / Sketch</span>
                        <span class="skill-tag">User Research</span>
                        <span class="skill-tag">Prototyping</span>
                        <span class="skill-tag">Visual Design</span>
                        <span class="skill-tag">Empathy</span>
                    </div>
                    <div class="career-stats">
                        <span class="stat-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                            Rp 7jt - 45jt/bulan
                        </span>
                        <span class="stat-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>
                            Demand: Very High
                        </span>
                    </div>
                </div>

                <div class="career-card">
                    <div class="career-header">
                        <div class="career-icon" style="background: #d1fae5;">✍️</div>
                        <div class="career-title">
                            <h3>Content Creator / Influencer</h3>
                            <p>Create engaging content untuk audience</p>
                        </div>
                    </div>
                    <p class="career-description">
                        Content Creators produce valuable, entertaining, atau educational content di platforms seperti YouTube, Instagram, TikTok, blogs. Monetize through ads, sponsorships, merchandise, courses. Requires consistency, creativity, dan understanding your audience.
                    </p>
                    <div class="career-path">
                        <h4>🎯 Growth Journey:</h4>
                        <ul class="path-steps">
                            <li>→ Starting Out (0-1K followers): Find niche, create content, learn platforms</li>
                            <li>→ Growing (1K-10K): Consistent posting, engage audience, first sponsors</li>
                            <li>→ Established (10K-100K): Diverse revenue streams, brand partnerships</li>
                            <li>→ Influencer (100K+): Media company, product lines, investments</li>
                        </ul>
                    </div>
                    <div class="skills-list">
                        <span class="skill-tag">Content Creation</span>
                        <span class="skill-tag">Video Editing</span>
                        <span class="skill-tag">Personal Branding</span>
                        <span class="skill-tag">Social Media</span>
                        <span class="skill-tag">Consistency</span>
                    </div>
                    <div class="career-stats">
                        <span class="stat-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                            Variable (0 - Billions IDR)
                        </span>
                        <span class="stat-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>
                            Demand: Very High
                        </span>
                    </div>
                </div>

                <div class="career-card">
                    <div class="career-header">
                        <div class="career-icon" style="background: #fef3c7;">🎬</div>
                        <div class="career-title">
                            <h3>Videographer / Video Editor</h3>
                            <p>Create professional video content</p>
                        </div>
                    </div>
                    <p class="career-description">
                        Videographers dan editors create video content untuk brands, events, films, atau social media. Combines technical skills dengan artistic vision. Work as freelancer, join production house, atau in-house di companies. Platforms seperti YouTube, TikTok membuat video content semakin essential.
                    </p>
                    <div class="career-path">
                        <h4>🎯 Career Roadmap:</h4>
                        <ul class="path-steps">
                            <li>→ Junior Editor (0-2 years): Basic editing, color grading, audio</li>
                            <li>→ Videographer (2-5 years): Shooting, storytelling, client work</li>
                            <li>→ Senior Videographer (5-8 years): Creative direction, complex projects</li>
                            <li>→ Director / Creative Director (8+ years): Production company, film director</li>
                        </ul>
                    </div>
                    <div class="skills-list">
                        <span class="skill-tag">Premiere Pro</span>
                        <span class="skill-tag">After Effects</span>
                        <span class="skill-tag">Cinematography</span>
                        <span class="skill-tag">Storytelling</span>
                        <span class="skill-tag">Color Grading</span>
                    </div>
                    <div class="career-stats">
                        <span class="stat-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                            Rp 5jt - 35jt/bulan
                        </span>
                        <span class="stat-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>
                            Demand: High
                        </span>
                    </div>
                </div>

                <div class="career-card">
                    <div class="career-header">
                        <div class="career-icon" style="background: #fce7f3;">📐</div>
                        <div class="career-title">
                            <h3>Architect (Arsitek)</h3>
                            <p>Design buildings dan spaces</p>
                        </div>
                    </div>
                    <p class="career-description">
                        Architects design buildings, houses, dan other structures. Combine aesthetic vision dengan technical knowledge dan sustainability considerations. Requires S1 Arsitektur (4 years) + Profesi Arsitek (1-2 years). Registration dengan IAI (Ikatan Arsitek Indonesia).
                    </p>
                    <div class="career-path">
                        <h4>🎯 Career Roadmap:</h4>
                        <ul class="path-steps">
                            <li>→ Architecture Student (5-6 years): Design studio, theory, technical drawing</li>
                            <li>→ Junior Architect: Work under senior architect, develop skills</li>
                            <li>→ Registered Architect: Independent practice, lead projects</li>
                            <li>→ Principal Architect: Own firm, major projects, awards</li>
                        </ul>
                    </div>
                    <div class="skills-list">
                        <span class="skill-tag">AutoCAD / SketchUp</span>
                        <span class="skill-tag">3D Modeling</span>
                        <span class="skill-tag">Design Thinking</span>
                        <span class="skill-tag">Building Codes</span>
                        <span class="skill-tag">Sustainability</span>
                    </div>
                    <div class="career-stats">
                        <span class="stat-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                            Rp 6jt - 40jt/bulan
                        </span>
                        <span class="stat-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>
                            Demand: Medium
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
