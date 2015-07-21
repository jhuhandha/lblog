@extends('layout/index')

@section('main')
    <h1>Create Book</h1>
    {!! Form::open(['url' => 'books', 'files' => true]) !!}
    <div class="form-group @if ($errors->has('isbn')) has-error @endif">
        {!! Form::label('ISBN', 'ISBN:') !!}
        {!! Form::text('isbn',null,['class'=>'form-control']) !!}
        @if ($errors->has('isbn')) <p class="help-block">{{ $errors->first('isbn') }}</p> @endif
    </div>
    <div class="form-group">
        {!! Form::label('Title', 'Title:') !!}
        {!! Form::text('titulo',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Author', 'Author:') !!}
        {!! Form::text('autor',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Publisher', 'Publisher:') !!}
        {!! Form::text('publicacion',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Categoria', 'Categoria:') !!}
        {!! Form::select('idCategoria', (['0' => 'Select a Category'] + $categoria), null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group @if ($errors->has('imagen')) has-error @endif">
        {!! Form::label('imagen', 'Image:') !!}
        {!! Form::file('imagen',null,['class'=>'form-control']) !!}
        @if ($errors->has('imagen')) <p class="help-block">{{ $errors->first('imagen') }}</p> @endif
    </div>
    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
@stop