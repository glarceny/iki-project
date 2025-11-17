<?php  
$whatsapp_link = 'https://chat.whatsapp.com/YOUR_ACTUAL_GROUP_LINK_HERE';  
?>  
<!DOCTYPE html>  
<html lang="id">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">  
    <title>Tips Ujian - Indonesian Knowledge Institute (IKI)</title>  
    <link rel="preconnect" href="https://fonts.googleapis.com">  
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>  
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500;600;700;800&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">  
    <style>  
        * { margin: 0; padding: 0; box-sizing: border-box; }  
        body {   
            font-family: 'Inter', sans-serif;   
            background: #f9fafb;   
            color: #1e293b;  
            font-size: 14px;  
            line-height: 1.6;  
        }  
        .header {   
            background: #fff;   
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);   
            position: sticky;   
            top: 0;   
            z-index: 100;  
            border-bottom: 1px solid #e2e8f0;  
        }  
        .header-content {   
            display: flex;   
            justify-content: space-between;   
            align-items: center;   
            padding: 1rem 1.5rem;  
            max-width: 1280px;  
            margin: 0 auto;  
        }  
        .logo { display: flex; align-items: center; gap: 0.75rem; }  
        .logo-circle {   
            width: 48px;   
            height: 48px;   
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);   
            border-radius: 50%;   
            display: flex;   
            align-items: center;   
            justify-content: center;  
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);  
        }  
        .logo-text h1 { font-family: 'Playfair Display', serif; font-size: 1.1rem; font-weight: 700; color: #0f172a; }  
        .logo-text p { font-size: 0.75rem; color: #475569; font-weight: 600; letter-spacing: 0.5px; }  
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
            gap: 5px;  
        }  
        .hamburger span {   
            width: 28px;   
            height: 2px;   
            background: #1e293b;   
            border-radius: 2px;  
            transition: 0.3s ease;  
        }  
        .hamburger.active span:nth-child(1) { transform: rotate(45deg) translate(6px, 6px); }  
        .hamburger.active span:nth-child(2) { opacity: 0; }  
        .hamburger.active span:nth-child(3) { transform: rotate(-45deg) translate(7px, -6px); }  
        .sidebar {   
            position: fixed;   
            top: 0;   
            right: -300px;   
            width: 300px;   
            height: 100vh;   
            background: #fff;   
            box-shadow: -4px 0 12px rgba(0,0,0,0.1);   
            transition: 0.4s ease;   
            z-index: 999;  
            overflow-y: auto;  
        }  
        .sidebar.active { right: 0; }  
        .sidebar-header {   
            padding: 1.5rem;   
            background: linear-gradient(135deg, #1e40af 0%, #312e81 100%);   
            color: #fff;  
            text-align: center;  
        }  
        .sidebar-header h2 { font-family: 'Playfair Display', serif; font-size: 1.25rem; font-weight: 700; margin-bottom: 0.25rem; }  
        .sidebar-header p { font-size: 0.85rem; opacity: 0.9; }  
        .nav-links { list-style: none; padding: 1rem 0; }  
        .nav-links a {   
            display: flex;   
            align-items: center;   
            gap: 1rem;   
            padding: 1rem 1.5rem;   
            color: #475569;   
            text-decoration: none;   
            font-weight: 600;  
            transition: 0.3s ease;  
            border-left: 4px solid transparent;  
        }  
        .nav-links a:hover, .nav-links a.active { background: #f1f5f9; color: #1e40af; border-left-color: #1e40af; }  
        .nav-links svg { width: 22px; height: 22px; flex-shrink: 0; }  
        .overlay {   
            display: none;   
            position: fixed;   
            top: 0;   
            left: 0;   
            width: 100%;   
            height: 100%;   
            background: rgba(0,0,0,0.4);   
            z-index: 998;  
        }  
        .overlay.active { display: block; }  
        .hero {   
            background: linear-gradient(135deg, #1e3a8a 0%, #312e81 100%);   
            color: #fff;   
            padding: 3rem 1.5rem;  
            text-align: center;  
            position: relative;  
            overflow: hidden;  
        }  
        .hero::before {  
            content: '';  
            position: absolute;  
            top: -50%;  
            left: -50%;  
            width: 200%;  
            height: 200%;  
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 60%);  
            animation: rotate 20s linear infinite;  
        }  
        @keyframes rotate { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }  
        .hero-badge {   
            display: inline-flex;   
            align-items: center;   
            gap: 0.5rem;   
            background: rgba(255,255,255,0.15);   
            padding: 0.5rem 1.25rem;   
            border-radius: 999px;   
            font-size: 0.75rem;   
            font-weight: 700;   
            margin-bottom: 1.25rem;  
            backdrop-filter: blur(4px);  
        }  
        .hero h1 { font-family: 'Playfair Display', serif; font-size: 1.75rem; font-weight: 700; margin-bottom: 1rem; line-height: 1.3; }  
        .hero p { font-size: 1rem; margin-bottom: 2rem; opacity: 0.95; max-width: 800px; margin-left: auto; margin-right: auto; }  
        .hero-stats {   
            display: flex;   
            justify-content: center;   
            gap: 2rem;   
            margin: 2rem 0;  
            flex-wrap: wrap;  
        }  
        .stat { text-align: center; background: rgba(255,255,255,0.1); padding: 0.75rem 1.5rem; border-radius: 8px; backdrop-filter: blur(4px); }  
        .stat .num { font-size: 2rem; font-weight: 700; display: block; }  
        .stat .label { font-size: 0.85rem; opacity: 0.9; }  
        .btn-group { display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; }  
        .btn {   
            display: inline-flex;   
            align-items: center;   
            gap: 0.5rem;   
            padding: 0.875rem 1.75rem;   
            border-radius: 8px;   
            text-decoration: none;   
            font-weight: 700;   
            font-size: 0.95rem;   
            transition: 0.3s ease;  
            border: none;  
            cursor: pointer;  
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);  
        }  
        .btn-primary { background: #fff; color: #1e40af; }  
        .btn-primary:hover { transform: translateY(-3px); box-shadow: 0 6px 12px rgba(30,64,175,0.2); }  
        .btn-secondary { background: transparent; color: #fff; border: 2px solid #fff; }  
        .btn-secondary:hover { background: #fff; color: #1e40af; }  
        .btn-whatsapp { background: #10b981; color: #fff; }  
        .btn-whatsapp:hover { background: #059669; transform: translateY(-3px); box-shadow: 0 6px 12px rgba(16,185,129,0.2); }  
        .btn svg { width: 20px; height: 20px; }  
        .container { padding: 2rem 1.5rem; max-width: 1280px; margin: 0 auto; }  
        .section-title { font-family: 'Playfair Display', serif; font-size: 1.5rem; font-weight: 700; margin-bottom: 0.75rem; text-align: center; color: #0f172a; }  
        .section-subtitle { font-size: 1rem; color: #475569; text-align: center; margin-bottom: 1.5rem; }  
        .cards {   
            display: grid;   
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));   
            gap: 1.5rem;   
            margin-bottom: 2rem;  
        }  
        .card {   
            background: #fff;   
            border-radius: 12px;   
            padding: 1.5rem;   
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);   
            border: 1px solid #e2e8f0;   
            cursor: pointer;   
            transition: 0.3s ease;  
            min-height: 160px;  
            position: relative;  
            overflow: hidden;  
        }  
        .card::before {  
            content: '';  
            position: absolute;  
            top: 0;  
            left: 0;  
            width: 100%;  
            height: 4px;  
            background: linear-gradient(90deg, #1e40af, #312e81);  
            opacity: 0;  
            transition: 0.3s;  
        }  
        .card:hover::before { opacity: 1; }  
        .card:active { transform: scale(0.98); }  
        .card:hover { box-shadow: 0 8px 16px rgba(30,64,175,0.15); transform: translateY(-4px); }  
        .card-icon {   
            width: 48px;   
            height: 48px;   
            border-radius: 50%;   
            display: flex;   
            align-items: center;   
            justify-content: center;   
            margin-bottom: 1rem;  
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);  
        }  
        .card-icon.blue { background: #dbeafe; color: #1e40af; }  
        .card-icon.green { background: #d1fae5; color: #10b981; }  
        .card-icon.purple { background: #f3e8ff; color: #7c3aed; }  
        .card-icon.orange { background: #ffedd5; color: #ea580c; }  
        .card-icon.red { background: #fee2e2; color: #ef4444; }  
        .card-icon.yellow { background: #fef08a; color: #eab308; }  
        .card-icon svg { width: 24px; height: 24px; }  
        .card-title { font-size: 1rem; font-weight: 700; margin-bottom: 0.5rem; color: #0f172a; }  
        .card-desc { font-size: 0.85rem; color: #475569; line-height: 1.5; }  
        .modal {   
            display: none;   
            position: fixed;   
            top: 0;   
            left: 0;   
            width: 100%;   
            height: 100%;   
            background: rgba(0,0,0,0.5);   
            z-index: 1000;   
            overflow-y: auto;  
            padding: 2rem 1rem;  
        }  
        .modal.active { display: flex; align-items: flex-start; justify-content: center; padding-top: 3rem; }  
        .modal-content {   
            background: #fff;   
            border-radius: 16px;   
            width: 100%;   
            max-width: 700px;   
            max-height: 85vh;   
            overflow-y: auto;  
            animation: fadeInUp 0.4s ease;  
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);  
            padding-bottom: 1.5rem;  
        }  
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(50px); } to { opacity: 1; transform: translateY(0); } }  
        .modal-header {   
            padding: 1.5rem;   
            border-bottom: 1px solid #e2e8f0;   
            display: flex;   
            justify-content: space-between;   
            align-items: center;  
            position: sticky;  
            top: 0;  
            background: #fff;  
            z-index: 10;  
        }  
        .modal-title { font-family: 'Playfair Display', serif; font-size: 1.25rem; font-weight: 700; color: #0f172a; }  
        .modal-close {   
            background: #f1f5f9;   
            border: none;   
            width: 36px;   
            height: 36px;   
            border-radius: 50%;   
            cursor: pointer;   
            display: flex;   
            align-items: center;   
            justify-content: center;  
            transition: 0.3s;  
        }  
        .modal-close:hover { background: #e2e8f0; }  
        .modal-body { padding: 1.5rem; }  
        .modal-body h3 { font-size: 1.1rem; font-weight: 700; margin: 1.5rem 0 0.75rem; color: #1e293b; }  
        .modal-body h4 { font-size: 0.95rem; font-weight: 700; margin: 1rem 0 0.5rem; color: #334155; }  
        .modal-body p { font-size: 0.95rem; color: #475569; margin-bottom: 1rem; line-height: 1.7; }  
        .modal-body ul, .modal-body ol { margin-left: 1.5rem; margin-bottom: 1rem; }  
        .modal-body li { font-size: 0.95rem; color: #475569; margin-bottom: 0.75rem; line-height: 1.6; }  
        .modal-body .tip-section { margin-bottom: 2rem; border-left: 4px solid #1e40af; padding-left: 1rem; }  
        .footer {   
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);   
            color: #fff;   
            padding: 3rem 1.5rem 1.5rem;   
            margin-top: 3rem;  
        }  
        .footer h3 { font-family: 'Playfair Display', serif; font-size: 1.25rem; font-weight: 700; margin-bottom: 1rem; }  
        .footer p { font-size: 0.9rem; color: #cbd5e1; line-height: 1.7; margin-bottom: 1.5rem; }  
        .footer-links { list-style: none; margin-bottom: 1.5rem; display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 1rem; }  
        .footer-links a { color: #cbd5e1; text-decoration: none; font-size: 0.9rem; display: block; transition: 0.3s; }  
        .footer-links a:hover { color: #60a5fa; }  
        .footer-bottom { text-align: center; padding-top: 1.5rem; border-top: 1px solid #334155; color: #94a3b8; font-size: 0.8rem; }  
        @media (min-width: 640px) {  
            .hero h1 { font-size: 2.5rem; }  
            .section-title { font-size: 2rem; }  
            .cards { grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem; }  
            .container { padding: 3rem 2rem; }  
            .modal-content { max-width: 900px; }  
        }  
    </style>  
</head>  
<body>  
    <header class="header">  
        <div class="header-content">  
            <div class="logo">  
                <div class="logo-circle">  
                    <svg width="32" height="32" viewBox="0 0 50 50" fill="none">  
                        <text x="5" y="35" font-family="Playfair Display" font-size="32" font-weight="700" fill="#60a5fa">i</text>  
                        <text x="18" y="35" font-family="Playfair Display" font-size="32" font-weight="700" fill="#34d399">K</text>  
                        <text x="32" y="35" font-family="Playfair Display" font-size="32" font-weight="700" fill="#60a5fa">I</text>  
                    </svg>  
                </div>  
                <div class="logo-text">  
                    <h1>IKI</h1>  
                    <p>Institut Pengetahuan Indonesia</p>  
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
            <h2>Navigasi Premium</h2>  
            <p>Indonesian Knowledge Institute</p>  
        </div>  
        <nav class="nav-links">  
            <a href="studygroups.php">  
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">  
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>  
                </svg>  
                Dashboard  
            </a>  
            <a href="tipsbelajar.php">  
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">  
                    <path d="M12 2L2 7l10 5 10-5-10-5z"></path>  
                    <path d="M2 17l10 5 10-5"></path>  
                </svg>  
                Tips Belajar  
            </a>  
            <a href="tipsujian.php" class="active">  
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">  
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>  
                    <polyline points="22,6 12,13 2,6"></polyline>  
                </svg>  
                Tips Ujian  
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
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">  
                    <path d="M12 2L2 7l10 5 10-5-10-5z"></path>  
                </svg>  
                TIPS UJIAN PREMIUM  
            </div>  
            <h1>Tips Ujian dari Institut Pengetahuan Indonesia</h1>  
            <p>Koleksi eksklusif tips ujian yang mendalam, dirancang untuk membantu Anda mencapai hasil optimal dengan strategi premium dan pendekatan holistik.</p>  
            <div class="hero-stats">  
                <div class="stat"><span class="num">60+</span><span class="label">Strategi</span></div>  
                <div class="stat"><span class="num">Elite</span><span class="label">Kualitas</span></div>  
                <div class="stat"><span class="num">100%</span><span class="label">Teruji</span></div>  
            </div>  
            <div class="btn-group">  
                <a href="#" class="btn btn-whatsapp" id="joinBtn">  
                    <svg fill="currentColor" viewBox="0 0 24 24">  
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>  
                    </svg>  
                    Gabung Grup Eksklusif  
                </a>  
                <a href="studygroups.php" class="btn btn-secondary">  
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">  
                        <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>  
                    </svg>  
                    Kembali ke Dashboard  
                </a>  
            </div>  
        </div>  

        <div class="container">  
            <h2 class="section-title">Tips Ujian Premium</h2>  
            <p class="section-subtitle">Eksplorasi strategi elit untuk kesuksesan ujian, klik untuk artikel mendalam</p>  
            <div class="cards">  
                <div class="card" data-modal="persiapan-awal">  
                    <div class="card-icon blue">  
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">  
                            <path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>  
                        </svg>  
                    </div>  
                    <div class="card-title">Persiapan Awal Ujian</div>  
                    <div class="card-desc">Rencana strategis jangka panjang</div>  
                </div>  
                <div class="card" data-modal="teknik-menjawab">  
                    <div class="card-icon green">  
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">  
                            <path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>  
                        </svg>  
                    </div>  
                    <div class="card-title">Teknik Menjawab Soal</div>  
                    <div class="card-desc">Pendekatan cerdas per jenis soal</div>  
                </div>  
                <div class="card" data-modal="manajemen-waktu-ujian">  
                    <div class="card-icon purple">  
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">  
                            <circle cx="12" cy="12" r="10"></circle>  
                            <polyline points="12 6 12 12 16 14"></polyline>  
                        </svg>  
                    </div>  
                    <div class="card-title">Manajemen Waktu Ujian</div>  
                    <div class="card-desc">Optimasi alokasi waktu</div>  
                </div>  
                <div class="card" data-modal="kecemasan-ujian">  
                    <div class="card-icon orange">  
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">  
                            <path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"></path>  
                        </svg>  
                    </div>  
                    <div class="card-title">Mengatasi Kecemasan</div>  
                    <div class="card-desc">Teknik relaksasi elit</div>  
                </div>  
                <div class="card" data-modal="review-materi">  
                    <div class="card-icon red">  
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">  
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>  
                            <polyline points="22,6 12,13 2,6"></polyline>  
                        </svg>  
                    </div>  
                    <div class="card-title">Review Materi Efektif</div>  
                    <div class="card-desc">Metode pengulangan premium</div>  
                </div>  
                <div class="card" data-modal="ujian-esai">  
                    <div class="card-icon yellow">  
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">  
                            <path d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>  
                        </svg>  
                    </div>  
                    <div class="card-title">Strategi Ujian Esai</div>  
                    <div class="card-desc">Penulisan jawaban superior</div>  
                </div>  
                <div class="card" data-modal="ujian-pilihan-ganda">  
                    <div class="card-icon blue">  
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">  
                            <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>  
                        </svg>  
                    </div>  
                    <div class="card-title">Ujian Pilihan Ganda</div>  
                    <div class="card-desc">Teknik eliminasi canggih</div>  
                </div>  
                <div class="card" data-modal="kesehatan-musim-ujian">  
                    <div class="card-icon green">  
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">  
                            <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"></path>  
                        </svg>  
                    </div>  
                    <div class="card-title">Kesehatan Musim Ujian</div>  
                    <div class="card-desc">Wellness holistik</div>  
                </div>  
                <div class="card" data-modal="post-ujian">  
                    <div class="card-icon purple">  
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">  
                            <path d="M4.26 10.34a.75.75 0 001.04 0L8 7.57l2.7 2.77a.75.75 0 001.04-1.08l-3.25-3.5a.75.75 0 00-1.08 0l-3.25 3.5a.75.75 0 000 1.08zM12 18.75a.75.75 0 00.75-.75v-4a.75.75 0 00-.75-.75h-1.5a.75.75 0 00-.75.75v4a.75.75 0 00.75.75h1.5z"></path>  
                        </svg>  
                    </div>  
                    <div class="card-title">Pasca Ujian</div>  
                    <div class="card-desc">Analisis dan perbaikan</div>  
                </div>  
                <div class="card" data-modal="alat-bantu-ujian">  
                    <div class="card-icon orange">  
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">  
                            <path d="M13 10V3L4 14h7v7l9-11h-7z"></path>  
                        </svg>  
                    </div>  
                    <div class="card-title">Alat Bantu Ujian</div>  
                    <div class="card-desc">Tools premium pendukung</div>  
                </div>  
            </div>  
        </div>  
    </main>  

    <footer class="footer">  
        <h3>Indonesian Knowledge Institute</h3>  
        <p>Institut elit untuk pelajar Indonesia, menyediakan sumber daya premium dalam pendidikan dan pengembangan diri dengan standar tertinggi.</p>  
        <ul class="footer-links">  
            <li><a href="about.php">Tentang Kami</a></li>  
            <li><a href="rules.php">Aturan Lengkap</a></li>  
            <li><a href="faq.php">FAQ</a></li>  
            <li><a href="admin.php">Cara Jadi Admin</a></li>  
        </ul>  
        <a href="#" class="btn btn-whatsapp" style="width: 100%; max-width: 400px; margin: 0 auto; display: block;" id="footerJoinBtn">  
            <svg fill="currentColor" viewBox="0 0 24 24">  
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>  
            </svg>  
            Gabung Grup WhatsApp Premium  
        </a>  
        <div class="footer-bottom">  
            <p>&copy; <?php echo date('Y'); ?> Indonesian Knowledge Institute (IKI) - All Rights Reserved</p>  
        </div>  
    </footer>  

    <!-- Modals untuk Artikel Full -->  
    <div class="modal" id="persiapan-awal">  
        <div class="modal-content">  
            <div class="modal-header">  
                <h2 class="modal-title">Persiapan Awal Ujian Premium</h2>  
                <button class="modal-close" onclick="closeModal('persiapan-awal')">  
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">  
                        <line x1="18" y1="6" x2="6" y2="18"></line>  
                        <line x1="6" y1="6" x2="18" y2="18"></line>  
                    </svg>  
                </button>  
            </div>  
            <div class="modal-body">  
                <p>Persiapan ujian bukan sekadar menghafal, tapi membangun fondasi elit. Artikel ini menyajikan strategi jangka panjang untuk kesuksesan maksimal.</p>  
                <h3>Prinsip Dasar Persiapan</h3>  
                <p>Mulai dengan audit diri: identifikasi kekuatan dan kelemahan melalui SWOT analysis (Strengths, Weaknesses, Opportunities, Threats) yang disesuaikan dengan subjek ujian. Ini memungkinkan alokasi sumber daya yang tepat.</p>  
                <h3>Strategi Utama</h3>  
                <h4>1. Rencana Studi Master</h4>  
                <p>Buat roadmap 3-6 bulan dengan milestone mingguan. Gunakan Gantt chart untuk visualisasi, integrasikan dengan tool seperti Notion atau Microsoft Project. Sertakan buffer 20% untuk ketidakpastian.</p>  
                <h4>2. Kurasi Materi Premium</h4>  
                <p>Kumpulkan sumber elit: textbook terbaru, jurnal akademik, video Harvard/MIT. Prioritaskan kualitas atas kuantitas; gunakan Zotero untuk manajemen referensi.</p>  
                <h4>3. Bangun Rutinitas Harian</h4>  
                <p>Implementasikan kebiasaan pagi: meditasi 10 min, review kemarin 15 min. Gunakan app Habitica untuk gamifikasi rutinitas.</p>  
                <h3>Teknik Lanjutan</h3>  
                <p>Terapkan layered learning: lapis pertama konsep dasar, lapis kedua aplikasi, lapis ketiga analisis kritis. Kombinasikan dengan peer mentoring di IKI untuk perspektif beragam.</p>  
                <ul>  
                    <li><strong>Mock Exam Series:</strong> Simulasi ujian bulanan dengan kondisi real, analisis performa menggunakan data analytics sederhana.</li>  
                    <li><strong>Nutrisi Kognitif:</strong> Diet mediterania dengan suplemen seperti omega-3 untuk optimalisasi fungsi otak.</li>  
                </ul>  
                <p>Review berkala: sesuaikan rencana setiap 2 minggu berdasarkan progress metrics untuk adaptasi dinamis.</p>  
            </div>  
        </div>  
    </div>  

    <div class="modal" id="teknik-menjawab">  
        <div class="modal-content">  
            <div class="modal-header">  
                <h2 class="modal-title">Teknik Menjawab Soal Elit</h2>  
                <button class="modal-close" onclick="closeModal('teknik-menjawab')">  
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">  
                        <line x1="18" y1="6" x2="6" y2="18"></line>  
                        <line x1="6" y1="6" x2="18" y2="18"></line>  
                    </svg>  
                </button>  
            </div>  
            <div class="modal-body">  
                <p>Menjawab soal ujian memerlukan presisi dan strategi. Panduan ini menawarkan pendekatan premium untuk berbagai jenis soal.</p>  
                <h3>Analisis Jenis Soal</h3>  
                <p>Klasifikasikan soal: faktual, analitik, sintetik. Sesuaikan teknik berdasarkan itu untuk efisiensi maksimal.</p>  
                <h3>Teknik Spesifik</h3>  
                <h4>1. Untuk Soal Objektif</h4>  
                <p>Gunakan process of elimination: hilangkan jawaban salah dulu, tingkatkan probabilitas benar hingga 50%. Gabung dengan educated guess berdasarkan pola soal sebelumnya.</p>  
                <h4>2. Untuk Esai</h4>  
                <p>Struktur PEEL: Point, Evidence, Explanation, Link. Pastikan jawaban koheren dengan transisi halus, gunakan vocabulary akademik untuk kesan premium.</p>  
                <h4>3. Untuk Kasus Studi</h4>  
                <p>Terapkan framework IRAC: Issue, Rule, Application, Conclusion. Analisis multi-dimensi dengan contoh real-world.</p>  
                <h3>Strategi Lanjutan</h3>  
                <ul>  
                    <li><strong>Keyword Mapping:</strong> Identifikasi kata kunci soal, pastikan jawaban cover semua untuk skor full.</li>  
                    <li><strong>Time Allocation:</strong> Alokasikan waktu per poin nilai, gunakan timer internal.</li>  
                    <li><strong>Proofreading Elite:</strong> Review dengan teknik reverse reading untuk deteksi error.</li>  
                </ul>  
                <p>Praktik dengan bank soal IKI untuk penguasaan.</p>  
            </div>  
        </div>  
    </div>  

    <div class="modal" id="manajemen-waktu-ujian">  
        <div class="modal-content">  
            <div class="modal-header">  
                <h2 class="modal-title">Manajemen Waktu Ujian Premium</h2>  
                <button class="modal-close" onclick="closeModal('manajemen-waktu-ujian')">  
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">  
                        <line x1="18" y1="6" x2="6" y2="18"></line>  
                        <line x1="6" y1="6" x2="18" y2="18"></line>  
                    </svg>  
                </button>  
            </div>  
            <div class="modal-body">  
                <p>Waktu adalah aset premium dalam ujian. Strategi ini memastikan optimasi total.</p>  
                <h3>Prinsip Dasar</h3>  
                <p>Gunakan time budgeting: bagi total waktu dengan bobot soal. Sertakan 10% untuk review akhir.</p>  
                <h3>Teknik Utama</h3>  
                <h4>1. Scanning Awal</h4>  
                <p>Baca seluruh soal 5-10 min pertama, prioritas mudah dulu untuk build momentum dan skor cepat.</p>  
                <h4>2. Pacing Dinamis</h4>  
                <p>Monitor dengan checkpoint: setiap 25% waktu, cek progress. Adjust speed jika tertinggal.</p>  
                <h4>3. Teknik Skip-Strategic</h4>  
                <p>Skip soal sulit, mark untuk kembali. Hindari stuck lebih dari 2x waktu rata-rata per soal.</p>  
                <h3>Strategi Lanjutan</h3>  
                <ul>  
                    <li><strong>Simulation Training:</strong> Latih dengan timer ketat, analisis waktu per bagian menggunakan app seperti Exam Simulator.</li>  
                    <li><strong>Mental Clock:</strong> Latih estimasi waktu tanpa jam untuk intuisi premium.</li>  
                    <li><strong>Buffer Management:</strong> Gunakan buffer untuk soal bonus atau verifikasi jawaban kritis.</li>  
                </ul>  
                <p>Hasil: peningkatan skor 15-25% melalui efisiensi waktu.</p>  
            </div>  
        </div>  
    </div>  

    <!-- Lanjutkan modal serupa untuk card lainnya -->  
    <div class="modal" id="kecemasan-ujian">  
        <div class="modal-content">  
            <div class="modal-header">  
                <h2 class="modal-title">Mengatasi Kecemasan Ujian Elit</h2>  
                <button class="modal-close" onclick="closeModal('kecemasan-ujian')">  
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">  
                        <line x1="18" y1="6" x2="6" y2="18"></line>  
                        <line x1="6" y1="6" x2="18" y2="18"></line>  
                    </svg>  
                </button>  
            </div>  
            <div class="modal-body">  
                <p>Kecemasan bisa sabotase performa. Strategi premium ini untuk ketenangan optimal.</p>  
                <h3>Identifikasi Gejala</h3>  
                <p>Fisik: jantung berdegup, mental: blank mind. Track dengan jurnal untuk pola.</p>  
                <h3>Teknik Relaksasi</h3>  
                <h4>1. Breathing Elite</h4>  
                <p>Teknik 4-7-8: tarik 4 detik, tahan 7, hembus 8. Gabung dengan visualization sukses.</p>  
                <h4>2. Cognitive Reframing</h4>  
                <p>Ubah "Saya gagal" jadi "Ini tantangan untuk tumbuh". Gunakan affirmation harian.</p>  
                <h4>3. Pre-Exam Ritual</h4>  
                <p>Rutinitas konsisten: musik calming, light exercise 20 min sebelum ujian.</p>  
                <h3>Strategi Lanjutan</h3>  
                <ul>  
                    <li><strong>Exposure Therapy:</strong> Simulasi ujian stresful bertahap untuk desensitisasi.</li>  
                    <li><strong>Biofeedback:</strong> Gunakan app seperti Elite HRV untuk monitor dan kontrol respon stres.</li>  
                    <li><strong>Support Network:</strong> Sesi coaching di IKI untuk venting premium.</li>  
                </ul>  
                <p>Penelitian: teknik ini kurangi kecemasan 50% (APA study).</p>  
            </div>  
        </div>  
    </div>  

    <div class="modal" id="review-materi">  
        <div class="modal-content">  
            <div class="modal-header">  
                <h2 class="modal-title">Review Materi Efektif Premium</h2>  
                <button class="modal-close" onclick="closeModal('review-materi')">  
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">  
                        <line x1="18" y1="6" x2="6" y2="18"></line>  
                        <line x1="6" y1="6" x2="18" y2="18"></line>  
                    </svg>  
                </button>  
            </div>  
            <div class="modal-body">  
                <p>Review bukan ulang biasa, tapi penguatan elit. Metode ini untuk retensi maksimal.</p>  
                <h3>Dasar Review</h3>  
                <p>Gunakan curve of forgetting Ebbinghaus: review pada interval 1 hari, 1 minggu, 1 bulan.</p>  
                <h3>Teknik Utama</h3>  
                <h4>1. Active Recall Premium</h4>  
                <p>Test diri dengan app Anki SRS, custom deck dengan hint minimal.</p>  
                <h4>2. Summarization Layered</h4>  
                <p>Buat summary 1 halaman, lalu 1 paragraf, lalu 1 kalimat per topik untuk esensi.</p>  
                <h4>3. Cross-Linking</h4>  
                <p>Hubungkan konsep antar subjek untuk pemahaman holistik.</p>  
                <h3>Strategi Lanjutan</h3>  
                <ul>  
                    <li><strong>Tech Integration:</strong> Gunakan Roam Research untuk networked notes.</li>  
                    <li><strong>Group Review:</strong> Diskusi IKI dengan role-playing examiner.</li>  
                    <li><strong>Analytics:</strong> Track recall rate, adjust interval dengan algorithm.</li>  
                </ul>  
                <p>Hasil: retensi 80%+ jangka panjang.</p>  
            </div>  
        </div>  
    </div>  

    <div class="modal" id="ujian-esai">  
        <div class="modal-content">  
            <div class="modal-header">  
                <h2 class="modal-title">Strategi Ujian Esai Premium</h2>  
                <button class="modal-close" onclick="closeModal('ujian-esai')">  
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">  
                        <line x1="18" y1="6" x2="6" y2="18"></line>  
                        <line x1="6" y1="6" x2="18" y2="18"></line>  
                    </svg>  
                </button>  
            </div>  
            <div class="modal-body">  
                <p>Esai memerlukan artikulasi elit. Panduan ini untuk jawaban standout.</p>  
                <h3>Struktur Jawaban</h3>  
                <p>Gunakan TEEL: Topic sentence, Explanation, Evidence, Link. Pastikan flow logis.</p>  
                <h3>Teknik Penulisan</h3>  
                <h4>1. Thesis Kuat</h4>  
                <p>Mulai dengan statement clear, argumen utama di intro.</p>  
                <h4>2. Evidence Premium</h4>  
                <p>Gunakan quote, data, contoh spesifik; cite properly jika diizinkan.</p>  
                <h4>3. Bahasa Sophisticated</h4>  
                <p>Variasi sentence, vocabulary advanced tanpa overkill.</p>  
                <h3>Strategi Lanjutan</h3>  
                <ul>  
                    <li><strong>Outlining Cepat:</strong> 5 min plan struktur sebelum tulis.</li>  
                    <li><strong>Counterargument:</strong> Bahas oposisi untuk depth.</li>  
                    <li><strong>Editing Elite:</strong> Gunakan checklist: clarity, conciseness, coherence.</li>  
                </ul>  
                <p>Praktik dengan timed writing di IKI.</p>  
            </div>  
        </div>  
    </div>  

    <div class="modal" id="ujian-pilihan-ganda">  
        <div class="modal-content">  
            <div class="modal-header">  
                <h2 class="modal-title">Strategi Ujian Pilihan Ganda Premium</h2>  
                <button class="modal-close" onclick="closeModal('ujian-pilihan-ganda')">  
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">  
                        <line x1="18" y1="6" x2="6" y2="18"></line>  
                        <line x1="6" y1="6" x2="18" y2="18"></line>  
                    </svg>  
                </button>  
            </div>  
            <div class="modal-body">  
                <p>Pilihan ganda butuh ketajaman. Teknik ini untuk akurasi tinggi.</p>  
                <h3>Dasar Pendekatan</h3>  
                <p>Baca soal dua kali, identifikasi trick words seperti "not", "except".</p>  
                <h3>Teknik Eliminasi</h3>  
                <h4>1. Absolute Terms</h4>  
                <p>Hati-hati dengan "always", "never" – sering salah.</p>  
                <h4>2. Similarity Check</h4>  
                <p>Eliminasi opsi mirip; benar biasanya standout.</p>  
                <h4>3. Grammar Match</h4>  
                <p>Pilih opsi yang gramatikal fit dengan stem soal.</p>  
                <h3>Strategi Lanjutan</h3>  
                <ul>  
                    <li><strong>Pattern Recognition:</strong> Analisis pola jawaban sebelumnya untuk guess informed.</li>  
                    <li><strong>Partial Credit:</strong> Jika multiple correct, gunakan Venn diagram mental.</li>  
                    <li><strong>Review Strategis:</strong> Mark unsure, kembali dengan fresh mind.</li>  
                </ul>  
                <p>Latih dengan quiz bank premium IKI.</p>  
            </div>  
        </div>  
    </div>  

    <div class="modal" id="kesehatan-musim-ujian">  
        <div class="modal-content">  
            <div class="modal-header">  
                <h2 class="modal-title">Kesehatan Musim Ujian Premium</h2>  
                <button class="modal-close" onclick="closeModal('kesehatan-musim-ujian')">  
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">  
                        <line x1="18" y1="6" x2="6" y2="18"></line>  
                        <line x1="6" y1="6" x2="18" y2="18"></line>  
                    </svg>  
                </button>  
            </div>  
            <div class="modal-body">  
                <p>Wellness holistik untuk performa puncak selama ujian.</p>  
                <h3>Aspek Fisik</h3>  
                <p>Tidur 7-8 jam: gunakan sleep cycle app. Diet anti-inflamasi: avocado, salmon, turmeric.</p>  
                <h3>Aspek Mental</h3>  
                <h4>1. Mindfulness Premium</h4>  
                <p>Sesi guided meditation dengan Insight Timer, fokus on breath.</p>  
                <h4>2. Exercise Regimen</h4>  
                <p>HIIT 20 min/hari untuk endorphin boost, tanpa fatigue.</p>  
                <h4>3. Hydration Protocol</h4>  
                <p>2.5L air + elektrolit untuk kognisi optimal.</p>  
                <h3>Strategi Lanjutan</h3>  
                <ul>  
                    <li><strong>Suplemen Elite:</strong> Rhodiola untuk stres adaptogen, magnesium untuk relaksasi.</li>  
                    <li><strong>Social Balance:</strong> Jadwal short call dengan support system.</li>  
                    <li><strong>Recovery Day:</strong> 1 hari off per minggu untuk recharge.</li>  
                </ul>  
                <p>Monitor dengan wearable seperti Whoop untuk data-driven health.</p>  
            </div>  
        </div>  
    </div>  

    <div class="modal" id="post-ujian">  
        <div class="modal-content">  
            <div class="modal-header">  
                <h2 class="modal-title">Pasca Ujian: Analisis Premium</h2>  
                <button class="modal-close" onclick="closeModal('post-ujian')">  
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">  
                        <line x1="18" y1="6" x2="6" y2="18"></line>  
                        <line x1="6" y1="6" x2="18" y2="18"></line>  
                    </svg>  
                </button>  
            </div>  
            <div class="modal-body">  
                <p>Setelah ujian, analisis untuk perbaikan berkelanjutan.</p>  
                <h3>Debriefing</h3>  
                <p>Catat immediate thoughts: apa sulit, mengapa salah.</p>  
                <h3>Analisis Mendalam</h3>  
                <h4>1. Error Classification</h4>  
                <p>Kategori: konseptual, careless, time-related.</p>  
                <h4>2. Performance Metrics</h4>  
                <p>Hitung accuracy per section, benchmark vs target.</p>  
                <h4>3. Action Plan</h4>  
                <p>Buat SMART goals untuk weak areas.</p>  
                <h3>Strategi Lanjutan</h3>  
                <ul>  
                    <li><strong>Data Visualization:</strong> Chart progress dengan Excel atau Tableau.</li>  
                    <li><strong>Feedback Loop:</strong> Diskusi dengan mentor IKI.</li>  
                    <li><strong>Long-Term Tracking:</strong> Portfolio ujian untuk trend analysis.</li>  
                </ul>  
                <p>Transform kegagalan jadi stepping stone elit.</p>  
            </div>  
        </div>  
    </div>  

    <div class="modal" id="alat-bantu-ujian">  
        <div class="modal-content">  
            <div class="modal-header">  
                <h2 class="modal-title">Alat Bantu Ujian Premium</h2>  
                <button class="modal-close" onclick="closeModal('alat-bantu-ujian')">  
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">  
                        <line x1="18" y1="6" x2="6" y2="18"></line>  
                        <line x1="6" y1="6" x2="18" y2="18"></line>  
                    </svg>  
                </button>  
            </div>  
            <div class="modal-body">  
                <p>Tools elit untuk augmentasi persiapan ujian.</p>  
                <h3>Kategori Tools</h3>  
                <p>Digital vs analog: pilih hybrid untuk efektivitas.</p>  
                <h3>Rekomendasi Premium</h3>  
                <h4>1. App Studi</h4>  
                <p>Forest untuk fokus, Quizlet Pro untuk flashcards AI.</p>  
                <h4>2. Hardware</h4>  
                <p>Noise-cancelling headphones Bose, ergonomic desk setup.</p>  
                <h4>3. Software Analitik</h4>  
                <p>ExamSoft untuk simulasi, data insights.</p>  
                <h3>Strategi Integrasi</h3>  
                <ul>  
                    <li><strong>Workflow Automation:</strong> Zapier untuk connect apps.</li>  
                    <li><strong>Custom Tools:</strong> Buat script Python sederhana untuk quiz generator.</li>  
                    <li><strong>Security:</strong> Gunakan VPN untuk akses resource global aman.</li>  
                </ul>  
                <p>Maksimalkan ROI tools dengan training awal.</p>  
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
            if (sidebar.classList.contains('active') && touchEndY < touchStartY - 50) {  
                sidebar.classList.remove('active');  
                overlay.classList.remove('active');  
                hamburger.classList.remove('active');  
            }  
        }, { passive: true });  
    </script>  
</body>  
</html>