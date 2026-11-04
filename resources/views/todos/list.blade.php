<ul class="list-group">

    @forelse ($data as $item)

        @include('todos.item', [
            'item' => $item
        ])

    @empty

        <li class="list-group-item text-center text-muted">
            No todos found.
        </li>

    @endforelse

</ul>

