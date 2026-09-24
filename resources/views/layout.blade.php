<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Personal Task Manager</title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            color: #1f2937;
        }

        /* NAVBAR */

        .navbar {
            background: #ffffff;
            border-bottom: 1px solid #e5e7eb;
            padding: 18px 0;
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
        }

        .logo span {
            color: #111827;
        }

        /* CONTAINER */

        .container {
            width: 90%;
            max-width: 1100px;
            margin: 35px auto;
        }

        /* HEADER */

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .page-header h2 {
            font-size: 30px;
            margin-bottom: 6px;
        }

        .page-header p {
            color: #6b7280;
        }

        /* BUTTON */

        .button {
            display: inline-block;
            padding: 11px 18px;
            border-radius: 8px;
            border: none;

            background: #2563eb;
            color: white;

            text-decoration: none;
            font-weight: bold;

            cursor: pointer;
        }

        .button:hover {
            background: #1d4ed8;
        }

        .button-edit {
            background: #f59e0b;
        }

        .button-edit:hover {
            background: #d97706;
        }

        .button-danger {
            background: #ef4444;
        }

        .button-danger:hover {
            background: #dc2626;
        }

        /* TASK GRID */

        .task-grid {
            display: grid;

            grid-template-columns:
                repeat(auto-fit, minmax(280px, 1fr));

            gap: 20px;
        }

        /* TASK CARD */

        .task-card {
            background: white;

            border: 1px solid #e5e7eb;

            border-radius: 12px;

            padding: 22px;

            box-shadow:
                0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .task-card h3 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .task-description {
            color: #6b7280;
            line-height: 1.6;
            margin-bottom: 18px;
        }

        /* STATUS */

        .status {
            display: inline-block;

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

        /* DUE DATE */

        .due-date {
            color: #6b7280;
            font-size: 14px;

            margin-bottom: 18px;
        }

        /* ACTIONS */

        .task-actions {
            display: flex;
            gap: 8px;
        }

        .task-actions .button {
            font-size: 13px;
            padding: 8px 12px;
        }

        /* EMPTY */

        .empty {
            background: white;

            padding: 50px 20px;

            text-align: center;

            border-radius: 12px;

            border: 1px solid #e5e7eb;
        }

        .empty h3 {
            margin-bottom: 10px;
        }

        .empty p {
            color: #6b7280;
            margin-bottom: 20px;
        }

        /* SUCCESS */

        .success {
            background: #ecfdf5;
            color: #047857;

            padding: 14px;

            border-radius: 8px;

            margin-bottom: 20px;
        }

        /* FORM */

        .form-card {
            background: white;

            padding: 30px;

            border-radius: 12px;

            border: 1px solid #e5e7eb;

            max-width: 700px;

            margin: auto;
        }

        label {
            display: block;

            font-weight: bold;

            margin-bottom: 7px;
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
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;

            border-color: #2563eb;
        }

        .error {
            background: #fef2f2;
            color: #b91c1c;

            padding: 15px;

            border-radius: 8px;

            margin-bottom: 20px;
        }

        /* FOOTER */

        footer {
            text-align: center;

            padding: 30px;

            color: #9ca3af;

            font-size: 14px;
        }

        /* MOBILE */

        @media (max-width: 600px) {

            .page-header {
                flex-direction: column;
                align-items: flex-start;

                gap: 15px;
            }

            .page-header h2 {
                font-size: 25px;
            }

            .task-actions {
                flex-wrap: wrap;
            }

            .navbar-content {
                width: 92%;
            }

            .container {
                width: 92%;
            }

        }

    </style>

</head>

<body>

    <!-- NAVBAR -->

    <nav class="navbar">

        <div class="navbar-content">

            <div class="logo">
                Task<span>Manager</span>
            </div>

        </div>

    </nav>


    <!-- MAIN -->

    <main class="container">

        @yield('content')

    </main>


    <!-- FOOTER -->

    <footer>

        Personal Task Manager © {{ date('Y') }}

    </footer>

</body>

</html>
