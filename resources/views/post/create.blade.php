@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

<h1>Управление публикацией</h1>

<hr>
</div>


{!! Form::model($post, ['route' => ['admin.store.post', 'id'=>$post->id ], 'files' => true]) !!}


        <div class="col-md-6">
			<div class="form-group">
				{!! Form::label('name', 'Название') !!}
				{!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
			</div>
		
		<div class="form-group">
			{!! Form::label('description', 'Краткое описание') !!}
			{!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '8']) !!}
		</div>

		</div>


        <div class="col-md-6">

			<div class="form-group">
				{!! Form::label('created_at', 'Дата и время') !!}
				{!! Form::text('created_at', null, ['class' => 'form-control']) !!}
			</div>

			<!-- Category Form Input -->
			<div class="form-group">
			    {!! Form::label('category_id', 'Категория:') !!}
			    {!! Form::select('category_id', $category, null, ['class' => 'form-control']) !!}
			</div>

			<!-- Store Form Input -->
			<div class="form-group">
			    {!! Form::label('store_id', 'Магазин:') !!}
			    {!! Form::select('store_id', $store, null, ['class' => 'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('youtube', 'Youtube') !!}
				{!! Form::text('youtube', null, ['class' => 'form-control', 'placeholder'=>'Код: DJ0DM_xZEyc']) !!}
			</div>

		</div>



<div class="col-md-12">


		<div class="form-group">
			{!! Form::label('content', 'Содержание') !!}
			{!! Form::textarea('content', null, ['id'=>'tinymce_content', 'class' => 'form-control']) !!}
		</div>



		<div class="images_flex">

			@foreach($post->images as $image)
			<div class="image @if($image->avatar) avatar @endif">
				<div><img style="max-height:200px;" src="{{ route('imagecache', ['prev', $image->filename]) }}"></div>
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

</div>

{!! Form::close() !!}

        
    </div>
</div>
@endsection


