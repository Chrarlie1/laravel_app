<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Greet Page</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')
</head>

<body class="page-greet bg-black font-[Inter] flex items-center justify-center h-screen text-amber-400 relative">

    <div class=" fade-in text-center bg-red-900/55 backdrop-blur-sm border border-amber-800 p-10 rounded-xl shadow-2xl ">

        <h1
            class="text-3xl font-bold mb-4 tracking-wide 
           bg-gradient-to-r from-amber-400 via-amber-500 to-amber-600 bg-clip-text text-transparent">
            Welcome to My Laravel App
        </h1>

        <p class="text-amber-400 mb-6 text-sm">
            Welcome. Proceed to task interface.
        </p>

        <a href="{{ route('tasks.index') }}">
            <button
                class="px-6 py-2 rounded-lg text-amber-500 font-medium
bg-gradient-to-r from-yellow-900 to-yellow-950
hover:scale-105 hover:shadow-lg hover:shadow-orange-300/30
active:scale-95 transition-all duration-200">
                Task Manager
            </button>
        </a>

    </div>

</body>

</html>
