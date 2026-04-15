<!DOCTYPE html>
<html>
<head>
    <title>Greet Page</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-black flex items-center justify-center h-screen text-gray-200">

    <div class="text-center bg-zinc-900 border border-red-800 p-10 rounded-xl shadow-2xl">

        <h1 class="text-3xl font-bold mb-4 text-red-500 tracking-wide">
            Welcome to My Laravel App
        </h1>

        <p class="text-gray-400 mb-6 text-sm">
            System initialized. Proceed to task interface.
        </p>

        <a href="{{ route('tasks.index') }}">
            <button class="bg-red-700 hover:bg-red-600 transition text-white px-6 py-2 rounded shadow-lg hover:shadow-red-900/50">
                Task Manager
            </button>
        </a>

    </div>

</body>
</html>