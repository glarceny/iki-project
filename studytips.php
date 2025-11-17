<?php
// Ganti dengan link grup WhatsApp IKI Anda yang sebenarnya
$whatsapp_link = 'https://chat.whatsapp.com/YOUR_ACTUAL_GROUP_LINK_HERE'; 

// [FITUR BARU] Tanggal terakhir update
$last_updated_date = "13 November 2025"; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <title>Ensiklopedia Belajar [Ultimate V4] - Indonesian Knowledge Institute (IKI)</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500;600;700;800&display=swap" rel="stylesheet">
    <style>
        /* * ===================================================================
         * CSS VARIABLES & PALET WARNA V4.0
         * ===================================================================
        */
        :root {
            --primary-color: #2563eb;
            --primary-dark: #1e40af;
            --primary-light: #eff6ff;
            --text-dark: #111827;
            --text-medium: #374151;
            --text-light: #6b7280;
            --bg-light: #f9fafb;
            --bg-white: #ffffff;
            --border-color: #e5e7eb;
            --warning-light-bg: #fefce8;
            --warning-dark: #854d0e;
            --warning-border: #f59e0b;
            /* Warna Ikon */
            --green-bg: #d1fae5; --green-icon: #057a55;
            --blue-bg: #dbeafe; --blue-icon: #1e40af;
            --purple-bg: #ede9fe; --purple-icon: #5b21b6;
            --red-bg: #fee2e2; --red-icon: #991b1b;
            --yellow-bg: #fef3c7; --yellow-icon: #92400e;
            --teal-bg: #cffafe; --teal-icon: #0e7490;
            --pink-bg: #fce7f3; --pink-icon: #9d174d;
            --orange-bg: #ffedd5; --orange-icon: #9a3412;
            --gray-bg: #f3f4f6; --gray-icon: #4b5563;
        }

        /* * ===================================================================
         * CSS TEMPLATE INTI (HEADER, SIDEBAR, FOOTER)
         * ===================================================================
        */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        html { 
            scroll-behavior: smooth; 
            scroll-padding-top: 80px;
        }
        body { 
            font-family: 'Inter', sans-serif; 
            background: var(--bg-light);
            color: var(--text-medium);
            font-size: 14px;
            line-height: 1.6;
        }
        .header { 
            background: var(--bg-white); 
            box-shadow: 0 2px 4px rgba(0,0,0,0.1); 
            position: sticky; 
            top: 0; 
            z-index: 100;
            border-bottom: 2px solid var(--primary-color);
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
            background: var(--text-dark); 
            border-radius: 50%; 
            display: flex; 
            align-items: center; 
            justify-content: center;
        }
        .logo-text h1 { font-size: 0.9rem; font-weight: 800; color: var(--text-dark); }
        .logo-text p { font-size: 0.7rem; color: var(--text-light); font-weight: 600; }
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
            background: var(--text-medium); 
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
            background: var(--bg-white); 
            box-shadow: -2px 0 8px rgba(0,0,0,0.15); 
            transition: 0.3s; 
            z-index: 999;
            overflow-y: auto;
        }
        .sidebar.active { right: 0; }
        .sidebar-header { 
            padding: 1rem; 
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%); 
            color: var(--bg-white);
        }
        .sidebar-header h2 { font-size: 1rem; font-weight: 800; margin-bottom: 0.25rem; }
        .sidebar-header p { font-size: 0.75rem; opacity: 0.9; }
        .nav-links { list-style: none; padding: 0.5rem 0; }
        .nav-links a { 
            display: flex; 
            align-items: center; 
            gap: 0.75rem; 
            padding: 0.875rem 1rem; 
            color: var(--text-medium); 
            text-decoration: none; 
            font-weight: 600;
            transition: 0.2s;
            font-size: 0.875rem;
        }
        .nav-links a:hover { background: #f3f4f6; }
        .nav-links a.active { 
            background: var(--primary-light); 
            color: var(--primary-color); 
            font-weight: 700;
            border-right: 3px solid var(--primary-color);
        }
        .nav-links svg { width: 20px; height: 20px; flex-shrink: 0; }
        .nav-category {
            padding: 1rem 1rem 0.25rem;
            font-size: 0.65rem;
            font-weight: 700;
            color: var(--text-light);
            text-transform: uppercase;
            letter-spacing: 0.05em;
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
        
        .hero-page {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%); 
            color: var(--bg-white); 
            padding: 2rem 1rem;
            text-align: left;
        }
        .hero-page .breadcrumb {
            font-size: 0.8rem;
            font-weight: 600;
            opacity: 0.8;
            margin-bottom: 0.5rem;
        }
        .hero-page .breadcrumb a { color: var(--bg-white); text-decoration: none; }
        .hero-page h1 {
            font-size: 1.75rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 0.5rem;
        }
        .hero-page p {
            font-size: 0.9rem;
            opacity: 0.95;
            max-width: 600px;
        }

        /* * ====================================================
         * [FITUR BARU V4.0] CSS META DATA ARTIKEL
         * ====================================================
        */
        .article-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem 1rem;
            color: var(--bg-white);
            opacity: 0.9;
            font-size: 0.8rem;
            font-weight: 600;
            margin-top: 1rem;
        }
        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.35rem;
        }
        .meta-item svg {
            width: 16px;
            height: 16px;
        }
        
        .container { 
            padding: 1rem; 
            max-width: 1280px;
            margin: 0 auto;
        }
        
        /* * ====================================================
         * CSS LAYOUT ARTIKEL (KONTEN & SIDEBAR)
         * ====================================================
        */
        .main-content-area {
            display: flex;
            flex-direction: column-reverse; 
            gap: 1.5rem;
        }

        .article-body {
            flex-grow: 1;
            flex-basis: 70%;
        }

        .article-sidebar {
            flex-grow: 1;
            flex-basis: 30%;
            max-width: 320px; 
            margin: 0 auto;
            width: 100%;
        }

        .article-sidebar-sticky {
            position: sticky;
            top: 80px; 
            max-height: calc(100vh - 100px);
            overflow-y: auto;
        }

        /* * ====================================================
         * CSS KARTU PILAR (CARD-BASED) V4.0
         * ====================================================
        */
        .article-intro {
            background: var(--bg-white);
            border: 1px solid var(--border-color);
            box-shadow: 0 4px 16px rgba(0,0,0,0.05);
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .pillar-card {
            background: var(--bg-white);
            border: 1px solid var(--border-color);
            box-shadow: 0 4px 16px rgba(0,0,0,0.05);
            border-radius: 12px;
            margin-bottom: 2rem;
            overflow: hidden;
        }

        .pillar-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1.5rem;
            border-bottom: 1px solid var(--border-color);
            background: var(--bg-light);
        }
        
        .pillar-icon-container {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            background-color: var(--bg-icon, var(--gray-bg));
            color: var(--color-icon, var(--gray-icon));
        }
        .pillar-icon-container svg { width: 24px; height: 24px; }

        .pillar-title-group { display: flex; flex-direction: column; }
        .pillar-label {
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--text-light);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        .pillar-title {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--text-dark);
            line-height: 1.2;
        }

        .pillar-content { padding: 1.5rem; }
        
        /* * ====================================================
         * CSS STICKY TABLE OF CONTENTS (TOC)
         * ====================================================
        */
        .toc-widget {
            background: var(--bg-white);
            border-radius: 10px;
            border: 1px solid var(--border-color);
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            padding: 1rem;
            margin-bottom: 1.5rem;
        }
        .toc-widget-title {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1.125rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 1rem;
            padding-bottom: 0.75rem;
            border-bottom: 1px solid var(--border-color);
        }
        .toc-widget-title svg { width: 20px; height: 20px; color: var(--primary-color); }
        .toc-list { list-style: none; padding: 0; margin: 0; }
        .toc-list li { margin-bottom: 0.25rem; }
        .toc-list a {
            display: block;
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--text-light);
            padding: 0.5rem 0.75rem;
            border-radius: 6px;
            transition: all 0.2s ease-in-out;
            border-left: 3px solid transparent;
        }
        .toc-list a:hover { background: var(--primary-light); color: var(--primary-color); }
        .toc-list a.toc-active {
            background: var(--primary-light);
            color: var(--primary-color);
            font-weight: 700;
            border-left: 3px solid var(--primary-color);
        }

        /* * ====================================================
         * CSS WIDGET SIDEBAR LAINNYA
         * ====================================================
        */
        .sidebar-widget {
            background: var(--bg-white);
            border-radius: 10px;
            border: 1px solid var(--border-color);
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            padding: 1rem;
            margin-bottom: 1.5rem;
        }
        .sidebar-widget-title {
            font-size: 1.125rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 1rem;
        }
        .share-buttons { display: flex; gap: 0.5rem; }
        .share-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            flex: 1;
            padding: 0.5rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.2s;
        }
        .share-btn svg { width: 18px; height: 18px; color: var(--bg-white); }
        .share-btn-wa { background: #25D366; }
        .share-btn-wa:hover { background: #128C7E; }
        .share-btn-tele { background: #0088cc; }
        .share-btn-tele:hover { background: #005580; }
        
        /* [FITUR BARU V4.0] Tombol Alat */
        .tool-btn {
            display: flex;
            width: 100%;
            padding: 0.75rem 1rem;
            background: var(--bg-light);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-family: 'Inter', sans-serif;
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--text-medium);
            cursor: pointer;
            align-items: center;
            gap: 0.5rem;
        }
        .tool-btn:hover { background: var(--primary-light); color: var(--primary-color); }
        .tool-btn svg { width: 18px; height: 18px; }

        .cta-widget {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: var(--bg-white);
            border-radius: 10px;
            padding: 1.5rem 1rem;
            text-align: center;
        }
        .cta-widget h3 { font-size: 1rem; font-weight: 700; margin-bottom: 0.5rem; }
        .cta-widget p { font-size: 0.8rem; opacity: 0.9; margin-bottom: 1rem; }
        .btn { 
            display: inline-flex; 
            align-items: center; 
            justify-content: center;
            gap: 0.5rem; 
            padding: 0.75rem 1.25rem; 
            border-radius: 8px; 
            text-decoration: none; 
            font-weight: 700; 
            font-size: 0.875rem; 
            transition: 0.2s;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        .btn-whatsapp { background: #10b981; color: var(--bg-white); }
        .btn-whatsapp:hover { background: #059669; transform: translateY(-2px); }
        .btn-whatsapp svg { width: 18px; height: 18px; }
        
        /* * ====================================================
         * CSS KONTEN DALAM KARTU (CONTENT V4.0)
         * ====================================================
        */
        .pillar-content h3 {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-top: 1.5rem;
            margin-bottom: 0.75rem;
        }
        /* [UPGRADE V4.0] Sub-sub judul */
        .pillar-content h4 {
            font-size: 1rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-top: 1.25rem;
            margin-bottom: 0.5rem;
        }
        .pillar-content h3:first-child { margin-top: 0; }
        
        .pillar-content p, .pillar-content li, .article-intro p {
            font-size: 0.95rem;
            color: var(--text-medium);
            margin-bottom: 1rem;
            line-height: 1.7;
        }
        .pillar-content ul, .pillar-content ol {
            margin-left: 1.25rem;
            margin-bottom: 1rem;
            padding-left: 1rem;
        }
        .pillar-content strong { color: var(--text-dark); font-weight: 700; }
        .pillar-content em { font-style: italic; color: var(--text-medium); }
        .pillar-content blockquote {
            margin: 1.5rem 0;
            padding: 1rem 1.5rem;
            background: var(--primary-light);
            border-left: 4px solid var(--primary-color);
            font-style: italic;
            font-size: 1rem;
            color: var(--primary-dark);
        }
        .pillar-content blockquote p { margin-bottom: 0; }

        .key-takeaway {
            background: var(--primary-light);
            border: 1px solid #bfdbfe;
            border-left: 4px solid var(--primary-color);
            border-radius: 6px;
            padding: 1.25rem;
            margin: 1.5rem 0;
        }
        .key-takeaway p { margin-bottom: 0; color: var(--primary-dark); }
        .key-takeaway strong { color: var(--primary-dark); }

        .pro-tip {
            background: var(--warning-light-bg);
            border: 1px solid #fde68a;
            border-left: 4px solid var(--warning-border);
            border-radius: 6px;
            padding: 1.25rem;
            margin: 1.5rem 0;
        }
        .pro-tip p { margin-bottom: 0; color: var(--warning-dark); }
        .pro-tip strong { color: var(--warning-dark); }

        .pillar-content hr {
            margin: 2rem 0;
            border: 0;
            border-top: 2px dashed var(--border-color);
        }

        /* * ====================================================
         * CSS FOOTER
         * ====================================================
        */
        .footer { 
            background: var(--text-dark); 
            color: var(--bg-white); 
            padding: 2rem 1rem 1rem; 
            margin-top: 2rem;
        }
        .footer h3 { font-size: 1rem; font-weight: 800; margin-bottom: 0.75rem; }
        .footer p { font-size: 0.8rem; color: #d1d5db; line-height: 1.6; margin-bottom: 1rem; }
        .footer-links { list-style: none; margin-bottom: 1rem; padding: 0; }
        .footer-links a { color: #d1d5db; text-decoration: none; font-size: 0.85rem; display: block; margin-bottom: 0.5rem; }
        .footer-links a:hover { color: var(--primary-color); }
        .footer-bottom { text-align: center; padding-top: 1rem; border-top: 1px solid var(--text-medium); color: #9ca3af; font-size: 0.75rem; }
        
        /* * ====================================================
         * [FITUR BARU V4.0] CSS TOMBOL BACK TO TOP
         * ====================================================
        */
        #backToTopBtn {
            display: none; /* Sembunyi by default */
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 99;
            border: none;
            outline: none;
            background-color: var(--primary-color);
            color: white;
            cursor: pointer;
            padding: 0;
            border-radius: 50%;
            width: 48px;
            height: 48px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            opacity: 0;
            transition: opacity 0.3s, transform 0.3s;
            transform: translateY(10px);
        }
        #backToTopBtn svg { width: 24px; height: 24px; }
        #backToTopBtn.show {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }
        #backToTopBtn:hover { background-color: var(--primary-dark); }

        /* * ====================================================
         * RESPONSIVE BREAKPOINT
         * ====================================================
        */
        @media (min-width: 640px) {
            .hero-page h1 { font-size: 2.25rem; }
            .hero-page p { font-size: 1rem; }
            .container { padding: 1.5rem; }
            .article-intro { padding: 2rem; }
            .pillar-card { border-radius: 16px; }
            .pillar-header { padding: 2rem; }
            .pillar-content { padding: 2rem; }
            .pillar-content p, .pillar-content li, .article-intro p { font-size: 1rem; }
            .pillar-title { font-size: 1.75rem; }
        }

        @media (min-width: 1024px) {
            .main-content-area {
                flex-direction: row; 
                align-items: flex-start;
            }
            .article-body {
                flex-basis: 0;
                flex-grow: 999; 
                min-width: 70%;
            }
            .article-sidebar {
                flex-basis: 320px; 
                flex-grow: 1;
                margin: 0;
            }
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
            <div class="nav-category">Akademik</div>
            <a href="galeri-prestasi.php">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 21v-6a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v6M2 10l10-7 10 7M21 10v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V10"></path></svg>
                Galeri Prestasi
            </a>
            <a href="studygroups.php">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 20h5v-2a3 3 0 0 0-5.356-2.131M12 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM5 10a2 2 0 1 0 4 0 2 2 0 0 0-4 0zM12 10a2 2 0 1 0 4 0 2 2 0 0 0-4 0zM3 20v-2a3 3 0 0 1 3-3h3a3 3 0 0 1 3 3v2"></path></svg>
                Kelompok Belajar
            </a>
            <a href="mentoring.php">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2M1 10a4 4 0 1 1 8 0 4 4 0 0 1-8 0zM22 11h-6M22 7h-6M22 15h-6"></path></svg>
                Program Mentoring
            </a>
            <a href="tipsbelajar.php" class="active">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9.663 17.004c.032.01.063.021.096.03C10.101 17.2 10.5 17 11 17h2c.5 0 .899.2 1.24.034.032-.01.064-.02.096-.03M12 21a9 9 0 1 1 0-18 9 9 0 0 1 0 18zM12 10.5A1.5 1.5 0 1 0 12 13.5a1.5 1.5 0 0 0 0-3z"></path></svg>
                Tips Belajar
            </a>
            <a href="persiapan-ujian.php">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2M9 5a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2M9 5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2m-6 9l2 2 4-4"></path></svg>
                Persiapan Ujian
            </a>
            <div class="nav-category">Karir & Beasiswa</div>
            <a href="panduan-karir.php">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 16V4a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2zM12 11v4M9 9h6"></path></svg>
                Panduan Karir
            </a>
            <a href="info-beasiswa.php">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 14l9-5-9-5-9 5 9 5zm0 0l-9 5 9 5 9-5-9-5z"></path></svg>
                Info Beasiswa
            </a>
            <a href="kompetisi.php">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19.4 10a.7.7 0 0 0-.4-1.2l-4.3-.6L13 4.1a.7.7 0 0 0-1.3 0L10 8.2l-4.3.6a.7.7 0 0 0-.4 1.2l3.1 3- .7 4.3a.7.7 0 0 0 1 .7l3.9-2 3.9 2a.7.7 0 0 0 1-.7l-.7-4.3 3.1-3z"></path></svg>
                Kompetisi
            </a>
            <a href="info-universitas.php">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 12l2-2 2 2 2-2 2 2 2-2 2 2 2-2 2 2 2-2 2 2M3 17l2-2 2 2 2-2 2 2 2-2 2 2 2-2 2 2 2-2 2 2M3 7l2-2 2 2 2-2 2 2 2-2 2 2 2-2 2 2 2-2 2 2"></path></svg>
                Info Universitas
            </a>
            <a href="panduan-jurusan.php">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"></path></svg>
                Panduan Jurusan
            </a>
            <div class="nav-category">Sumber Daya</div>
            <a href="rekomendasi-buku.php">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20v2H6.5a2.5 2.5 0 0 1-2.5 2.5V4A2 2 0 0 1 6 2h12a2 2 0 0 1 2 2v15.5a2.5 2.5 0 0 1-2.5 2.5h-11A2.5 2.5 0 0 1 4 19.5zM8 6h8M8 10h8M8 14h4"></path></svg>
                Rekomendasi Buku
            </a>
            <a href="kursus-online.php">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9.75 17L9 20l-1.15-3.3a8.01 8.01 0 0 1-4.2-4.2L.35 11l3.3-1.15a8.01 8.01 0 0 1 4.2-4.2L11 .35l1.15 3.3a8.01 8.01 0 0 1 4.2 4.2L19.7 11l-3.3 1.15a8.01 8.01 0 0 1-4.2 4.2z"></path></svg>
                Kursus Online
            </a>
            <a href="perpustakaan.php">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M8 14v5m0-13v3m-4 4h8m-8 5h8M3 3v18h18V3H3z"></path></svg>
                Perpustakaan
            </a>
            <div class="nav-category">Komunitas</div>
            <a href="artikel.php">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 20H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2zM9 12H5M9 16H5M15 12h4M15 16h4M15 8h4M9 8h.01"></path></svg>
                Artikel
            </a>
            <a href="kisah-sukses.php">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 15v2m-6-4h.01M18 13h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0zM9 9.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm6 0a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"></path></svg>
                Kisah Sukses
            </a>
        </nav>
    </div>
    
    <div class="overlay" id="overlay"></div>

    <main>
        <div class="hero-page">
            <div class="breadcrumb">
                <a href="studygroups.php">Home</a> / <a href="#">Akademik</a>
            </div>
            <h1>Ensiklopedia Belajar: Dari Filsafat ke Teknik</h1>
            <p>Ini bukan sekadar tips. Ini adalah panduan lengkap 10 pilar untuk menguasai seni belajar, didukung oleh psikologi, neurosains, dan strategi tingkat lanjut.</p>
            
            <div class="article-meta">
                <div class="meta-item">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                    <span id="readingTime"></span>
                </div>
                <div class="meta-item">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M6.75 3v2.25M17.25 3v2.25M3 18.75V8.25A2.25 2.25 0 0 1 5.25 6h13.5A2.25 2.25 0 0 1 21 8.25v10.5A2.25 2.25 0 0 1 18.75 21H5.25A2.25 2.25 0 0 1 3 18.75Z" /></svg>
                    <span>Terakhir diperbarui: <?php echo $last_updated_date; ?></span>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="main-content-area">

                <aside class="article-sidebar">
                    <div class="article-sidebar-sticky">
                        
                        <div class="toc-widget">
                            <h3 class="toc-widget-title">
                                <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                </svg>
                                Daftar Isi
                            </h3>
                            <ul class="toc-list" id="toc-list">
                                <li><a href="#pilar1">Pilar 1: Filsafat (The "Why")</a></li>
                                <li><a href="#pilar2">Pilar 2: Psikologi (The "Mindset")</a></li>
                                <li><a href="#pilar3">Pilar 3: Neurosains (The "Brain")</a></li>
                                <li><a href="#pilar4">Pilar 4: Teknik Inti (The "Tools")</a></li>
                                <li><a href="#pilar5">Pilar 5: Manajemen Sistem (The "Habit")</a></li>
                                <li><a href="#pilar6">Pilar 6: Teknik Memori Lanjut</a></li>
                                <li><a href="#pilar7">Pilar 7: Panduan Spesifik Subjek</a></li>
                                <li><a href="#pilar8">Pilar 8: Perangkat & Sistem</a></li>
                                <li><a href="#pilar9">Pilar 9: Membongkar Mitos Belajar</a></li>
                                <li><a href="#pilar10">Pilar 10: Kesehatan Holistik</a></li>
                            </ul>
                        </div>
                        
                        <div class="sidebar-widget">
                            <h3 class="sidebar-widget-title">Alat</h3>
                            <button class="tool-btn" id="printBtn">
                                <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M6.72 13.86C6.72 13.43 7.07 13.08 7.5 13.08h9c.43 0 .78.35.78.78s-.35.78-.78.78h-9c-.43 0-.78-.35-.78-.78Zm0-2.52C6.72 10.91 7.07 10.56 7.5 10.56h9c.43 0 .78.35.78.78s-.35.78-.78.78h-9c-.43 0-.78-.35-.78-.78ZM19.5 9v6.36c0 .82-.67 1.5-1.5 1.5H6c-.82 0-1.5-.68-1.5-1.5V9c0-2.17 1.76-3.93 3.93-3.93h7.14C17.74 5.07 19.5 6.83 19.5 9Zm-1.5 0c0-1.3-.98-2.43-2.31-2.43H8.31C7 6.57 6 7.7 6 9v6.36c0 .05.04.08.08.08h11.84c.05 0 .08-.04.08-.08V9Z" /></svg>
                                Cetak Artikel Ini
                            </button>
                        </div>

                        <div class="cta-widget">
                            <h3>Gabung Komunitas IKI</h3>
                            <p>Diskusi lebih lanjut dengan 315+ pelajar lainnya!</p>
                            <a href="<?php echo $whatsapp_link; ?>" class="btn btn-whatsapp" target="_blank">
                                <svg fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                </svg>
                                Gabung Sekarang
                            </a>
                        </div>
                        
                        <div class="sidebar-widget">
                            <h3 class="sidebar-widget-title">Bagikan Artikel Ini</h3>
                            <div class="share-buttons">
                                <button class="share-btn share-btn-wa" title="Bagikan ke WhatsApp">
                                    <svg fill="currentColor" viewBox="0 0 24 24"><use href="#whatsapp-icon" /></svg>
                                </button>
                                <button class="share-btn share-btn-tele" title="Bagikan ke Telegram">
                                    <svg fill="currentColor" viewBox="0 0 24 24"><path d="M9.78 18.65l.28-4.23l7.68-6.92c.34-.31.09-.46-.34-.2l-9.64 3.79c-.4.16-.4.38-.12.5l2.64.83l6.06-3.8c.2-.12.38 0 .22.12l-4.9 4.4l-.28 4.3c.32 0 .44-.14.6-.3l1.28-1.24l2.62 1.9c.46.3.78.14.9-.42l1.6-7.38c.24-.96-.1-1.38-.84-1.12L6.1 10.12C5.3 10.36 5.3 11 6.3 11.3l2.6.8L9.78 18.65z"/></svg>
                                </button>
                            </div>
                        </div>

                    </div>
                </aside>
                
                <article class="article-body" id="articleContent">
                    
                    <div class="article-intro">
                        <p>Selamat datang di panduan belajar terlengkap. Banyak pelajar gagal bukan karena kurang cerdas, tapi karena salah strategi. Mereka mengira belajar adalah soal bakat, padahal belajar adalah <strong>keterampilan</strong>—sebuah sistem yang bisa dirancang dan dioptimalkan.</p>
                        <p>Di sini, kita akan membedah 10 pilar yang membangun seorang "Master Learner", menggabungkan filsafat kuno, psikologi modern, neurosains, dan teknik praktis yang teruji.</p>
                    </div>

                    <section class="pillar-card" id="pilar1">
                        <div class="pillar-header">
                            <div class="pillar-icon-container" style="--bg-icon: var(--purple-bg); --color-icon: var(--purple-icon);">
                                <svg class="section-icon" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path d="M4.26 10.147a60.436 60.436 0 0 0-.491 6.347A48.627 48.627 0 0 1 12 20.904a48.627 48.627 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.57 50.57 0 0 0 7.745-1.588a50.58 50.58 0 0 1 7.745 1.588m-15.482 0A50.724 50.724 0 0 1 12 5.147a50.724 50.724 0 0 1 7.745 5m-15.482 0A50.93 50.93 0 0 0 3.102 7.032c.812 1.12 1.95 2.092 3.284 2.84m14.28 0a50.93 50.93 0 0 1-1.656-2.11c1.334-.748 2.472-1.72 3.284-2.84m-11.622 0a48.56 48.56 0 0 1 5.093 0Z" />
                                </svg>
                            </div>
                            <div class="pillar-title-group">
                                <span class="pillar-label">PILAR 1</span>
                                <h2 class="pillar-title">Filsafat (The "Why")</h2>
                            </div>
                        </div>
                        <div class="pillar-content">
                            <p>Sebelum ada "cara", harus ada "kenapa". Teknik belajar terbaik pun akan sia-sia tanpa bahan bakar motivasi. Filsafat adalah tentang menemukan alasan Anda.</p>
                            
                            <h3>Motivasi Intrinsik vs. Ekstrinsik</h3>
                            <p>Motivasi Ekstrinsik (nilai bagus, pujian, takut hukuman) itu rapuh. Motivasi Intrinsik (rasa penasaran, kepuasan pribadi, cinta pada proses) adalah yang bertahan lama.</p>
                            <blockquote>Jangan belajar "untuk" ujian. Belajarlah "untuk" memahami dunia. Ujian adalah efek samping, bukan tujuan.</blockquote>
                            
                            <h3>Filsafat Stoik: Fokus Pada Proses</h3>
                            <p>Filsafat Stoic (Stoisisme) mengajarkan kita untuk membedakan apa yang bisa kita kendalikan (proses) dan apa yang tidak (hasil). Anda tidak bisa mengontrol nilai ujian, tapi Anda <strong>bisa</strong> mengontrol durasi dan kualitas belajar Anda. Fokuslah pada proses, dan biarkan hasil mengikuti.</p>
                            
                            <h3>Konsep <em>Ikigai</em> (生き甲斐)</h3>
                            <p>Filsafat Jepang tentang "alasan untuk hidup". Terapkan ini dalam belajar: cari irisan antara apa yang Anda pelajari dengan apa yang Anda sukai, apa yang Anda kuasai, dan apa yang dunia butuhkan. Saat belajar terasa bermakna, ia akan terasa ringan.</p>
                        </div>
                    </section>

                    <section class="pillar-card" id="pilar2">
                        <div class="pillar-header">
                            <div class="pillar-icon-container" style="--bg-icon: var(--blue-bg); --color-icon: var(--blue-icon);">
                                <svg class="section-icon" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09zM18.25 12L17.438 9.154a4.5 4.5 0 0 1-3.09-3.09L12 3.25l-.813 2.846a4.5 4.5 0 0 1-3.09 3.09L5.25 12l2.846.813a4.5 4.5 0 0 1 3.09 3.09L12 18.75l.813-2.846a4.5 4.5 0 0 1 3.09-3.09L20.75 12l-2.846-.813A4.5 4.5 0 0 1 18.25 12z" />
                                </svg>
                            </div>
                            <div class="pillar-title-group">
                                <span class="pillar-label">PILAR 2</span>
                                <h2 class="pillar-title">Psikologi (The "Mindset")</h2>
                            </div>
                        </div>
                        <div class="pillar-content">
                            <p>Keyakinan Anda membentuk realitas Anda. Psikologi adalah tentang membangun fondasi mental yang tepat.</p>
                            
                            <h3><em>Growth Mindset</em> (Pola Pikir Bertumbuh)</h3>
                            <p>Dipopulerkan oleh Dr. Carol Dweck. Ini adalah keyakinan bahwa kecerdasan bisa dikembangkan. Lawannya adalah <em>Fixed Mindset</em> (keyakinan bahwa kecerdasan itu statis/bawaan).</p>
                            <ul>
                                <li><strong>Fixed Mindset:</strong> "Saya gagal karena saya bodoh." (Menghindari tantangan)</li>
                                <li><strong>Growth Mindset:</strong> "Saya gagal karena saya belum tahu caranya." (Merangkul tantangan)</li>
                            </ul>
                            <p>Setiap kali Anda merasa "sulit", katakan pada diri sendiri: "Bagus! Ini tandanya otakku sedang tumbuh."</p>
                            
                            <h3>Metakognisi: Berpikir Tentang Caramu Berpikir</h3>
                            <p>Ini adalah keterampilan psikologis level tertinggi. Metakognisi adalah kesadaran dan kontrol atas proses berpikir Anda sendiri. Tanyakan terus-menerus:</p>
                            <ul>
                                <li>"Metode apa yang sedang saya gunakan?"</li>
                                <li>"Apakah ini cara paling efektif?"</li>
                                <li>"Bagian mana yang saya paling tidak paham, dan mengapa?"</li>
                                <li>"Bagaimana saya bisa tahu kalau saya sudah paham?"</li>
                            </ul>
                            
                            <h3>Waspadai Efek Dunning-Kruger</h3>
                            <p>Ini adalah bias kognitif di mana orang yang tidak kompeten cenderung melebih-lebihkan kemampuannya. Semakin sedikit Anda tahu, semakin Anda merasa "sudah tahu semua". Sebaliknya, ahli sering merasa ragu. Selalulah rendah hati dan anggap diri Anda "belum tahu apa-apa".</p>
                        </div>
                    </section>

                    <section class="pillar-card" id="pilar3">
                        <div class="pillar-header">
                            <div class="pillar-icon-container" style="--bg-icon: var(--teal-bg); --color-icon: var(--teal-icon);">
                                <svg class="section-icon" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17L17.25 21M17.25 3L11.42 8.83M11.42 8.83l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06M11.42 8.83L5.6 3M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </div>
                            <div class="pillar-title-group">
                                <span class="pillar-label">PILAR 3</span>
                                <h2 class="pillar-title">Neurosains (The "Brain")</h2>
                            </div>
                        </div>
                        <div class="pillar-content">
                            <p>Memahami cara kerja perangkat keras (otak) Anda adalah kunci untuk menggunakannya dengan benar. Jangan melawan cara kerja otak Anda, bekerjasamalah dengannya.</p>
                            
                            <h3><em>Focused vs. Diffuse Mode</em> (Mode Fokus vs. Menyebar)</h3>
                            <p>Dipopulerkan oleh Dr. Barbara Oakley. Otak Anda punya dua mode:</p>
                            <ol>
                                <li><strong>Mode Fokus:</strong> Saat Anda konsentrasi penuh (mengerjakan soal, membaca intens). Ini seperti senter yang cahayanya tajam dan sempit.</li>
                                <li><strong>Mode Menyebar:</strong> Saat Anda rileks (mandi, jalan kaki, tidur). Ini seperti senter yang cahayanya redup tapi luas.</li>
                            </ol>
                            <p>Anda butuh keduanya! Mode Fokus untuk memuat informasi, Mode Menyebar untuk mengkonsolidasikan dan menghubungkan ide (momen "Aha!"). Inilah mengapa SKS (Sistem Kebut Semalam) gagal: Anda tidak memberi waktu otak untuk masuk ke Mode Menyebar.</p>
                            
                            <div class="pro-tip">
                                <p><strong>Pro-Tip:</strong> Jika Anda buntu (stuck) pada masalah sulit, jangan dipaksa. Berdirilah, jalan-jalan 5 menit. Ini adalah cara sengaja untuk memicu <em>Diffuse Mode</em> untuk membantu Anda.</p>
                            </div>
                            
                            <h3>Neuroplastisitas & <em>Sleep Spindles</em></h3>
                            <p><strong>Neuroplastisitas</strong> adalah kemampuan otak untuk berubah. Setiap kali Anda belajar, Anda secara fisik mengubah struktur otak Anda. <strong>Sleep Spindles</strong> adalah aktivitas otak singkat saat tidur yang terbukti sangat penting untuk mengunci memori. Inilah bukti ilmiah mengapa "tidur setelah belajar" sangat krusial.</p>
                            
                            <h3>Peran Dopamin dalam Motivasi</h3>
                            <p>Dopamin bukan hanya tentang "kesenangan", tapi tentang "pengejaran". Otak Anda melepaskan dopamin *sebelum* Anda mencapai tujuan, untuk memotivasi Anda. Pecah tugas besar (misal: "belajar 1 buku") menjadi tugas-tugas kecil (misal: "selesaikan 1 sub-bab") agar Anda mendapat "suntikan" dopamin kecil secara rutin, yang membuat Anda terus termotivasi.</p>
                        </div>
                    </section>

                    <section class="pillar-card" id="pilar4">
                        <div class="pillar-header">
                            <div class="pillar-icon-container" style="--bg-icon: var(--green-bg); --color-icon: var(--green-icon);">
                                <svg class="section-icon" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18c-2.305 0-4.408.867-6 2.292m0-14.25v14.25" />
                                </svg>
                            </div>
                            <div class="pillar-title-group">
                                <span class="pillar-label">PILAR 4</span>
                                <h2 class="pillar-title">Teknik Inti (The "Tools")</h2>
                            </div>
                        </div>
                        <div class="pillar-content">
                            <p>Ini adalah teknik "S-Tier" yang paling terbukti secara ilmiah. Jika Anda hanya punya waktu terbatas, fokus pada empat hal ini.</p>
                            
                            <h3>1. <em>Active Recall</em> (Mengingat Aktif) [SANGAT PENTING]</h3>
                            <p>Jika Anda hanya bisa memilih satu teknik, pilih ini. <strong>Belajar BUKAN memasukkan informasi, tapi MENARIK informasi KELUAR.</strong></p>
                            <ul>
                                <li><strong>Pasif (Efektivitas Rendah):</strong> Membaca ulang, <em>highlighting</em> (stabilo), menonton video.</li>
                                <li><strong>Aktif (Efektivitas Tinggi):</strong> Menutup buku dan mencoba menjelaskan konsep; mengerjakan soal latihan; membuat <em>flashcards</em> (kartu Anki).</li>
                            </ul>
                            <p>Setiap kali Anda memaksa otak Anda mengingat, Anda memperkuat jalur sinaptik 10x lipat dibanding hanya membaca ulang.</p>
                            
                            <h3>2. <em>Spaced Repetition</em> (Pengulangan Berjarak)</h3>
                            <p>Jangan belajar 5 jam dalam 1 hari. Jauh lebih baik belajar 1 jam selama 5 hari. Otak Anda perlu waktu untuk tidur dan mengkonsolidasikan ingatan. Sebarkan pengulangan Anda: ulangi setelah 1 hari, 3 hari, 1 minggu, 2 minggu.</p>
                            
                            <h3>3. <em>Interleaving</em> (Belajar Campur Aduk)</h3>
                            <p>Jangan belajar satu topik sampai "bosan". Jangan kerjakan 20 soal Tipe A, lalu 20 soal Tipe B. Campur aduk! Kerjakan soal Tipe A, lalu C, lalu B, lalu A lagi. Ini lebih sulit, tapi memaksa otak Anda untuk belajar "kapan" harus menggunakan sebuah strategi, bukan hanya "bagaimana" menggunakannya.</p>

                            <h3>4. <em>Feynman Technique</em> (Teknik Feynman)</h3>
                            <p>Metode jenius untuk menguji pemahaman sejati. Ambil selembar kertas, dan coba jelaskan sebuah konsep kompleks (misal: "Fotosintesis") dengan bahasa yang sangat sederhana, seolah Anda mengajar anak 8 tahun. Jika Anda buntu atau menggunakan istilah rumit ("jargon"), itu tandanya Anda belum benar-benar paham.</p>
                        </div>
                    </section>
                    
                    <section class="pillar-card" id="pilar5">
                        <div class="pillar-header">
                            <div class="pillar-icon-container" style="--bg-icon: var(--yellow-bg); --color-icon: var(--yellow-icon);">
                                <svg class="section-icon" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </div>
                            <div class="pillar-title-group">
                                <span class="pillar-label">PILAR 5</span>
                                <h2 class="pillar-title">Manajemen Sistem (The "Habit")</h2>
                            </div>
                        </div>
                        <div class="pillar-content">
                            <p>Disiplin itu terbatas. Sistem adalah yang membuat Anda terus bergerak saat motivasi hilang.</p>
                            
                            <h3>Manajemen Energi, Bukan Waktu</h3>
                            <p>Anda bukan mesin. Jangan menjadwalkan "Belajar Biologi 3 jam". Anda akan kelelahan. Jauh lebih baik: "3 sesi Pomodoro (25 menit fokus, 5 menit istirahat) untuk Bab 1 Biologi." Hormati ritme alami otak Anda (<em>Ultradian Rhythms</em>).</p>
                            
                            <h3>Hukum Parkinson & <em>Timeboxing</em></h3>
                            <p>Hukum Parkinson: "Pekerjaan akan mengembang untuk mengisi waktu yang tersedia." Jika Anda memberi diri Anda 1 minggu untuk 1 bab, Anda akan butuh 1 minggu. Jika Anda memberi 1 hari, Anda akan selesai dalam 1 hari. Gunakan <em>Timeboxing</em>: alokasikan waktu yang spesifik dan terbatas untuk tugas spesifik.</p>
                            
                            <h3>Bangun Kebiasaan: <em>Habit Stacking</em></h3>
                            <p>Dari buku "Atomic Habits". Sulit untuk memulai kebiasaan baru. Tautkan kebiasaan belajar Anda dengan kebiasaan yang sudah ada. Contoh: "Setelah saya selesai sarapan (kebiasaan lama), saya akan belajar 10 kosakata baru (kebiasaan baru)."</p>
                            
                            <h3>Lingkungan adalah Segalanya</h3>
                            <p>Sangat sulit untuk fokus jika HP Anda bergetar di meja. Ini bukan soal "kekuatan tekad". Ini soal desain lingkungan. Singkirkan distraksi. Jauhkan HP di ruangan lain. Gunakan aplikasi <em>blocker</em>. Buat lingkungan Anda "mendorong" Anda untuk fokus.</p>
                        </div>
                    </section>

                    <section class="pillar-card" id="pilar6">
                        <div class="pillar-header">
                            <div class="pillar-icon-container" style="--bg-icon: var(--orange-bg); --color-icon: var(--orange-icon);">
                                <svg class="section-icon" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l-3.23-3.23M2.25 18h11.25M2.25 18v11.25m0-11.25L11.25 18M9 11.25l3.23-3.23M9 11.25v11.25m0-11.25L11.25 18M3.75 6.75v11.25m11.25 0v-11.25m0 11.25h11.25m0-11.25h-11.25M15 6.75L22.5 15m0 0L15 22.5M22.5 15l-3.23-3.23M22.5 15v11.25m0-11.25L19.27 18" />
                                </svg>
                            </div>
                            <div class="pillar-title-group">
                                <span class="pillar-label">PILAR 6</span>
                                <h2 class="pillar-title">Teknik Memori Lanjutan</h2>
                            </div>
                        </div>
                        <div class="pillar-content">
                            <p>Untuk materi yang sangat bergantung pada hafalan (Hukum, Anatomi, Sejarah), teknik dasar saja tidak cukup. Kita perlu alat yang lebih kuat.</p>
                            
                            <h3><em>Memory Palace</em> (Istana Ingatan / Metode Loci)</h3>
                            <p>Teknik kuno yang digunakan oleh orator Romawi. Otak kita sangat buruk mengingat daftar abstrak (misal: urutan planet), tapi sangat hebat mengingat lokasi spasial (misal: denah rumah Anda).</p>
                            <p>Metode Loci memanfaatkan ini: Anda "menempatkan" informasi yang ingin Anda hafal di lokasi-lokasi yang sudah Anda kenal di dalam "istana ingatan" (bisa rumah, rute ke sekolah, dll.). Untuk mengingatnya, Anda tinggal "berjalan" di dalam istana itu dan "melihat" informasinya.</p>
                            
                            <h3><em>Chunking</em> (Memecah Informasi)</h3>
                            <p>Otak Anda hanya bisa menampung ~4-7 "potongan" informasi di memori jangka pendek. Nomor HP (0812-3456-7890) adalah contoh <em>chunking</em>. Anda tidak hafal 12 angka, Anda hafal 3-4 "potongan". Terapkan ini pada pelajaran. Jangan hafal 20 langkah, hafal "Fase 1 (3 langkah)", "Fase 2 (5 langkah)", dst.</p>

                            <h3>Visualisasi & Asosiasi Aneh</h3>
                            <p>Otak mengingat hal yang aneh, lucu, atau tidak biasa. Untuk menghafal kata "<em>Arbitrary</em>" (acak/sewenang-wenang), bayangkan seekor <strong>Arbi</strong> (sapi) <strong>terry</strong>-ak (berteriak) secara acak di perpustakaan. Semakin konyol gambaran mentalnya, semakin kuat ingatannya.</p>
                        </div>
                    </section>

                    <section class="pillar-card" id="pilar7">
                        <div class="pillar-header">
                            <div class="pillar-icon-container" style="--bg-icon: var(--gray-bg); --color-icon: var(--gray-icon);">
                                <svg class="section-icon" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21M9 17.25v-1.007a3 3 0 0 0 .879-2.122L10.5 15M9 17.25H7.5m1.5 0H10.5m-3 0s-.75-.672-1.5-1.5M15 17.25v1.007a3 3 0 0 1-.879 2.122L13.5 21m1.5-3.75v-1.007a3 3 0 0 0 .879-2.122L16.5 15m-1.5 3.75H13.5m1.5 0H16.5m-3 0s-.75-.672-1.5-1.5M3 13.5a3 3 0 0 1 3-3H9m12 0a3 3 0 0 1 3 3v0a3 3 0 0 1-3 3H9m-3 3v-3h12v3m-3-3a3 3 0 0 1-3-3v0a3 3 0 0 1 3-3h3a3 3 0 0 1 3 3v0a3 3 0 0 1-3 3H9M3 13.5v3m0 0v3m0-3h3m0 0h3m-3 0v-3" />
                                </svg>
                            </div>
                            <div class="pillar-title-group">
                                <span class="pillar-label">PILAR 7</span>
                                <h2 class="pillar-title">Panduan Spesifik Subjek</h2>
                            </div>
                        </div>
                        <div class="pillar-content">
                            <p>Tidak semua mata pelajaran diciptakan sama. Belajar Matematika dan belajar Sejarah butuh strategi yang berbeda.</p>
                            
                            <h4>Untuk Matematika, Fisika, & Sains Eksak:</h4>
                            <p>Ini adalah subjek berbasis proses dan pemecahan masalah. Fokus Anda adalah <strong>"Bagaimana"</strong>.</p>
                            <ul>
                                <li><strong>Jangan Menghafal Rumus, Pahami Konsep:</strong> Gunakan Teknik Feynman untuk membongkar rumus.</li>
                                <li><strong>Kunci Utama: Latihan Soal.</strong> Kerjakan soal sebanyak mungkin. Ini adalah <em>Active Recall</em> untuk MatematIKA.</li>
                                <li><strong>Kerjakan "Deliberate Practice":</strong> Fokus pada tipe soal yang Anda <em>paling tidak bisa*. Jangan buang waktu mengerjakan 10 soal sejenis yang sudah Anda kuasai.</li>
                            </ul>
                            
                            <h4>Untuk Sejarah, Sastra, & Humaniora:</h4>
                            <p>Ini adalah subjek berbasis narasi dan koneksi. Fokus Anda adalah <strong>"Mengapa"</strong>.</p>
                            <ul>
                                <li><strong>Cari Ceritanya:</strong> Jangan hafal tanggal. Pahami <em>cerita</em> di baliknya. "Mengapa perang itu terjadi? Apa yang dirasakan orang-orangnya?"</li>
                                <li><strong>Buat Peta Konsep (Mind Map):</strong> Hubungkan ide, tokoh, dan peristiwa.</li>
                                <li><strong>Gunakan <em>Active Recall</em>:</strong> Jelaskan secara lisan "Periode Revolusi Industri" kepada teman Anda.</li>
                            </ul>
                            
                            <h4>Untuk Belajar Bahasa Asing:</h4>
                            <p>Ini adalah subjek berbasis keterampilan dan imersi. Fokus Anda adalah <strong>Konsistensi</strong>.</p>
                            <ul>
                                <li><strong>Aturan 30 Menit/Hari:</strong> Belajar 30 menit setiap hari JAUH lebih baik daripada 3 jam di akhir pekan.</li>
                                <li><strong>Fokus pada Input (Imersi):</strong> Dengarkan musik, tonton film (dengan subtitle bahasa target), baca berita dalam bahasa itu.</li>
                                <li><strong>Gunakan <em>Spaced Repetition</em>:</strong> Aplikasi seperti Anki sangat sempurna untuk menghafal 10-20 kosakata baru setiap hari.</li>
                            </ul>
                        </div>
                    </section>

                    <section class="pillar-card" id="pilar8">
                        <div class="pillar-header">
                            <div class="pillar-icon-container" style="--bg-icon: var(--blue-bg); --color-icon: var(--blue-icon);">
                                <svg class="section-icon" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75A2.25 2.25 0 0 0 15.75 1.5m-5.25 0v3m-3-3v3m5.25 0v3m-3-3h3m-3 3h3m0 0v3m0-3h3m-3 0h-3m3 3h3m0 0v3m0-3h3m-3 3H9m6-3v3m0 0v3m0-3h3m0 0v3m-3-3H9m3 3h3m-3 3H9m6-3v3m0 0h3m-3-3H9" />
                                </svg>
                            </div>
                            <div class="pillar-title-group">
                                <span class="pillar-label">PILAR 8</span>
                                <h2 class="pillar-title">Perangkat & Sistem</h2>
                            </div>
                        </div>
                        <div class="pillar-content">
                            <p>Manfaatkan teknologi untuk membangun sistem belajar yang solid, bukan untuk distraksi.</p>
                            
                            <h3>Membangun Otak Kedua: <em>Zettelkasten</em></h3>
                            <p>Metode mencatat (disebut juga <em>slip-box</em>) yang digunakan oleh sosiolog Niklas Luhmann untuk menulis 70 buku. Idenya: jangan membuat catatan per buku/bab. Buatlah catatan per <em>ide</em>. Setiap ide ditulis di satu kartu (digital/fisik) dan dihubungkan dengan ide lain. Ini mengubah catatan Anda dari "kuburan" menjadi "jaringan" yang hidup.</p>
                            
                            <h3>Rekomendasi Aplikasi (Stack):</h3>
                            <ul>
                                <li><strong>Anki (Flashcards/Spaced Repetition):</strong> Wajib untuk <em>Active Recall</em> dan <em>Spaced Repetition</em>. Gratis.</li>
                                <li><strong>Notion / Obsidian / Logseq (Zettelkasten/Otak Kedua):</strong> Untuk membangun "Otak Kedua" Anda. Obsidian sangat baik untuk menghubungkan ide.</li>
                                <li><strong>Forest / Pomodoro Timer:</strong> Untuk manajemen fokus dan melacak sesi belajar Anda.</li>
                            </ul>

                            <h3>Digital Minimalism</h3>
                            <p>Teknologi adalah pedang bermata dua. Matikan <strong>SEMUA</strong> notifikasi yang tidak penting. Buat *folder* "Distraksi" di HP Anda dan masukkan semua media sosial ke sana, letakkan di halaman terakhir. Buat friksi (hambatan) untuk mengakses distraksi, dan hilangkan friksi untuk belajar.</p>
                        </div>
                    </section>

                    <section class="pillar-card" id="pilar9">
                        <div class="pillar-header">
                            <div class="pillar-icon-container" style="--bg-icon: var(--red-bg); --color-icon: var(--red-icon);">
                                <svg class="section-icon" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </div>
                            <div class="pillar-title-group">
                                <span class="pillar-label">PILAR 9</span>
                                <h2 class="pillar-title">Membongkar Mitos Belajar</h2>
                            </div>
                        </div>
                        <div class="pillar-content">
                            <p>Banyak strategi belajar populer yang sebenarnya tidak efektif. Memahami ini akan menghemat ratusan jam waktu Anda.</p>
                            
                            <h3>Mitos #1: <em>Learning Styles</em> (Gaya Belajar)</h3>
                            <p>"Saya adalah pelajar Visual/Auditori/Kinestetik." Ini adalah mitos terbesar. Penelitian berulang kali menunjukkan bahwa <strong>tidak ada bukti</strong> bahwa mencocokkan metode belajar dengan "gaya" Anda akan meningkatkan hasil. Semua orang belajar paling baik ketika informasi disajikan dalam berbagai format. Jangan batasi diri Anda.</p>
                            
                            <h3>Mitos #2: Otak Kiri vs. Otak Kanan</h3>
                            <p>"Saya orang otak kiri (logis)" atau "otak kanan (kreatif)". Ini adalah penyederhanaan yang berlebihan. Meskipun ada spesialisasi, kedua belahan otak bekerja bersama untuk hampir semua tugas. Anda butuh logika <em>dan</em> kreativitas untuk memecahkan masalah.</p>
                            
                            <h3>Mitos #3: Membaca Ulang & <em>Highlighting</em> (Stabilo)</h3>
                            <p>Seperti yang dibahas di Pilar 4, ini adalah teknik pasif. Teknik ini memberi Anda <strong>ilusi pemahaman</strong> karena materinya terasa familiar, tapi Anda tidak bisa mengingatnya saat ujian. Gunakan waktu Anda untuk <em>Active Recall</em>.</p>
                            
                            <h3>Mitos #4: Aturan 10.000 Jam</h3>
                            <p>Mitos ini (dari Malcolm Gladwell) sering disalahpahami. Kualitas > Kuantitas. 100 jam <em>Deliberate Practice</em> (latihan yang disengaja, fokus pada kelemahan) jauh lebih baik daripada 1.000 jam latihan yang asal-asalan dan tidak fokus.</p>
                        </div>
                    </section>

                    <section class="pillar-card" id="pilar10">
                        <div class="pillar-header">
                            <div class="pillar-icon-container" style="--bg-icon: var(--pink-bg); --color-icon: var(--pink-icon);">
                                <svg class="section-icon" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                </svg>
                            </div>
                            <div class="pillar-title-group">
                                <span class="pillar-label">PILAR 10</span>
                                <h2 class="pillar-title">Kesehatan Holistik</h2>
                            </div>
                        </div>
                        <div class="pillar-content">
                            <p>Otak Anda adalah organ fisik yang hidup di dalam tubuh Anda. Anda tidak bisa belajar dengan baik jika tubuh Anda berantakan.</p>
                            
                            <h3>Tidur adalah Senjata Rahasia Anda</h3>
                            <p>Begadang = Menghancurkan Nilai. Tidur BUKAN mematikan otak. Saat tidur (terutama tidur nyenyak/REM), otak Anda:
                                1.  Membersihkan racun (protein beta-amyloid).
                                2.  Menguatkan koneksi sinaptik (konsolidasi memori).
                                3.  Memangkas ingatan yang tidak perlu.
                            </p>
                            <p>Belajar 6 jam lalu tidur 8 jam, jauh lebih baik daripada belajar 8 jam lalu tidur 6 jam.</p>
                            
                            <div class="key-takeaway">
                                <p><strong>Poin Kunci:</strong> Jangan pernah mengorbankan tidur demi belajar. Tidur adalah bagian dari proses belajar itu sendiri.</p>
                            </div>

                            <h3>Nutrisi, Hidrasi, & Olahraga</h3>
                            <p>Otak Anda membakar ~20% kalori tubuh. Beri dia bahan bakar yang baik. Hindari lonjakan gula (<em>sugar crash</em>). Makan makanan kaya Omega-3 (ikan), antioksidan (buah beri). Dehidrasi ringan saja sudah menurunkan fungsi kognitif secara drastis. Minum air putih!</p>
                            <p>Olahraga (bahkan hanya jalan kaki 20 menit) meningkatkan aliran darah ke otak, melepaskan BDNF (Brain-Derived Neurophic Factor) yang seperti "pupuk" untuk neuron Anda, dan meningkatkan <em>mood</em>.</p>

                            <h3>Mengelola Stres & <em>Burnout</em></h3>
                            <p>Stres kronis (kortisol tinggi) membunuh sel-sel di Hippocampus (pusat memori Anda). Anda tidak bisa belajar jika Anda <em>burnout</em>. Jadwalkan waktu istirahat (<em>Diffuse Mode</em>), meditasi, atau sekadar bersantai tanpa rasa bersalah. Istirahat bukanlah kemalasan, itu adalah strategi.</p>
                            
                            <hr>
                            <h3>Kesimpulan: Anda adalah Seorang Arsitek</h3>
                            <p>Menjadi pelajar master bukanlah bakat. Itu adalah pilihan. Itu adalah proses desain. Anda adalah arsitek dari sistem belajar Anda sendiri. Dengan 10 pilar ini, Anda memiliki cetak biru lengkap.</p>
                            <p>Pilih satu hal dari daftar ini. Coba selama seminggu. Jangan mencoba mengubah semuanya sekaligus. Mulai dari yang kecil, bangun momentum, dan jangan pernah berhenti penasaran. Selamat belajar!</p>
                        </div>
                    </section>

                </article>

            </div>
        </div>
    </main>

    <footer class="footer">
        <h3>Indonesian Knowledge Institute</h3>
        <p>Komunitas Pelajar Indonesia yang positif, aktif, disiplin, dan bermanfaat dalam bidang pendidikan serta pengembangan diri.</p>
        <ul class="footer-links">
            <li><a href="about.php">Tentang Kami</a></li>
            <li><a href="panduan-karir.php">Panduan Karir</a></li>
            <li><a href="info-beasiswa.php">Info Beasiswa</a></li>
            <li><a href="rules.php">Aturan Grup</a></li>
        </ul>
        <a href="<?php echo $whatsapp_link; ?>" class="btn btn-whatsapp" style="width: 100%; justify-content: center;" id="footerJoinBtn" target="_blank">
            <svg fill="currentColor" viewBox="0 0 24 24">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
            </svg>
            Gabung Grup WhatsApp
        </a>
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> Indonesian Knowledge Institute (IKI)</p>
        </div>
    </footer>
    
    <button id="backToTopBtn" title="Kembali ke atas">
        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
        </svg>
    </button>

    <svg width="0" height="0" style="display:none;">
        <symbol id="whatsapp-icon" viewBox="0 0 24 24">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
        </symbol>
    </svg>

    <script>
        'use strict';
        
        // --- 1. SCRIPT SIDEBAR NAVIGASI UTAMA (HAMBURGER) ---
        const hamburger = document.getElementById('hamburger');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const footerJoinBtn = document.getElementById('footerJoinBtn');
        const whatsappLink = '<?php echo $whatsapp_link; ?>';

        function toggleSidebar() {
            const isActive = hamburger.classList.toggle('active');
            sidebar.classList.toggle('active', isActive);
            overlay.classList.toggle('active', isActive);
            document.body.style.overflow = isActive ? 'hidden' : '';
        }

        hamburger.addEventListener('click', toggleSidebar);
        overlay.addEventListener('click', toggleSidebar);

        footerJoinBtn.addEventListener('click', (e) => {
            e.preventDefault();
            window.open(whatsappLink, '_blank');
        });

        // --- 2. SCRIPT UNTUK STICKY TOC & SCROLLSPY ---
        const tocLinks = document.querySelectorAll('#toc-list a');
        const sections = [];
        
        tocLinks.forEach(link => {
            const sectionId = link.getAttribute('href').substring(1);
            const section = document.getElementById(sectionId);
            if (section) {
                sections.push(section);
            }
        });

        function activateTocLink() {
            let currentSection = null;
            const offset = 100;
            
            for (let i = sections.length - 1; i >= 0; i--) {
                const sectionTop = sections[i].getBoundingClientRect().top;
                if (sectionTop < window.innerHeight - offset) {
                    currentSection = sections[i];
                    break;
                }
            }

            if (!currentSection && sections.length > 0) {
                if (window.scrollY < sections[0].offsetTop - offset) {
                    currentSection = null; 
                } else {
                    currentSection = sections[sections.length - 1];
                }
            }

            tocLinks.forEach(link => {
                link.classList.remove('toc-active');
            });

            if (currentSection) {
                const activeId = currentSection.getAttribute('id');
                const activeLink = document.querySelector(`#toc-list a[href="#${activeId}"]`);
                if (activeLink) {
                    activeLink.classList.add('toc-active');
                }
            }
        }

        if (window.matchMedia("(min-width: 1024px)").matches) {
            window.addEventListener('scroll', activateTocLink);
            activateTocLink(); 
        }

        // --- 3. SCRIPT UNTUK TOMBOL SHARE ---
        const articleUrl = window.location.href;
        const articleTitle = document.title;
        
        const waShareBtn = document.querySelector('.share-btn-wa');
        const teleShareBtn = document.querySelector('.share-btn-tele');

        if(waShareBtn) {
            waShareBtn.addEventListener('click', () => {
                const waUrl = `https://api.whatsapp.com/send?text=${encodeURIComponent(articleTitle + " - " + articleUrl)}`;
                window.open(waUrl, '_blank');
            });
        }
        
        if(teleShareBtn) {
            teleShareBtn.addEventListener('click', () => {
                const teleUrl = `https://t.me/share/url?url=${encodeURIComponent(articleUrl)}&text=${encodeURIComponent(articleTitle)}`;
                window.open(teleUrl, '_blank');
            });
        }
        
        // --- 4. [FITUR BARU V4.0] SCRIPT WAKTU BACA ---
        function calculateReadingTime() {
            const articleContent = document.getElementById('articleContent');
            if (!articleContent) return;
            
            const text = articleContent.innerText || articleContent.textContent;
            const wordsPerMinute = 200; // Rata-rata
            const wordCount = text.trim().split(/\s+/).length;
            const readingTime = Math.ceil(wordCount / wordsPerMinute);
            
            const readingTimeEl = document.getElementById('readingTime');
            if(readingTimeEl) {
                readingTimeEl.innerText = `Estimasi ${readingTime} menit baca`;
            }
        }
        // Panggil fungsi saat dokumen selesai dimuat
        document.addEventListener('DOMContentLoaded', calculateReadingTime);

        // --- 5. [FITUR BARU V4.0] SCRIPT TOMBOL BACK TO TOP ---
        const backToTopBtn = document.getElementById('backToTopBtn');

        function toggleBackToTopButton() {
            if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
                backToTopBtn.classList.add('show');
            } else {
                backToTopBtn.classList.remove('show');
            }
        }

        window.addEventListener('scroll', toggleBackToTopButton);

        backToTopBtn.addEventListener('click', () => {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        });
        
        // --- 6. [FITUR BARU V4.0] SCRIPT TOMBOL PRINT ---
        const printBtn = document.getElementById('printBtn');
        if(printBtn) {
            printBtn.addEventListener('click', () => {
                window.print();
            });
        }

    </script>
</body>
</html>
