<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager Laravel App</title>

    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class=" page-tasks bg-black font-[Inter] text-amber-400 min-h-screen p-6">

    <div class="max-w-4xl mx-auto">

        <!-- HEADER -->
        <header class="mb-8 text-center">
            <h1
                class="text-4xl font-extrabold tracking-widest mb-2 
                bg-gradient-to-r from-amber-400 via-amber-500 to-amber-600 bg-clip-text text-transparent">
                TASK MANAGER
            </h1>
            <p class="text-amber-500 text-sm">Operational dashboard active.</p>
        </header>

        <!-- ADD TASK FORM -->
        <div class="bg-red-900/40 backdrop-blur-sm border border-amber-800 p-6 rounded-xl shadow-2xl mb-8">
            <h2 class="text-2xl font-bold mb-4 text-amber-400">Task Form</h2>

            <form action="/tasks" method="POST" class="space-y-3">
                @csrf

                <input type="text" name="title" placeholder="Task Title"
                    class="w-full p-3 rounded-lg bg-black/70 border border-amber-800 focus:outline-none focus:ring-2 focus:ring-amber-500 text-amber-200 placeholder-amber-600"
                    required>

                <textarea name="description" placeholder="Task Description"
                    class="w-full p-3 rounded-lg bg-black/70 border border-amber-800 focus:outline-none focus:ring-2 focus:ring-amber-500 text-amber-200 placeholder-amber-600"></textarea>

                <button
                    class="px-6 py-2 rounded-lg text-amber-500 font-medium
                    bg-gradient-to-r from-yellow-900 to-yellow-950
                    hover:scale-105 hover:shadow-lg hover:shadow-orange-300/30
                    active:scale-95 transition-all duration-200">
                    Add Task
                </button>
            </form>
        </div>

        <!-- TASK LIST -->
        <div class="bg-red-900/40 backdrop-blur-sm border border-amber-800 p-6 rounded-xl shadow-2xl">
            <h2 class="text-2xl font-bold mb-4 text-amber-400">Task List</h2>

            @foreach ($tasks as $task)
                <div
                    class="border-b border-amber-800 py-4 flex flex-col md:flex-row md:justify-between md:items-center">

                    <!-- DISPLAY -->
                    <div class="mb-3 md:mb-0">
                        <h3 class="text-lg font-bold tracking-wide text-amber-300">
                            {{ $task->title }}
                        </h3>

                        <p class="text-amber-500">
                            {{ $task->description }}
                        </p>

                        <span
                            class="{{ $task->is_completed ? 'text-green-400' : 'text-amber-500' }} font-semibold text-sm">
                            {{ $task->is_completed ? 'Completed' : 'Pending' }}
                        </span>
                    </div>

                    <!-- ACTIONS -->
                    <div class="flex gap-2 flex-wrap items-center">

                        <!-- UPDATE FORM -->
                        <form action="/tasks/{{ $task->id }}" method="POST"
                            class="flex gap-2 flex-wrap items-center">
                            @csrf
                            @method('PUT')

                            <input type="text" name="title" value="{{ $task->title }}"
                                class="p-2 rounded-lg bg-black/70 border border-amber-800 text-amber-200 focus:outline-none focus:ring-2 focus:ring-amber-500">

                   <label class="toggle">
  <input type="checkbox" name="is_completed" value="1" {{ $task->is_completed ? 'checked' : '' }}>
  <span class="slider"></span>
  <span class="label-text">Done</span>
</label>

                            <button
                                class="px-4 py-1 rounded-lg text-amber-500 font-medium
                                bg-gradient-to-r from-yellow-900 to-yellow-950
                                hover:scale-105 hover:shadow-lg hover:shadow-orange-300/30
                                active:scale-95 transition-all duration-200">
                                Update
                            </button>
                        </form>

                        <!-- DELETE FORM -->
                        <form action="/tasks/{{ $task->id }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button
                                class="px-4 py-1 rounded-lg text-amber-500 font-medium
                                bg-gradient-to-r from-yellow-900 to-yellow-950
                                hover:scale-105 hover:shadow-lg hover:shadow-orange-300/30
                                active:scale-95 transition-all duration-200">
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
