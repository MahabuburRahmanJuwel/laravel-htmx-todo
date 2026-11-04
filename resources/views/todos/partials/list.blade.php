@if($todos->isEmpty())
    <p class="text-center text-gray-500 py-4">No tasks found!</p>
@else
    <ul class="divide-y divide-gray-200">
        @foreach($todos as $todo)
            <li id="todo-{{ $todo->id }}" class="py-4 flex items-center justify-between gap-4">
                <div class="flex items-center gap-3 flex-1">
                    <!-- Complete/Incomplete Toggle Checkbox -->
                    <input type="checkbox" {{ $todo->is_completed ? 'checked' : '' }}
                           hx-patch="{{ route('todos.toggle', $todo) }}"
                           hx-target="#todo-list"
                           class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">

                    <div class="flex flex-col">
                        <span class="text-lg {{ $todo->is_completed ? 'line-through text-gray-400' : 'text-gray-800' }}">
                            {{ $todo->title }}
                        </span>
                        <div class="flex gap-2 mt-1">
                            <span class="text-xs bg-gray-200 text-gray-700 px-2 py-0.5 rounded">{{ $todo->category }}</span>
                            @if($todo->due_date)
                                <span class="text-xs bg-red-100 text-red-600 px-2 py-0.5 rounded">Due: {{ $todo->due_date }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- অ্যাকশন বাটনসমূহ (Inline Edit & Delete) -->
                <div class="flex items-center gap-2">
                    <button hx-get="{{ route('todos.edit', $todo) }}" hx-target="#todo-{{ $todo->id }}" hx-swap="outerHTML"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white text-sm px-3 py-1 rounded-md transition">
                        Edit
                    </button>
                    <button hx-delete="{{ route('todos.destroy', $todo) }}" hx-target="#todo-list" hx-confirm="Are you sure?"
                            class="bg-red-500 hover:bg-red-600 text-white text-sm px-3 py-1 rounded-md transition">
                        Delete
                    </button>
                </div>
            </li>
        @endforeach
    </ul>
@endif
