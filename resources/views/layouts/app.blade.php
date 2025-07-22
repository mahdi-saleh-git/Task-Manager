<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        .header {
            font-size: 20px;
        }
        body main {
            padding: 2.5%;
        }
    </style>
     <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>

    <nav>
        <div class="max-w-full p-9 bg-black text-blue-50">
            <a  href="{{ route('tasks.index') }}">Task Manager</a>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

</body>
</html>
