@extends('layouts.app')

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading"></h4>
            <p>{{ Session::get('success') }}</p>
            <p class="mb-0"></p>
        </div>
    @endif


    <a href="{{ route('actor.create') }}" class="btn btn-primary m-3">
        <span class="m-3"> Add Actor</span><i class="fa fa-plus" aria-hidden="true"></i>
    </a>

    <table class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
            <tr>
                <th></th>
                <th>Name</th>
                <th>Note</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($actors as $actor)
                    <tr>
                        <td class="w-25">
                            @if ($actor->photo == null)
                                <img src="{{asset('logo-01.jpg')}}" class="card-img-top" alt="...">
                            @else
                                <img src="{{$actor->actorUrlCard}}" class="card-img-top" alt="...">
                            @endif
                        </td>
                        @if($actor->trashed())
                            <td data-toggle="tooltip" title="This actor is removed.">{{ $actor->name }}</td>
                            <td>{{ $actor->note }}</td>
                            <td>{!! Form::model($actor, ['route' => ['actor.restore', $actor->id], 'method'=>'POST']) !!}
                                    @csrf
                                    {!! Form::button('<i class="fa fa-undo"></i>',['type'=>'submit','class'=>' btn btn-info', 'data-toggle'=>'tooltip', 'title'=>'Click to restore actor!', 'aria-hidden'=>'true']) !!}
                            {!! Form::close() !!}<td>
                        @else
                            <td><a href="{{ route('actor.show',$actor->id) }}" data-toggle="tooltip" title="View">{{ $actor->name }}</a></td>  
                            <td>{{ $actor->note }}</td>
                            <td><a href="{{ route('actor.edit', $actor->id) }}" class="btn btn-warning" data-toggle="tooltip" title="Edit actor"><i class="fa fa-edit"></i></a></td>
                            <td>
                                    {!! Form::model($actor, ['route' => ['actor.destroy', $actor->id], 'method'=>'POST']) !!}
                                    @csrf
                                    @method('DELETE')
                                    {!! Form::button('<i class="fa fa-trash"></i>',['type'=>'submit','class'=>' btn btn-danger', 'data-toggle'=>'tooltip', 'title'=>'Delete actor!', 'aria-hidden'=>'true']) !!}
                                    {!! Form::close() !!}
                            </td>
                            <td><a href="{{ route('actor.restore',$actor->id) }}" onclick="return false;" data-toggle="tooltip" title="Restore actor"><i class="fa fa-undo" style="font-size:24px; color:grey"></i></a>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $actors->links() }}
    </div>
@endsection
