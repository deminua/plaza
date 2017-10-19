@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

<h1>Все слайды</h1>

<hr>

<table class="table table-hover">
    @foreach ($sliders as $slider)



        <tr @if(!$slider->confirmed) class="danger" @endif>
        	<td style="width:200px"><img src="{{ route('imagecache', ['small', $slider->filename]) }}"></td>
        	<td>
        		<p>ID: {{ $slider->id }}</p>
        		<p>Название: {{ $slider->name }}</p>
        		<p>Ссылка: {{ $slider->url }}</p>
        	</td>

<td>
	@if($slider->rowgable->gettable() == 'stores')
		<p>Тип: Магазин</p>
		<p>Принадлежит: <a href="{{ route('admin.index.post', ['store_id'=>$slider->rowgable->id]) }}">{{ $slider->rowgable->name }}</a></p>
	@endif

	@if($slider->rowgable->gettable() == 'posts')
		<p>Тип: Запись</p>
		<p>Принадлежит: <a href="{{ route('admin.create.post', ['id'=>$slider->rowgable->id]) }}">{{ $slider->rowgable->name }}</a></p>
	@endif

        <p>Создан: {{ $slider->created_at }}</p>
</td>
        	<td>@if(!$slider->confirmed)
			        <a title="Включить" href="{{ route('admin.edit.slider', ['id'=>$slider->id, 'confirmed'=>'1']) }}"><span class="glyphicon glyphicon-eye-close"></span></a>
			    @else
			   		<a title="Выключить" href="{{ route('admin.edit.slider', ['id'=>$slider->id, 'confirmed'=>'0']) }}"><span class="glyphicon glyphicon-eye-open"></span></a>
			    @endif
			</td>

			<td><a title="Удалить" onclick="return confirm('Вы уверены, что хотите удалить этот элемент?');"  href="{{ route('admin.edit.slider', ['id'=>$slider->id, 'delete'=>'1']) }}"><span class="glyphicon glyphicon-trash"></span></a></td>
        </tr>
    @endforeach
</table>


        </div>
    </div>
</div>
@endsection


