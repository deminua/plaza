@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

<h1>Создать слайд</h1>
<hr>

{!! Form::model($slider, ['route' => ['admin.store.slider', 'id'=>$slider->id, 'model_id'=>app('request')->input('model_id'), 'model_name'=>app('request')->input('model_name')], 'files' => true]) !!}

<div class="form-group">
	{!! Form::label('name', 'Название') !!}
	{!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
	{!! Form::label('url', 'Прямая ссылка (http://www...)') !!}
	{!! Form::text('url', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('Изображение') !!}
    {!! Form::file('slider') !!}
</div>

<div class="form-group">
	{!! Form::submit('Сохранить', ['class'=>'btn btn-primary']) !!}
</div>

{!! Form::close() !!}

        </div>
    </div>
</div>
@endsection


