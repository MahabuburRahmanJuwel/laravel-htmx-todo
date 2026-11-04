<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel HTMX Todo App</title>
    <!-- Tailwind CSS এবং HTMX CDN -->
    <script src="https://tailwindcss.com"></script>
    <script src="https://unpkg.com"></script>
</head>
<body class="bg-gray-100 min-h-screen py-10">
    <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Interactive Todo App</h1>

       ) -->
        <div class="flex gap-4 mb-6">
            <input type="text" name="search" placeholder="Search tasks..."
                   hx-get="{{ route('todos.index') }}"
                   hx-trigger="keyup changed delay:300ms"
                   hx-target="#todo-list"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

            <select name="filter_category"
                    hx-get="{{ route('todos.index') }}"
                    hx-target="#todo-list"
                    class="px-4 py-2 border rounded-lg bg-white focus:outline-none">
                <option value="All">All Categories</option>
                <option value="General">General</option>
                <option value="Work">Work</option>
                <option value="Personal">Personal</option>
                <option value="Shopping">Shopping</option>
            </select>
        </div>


        <form hx-post="{{ route('todos.store') }}" hx-target="#todo-list" hx-on::after-request="this.reset()" class="mb-8">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                <input type="text" name="title" placeholder="What needs to be done?" required
                       class="md:col-span-1 px-4 py-2 border rounded-lg focus:outline-none">

                <select name="category" class="px-4 py-2 border rounded-lg bg-white focus:outline-none">
                    <option value="General">General</option>
                    <option value="Work">Work</option>
                    <option value="Personal">Personal</option>
                    <option value="Shopping">Shopping</option>
                </select>

                <input type="date" name="due_date" class="px-4 py-2 border rounded-lg focus:outline-none">
            </div>
            <button type="submit" class="w-full mt-3 bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg transition">
                Add Task
            </button>
        </form>


        <div id="todo-list">
            @include('todos.partials.list')
        </div>
    </div>
</body>
</html>
