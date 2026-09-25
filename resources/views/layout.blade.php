<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f6f3ed">
    <title>@yield('title', 'Task Manager') · Personal Task Manager</title>

    <style>
        :root {
            --ink: #20211f;
            --muted: #72756d;
            --paper: #f6f3ed;
            --surface: #ffffff;
            --line: #e5e4dd;
            --accent: #e66b3d;
            --accent-dark: #b94925;
            --sage: #dce8d8;
            --shadow: 0 20px 50px rgba(49, 52, 43, .09);
        }

        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body { min-width: 320px; margin: 0; background: var(--paper); color: var(--ink); font-family: Georgia, 'Times New Roman', serif; line-height: 1.5; }
        body::before { position: fixed; z-index: -1; inset: 0; background: radial-gradient(circle at 8% 0%, rgba(230, 107, 61, .1), transparent 28%), radial-gradient(circle at 95% 22%, rgba(177, 203, 169, .2), transparent 30%), radial-gradient(rgba(32, 33, 31, .045) .7px, transparent .7px); background-size: auto, auto, 14px 14px; content: ''; pointer-events: none; }
        a { color: inherit; }
        a:focus-visible, button:focus-visible, input:focus-visible, textarea:focus-visible, select:focus-visible { outline: 3px solid rgba(230, 107, 61, .35); outline-offset: 3px; }

        .site-header { position: sticky; z-index: 10; top: 0; border-bottom: 1px solid rgba(229, 228, 221, .8); background: rgba(246, 243, 237, .88); backdrop-filter: blur(16px); }
        .header-inner, .container, .site-footer { width: min(1120px, calc(100% - 40px)); margin: 0 auto; }
        .header-inner { display: flex; align-items: center; justify-content: space-between; min-height: 78px; gap: 24px; }
        .brand { display: inline-flex; align-items: center; gap: 11px; color: var(--ink); font-size: 1.15rem; font-weight: 700; letter-spacing: -.03em; text-decoration: none; }
        .brand-mark { display: grid; width: 34px; height: 34px; flex: 0 0 34px; place-items: center; border-radius: 10px 10px 10px 3px; background: var(--accent); color: #fffaf2; font-family: Arial, sans-serif; font-size: .9rem; font-weight: 800; }
        .brand span:last-child { color: var(--accent-dark); }
        .nav-links { display: flex; align-items: center; gap: 18px; color: var(--muted); font-family: Arial, sans-serif; font-size: .82rem; font-weight: 700; }
        .nav-links a { text-decoration: none; }
        .nav-links a:hover { color: var(--accent-dark); }
        .nav-cta { padding: 9px 14px; border: 1px solid var(--ink); border-radius: 999px; color: var(--ink) !important; }
        .nav-cta:hover { background: var(--ink); color: #fff !important; }

        .feature-strip { border-bottom: 1px solid var(--line); background: var(--sage); }
        .feature-list { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1px; background: rgba(32, 33, 31, .1); }
        .feature { display: flex; align-items: center; gap: 11px; min-height: 62px; padding: 10px 18px; background: var(--sage); }
        .feature-icon { display: grid; width: 28px; height: 28px; flex: 0 0 28px; place-items: center; border: 1px solid rgba(32, 33, 31, .2); border-radius: 50%; font-family: Arial, sans-serif; font-size: .6rem; font-weight: 800; }
        .feature strong, .feature small { display: block; }
        .feature strong { font-size: .88rem; }
        .feature small { color: #626b5c; font-family: Arial, sans-serif; font-size: .72rem; }

        .container { margin-top: 42px; margin-bottom: 72px; }
        .page-header { display: flex; align-items: end; justify-content: space-between; gap: 24px; margin-bottom: 28px; padding-bottom: 24px; border-bottom: 1px solid var(--line); }
        .page-header h2 { margin: 0 0 6px; color: var(--ink); font-size: clamp(2rem, 5vw, 3.2rem); letter-spacing: -.055em; line-height: 1; }
        .page-header h2::before { display: block; margin-bottom: 11px; color: var(--accent-dark); content: 'YOUR SPACE / TODAY'; font-family: Arial, sans-serif; font-size: .67rem; font-weight: 800; letter-spacing: .14em; }
        .page-header p { margin: 0; color: var(--muted); font-family: Arial, sans-serif; font-size: .9rem; }
        .button { display: inline-block; padding: 12px 18px; border: 0; border-radius: 9px; background: var(--accent); color: #fff; cursor: pointer; font-family: Arial, sans-serif; font-size: .86rem; font-weight: 700; text-decoration: none; transition: transform .18s ease, background .18s ease, box-shadow .18s ease; }
        .button:hover { transform: translateY(-2px); background: var(--accent-dark); box-shadow: 0 8px 18px rgba(185, 73, 37, .2); }
        .button-done { background: #5d8b66; }
        .button-done:hover { background: #416c4b; }
        .button-edit { background: #c58b27; }
        .button-edit:hover { background: #986915; }
        .button-danger { background: #b94d4d; }
        .button-danger:hover { background: #8f3636; }
        .task-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px; }
        .task-card, .form-card, .empty { border: 1px solid var(--line); border-radius: 14px; background: rgba(255, 255, 255, .86); box-shadow: var(--shadow); }
        .task-card { position: relative; overflow: hidden; padding: 24px; transition: transform .2s ease, box-shadow .2s ease; }
        .task-card::before { position: absolute; top: 0; right: 0; left: 0; height: 4px; background: var(--accent); content: ''; }
        .task-card:hover { transform: translateY(-4px); box-shadow: 0 24px 55px rgba(49, 52, 43, .14); }
        .task-card h3 { margin: 0 0 10px; font-size: 1.25rem; }
        .task-description { margin-bottom: 18px; color: var(--muted); line-height: 1.65; }
        .status { display: inline-block; margin-bottom: 15px; padding: 6px 10px; border-radius: 20px; font-family: Arial, sans-serif; font-size: .75rem; font-weight: 700; }
        .pending { background: #fff1dc; color: #a35b0e; }
        .completed { background: #e3f0e2; color: #397049; }
        .due-date { margin-bottom: 18px; color: var(--muted); font-family: Arial, sans-serif; font-size: .82rem; }
        .task-actions { display: flex; flex-wrap: wrap; gap: 8px; }
        .task-actions .button { padding: 8px 12px; font-size: .75rem; }
        .empty { padding: 64px 20px; text-align: center; }
        .empty::before { display: block; width: 44px; height: 44px; margin: 0 auto 18px; border: 1px solid var(--accent); border-radius: 50%; color: var(--accent); content: '+'; font-family: Arial, sans-serif; font-size: 1.7rem; line-height: 41px; }
        .empty h3 { margin: 0 0 10px; }
        .empty p { margin: 0 0 20px; color: var(--muted); }
        .success, .error { margin-bottom: 20px; padding: 14px; border-radius: 8px; font-family: Arial, sans-serif; font-size: .88rem; }
        .success { background: #e3f0e2; color: #397049; }
        .error { background: #fbe7e3; color: #9a3028; }
        .form-card { max-width: 700px; margin: auto; padding: 30px; }
        label { display: block; margin-bottom: 7px; font-family: Arial, sans-serif; font-size: .86rem; font-weight: 700; }
        input, textarea, select { width: 100%; margin-bottom: 20px; padding: 12px; border: 1px solid #d5d5ce; border-radius: 8px; background: #fff; color: var(--ink); font: inherit; }
        input:focus, textarea:focus, select:focus { border-color: var(--accent); outline: none; }
        .site-footer { display: flex; justify-content: space-between; gap: 20px; padding: 24px 0 34px; border-top: 1px solid var(--line); color: var(--muted); font-family: Arial, sans-serif; font-size: .75rem; }
        .site-footer span { opacity: .8; }

        @media (max-width: 680px) {
            .header-inner, .container, .site-footer { width: min(100% - 28px, 1120px); }
            .header-inner { min-height: 70px; }
            .nav-links { gap: 11px; }
            .nav-links a:not(.nav-cta) { display: none; }
            .feature-list { grid-template-columns: 1fr; }
            .feature { min-height: 54px; padding: 8px 14px; }
            .container { margin-top: 28px; margin-bottom: 50px; }
            .page-header { align-items: flex-start; flex-direction: column; gap: 18px; }
            .page-header h2 { font-size: 2.5rem; }
            .site-footer { flex-direction: column; gap: 6px; }
            .form-card { padding: 22px; }
        }
    </style>
</head>
<body>
    <header class="site-header">
        <div class="header-inner">
            <a class="brand" href="{{ url('/') }}" aria-label="Task Manager home">
                <span class="brand-mark">✓</span>
                <span>Task<span>Manager</span></span>
            </a>
            <nav class="nav-links" aria-label="Primary navigation">
                <a href="{{ url('/') }}">My tasks</a>
                <a href="#features">Features</a>
                <a class="nav-cta" href="{{ route('tasks.create') }}">+ New task</a>
            </nav>
        </div>
    </header>

    <section class="feature-strip" id="features" aria-label="Task Manager features">
        <div class="feature-list header-inner">
            <div class="feature"><span class="feature-icon">01</span><span><strong>Clear priorities</strong><small>Keep the next action visible.</small></span></div>
            <div class="feature"><span class="feature-icon">02</span><span><strong>Simple progress</strong><small>Mark wins as you go.</small></span></div>
            <div class="feature"><span class="feature-icon">03</span><span><strong>Made for focus</strong><small>A calm place for your list.</small></span></div>
        </div>
    </section>

    <main class="container">
        @yield('content')
    </main>

    <footer class="site-footer">
        <span>Personal Task Manager &copy; {{ date('Y') }}</span>
    </footer>
</body>
</html>
