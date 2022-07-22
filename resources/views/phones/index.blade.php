@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('phones.create') }}" class="btn btn-primary">Add Phone</a>

        <div class="row">
            @foreach ($phones as $phone)
                <div class="col-6 py-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Phone Number</h5>
                            <p class="card-text">{{ $phone->mobilephone }}</p>
                            <div class="d-flex justify-content-around">
                                <a href="{{ route('phones.edit', $phone->id) }}" class="btn btn-warning">Edit</a>
                                {!! Form::open(['route' => ['phones.destroy', $phone->id], 'method' => 'DELETE']) !!}
                                <input type="submit" value="Delete" class="btn btn-danger">
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
