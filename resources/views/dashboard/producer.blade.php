<a href="{{ route('producer.create') }}" class="btn btn-secondary btn-sm">
    <i class="fa fa-plus" aria-hidden="true"></i>
</a>

<table class="table table-hover table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($producers as $producer)
                <tr>
                    <td><a href="{{ route('producer.show',$producer->id) }}">{{ $producer->name }}</a></td>
                    <td><a href="{{ route('producer.edit', $producer->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a></td>
                    <td>
                        {{-- <form action="{{ route('producer.destroy',$producer->id) }}" method="POST"> --}}
                            {!! Form::model($producer, ['route' => ['producer.destroy', $producer->id], 'method'=>'POST']) !!}
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
</table>
<div class="d-flex justify-content-center">
    {{ $producers->links() }}
</div>
