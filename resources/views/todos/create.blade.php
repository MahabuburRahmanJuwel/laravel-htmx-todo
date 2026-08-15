<form
    id="todo-create-form"
    hx-post="{{ route('todos.store') }}"
    hx-target="#todo-create-form"
    hx-swap="outerHTML"
>

    @csrf

    <div class="form-group">

        <label for="title">
            Create Todo
        </label>

        <input
            type="text"
            id="title"
            name="title"
            class="form-control @error('title') is-invalid @enderror"
            value="{{ old('title') }}"
            placeholder="Enter todo..."
            autofocus
        >

        @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

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
            Create Todo
        </button>

    </div>

</form>