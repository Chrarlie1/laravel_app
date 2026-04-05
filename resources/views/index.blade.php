<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager Laravel App</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-900 text-gray-100 font-sans min-h-screen p-6">

    <div class="max-w-4xl mx-auto">

        <!-- HEADER -->
        <header class="mb-8">
            <h1 class="text-4xl font-extrabold text-pink-500 tracking-wide mb-1">
                Task Manager Laravel App
            </h1>
            <p class="text-gray-400">Manage your tasks efficiently.</p>
        </header>

        <!-- ADD TASK FORM -->
        <div class="bg-gray-800 p-6 rounded-xl shadow-lg mb-8 border border-pink-600">
            <h2 class="text-2xl font-bold mb-4 text-pink-400">Add Task</h2>

            <form action="/tasks" method="POST" class="space-y-3">
                @csrf
                <input type="text" name="title" placeholder="Task Title"
                    class="w-full p-3 rounded-lg bg-gray-700 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-pink-500 text-gray-100" required>

                <textarea name="description" placeholder="Task Description"
                    class="w-full p-3 rounded-lg bg-gray-700 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-pink-500 text-gray-100"></textarea>

                <button class="bg-pink-500 hover:bg-pink-600 transition text-white px-6 py-2 rounded-lg font-bold">
                    Add Task
                </button>
            </form>
        </div>

        <!-- TASK LIST -->
        <div class="bg-gray-800 p-6 rounded-xl shadow-lg border border-pink-600">
            <h2 class="text-2xl font-bold mb-4 text-pink-400">Task List</h2>

            @foreach ($tasks as $task)
                <div class="border-b border-gray-700 py-4 flex flex-col md:flex-row md:justify-between md:items-center">
                    <!-- DISPLAY -->
                    <div class="mb-3 md:mb-0">
                        <h3 class="text-lg font-bold text-pink-300">{{ $task->title }}</h3>
                        <p class="text-gray-300">{{ $task->description }}</p>
                        <span class="{{ $task->is_completed ? 'text-green-400' : 'text-red-400' }} font-semibold">
                            {{ $task->is_completed ? 'Completed' : 'Not Completed' }}
                        </span>
                    </div>

                    <!-- ACTIONS -->
                    <div class="flex gap-2 flex-wrap">

                        <!-- UPDATE FORM -->
                        <form action="/tasks/{{ $task->id }}" method="POST" class="flex gap-2 flex-wrap items-center">
                            @csrf
                            @method('PUT')
                            <input type="text" name="title" value="{{ $task->title }}"
                                class="p-2 rounded-lg bg-gray-700 border border-gray-600 text-gray-100 focus:outline-none focus:ring-2 focus:ring-pink-500">

                            <label class="flex items-center gap-1 text-gray-200">
                                <input type="checkbox" name="is_completed" value="1" {{ $task->is_completed ? 'checked' : '' }}
                                    class="w-5 h-5 accent-pink-500">
                                Completed
                            </label>

                            <button class="bg-yellow-500 hover:bg-yellow-600 transition text-gray-900 px-3 py-1 rounded font-bold">
                                Update
                            </button>
                        </form>

                        <!-- DELETE FORM -->
                        <form action="/tasks/{{ $task->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 hover:bg-red-600 transition text-white px-3 py-1 rounded font-bold">
                                Delete
                            </button>
                        </form>

                    </div>
                </div>
            @endforeach
        </div>

    </div>

</body>
</html>