```html
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Personal Task Manager')</title>

    <style>

        /* =========================
           RESET
        ========================= */

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }


        /* =========================
           BODY
        ========================= */

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fb;
            color: #1f2937;
            min-height: 100vh;
        }


        /* =========================
           NAVBAR
        ========================= */

        .navbar {
            background: #ffffff;
            border-bottom: 1px solid #e5e7eb;
            padding: 18px 0;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar-content {
            width: 90%;
            max-width: 1100px;
            margin: auto;

            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
            color: #2563eb;
            text-decoration: none;
        }

        .logo span {
            color: #111827;
        }


        /* =========================
           CONTAINER
        ========================= */

        .container {
            width: 90%;
            max-width: 1100px;
            margin: 35px auto;
            min-height: calc(100vh - 180px);
        }


        /* =========================
           PAGE HEADER
        ========================= */

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;

            margin-bottom: 30px;

            gap: 20px;
        }

        .page-header h2 {
            font-size: 30px;
            margin-bottom: 6px;
            color: #111827;
        }

        .page-header p {
            color: #6b7280;
            font-size: 15px;
        }


        /* =========================
           BUTTONS
        ========================= */

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            padding: 11px 18px;

            border-radius: 8px;
            border: none;

            background: #2563eb;
            color: white;

            text-decoration: none;
            font-weight: bold;
            font-size: 14px;

            cursor: pointer;

            transition:
                background 0.2s ease,
                transform 0.2s ease,
                box-shadow 0.2s ease;
        }

        .button:hover {
            background: #1d4ed8;

            transform: translateY(-1px);

            box-shadow:
                0 4px 10px rgba(37, 99, 235, 0.20);
        }


        /* ADD TASK */

        .button-add {
            background: #2563eb;
        }

        .button-add:hover {
            background: #1d4ed8;
        }


        /* DONE */

        .button-done {
            background: #16a34a;
        }

        .button-done:hover {
            background: #15803d;
        }


        /* EDIT */

        .button-edit {
            background: #f59e0b;
        }

        .button-edit:hover {
            background: #d97706;
        }


        /* DELETE */

        .button-danger {
            background: #ef4444;
        }

        .button-danger:hover {
            background: #dc2626;
        }


        /* CANCEL */

        .button-secondary {
            background: #6b7280;
        }

        .button-secondary:hover {
            background: #4b5563;
        }


        /* =========================
           TASK GRID
        ========================= */

        .task-grid {
            display: grid;

            grid-template-columns:
                repeat(auto-fit, minmax(280px, 1fr));

            gap: 20px;
        }


        /* =========================
           TASK CARD
        ========================= */

        .task-card {
            background: #ffffff;

            border: 1px solid #e5e7eb;

            border-radius: 14px;

            padding: 22px;

            box-shadow:
                0 4px 12px rgba(0, 0, 0, 0.05);

            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease;
        }

        .task-card:hover {
            transform: translateY(-3px);

            box-shadow:
                0 10px 25px rgba(0, 0, 0, 0.08);
        }

        .task-card h3 {
            font-size: 20px;

            margin-bottom: 10px;

            color: #111827;

            word-break: break-word;
        }


        /* =========================
           TASK DESCRIPTION
        ========================= */

        .task-description {
            color: #6b7280;

            line-height: 1.6;

            margin-bottom: 18px;

            word-break: break-word;
        }


        /* =========================
           STATUS
        ========================= */

        .status {
            display: inline-flex;
            align-items: center;

            padding: 6px 10px;

            border-radius: 20px;

            font-size: 13px;

            font-weight: bold;

            margin-bottom: 15px;
        }

        .pending {
            background: #fff7ed;
            color: #ea580c;
        }

        .completed {
            background: #ecfdf5;
            color: #059669;
        }


        /* =========================
           DUE DATE
        ========================= */

        .due-date {
            color: #6b7280;

            font-size: 14px;

            margin-bottom: 18px;

            padding: 8px 10px;

            background: #f9fafb;

            border-radius: 7px;
        }


        /* =========================
           ACTIONS
        ========================= */

        .task-actions {
            display: flex;

            gap: 8px;

            flex-wrap: wrap;

            padding-top: 15px;

            border-top: 1px solid #f0f0f0;
        }

        .task-actions form {
            margin: 0;
        }

        .task-actions .button {
            font-size: 13px;

            padding: 8px 12px;
        }


        /* =========================
           EMPTY TASKS
        ========================= */

        .empty {
            background: #ffffff;

            padding: 60px 20px;

            text-align: center;

            border-radius: 14px;

            border: 1px solid #e5e7eb;

            box-shadow:
                0 4px 12px rgba(0, 0, 0, 0.04);
        }

        .empty-icon {
            font-size: 42px;

            margin-bottom: 15px;
        }

        .empty h3 {
            margin-bottom: 10px;

            font-size: 22px;
        }

        .empty p {
            color: #6b7280;

            margin-bottom: 20px;
        }


        /* =========================
           SUCCESS MESSAGE
        ========================= */

        .success {
            background: #ecfdf5;

            color: #047857;

            padding: 14px 16px;

            border-radius: 8px;

            margin-bottom: 20px;

            border: 1px solid #a7f3d0;

            font-size: 14px;
        }


        /* =========================
           ERROR MESSAGE
        ========================= */

        .error {
            background: #fef2f2;

            color: #b91c1c;

            padding: 15px;

            border-radius: 8px;

            margin-bottom: 20px;

            border: 1px solid #fecaca;
        }

        .error ul {
            margin-top: 8px;

            padding-left: 20px;
        }

        .error li {
            margin-bottom: 4px;
        }


        /* =========================
           FORM CARD
        ========================= */

        .form-card {
            background: #ffffff;

            padding: 30px;

            border-radius: 14px;

            border: 1px solid #e5e7eb;

            max-width: 700px;

            margin: auto;

            box-shadow:
                0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .form-title {
            margin-bottom: 25px;
        }

        .form-title h3 {
            font-size: 22px;

            margin-bottom: 5px;
        }

        .form-title p {
            color: #6b7280;

            font-size: 14px;
        }


        /* =========================
           FORM ELEMENTS
        ========================= */

        label {
            display: block;

            font-weight: bold;

            margin-bottom: 7px;

            color: #374151;

            font-size: 14px;
        }

        input,
        textarea,
        select {
            width: 100%;

            padding: 12px;

            border: 1px solid #d1d5db;

            border-radius: 8px;

            margin-bottom: 20px;

            font-size: 15px;

            font-family: inherit;

            background: #ffffff;

            color: #1f2937;

            transition:
                border-color 0.2s ease,
                box-shadow 0.2s ease;
        }

        input:hover,
        textarea:hover,
        select:hover {
            border-color: #9ca3af;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;

            border-color: #2563eb;

            box-shadow:
                0 0 0 3px rgba(37, 99, 235, 0.10);
        }

        textarea {
            resize: vertical;

            min-height: 120px;
        }


        /* =========================
           FORM BUTTONS
        ========================= */

        .form-actions {
            display: flex;

            gap: 10px;

            margin-top: 5px;

            flex-wrap: wrap;
        }


        /* =========================
           FOOTER
        ========================= */

        footer {
            text-align: center;

            padding: 30px;

            color: #9ca3af;

            font-size: 14px;

            border-top: 1px solid #e5e7eb;

            background: #ffffff;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 700px) {

            .container {
                width: 92%;

                margin-top: 25px;
            }

            .page-header {
                flex-direction: column;

                align-items: flex-start;

                gap: 15px;
            }

            .page-header h2 {
                font-size: 25px;
            }

            .page-header .button {
                width: 100%;
            }

            .task-grid {
                grid-template-columns: 1fr;
            }

            .task-actions {
                flex-direction: column;
            }

            .task-actions .button,
            .task-actions form,
            .task-actions form .button {
                width: 100%;
            }

            .form-card {
                padding: 22px;
            }

        }


        /* =========================
           SMALL MOBILE
        ========================= */

        @media (max-width: 400px) {

            .navbar-content {
                width: 92%;
            }

            .logo {
                font-size: 20px;
            }

            .container {
                width: 92%;
            }

            .task-card {
                padding: 18px;
            }

            .form-card {
                padding: 18px;
            }

        }

    </style>

</head>


<body>


    <!-- =========================
         NAVBAR
    ========================= -->

    <nav class="navbar">

        <div class="navbar-content">

            <a
                href="{{ route('tasks.index') }}"
                class="logo"
            >
                Task<span>Manager</span>
            </a>

        </div>

    </nav>


    <!-- =========================
         MAIN CONTENT
    ========================= -->

    <main class="container">

        @if(session('success'))

            <div class="success">

                ✓ {{ session('success') }}

            </div>

        @endif


        @yield('content')

    </main>


    <!-- =========================
         FOOTER
    ========================= -->

    <footer>

        Personal Task Manager © {{ date('Y') }}

    </footer>


</body>

</html>
```
