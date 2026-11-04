<li id="todo-{{ $todo->id }}" class="py-4 bg-gray-50 p-3 rounded-lg border border-yellow-200">
    <form hx-put="{{ route('todos.update', $todo) }}" hx-target="#todo-list" class="w-full">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-3 gap-2 mb-2">
            <input type="text" name="title" value="{{ $todo->title }}" required
                   class="px-3 py-1.5 border rounded focus:outline-none focus:ring-1 focus:ring-yellow-500 text-sm">

            <select name="category" class="px-3 py-1.5 border rounded bg-white text-sm focus:outline-none">
                <option value="General" {{ $todo->category == 'General' ? 'selected' : '' }}>General</option>
                <option value="Work" {{ $todo->category == 'Work' ? 'selected' : '' }}>Work</option>
                <option value="Personal" {{ $todo->category == 'Personal' ? 'selected' : '' }}>Personal</option>
                <option value="Shopping" {{ $todo->category == 'Shopping' ? 'selected' : '' }}>Shopping</option>
            </select>

            <input type="date" name="due_date" value="{{ $todo->due_date }}"
                   class="px-3 py-1.5 border rounded text-sm focus:outline-none">
        </div>
        <div class="flex justify-end gap-2">
            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white text-xs px-3 py-1.5 rounded transition">
                Save
            </button>
            <button hx-get="{{ route('todos.index') }}" hx-target="#todo-list" class="bg-gray-400 hover:bg-gray-500 text-white text-xs px-3 py-1.5 rounded transition">
                Cancel
            </button>
        </div>
    </form>
</li>
