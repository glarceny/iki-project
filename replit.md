# Indonesian Knowledge Institute (IKI) Website

## Overview

This is a community information website for the Indonesian Knowledge Institute (IKI) WhatsApp group - an Indonesian student community platform. The website provides comprehensive information about the group including rules, FAQ, admin application process, and a reporting/contact system. Built with native PHP (no frameworks), it features a modern, mobile-first responsive design with hamburger menu navigation and interactive components. **Each PHP file is completely standalone with all CSS, JavaScript, HTML, and backend logic inline** - no separate asset files or includes. The application uses a file-based JSON storage system for form submissions and operates without requiring a traditional database.

## Recent Changes (Nov 2025)

**Replit Environment Setup (Nov 13, 2025):**
- ✅ Installed PHP 8.4 runtime (closest available to requested 8.3+)
- ✅ Created storage/reports.json file with proper permissions (700 for directory)
- ✅ Set up .gitignore to exclude reports data and system files
- ✅ Configured workflow: PHP built-in server on 0.0.0.0:5000
- ✅ Configured deployment: Autoscale deployment target
- ✅ Verified all pages working (index, report, FAQ tested with screenshots)
- ✅ Server running successfully with no errors

**Major Restructure - Standalone File Architecture (COMPLETED):**
- ✅ Converted all 6 pages to standalone PHP files with inline CSS/JS (no external assets)
- ✅ Removed `/includes/` folder (header.php, footer.php) - each page now self-contained
- ✅ Removed `/assets/` folder (separate CSS/JS files) - all styles and scripts inline
- ✅ Eliminated config.php dependency - WhatsApp link now inline in each file
- ✅ Implemented hamburger menu/sidebar navigation for mobile-first design
- ✅ Optimized card sizing for 90% zoom on mobile browsers
- ✅ Added touch gestures (swipe) for sidebar navigation
- ✅ Backend logic now embedded in each file (report.php handles its own form processing)
- ✅ Architect-reviewed and approved - all requirements met

**Architecture Verification:**
- Each .php file is completely standalone - NO require/include statements
- All CSS, JavaScript, HTML, and backend logic inline in each file
- No dependencies between files (except WhatsApp link variable duplicated in each)
- Mobile-tested with screenshots showing proper compact layout

## User Preferences

Preferred communication style: Simple, everyday language.
Mobile optimization: Website optimized for Android devices at 90% browser zoom with compact cards.
File structure: Each .php file must be standalone (no separate includes or asset files).

## System Architecture

### Frontend Architecture
- **Pure Vanilla JavaScript** - No frontend frameworks; all JS inline in each PHP file
- **Standalone file structure** - Each page contains ALL its CSS, JS, and HTML inline
- **Mobile-first responsive design** - Optimized for small screens with compact card layouts
- **Hamburger menu navigation** - Sidebar menu triggered by hamburger icon, overlay closes menu
- **Touch-optimized** - Swipe gestures for sidebar, touch-friendly button sizes
- **Inline CSS** - All styles embedded in `<style>` tags within each PHP file
- **SVG icons** - Inline SVG implementation for custom icons

**Rationale**: User requested standalone files where each PHP page is completely self-contained for easier management and deployment. Mobile-first approach ensures optimal experience on Android devices at 90% zoom. Hamburger menu saves screen space on mobile while keeping navigation accessible.

### Backend Architecture
- **Native PHP 8.4** - No backend framework; uses pure PHP (installed via Replit modules)
- **Standalone files** - Each PHP file handles its own backend logic
- **Embedded processing** - Form handlers and business logic inline (e.g., report.php processes its own POST data)
- **Configuration management** - Centralized `config.php` for WhatsApp links and settings
- **Server**: PHP built-in development server (php -S 0.0.0.0:5000)
- **Deployment**: Autoscale deployment on Replit (stateless, runs on-demand)

**Rationale**: User requested elimination of separate structure files. Each PHP file now includes all backend logic inline, making each page truly standalone. This simplifies deployment - just upload individual PHP files without worrying about dependencies.

