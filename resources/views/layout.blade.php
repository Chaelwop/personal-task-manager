<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#0d1117">
    <title>@yield('title', 'Task Manager') · Command Workspace</title>

    <!-- Google Fonts: Inter & JetBrains Mono for a high-end dashboard feel -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=JetBrains+Mono:wght@500;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg-base: #090d16;
            --bg-surface: #111827;
            --bg-card: #161f33;
            --bg-hover: #1e293b;
            --border: #263548;
            --border-bright: #3b526d;
            --text-main: #f3f4f6;
            --text-muted: #9ca3af;
            --accent: #6366f1; /* Indigo */
            --accent-hover: #4f46e5;
            --accent-glow: rgba(99, 102, 241, 0.25);
            --success: #10b981;
            --success-glow: rgba(16, 185, 129, 0.15);
            --danger: #ef4444;
            --danger-glow: rgba(239, 68, 68, 0.15);
            --warning: #f59e0b;
            --radius-lg: 16px;
            --radius-md: 10px;
            --radius-sm: 6px;
            --shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.5);
        }

        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        
        body { 
            min-width: 320px; 
            margin: 0; 
            background: var(--bg-base); 
            color: var(--text-main); 
            font-family: 'Inter', system-ui, -apple-system, sans-serif; 
            line-height: 1.5; 
        }

        /* Subtle Cyberpunk / Grid Background Mesh */
        body::before { 
            position: fixed; 
            z-index: -1; 
            inset: 0; 
            background-image: 
                radial-gradient(circle at 15% 15%, rgba(99, 102, 241, 0.08) 0%, transparent 40%),
                radial-gradient(circle at 85% 85%, rgba(16, 185, 129, 0.05) 0%, transparent 40%),
                linear-gradient(to right, rgba(255, 255, 255, 0.015) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255, 255, 255, 0.015) 1px, transparent 1px);
            background-size: auto, auto, 32px 32px, 32px 32px;
            content: ''; 
            pointer-events: none; 
        }

        a { color: inherit; text-decoration: none; }
        a:focus-visible, button:focus-visible, input:focus-visible, textarea:focus-visible, select:focus-visible { 
            outline: 2px solid var(--accent); 
            outline-offset: 2px; 
        }

        /* App Shell Header */
        .site-header { 
            position: sticky; 
            z-index: 100; 
            top: 0; 
            border-bottom: 1px solid var(--border); 
            background: rgba(9, 13, 22, 0.82); 
            backdrop-filter: blur(16px); 
            -webkit-backdrop-filter: blur(16px);
        }

        .header-inner, .container, .site-footer { 
            width: min(1200px, calc(100% - 48px)); 
            margin: 0 auto; 
        }

        .header-inner { 
            display: flex; 
            align-items: center; 
            justify-content: space-between; 
            height: 72px; 
        }

        .brand { 
            display: inline-flex; 
            align-items: center; 
            gap: 12px; 
            font-weight: 700; 
            font-size: 1.05rem; 
            letter-spacing: -0.02em; 
        }

        .brand-mark { 
            display: grid; 
            width: 36px; 
            height: 36px; 
            place-items: center; 
            border-radius: var(--radius-sm); 
            background: linear-gradient(135deg, var(--accent), #818cf8); 
            color: #fff; 
            font-family: 'JetBrains Mono', monospace;
            font-size: 1rem; 
            box-shadow: 0 4px 12px var(--accent-glow);
        }

        .brand span span { color: #818cf8; }

        .nav-links { 
            display: flex; 
            align-items: center; 
            gap: 24px; 
            font-size: 0.875rem; 
            font-weight: 500; 
            color: var(--text-muted); 
        }

        .nav-links a:hover { color: var(--text-main); }
        
        .nav-cta { 
            padding: 8px 16px; 
            border-radius: var(--radius-sm); 
            background: var(--accent); 
            color: #fff !important; 
            font-weight: 600;
            box-shadow: 0 4px 12px var(--accent-glow);
            transition: all 0.2s ease;
        }
        
        .nav-cta:hover { 
            background: var(--accent-hover); 
            transform: translateY(-1px);
        }

        /* Modern Stat/Feature Bar */
        .feature-strip { 
            border-bottom: 1px solid var(--border); 
            background: var(--bg-surface); 
        }

        .feature-list { 
            display: grid; 
            grid-template-columns: repeat(3, 1fr); 
            gap: 1px; 
            background: var(--border); 
        }

        .feature { 
            display: flex; 
            align-items: center; 
            gap: 16px; 
            padding: 16px 24px; 
            background: var(--bg-surface); 
            transition: background 0.2s ease;
        }

        .feature:hover { background: var(--bg-card); }

        .feature-icon { 
            display: grid; 
            width: 32px; 
            height: 32px; 
            flex: 0 0 32px; 
            place-items: center; 
            border-radius: var(--radius-sm); 
            background: rgba(99, 102, 241, 0.1);
            color: #818cf8;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.75rem; 
            font-weight: 700; 
        }

        .feature strong, .feature small { display: block; }
        .feature strong { font-size: 0.875rem; color: var(--text-main); font-weight: 600; }
        .feature small { color: var(--text-muted); font-size: 0.75rem; }

        /* Main Workspace Container */
        .container { 
            margin-top: 48px; 
            margin-bottom: 80px; 
        }

        .page-header { 
            display: flex; 
            align-items: flex-end; 
            justify-content: space-between; 
            gap: 24px; 
            margin-bottom: 32px; 
            padding-bottom: 24px; 
            border-bottom: 1px solid var(--border); 
        }

        .page-header h2 { 
            margin: 0 0 6px; 
            font-size: clamp(2rem, 4vw, 2.75rem); 
            font-weight: 800; 
            letter-spacing: -0.03em; 
            color: var(--text-main);
        }

        .page-header h2::before { 
            display: block; 
            margin-bottom: 8px; 
            content: '// SYSTEM CONTEXT : WORKSPACE'; 
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.68rem; 
            font-weight: 700; 
            letter-spacing: 0.12em; 
            color: var(--accent); 
        }

        .page-header p { 
            margin: 0; 
            color: var(--text-muted); 
            font-size: 0.9rem; 
        }

        /* Buttons Framework */
        .button { 
            display: inline-flex; 
            align-items: center; 
            justify-content: center;
            gap: 8px;
            padding: 10px 18px; 
            border: 1px solid transparent; 
            border-radius: var(--radius-sm); 
            background: var(--accent); 
            color: #fff; 
            cursor: pointer; 
            font-size: 0.85rem; 
            font-weight: 600; 
            text-decoration: none; 
            transition: all 0.2s ease; 
            box-shadow: 0 4px 12px var(--accent-glow);
        }

        .button:hover { 
            background: var(--accent-hover); 
            transform: translateY(-1px);
        }

        .button-done { background: rgba(16, 185, 129, 0.15); color: var(--success); border-color: rgba(16, 185, 129, 0.3); box-shadow: none; }
        .button-done:hover { background: var(--success); color: #fff; }

        .button-edit { background: rgba(245, 158, 11, 0.15); color: var(--warning); border-color: rgba(245, 158, 11, 0.3); box-shadow: none; }
        .button-edit:hover { background: var(--warning); color: #fff; }

        .button-danger { background: rgba(239, 68, 68, 0.15); color: var(--danger); border-color: rgba(239, 68, 68, 0.3); box-shadow: none; }
        .button-danger:hover { background: var(--danger); color: #fff; }

        /* Task Cards Layout */
        .task-grid { 
            display: grid; 
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); 
            gap: 20px; 
        }

        .task-card, .form-card, .empty { 
            border: 1px solid var(--border); 
            border-radius: var(--radius-lg); 
            background: var(--bg-card); 
            box-shadow: var(--shadow); 
        }

        .task-card { 
            position: relative; 
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 24px; 
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1); 
        }

        .task-card:hover { 
            border-color: var(--border-bright);
            transform: translateY(-3px); 
            box-shadow: 0 15px 35px -10px rgba(0,0,0,0.6); 
        }

        .task-card h3 { 
            margin: 0 0 8px; 
            font-size: 1.15rem; 
            font-weight: 600;
            color: var(--text-main);
        }

        .task-description { 
            margin-bottom: 20px; 
            color: var(--text-muted); 
            font-size: 0.88rem; 
            line-height: 1.6; 
        }

        .status { 
            display: inline-flex; 
            align-items: center;
            gap: 6px;
            margin-bottom: 16px; 
            padding: 4px 10px; 
            border-radius: 99px; 
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.7rem; 
            font-weight: 700; 
            text-transform: uppercase;
        }

        .pending { background: rgba(245, 158, 11, 0.1); color: var(--warning); border: 1px solid rgba(245, 158, 11, 0.2); }
        .completed { background: var(--success-glow); color: var(--success); border: 1px solid rgba(16, 185, 129, 0.2); }

        .due-date { 
            margin-bottom: 16px; 
            color: var(--text-muted); 
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.75rem; 
        }

        .task-actions { 
            display: flex; 
            flex-wrap: wrap; 
            gap: 8px; 
            padding-top: 16px;
            border-top: 1px solid var(--border); 
        }

        .task-actions .button { padding: 6px 12px; font-size: 0.75rem; }

        /* Empty States */
        .empty { 
            padding: 64px 24px; 
            text-align: center; 
            background: var(--bg-surface);
            border-style: dashed;
        }

        .empty::before { 
            display: grid; 
            place-items: center;
            width: 48px; 
            height: 48px; 
            margin: 0 auto 16px; 
            border: 1px dashed var(--border-bright); 
            border-radius: 50%; 
            color: var(--accent); 
            content: '+'; 
            font-size: 1.5rem; 
            background: rgba(99, 102, 241, 0.05);
        }

        .empty h3 { margin: 0 0 6px; font-size: 1.1rem; color: var(--text-main); }
        .empty p { margin: 0 0 20px; color: var(--text-muted); font-size: 0.88rem; }

        /* Alerts */
        .success, .error { 
            margin-bottom: 24px; 
            padding: 14px 18px; 
            border-radius: var(--radius-md); 
            font-size: 0.88rem; 
            font-weight: 500;
        }

        .success { background: var(--success-glow); color: var(--success); border: 1px solid rgba(16, 185, 129, 0.3); }
        .error { background: var(--danger-glow); color: var(--danger); border: 1px solid rgba(239, 68, 68, 0.3); }

        /* Form Wrapper */
        .form-card { 
            max-width: 680px; 
            margin: 0 auto; 
            padding: 36px; 
            background: var(--bg-card); 
        }

        label { 
            display: block; 
            margin-bottom: 8px; 
            font-size: 0.84rem; 
            font-weight: 600; 
            color: var(--text-main);
            letter-spacing: -0.01em;
        }

        input, textarea, select { 
            width: 100%; 
            margin-bottom: 20px; 
            padding: 12px 16px; 
            border: 1px solid var(--border); 
            border-radius: var(--radius-sm); 
            background: var(--bg-surface); 
            color: var(--text-main); 
            font: inherit; 
            font-size: 0.9rem;
            transition: all 0.2s ease; 
        }

        input:hover, textarea:hover, select:hover { border-color: var(--border-bright); }

        input:focus, textarea:focus, select:focus { 
            border-color: var(--accent); 
            background: var(--bg-card);
            box-shadow: 0 0 0 3px var(--accent-glow);
            outline: none; 
        }

        /* Footer */
        .site-footer { 
            display: flex; 
            justify-content: space-between; 
            align-items: center;
            gap: 20px; 
            padding: 32px 0; 
            border-top: 1px solid var(--border); 
            color: var(--text-muted); 
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.72rem; 
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            .header-inner, .container, .site-footer { width: min(100% - 28px, 1200px); }
            .nav-links { gap: 12px; }
            .nav-links a:not(.nav-cta) { display: none; }
            .feature-list { grid-template-columns: 1fr; }
            .feature { padding: 12px 18px; }
            .page-header { flex-direction: column; align-items: flex-start; gap: 16px; }
            .site-footer { flex-direction: column; gap: 8px; text-align: center; }
            .form-card { padding: 20px; }
        }
    </style>
</head>
<body>
    <header class="site-header">
        <div class="header-inner">
            <a class="brand" href="{{ url('/') }}" aria-label="Task Manager home">
                <span class="brand-mark">&gt;_</span>
                <span>Task<span>OS</span></span>
            </a>
            <nav class="nav-links" aria-label="Primary navigation">
                <a href="{{ url('/') }}">Dashboard</a>
                <a href="#features">Metrics</a>
                <a class="nav-cta" href="{{ route('tasks.create') }}">+ New Task</a>
            </nav>
        </div>
    </header>

    <section class="feature-strip" id="features" aria-label="Task Manager metrics">
        <div class="feature-list header-inner">
            <div class="feature">
                <span class="feature-icon">01</span>
                <div>
                    <strong>Precision Control</strong>
                    <small>Real-time execution matrix.</small>
                </div>
            </div>
            <div class="feature">
                <span class="feature-icon">02</span>
                <div>
                    <strong>State Persistence</strong>
                    <small>Zero friction logging.</small>
                </div>
            </div>
            <div class="feature">
                <span class="feature-icon">03</span>
                <div>
                    <strong>Deep Focus</strong>
                    <small>Minimal cognitive overhead.</small>
                </div>
            </div>
        </div>
    </section>

    <main class="container">
        @yield('content')
    </main>

    <footer class="site-footer">
        <span>TASK OS // v2.6.4-STABLE</span>
        <span>Secured Workspace &copy; {{ date('Y') }}</span>
    </footer>
</body>
</html>