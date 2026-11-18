<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Student Result Portal')</title>
    <style>
        *{box-sizing:border-box}body{margin:0;font-family:Arial,sans-serif;background:#f3f6fb;color:#1f2937}
        nav{background:#14213d;color:#fff;padding:15px 5%;display:flex;justify-content:space-between;align-items:center;gap:12px;flex-wrap:wrap}
        nav a{color:#fff;text-decoration:none;margin-right:15px;font-weight:600}.brand{font-size:19px;font-weight:bold}
        .container{max-width:1100px;margin:30px auto;padding:0 18px}.card{background:#fff;border-radius:12px;padding:22px;box-shadow:0 4px 18px #14213d12;margin-bottom:20px}
        h1{margin-top:0;font-size:26px}.muted{color:#6b7280}.btn{display:inline-block;border:0;border-radius:7px;padding:10px 15px;background:#2563eb;color:white;text-decoration:none;cursor:pointer;font-weight:600}
        .btn.secondary{background:#475569}.btn.danger{background:#dc2626}.btn.green{background:#059669}
        table{width:100%;border-collapse:collapse;background:white}th,td{text-align:left;padding:12px;border-bottom:1px solid #e5e7eb}th{background:#eef2ff}
        input,select{width:100%;padding:11px;border:1px solid #cbd5e1;border-radius:7px;margin:6px 0 14px;font-size:15px}
        label{font-weight:600}.error{color:#dc2626;font-size:13px;margin-top:-10px;margin-bottom:10px}.alert{padding:12px;border-radius:8px;margin-bottom:15px;background:#dcfce7;color:#166534}
        .actions{display:flex;gap:8px;flex-wrap:wrap}.inline{display:inline}.grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:16px}
        .badge{padding:5px 9px;border-radius:20px;background:#dbeafe;color:#1d4ed8;font-weight:bold}
        @media(max-width:650px){.grid{grid-template-columns:1fr}table{font-size:13px}th,td{padding:8px}.container{margin:18px auto}}
    </style>
</head>
<body>
<nav>
    <div><a class="brand" href="{{ route('students.index') }}">Student Result Portal</a></div>
    <div>
        <a href="{{ route('students.index') }}">Students</a>
        @auth
            <a href="{{ route('results.index') }}">Results</a>
            <a href="{{ route('students.create') }}">Add Student</a>
            <form class="inline" method="POST" action="{{ route('logout') }}">@csrf
                <button class="btn secondary" type="submit">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}">Admin Login</a>
        @endauth
    </div>
</nav>
<main class="container">
    @if(session('success'))<div class="alert">{{ session('success') }}</div>@endif
    @yield('content')
</main>
</body>
</html>
