<li
    id="todo-{{ $item->id }}"
    class="list-group-item d-flex justify-content-between align-items-center"
>

    <div>
        @if($item->status )
        <span class="{{ $item->status ? 'font-weight-lighter ' : '' }}">
           <s> {{ $item->title }}</s> 
        </span>
        @else
        <span >
            {{ $item->title }} 
        </span>
        @endif

    </div>


    <div>

        {{-- Edit --}}
        <button
            type="button"
            class="btn btn-sm btn-warning"
            data-toggle="modal"
            data-target="#todoModal"
            hx-get="{{ route('todos.edit', $item) }}"
            hx-target="#todo-modal-content"
            hx-swap="innerHTML"
        >
            Edit
        </button>


        {{-- Delete --}}
        <button
            type="button"
            class="btn btn-sm btn-danger"
            hx-delete="{{ route('todos.destroy', $item) }}"
            hx-target="#todo-{{ $item->id }}"
            hx-swap="outerHTML"
            hx-confirm="Are you sure you want to delete this todo?"
        >
            Delete
        </button>

    </div>

</li>