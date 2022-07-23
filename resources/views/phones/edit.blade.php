@extends('layouts.app')

@section('content')

    <div class="container">
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $error }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
        
        {!! Form::model($phone, ['route' => ['phones.update', $phone->id], 'method' => 'PUT']) !!}
            <div class="mb-3">
                {!! Form::label('hello', 'mobilephone', ['class'=>'form-label']) !!}
                {!! Form::text('mobilephone', null, ['class'=>'form-control', 'placeholder'=>'mobilephone']) !!}

            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        {!! Form::close() !!}
    </div>
@endsection
