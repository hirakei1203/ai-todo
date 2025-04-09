<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI ToDo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f7f7f7;
            color: #37352f;
        }
        .navbar {
            background-color: white !important;
            border-bottom: 1px solid #e9e9e9;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }
        .navbar-brand {
            font-weight: 600;
            display: flex;
            align-items: center;
        }
        .brand-icon {
            font-size: 1.2rem;
            margin-right: 8px;
        }
        .card {
            border-radius: 4px;
            border: 1px solid #e9e9e9;
            box-shadow: rgba(15, 15, 15, 0.05) 0px 0px 0px 1px, 
                        rgba(15, 15, 15, 0.1) 0px 3px 6px, 
                        rgba(15, 15, 15, 0.2) 0px 9px 24px;
            transition: transform 0.2s ease;
        }
        .list-group-item {
            border-left: none;
            border-right: none;
            padding: 16px;
        }
        .list-group-item:first-child {
            border-top: none;
        }
        .list-group-item:last-child {
            border-bottom: none;
        }
        /* Overriding Bootstrap button styles with Notion-like styles */
        .notion-btn {
            border-radius: 4px;
            font-size: 14px;
            font-weight: 500;
            padding: 6px 12px;
            transition: background 0.1s ease-in;
            border: 1px solid transparent;
        }
        .notion-btn-primary {
            background-color: #2e75cc;
            color: white;
        }
        .notion-btn-primary:hover {
            background-color: #1f66bd;
            color: white;
        }
        .notion-btn-success {
            background-color: #0f9d58;
            color: white;
        }
        .notion-btn-success:hover {
            background-color: #0b8043;
            color: white;
        }
        .notion-btn-danger {
            background-color: #db4437;
            color: white;
        }
        .notion-btn-danger:hover {
            background-color: #c53929;
            color: white;
        }
        h1, h2 {
            font-weight: 600;
        }
        .form-control {
            border-radius: 4px;
            border: 1px solid #e9e9e9;
            padding: 10px 14px;
        }
        .form-control:focus {
            box-shadow: rgba(46, 117, 204, 0.4) 0px 0px 0px 2px;
            border-color: #2e75cc;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-light px-4 py-3 mb-4">
        <div class="container">
            <span class="navbar-brand mb-0 h1"><span class="brand-icon">📝</span> AI ToDo</span>
        </div>
    </nav>

    <main class="container py-4">
        @yield('content')
    </main>
</body>
</html>