**Important Note**: While this standalone approach makes files longer and has some code duplication (navigation, header, footer), it meets the user's specific requirement for independent files that don't rely on external includes or assets.

### Data Storage
- **JSON file-based storage** - Form submissions stored in `/storage/reports.json`
- **No traditional database** - Avoids database setup complexity
- **Protected storage** - `/storage/` directory protected with `.htaccess` deny rules
- **Inline processing** - Report form processing logic embedded in `report.php` itself

**Rationale**: JSON file storage sufficient for low-volume submissions. Storage directory protected from direct web access via .htaccess.

**Trade-offs**:
- Pros: Simple deployment, no DB credentials, easy backup, self-contained files
- Cons: Code duplication across files, larger file sizes, not suitable for concurrent writes

### Form Handling & Validation
- **Client-side validation** - JavaScript inline in each form page
- **Server-side validation** - PHP validation inline in same file as form
- **Self-posting forms** - Forms submit to themselves (e.g., report.php handles GET and POST)
- **Secure submission** - Form data sanitization to prevent injection attacks

**Rationale**: Dual validation (client + server) in same file provides good UX and security without separate processing scripts.

## File Structure

```
/
├── index.php              # Homepage - standalone with inline CSS/JS
├── about.php              # About page - standalone
├── admin.php              # Admin application - standalone
├── rules.php              # Rules page - standalone
├── faq.php                # FAQ with accordion - standalone
├── report.php             # Report form + processing - standalone
├── config.php             # Centralized config (WhatsApp link, etc.)
├── storage/               # Protected data storage
│   ├── .htaccess          # Deny web access
│   └── reports.json       # Form submissions
├── replit.md              # This file
└── README.md              # User documentation
```

**Note**: No `/includes/` or `/assets/` folders - all CSS, JS, HTML inline in each PHP file.

## Mobile Optimization

### Design Decisions for Mobile
- **Viewport**: Optimized for 90% browser zoom on Android
- **Card sizing**: Grid with `minmax(140px, 1fr)` for compact, touch-friendly cards
- **Font sizes**: Base 14px, scaled down from original for mobile readability
- **Navigation**: Hamburger menu (280px sidebar) instead of full horizontal nav
- **Touch gestures**: Swipe down to close sidebar on mobile
- **Padding**: Reduced from desktop (1rem on mobile vs 1.5rem on desktop)

### Responsive Breakpoints
- **Mobile (default)**: < 640px - hamburger menu, compact cards
- **Desktop**: ≥ 640px - same hamburger menu (consistent UX), slightly larger containers

## External Dependencies

### Third-party Services
- **Google Fonts** - Inter font family (weights: 500, 600, 700, 800)
  - Loaded via CDN in each PHP file's `<head>`
  - Purpose: Modern, readable sans-serif optimized for screens

### Communication Platforms
- **WhatsApp Integration** - Deep linking to WhatsApp group
  - Configuration: `config.php` stores group invite link
  - Format: `https://chat.whatsapp.com/[GROUP_CODE]`
  - Usage: Join group buttons on multiple pages

### Development & Hosting
- **Replit Platform** - Primary development and hosting environment
  - PHP 8.3 runtime
  - Port 5000 for development server
  - Workflow: `php -S 0.0.0.0:5000`

### Assets & Resources
- **Custom SVG icons** - Inline in each PHP file
- **No external CSS/JS** - All styles and scripts inline
- **No JavaScript libraries** - Pure vanilla JS embedded in each page

**Rationale**: Minimal external dependencies. Only Google Fonts loaded externally; everything else is inline for true standalone files.

## Security Features

- **Storage protection**: `.htaccess` denies direct access to `/storage/` directory
- **Input sanitization**: `htmlspecialchars()` with `ENT_QUOTES` and `UTF-8` on all user input
- **Email validation**: `filter_var()` with `FILTER_VALIDATE_EMAIL`
- **XSS prevention**: All output escaped before rendering
- **SQL injection**: N/A (no database, uses JSON files)
