<form
    id="todo-edit-form"
    hx-put="{{ route('todos.update', $todo) }}"
    hx-target="#todo-edit-form"
    hx-swap="outerHTML"
>

    @csrf

    <div class="form-group">

        <label for="title">
           Edit Todo
        </label>

        <input
            type="text"
            id="title"
            name="title"
            class="form-control @error('title') is-invalid @enderror"
            value="{{ old('title', $todo->title) }}"
            placeholder="Enter todo..."
            autofocus
        >

        @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>


    <div class="form-group">

        <div class="custom-control custom-checkbox">

            <input
                type="checkbox"
                class="custom-control-input"
                id="status"
                name="status"
                value="1"
                @checked(old('status', $todo->status))
            >

            <label
                class="custom-control-label"
                for="status"
            >
                Completed
            </label>

        </div>

    </div>


    <div class="d-flex justify-content-end">

        <button
            type="button"
            class="btn btn-secondary mr-2"
            data-dismiss="modal"
        >
            Cancel
        </button>

        <button
            type="submit"
            class="btn btn-primary"
        >
            Update Todo
        </button>

    </div>

</form>