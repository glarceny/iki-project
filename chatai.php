<?php
$whatsapp_link = 'https://chat.whatsapp.com/YOUR_ACTUAL_GROUP_LINK_HERE';

// Handle AI chat requests
$response_message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_message'])) {
    $user_message = htmlspecialchars(trim($_POST['user_message']), ENT_QUOTES, 'UTF-8');
    
    $api_key = getenv('OPENAI_API_KEY');
    if (!$api_key) {
        $response_message = json_encode(['error' => 'API Key belum diset. Silakan hubungi admin untuk setup OPENAI_API_KEY.']);
    } else {
        $data = [
            'model' => 'gpt-4o-mini',
            'messages' => [
                ['role' => 'system', 'content' => 'Kamu adalah asisten AI untuk Indonesian Knowledge Institute (IKI), komunitas pelajar Indonesia. Bantu anggota dengan pertanyaan akademik, tips belajar, dan motivasi. Gunakan bahasa Indonesia yang ramah dan mudah dipahami.'],
                ['role' => 'user', 'content' => $user_message]
            ],
            'max_tokens' => 500
        ];
        
        $ch = curl_init('https://api.openai.com/v1/chat/completions');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $api_key
        ]);
        
        $result = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($http_code === 200) {
            $response_message = $result;
        } else {
            $response_message = json_encode(['error' => 'Terjadi kesalahan saat menghubungi AI. Kode: ' . $http_code]);
        }
    }
    
    header('Content-Type: application/json');
    echo $response_message;
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <title>Chat AI - IKI Assistant</title>
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
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%); 
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
        .container { padding: 1rem; max-width: 100%; margin-bottom: 4rem; }
        .chat-container { 
            background: #fff; 
            border-radius: 12px; 
            box-shadow: 0 2px 8px rgba(0,0,0,0.08); 
            margin-top: -2rem;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }
        .chat-messages { 
            height: 400px; 
            overflow-y: auto; 
            padding: 1rem; 
            border-bottom: 1px solid #e5e7eb;
        }
        .message { 
            margin-bottom: 1rem; 
            display: flex; 
            gap: 0.75rem;
        }
        .message.user { flex-direction: row-reverse; }
        .message-avatar { 
            width: 36px; 
            height: 36px; 
            border-radius: 50%; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            font-weight: 800; 
            font-size: 0.875rem;
            flex-shrink: 0;
        }
        .message.ai .message-avatar { background: #dbeafe; color: #2563eb; }
        .message.user .message-avatar { background: #d1fae5; color: #10b981; }
        .message-content { 
            background: #f3f4f6; 
            padding: 0.75rem 1rem; 
            border-radius: 12px; 
            max-width: 75%;
            font-size: 0.875rem;
            line-height: 1.5;
        }
        .message.user .message-content { background: #dbeafe; }
        .message-time { 
            font-size: 0.7rem; 
            color: #9ca3af; 
            margin-top: 0.25rem;
        }
        .chat-input-area { 
            padding: 1rem; 
            display: flex; 
            gap: 0.75rem;
        }
        .chat-input { 
            flex: 1; 
            padding: 0.75rem 1rem; 
            border: 2px solid #e5e7eb; 
            border-radius: 8px; 
            font-family: 'Inter', sans-serif; 
            font-size: 0.875rem;
            outline: none;
        }
        .chat-input:focus { border-color: #6366f1; }
        .send-btn { 
            padding: 0.75rem 1.5rem; 
            background: #6366f1; 
            color: #fff; 
            border: none; 
            border-radius: 8px; 
            font-weight: 700; 
            font-size: 0.875rem; 
            cursor: pointer;
            transition: 0.2s;
        }
        .send-btn:hover { background: #4f46e5; }
        .send-btn:disabled { background: #9ca3af; cursor: not-allowed; }
        .welcome-message { 
            text-align: center; 
            padding: 2rem; 
            color: #6b7280;
        }
        .welcome-message svg { 
            width: 64px; 
            height: 64px; 
            margin-bottom: 1rem; 
            opacity: 0.5;
        }
        .loading { 
            display: none; 
            text-align: center; 
            padding: 1rem; 
            color: #6b7280;
        }
        .loading.active { display: block; }
        .features-grid { 
            display: grid; 
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr)); 
            gap: 0.75rem; 
            margin-top: 1.5rem;
        }
        .feature-card { 
            background: #fff; 
            border-radius: 8px; 
            padding: 1rem; 
            text-align: center; 
            border: 1px solid #e5e7eb;
        }
        .feature-icon { 
            width: 40px; 
            height: 40px; 
            margin: 0 auto 0.5rem; 
            background: #eff6ff; 
            border-radius: 50%; 
            display: flex; 
            align-items: center; 
            justify-content: center;
        }
        .feature-title { 
            font-size: 0.8rem; 
            font-weight: 700; 
            color: #1f2937;
        }
        @media (min-width: 640px) {
            .hero h1 { font-size: 2rem; }
            .container { padding: 1.5rem; }
            .chat-messages { height: 500px; }
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
            <a href="chatai.php" class="active"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg> Chat AI</a>
            <a href="materials.php"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg> Materi Belajar</a>
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
                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                </svg>
                ASISTEN AI UNTUK PELAJAR
            </div>
            <h1>IKI Chat AI Assistant</h1>
            <p>Tanya apa saja tentang akademik, tips belajar, atau motivasi. AI kami siap membantu!</p>
        </div>

        <div class="container">
            <div class="chat-container">
                <div class="chat-messages" id="chatMessages">
                    <div class="welcome-message" id="welcomeMessage">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                        <h3 style="font-size: 1rem; margin-bottom: 0.5rem; color: #1f2937;">Halo! Saya IKI AI Assistant</h3>
                        <p style="font-size: 0.875rem;">Silakan kirim pesan untuk memulai percakapan. Saya bisa membantu dengan pertanyaan akademik, tips belajar, motivasi, dan lainnya!</p>
                    </div>
                    <div class="loading" id="loading">
                        <p>🤖 AI sedang mengetik...</p>
                    </div>
                </div>
                <div class="chat-input-area">
                    <input type="text" class="chat-input" id="chatInput" placeholder="Ketik pertanyaan Anda..." autocomplete="off">
                    <button class="send-btn" id="sendBtn">Kirim</button>
                </div>
            </div>

            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg width="20" height="20" fill="none" stroke="#2563eb" stroke-width="2" viewBox="0 0 24 24"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path></svg>
                    </div>
                    <div class="feature-title">Bantuan Akademik</div>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg width="20" height="20" fill="none" stroke="#2563eb" stroke-width="2" viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path></svg>
                    </div>
                    <div class="feature-title">Tips Belajar</div>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg width="20" height="20" fill="none" stroke="#2563eb" stroke-width="2" viewBox="0 0 24 24"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                    </div>
                    <div class="feature-title">Motivasi</div>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg width="20" height="20" fill="none" stroke="#2563eb" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path></svg>
                    </div>
                    <div class="feature-title">24/7 Tersedia</div>
                </div>
            </div>
        </div>
    </main>

    <script>
        const hamburger = document.getElementById('hamburger');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const chatMessages = document.getElementById('chatMessages');
        const chatInput = document.getElementById('chatInput');
        const sendBtn = document.getElementById('sendBtn');
        const welcomeMessage = document.getElementById('welcomeMessage');
        const loading = document.getElementById('loading');

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

        function addMessage(content, isUser = false) {
            welcomeMessage.style.display = 'none';
            const messageDiv = document.createElement('div');
            messageDiv.className = 'message ' + (isUser ? 'user' : 'ai');
            
            const avatar = document.createElement('div');
            avatar.className = 'message-avatar';
            avatar.textContent = isUser ? 'U' : 'AI';
            
            const contentDiv = document.createElement('div');
            const messageContent = document.createElement('div');
            messageContent.className = 'message-content';
            messageContent.textContent = content;
            
            const time = document.createElement('div');
            time.className = 'message-time';
            const now = new Date();
            time.textContent = now.getHours().toString().padStart(2, '0') + ':' + now.getMinutes().toString().padStart(2, '0');
            
            contentDiv.appendChild(messageContent);
            contentDiv.appendChild(time);
            
            messageDiv.appendChild(avatar);
            messageDiv.appendChild(contentDiv);
            
            chatMessages.insertBefore(messageDiv, loading);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        async function sendMessage() {
            const message = chatInput.value.trim();
            if (!message) return;
            
            addMessage(message, true);
            chatInput.value = '';
            sendBtn.disabled = true;
            loading.classList.add('active');
            
            try {
                const response = await fetch('chatai.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: 'user_message=' + encodeURIComponent(message)
                });
                
                const data = await response.json();
                
                loading.classList.remove('active');
                
                if (data.error) {
                    addMessage('⚠️ ' + data.error, false);
                } else if (data.choices && data.choices[0]) {
                    addMessage(data.choices[0].message.content, false);
                } else {
                    addMessage('Maaf, terjadi kesalahan. Silakan coba lagi.', false);
                }
            } catch (error) {
                loading.classList.remove('active');
                addMessage('⚠️ Tidak dapat terhubung ke server. Pastikan Anda memiliki koneksi internet.', false);
            }
            
            sendBtn.disabled = false;
            chatInput.focus();
        }

        sendBtn.addEventListener('click', sendMessage);
        chatInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') sendMessage();
        });
    </script>
</body>
</html>
