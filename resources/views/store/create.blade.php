@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

<h1>Управление магазином</h1>

<hr>

{!! Form::model($store, ['route' => ['admin.store.store', 'id'=>$store->id ], 'files' => true]) !!}

<div class="form-group">
	{!! Form::label('name', 'Название') !!}
	{!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
</div>


<div class="form-group">
    {!! Form::label('shop_id', 'Торговый центр:') !!}
    {!! Form::select('shop_id', $shop, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('floor_id', 'Этаж:') !!}
    {!! Form::select('floor_id', $floor, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('description', 'Краткое описание') !!}
	{!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '3']) !!}
</div>

<div class="form-group">
	{!! Form::label('content', 'Содержание') !!}
	{!! Form::textarea('content', null, ['id'=>'tinymce_content', 'class' => 'form-control']) !!}
</div>


<div class="images_flex">

	@foreach($store->images as $image)
	<div class="image @if($image->avatar) avatar @endif">
		<a href="/storage/images/{{ $image->filename }}" target="_blank"><img style="max-height:200px;" src="{{ route('imagecache', ['prev', $image->filename]) }}"></a>
		<div class="btn_block">
			<a title="Выбрать/отменить аватар" class="btn_avatar" href="{{ route('image.update', [$image->id, 'avatar']) }}"><span class="glyphicon @if($image->avatar) glyphicon glyphicon-star @else glyphicon-star-empty @endif"></span></a>
			<a onclick="return confirm('Вы уверены, что хотите удалить этот элемент?');" title="Удалить" class="btn_delete" href="{{ route('image.update', [$image->id, 'delete']) }}"><span class="glyphicon glyphicon-remove"></span></a>
		</div>
	</div>
	@endforeach

</div>


<div class="form-group">
    {!! Form::label('Изображение') !!}
    {!! Form::file('images[]', ['multiple']) !!}
</div>

<!-- <div class="form-group">
    {!! Form::label('confirmed', 'Опубликовано') !!}
    {!! Form::checkbox('confirmed', 1); !!}
</div> -->


<div class="form-group">
	{!! Form::submit('Сохранить', ['class'=>'btn btn-primary']) !!}
</div>

{!! Form::close() !!}

        </div>
    </div>
</div>
@endsection


