<?php
$whatsapp_link = 'https://chat.whatsapp.com/IqaxunRrj9lKtlCtmrv8vV';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <title>Indonesian Knowledge Institute (IKI)</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: 'Inter', sans-serif; 
            background: #fff; 
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
            right: -280px; 
            width: 280px; 
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
            transition: 0.2s;
        }
        .nav-links a:hover, .nav-links a.active { background: #eff6ff; color: #2563eb; }
        .nav-links svg { width: 20px; height: 20px; flex-shrink: 0; }
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
        .hero-stats { 
            display: flex; 
            justify-content: center; 
            gap: 1.5rem; 
            margin: 1.5rem 0;
            flex-wrap: wrap;
        }
        .stat { text-align: center; }
        .stat .num { font-size: 1.75rem; font-weight: 800; display: block; }
        .stat .label { font-size: 0.75rem; opacity: 0.9; }
        .btn-group { display: flex; gap: 0.75rem; justify-content: center; flex-wrap: wrap; }
        .btn { 
            display: inline-flex; 
            align-items: center; 
            gap: 0.5rem; 
            padding: 0.75rem 1.25rem; 
            border-radius: 8px; 
            text-decoration: none; 
            font-weight: 700; 
            font-size: 0.875rem; 
            transition: 0.2s;
            border: none;
            cursor: pointer;
        }
        .btn-primary { background: #fff; color: #2563eb; }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(0,0,0,0.15); }
        .btn-secondary { background: transparent; color: #fff; border: 2px solid #fff; }
        .btn-secondary:hover { background: #fff; color: #2563eb; }
        .btn-whatsapp { background: #10b981; color: #fff; }
        .btn-whatsapp:hover { background: #059669; transform: translateY(-2px); }
        .btn svg { width: 18px; height: 18px; }
        .container { padding: 1rem; max-width: 100%; }
        .section-title { font-size: 1.25rem; font-weight: 800; margin-bottom: 0.5rem; text-align: center; color: #111827; }
        .section-subtitle { font-size: 0.875rem; color: #6b7280; text-align: center; margin-bottom: 1rem; }
        .cards { 
            display: grid; 
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr)); 
            gap: 0.75rem; 
            margin-bottom: 1.5rem;
        }
        .card { 
            background: #fff; 
            border-radius: 12px; 
            padding: 1rem; 
            box-shadow: 0 2px 8px rgba(0,0,0,0.08); 
            border: 1px solid #e5e7eb; 
            cursor: pointer; 
            transition: 0.2s;
            min-height: 120px;
        }
        .card:active { transform: scale(0.98); }
        .card:hover { border-color: #2563eb; box-shadow: 0 4px 12px rgba(37,99,235,0.15); }
        .card-icon { 
            width: 36px; 
            height: 36px; 
            border-radius: 8px; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            margin-bottom: 0.75rem;
        }
        .card-icon.blue { background: #dbeafe; color: #2563eb; }
        .card-icon.green { background: #d1fae5; color: #10b981; }
        .card-icon svg { width: 20px; height: 20px; }
        .card-title { font-size: 0.875rem; font-weight: 800; margin-bottom: 0.5rem; color: #111827; }
        .card-desc { font-size: 0.75rem; color: #6b7280; line-height: 1.4; }
        .modal { 
            display: none; 
            position: fixed; 
            top: 0; 
            left: 0; 
            width: 100%; 
            height: 100%; 
            background: rgba(0,0,0,0.6); 
            z-index: 1000; 
            overflow-y: auto;
            padding: 1rem;
        }
        .modal.active { display: flex; align-items: flex-start; justify-content: center; padding-top: 2rem; }
        .modal-content { 
            background: #fff; 
            border-radius: 12px; 
            width: 100%; 
            max-width: 500px; 
            max-height: 80vh; 
            overflow-y: auto;
            animation: slideUp 0.3s;
        }
        @keyframes slideUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
        .modal-header { 
            padding: 1rem; 
            border-bottom: 1px solid #e5e7eb; 
            display: flex; 
            justify-content: space-between; 
            align-items: center;
            position: sticky;
            top: 0;
            background: #fff;
            z-index: 10;
        }
        .modal-title { font-size: 1.125rem; font-weight: 800; color: #111827; }
        .modal-close { 
            background: #f3f4f6; 
            border: none; 
            width: 32px; 
            height: 32px; 
            border-radius: 6px; 
            cursor: pointer; 
            display: flex; 
            align-items: center; 
            justify-content: center;
        }
        .modal-body { padding: 1rem; }
        .modal-body h3 { font-size: 1rem; font-weight: 700; margin: 1rem 0 0.5rem; color: #1f2937; }
        .modal-body p { font-size: 0.875rem; color: #4b5563; margin-bottom: 0.75rem; line-height: 1.6; }
        .modal-body ul, .modal-body ol { margin-left: 1.25rem; margin-bottom: 0.75rem; }
        .modal-body li { font-size: 0.875rem; color: #4b5563; margin-bottom: 0.5rem; line-height: 1.5; }
        .footer { 
            background: #111827; 
            color: #fff; 
            padding: 2rem 1rem 1rem; 
            margin-top: 2rem;
        }
        .footer h3 { font-size: 1rem; font-weight: 800; margin-bottom: 0.75rem; }
        .footer p { font-size: 0.8rem; color: #d1d5db; line-height: 1.6; margin-bottom: 1rem; }
        .footer-links { list-style: none; margin-bottom: 1rem; }
        .footer-links a { color: #d1d5db; text-decoration: none; font-size: 0.85rem; display: block; margin-bottom: 0.5rem; }
        .footer-links a:hover { color: #2563eb; }
        .footer-bottom { text-align: center; padding-top: 1rem; border-top: 1px solid #374151; color: #9ca3af; font-size: 0.75rem; }
        @media (min-width: 640px) {
            .hero h1 { font-size: 2rem; }
            .section-title { font-size: 1.5rem; }
            .cards { grid-template-columns: repeat(auto-fit, minmax(160px, 1fr)); }
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
            <a href="studygroups.php" class="active">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                </svg>
                Dashboard
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
        <div class="hero">
            <div class="hero-badge">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M12 2L2 7l10 5 10-5-10-5z"></path>
                </svg>
                KOMUNITAS PELAJAR INDONESIA
            </div>
            <h1>Indonesian Knowledge Institute</h1>
            <p>Tempat berkumpulnya pelajar dari berbagai daerah untuk saling belajar, berbagi ilmu, dan mendukung satu sama lain.</p>
            <div class="hero-stats">
                <div class="stat"><span class="num">315+</span><span class="label">Anggota</span></div>
                <div class="stat"><span class="num">24/7</span><span class="label">Diskusi</span></div>
                <div class="stat"><span class="num">100%</span><span class="label">Gratis</span></div>
            </div>
            <div class="btn-group">
                <a href="#" class="btn btn-whatsapp" id="joinBtn">
                    <svg fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                    Gabung Grup
                </a>
                <a href="about.php" class="btn btn-secondary">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="16" x2="12" y2="12"></line>
                    </svg>
                    Info Lengkap
                </a>
            </div>
        </div>

        <div class="container">
            <h2 class="section-title">Informasi Lengkap</h2>
            <p class="section-subtitle">Klik untuk lihat detail</p>
            <div class="cards">
                <div class="card" data-modal="visi">
                    <div class="card-icon blue">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </div>
                    <div class="card-title">Visi Kami</div>
                    <div class="card-desc">Komunitas positif & bermanfaat</div>
                </div>
                <div class="card" data-modal="misi">
                    <div class="card-icon green">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                    </div>
                    <div class="card-title">Misi Kami</div>
                    <div class="card-desc">Membantu pelajar berkembang</div>
                </div>
                <div class="card" data-modal="tujuan">
                    <div class="card-icon blue">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                    </div>
                    <div class="card-title">Tujuan Grup</div>
                    <div class="card-desc">Kualitas belajar meningkat</div>
                </div>
                <div class="card" data-modal="aturan">
                    <div class="card-icon green">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                        </svg>
                    </div>
                    <div class="card-title">Aturan Grup</div>
                    <div class="card-desc">Bahasa sopan & santun</div>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer">
        <h3>Indonesian Knowledge Institute</h3>
        <p>Komunitas Pelajar Indonesia yang positif, aktif, disiplin, dan bermanfaat dalam bidang pendidikan serta pengembangan diri.</p>
        <ul class="footer-links">
            <li><a href="about.php">Tentang Kami</a></li>
            <li><a href="rules.php">Aturan Lengkap</a></li>
            <li><a href="faq.php">FAQ</a></li>
            <li><a href="admin.php">Cara Jadi Admin</a></li>
        </ul>
        <a href="#" class="btn btn-whatsapp" style="width: 100%;" id="footerJoinBtn">
            <svg fill="currentColor" viewBox="0 0 24 24">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
            </svg>
            Gabung Grup WhatsApp
        </a>
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> Indonesian Knowledge Institute (IKI)</p>
        </div>
    </footer>

    <!-- Modals -->
    <div class="modal" id="visi">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Visi IKI</h2>
                <button class="modal-close" onclick="closeModal('visi')">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Menjadi komunitas pelajar yang positif, aktif, disiplin, dan bermanfaat</strong> dalam bidang pendidikan serta pengembangan diri.</p>
                <h3>Penjelasan:</h3>
                <ul>
                    <li><strong>Positif:</strong> Menciptakan lingkungan yang mendukung dan memotivasi</li>
                    <li><strong>Aktif:</strong> Mendorong partisipasi dalam diskusi dan pembelajaran</li>
                    <li><strong>Disiplin:</strong> Menerapkan aturan yang jelas dan konsisten</li>
                    <li><strong>Bermanfaat:</strong> Memberikan nilai tambah nyata bagi anggota</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="modal" id="misi">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Misi IKI</h2>
                <button class="modal-close" onclick="closeModal('misi')">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <ol>
                    <li><strong>Membantu pelajar memahami materi</strong> melalui diskusi bersama</li>
                    <li><strong>Berbagi informasi</strong> seputar sekolah, kampus, dan pendidikan</li>
                    <li><strong>Menumbuhkan kolaborasi</strong> dan rasa saling menghargai</li>
                    <li><strong>Menjadi tempat berbagi motivasi</strong> dan inspirasi</li>
                    <li><strong>Mengembangkan soft skills</strong> seperti public speaking dan teamwork</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="modal" id="tujuan">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Tujuan Grup</h2>
                <button class="modal-close" onclick="closeModal('tujuan')">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <ul>
                    <li><strong>Meningkatkan kualitas belajar</strong> melalui diskusi berkualitas</li>
                    <li><strong>Memperluas wawasan</strong> dengan perspektif beragam</li>
                    <li><strong>Menjalin pertemanan sehat</strong> antar pelajar</li>
                    <li><strong>Membiasakan budaya bertanya</strong> dan berdiskusi dengan baik</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="modal" id="aturan">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Aturan Grup</h2>
                <button class="modal-close" onclick="closeModal('aturan')">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <ol>
                    <li><strong>Gunakan bahasa sopan dan santun</strong></li>
                    <li><strong>Tidak SARA atau bullying</strong></li>
                    <li><strong>Konten relevan dengan pendidikan</strong></li>
                    <li><strong>Tidak spam atau promosi tanpa izin</strong></li>
                    <li><strong>Hormati semua anggota</strong></li>
                </ol>
                <p style="margin-top:1rem;"><a href="rules.php" class="btn btn-primary" style="width:100%;justify-content:center;">Lihat Aturan Lengkap</a></p>
            </div>
        </div>
    </div>

    <script>
        const hamburger = document.getElementById('hamburger');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const joinBtn = document.getElementById('joinBtn');
        const footerJoinBtn = document.getElementById('footerJoinBtn');
        const whatsappLink = '<?php echo $whatsapp_link; ?>';

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

        document.querySelectorAll('.card').forEach(card => {
            card.addEventListener('click', () => {
                const modalId = card.getAttribute('data-modal');
                document.getElementById(modalId).classList.add('active');
                document.body.style.overflow = 'hidden';
            });
        });

        function closeModal(id) {
            document.getElementById(id).classList.remove('active');
            document.body.style.overflow = '';
        }

        document.querySelectorAll('.modal').forEach(modal => {
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    modal.classList.remove('active');
                    document.body.style.overflow = '';
                }
            });
        });

        joinBtn.addEventListener('click', (e) => {
            e.preventDefault();
            window.open(whatsappLink, '_blank');
        });

        footerJoinBtn.addEventListener('click', (e) => {
            e.preventDefault();
            window.open(whatsappLink, '_blank');
        });

        let touchStartY = 0;
        document.addEventListener('touchstart', (e) => {
            touchStartY = e.touches[0].clientY;
        }, { passive: true });

        document.addEventListener('touchmove', (e) => {
            const touchEndY = e.touches[0].clientY;
            const sidebar = document.getElementById('sidebar');
            if (sidebar.classList.contains('active') && touchEndY < touchStartY - 50) {
                sidebar.classList.remove('active');
                overlay.classList.remove('active');
                hamburger.classList.remove('active');
            }
        }, { passive: true });
    </script>
</body>
</html>
