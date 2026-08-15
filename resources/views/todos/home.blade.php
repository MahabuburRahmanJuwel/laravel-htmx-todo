@extends('layouts.admin')
@section('content')
    

<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Todos</h1>
                    <p class="mb-4">Manage your todo items.</p>
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                  <button
            type="button"
            class="btn btn-primary"
            data-toggle="modal"
            data-target="#todoModal"
            hx-get="{{ route('todos.create') }}"
            hx-target="#todo-modal-content"
            hx-swap="innerHTML"
        >
            <i class="fas fa-plus"></i> 
            Create Todo
        </button>
                            </h6>
                        </div>
                        <div class="card-body">
                           <div
                            id="todo-list"
                            hx-get="{{ route('todos.index') }}"
                            hx-trigger="load, todoCreated from:body"
                            hx-target="#todo-list"
                            hx-swap="innerHTML"
                        >
                            Loading todos...
                        </div>
                        </div>
                    </div>

                </div>


                {{-- Todo Modal --}}
<div
    class="modal fade"
    id="todoModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="todoModalLabel"
    aria-hidden="true"
>

    <div
        class="modal-dialog"
        role="document"
    >

        <div class="modal-content">

            <div class="modal-header">

                <h5
                    class="modal-title"
                    id="todoModalLabel"
                >
                    Todo
                </h5>

                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                >
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>

            </div>

            <div
                id="todo-modal-content"
                class="modal-body"
            >
                {{-- Form will be loaded here --}}
            </div>

        </div>

    </div>

</div>

@endsection

@section('script')
<script>
    document.body.addEventListener('todoCreated', function () {
        $('#todoModal').modal('hide');
    });
</script>
@endsection