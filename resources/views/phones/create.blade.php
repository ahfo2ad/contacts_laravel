@extends('layouts.app')

@section('content')
    {{-- <h1>hnnhhh</h1> --}}
    <div class="container">
        {!! Form::open(['route' => 'phones.store']) !!}
            <div class="mb-3">
                {!! Form::label('hello', 'mobilephone', ['class'=>'form-label']) !!}
                {!! Form::text('mobilephone', null, ['class'=>'form-control', 'placeholder'=>'mobilephone']) !!}
                
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        {!! Form::close() !!}
    </div>
@endsection
