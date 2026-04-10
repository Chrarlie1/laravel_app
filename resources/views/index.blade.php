<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager Laravel App</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-black text-gray-200 font-mono min-h-screen p-6">

    <div class="max-w-4xl mx-auto">

        <!-- HEADER -->
        <header class="mb-8 text-center">
            <h1 class="text-4xl font-extrabold text-red-500 tracking-widest mb-1">
                TASK MANAGER
            </h1>
            <p class="text-gray-500 text-sm">Operational dashboard active.</p>
        </header>

        <!-- ADD TASK FORM -->
        <div class="bg-zinc-900 p-6 rounded-xl shadow-2xl mb-8 border border-red-800">
            <h2 class="text-2xl font-bold mb-4 text-red-400">Add Task</h2>

            <form action="/tasks" method="POST" class="space-y-3">
                @csrf

                <input type="text" name="title" placeholder="Task Title"
                    class="w-full p-3 rounded-lg bg-black border border-red-900 focus:outline-none focus:ring-2 focus:ring-red-600 text-gray-200" required>

                <textarea name="description" placeholder="Task Description"
                    class="w-full p-3 rounded-lg bg-black border border-red-900 focus:outline-none focus:ring-2 focus:ring-red-600 text-gray-200"></textarea>

                <button class="bg-red-700 hover:bg-red-600 transition text-white px-6 py-2 rounded-lg font-bold shadow-lg hover:shadow-red-900/50">
                    Add Task
                </button>
            </form>
        </div>

        <!-- TASK LIST -->
        <div class="bg-zinc-900 p-6 rounded-xl shadow-2xl border border-red-800">
            <h2 class="text-2xl font-bold mb-4 text-red-400">Task List</h2>

            @foreach ($tasks as $task)
                <div class="border-b border-red-900 py-4 flex flex-col md:flex-row md:justify-between md:items-center">

                    <!-- DISPLAY -->
                    <div class="mb-3 md:mb-0">
                        <h3 class="text-lg font-bold text-red-300 tracking-wide">
                            {{ $task->title }}
                        </h3>

                        <p class="text-gray-400">
                            {{ $task->description }}
                        </p>

                        <span class="{{ $task->is_completed ? 'text-green-400' : 'text-red-500' }} font-semibold text-sm">
                            {{ $task->is_completed ? 'Completed' : 'Pending' }}
                        </span>
                    </div>

                    <!-- ACTIONS -->
                    <div class="flex gap-2 flex-wrap">

                        <!-- UPDATE FORM -->
                        <form action="/tasks/{{ $task->id }}" method="POST" class="flex gap-2 flex-wrap items-center">
                            @csrf
                            @method('PUT')

                            <input type="text" name="title" value="{{ $task->title }}"
                                class="p-2 rounded-lg bg-black border border-red-900 text-gray-200 focus:outline-none focus:ring-2 focus:ring-red-600">

                            <label class="flex items-center gap-1 text-gray-300 text-sm">
                                <input type="checkbox" name="is_completed" value="1"
                                    {{ $task->is_completed ? 'checked' : '' }}
                                    class="w-5 h-5 accent-red-600">
                                Done
                            </label>

                            <button class="bg-yellow-600 hover:bg-yellow-500 transition text-black px-3 py-1 rounded font-bold">
                                Update
                            </button>
                        </form>

                        <!-- DELETE FORM -->
                        <form action="/tasks/{{ $task->id }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button class="bg-red-700 hover:bg-red-600 transition text-white px-3 py-1 rounded font-bold">
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