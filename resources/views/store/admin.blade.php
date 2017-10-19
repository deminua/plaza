@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

<h1>Каталог магазинов</h1>

<hr>

<table class="table table-hover">
<thead>
	<tr>
		<th>#</th>
		<th></th>
		<th>Магазин</th>
		<th>ТЦ</th>
		<th>Этаж</th>
		<th>Создано</th>
		<th>Обновлено</th>
		<th></th>
		<th></th>
		<th></th>
	</tr>
</thead>

    @foreach ($stores as $store)

        <tr @if(!$store->confirmed) class="danger" @endif>
        	<td>{{ $store->id }}</td>

        	<td>
        	@if($store->avatar->first())<a data-toggle="tooltip" data-placement="top" href="{{ route('admin.create.store', ['id'=>$store->id]) }}" data-html="true" title="<img width='180px' src='{{ route('imagecache', ['logo', $store->avatar->first()->filename]) }}'>"><span class="glyphicon glyphicon-picture"></span></a>@endif
        	</td>
        	<td><a href="{{ route('admin.create.store', ['id'=>$store->id]) }}">{{ $store->name }}</a></td>
        	<td>{{ $store->shop->name }}</td>
        	<td>{{ $store->floor->name }}</td>
        	<td>{{ $store->created_at }}</td>
        	<td>{{ $store->updated_at }}</td>

        	<td><a title="Добавить слайд" href="{{ route('admin.slider.create', ['model_id'=>$store->id, 'model_name'=>'Store']) }}"><span class="glyphicon glyphicon-picture"></span></a></td>
        	
        	<td>@if(!$store->confirmed)
			        <a title="Включить" href="{{ route('admin.edit.store', ['id'=>$store->id, 'confirmed'=>'1']) }}"><span class="glyphicon glyphicon-eye-close"></span></a>
			    @else
			   		<a title="Выключить" href="{{ route('admin.edit.store', ['id'=>$store->id, 'confirmed'=>'0']) }}"><span class="glyphicon glyphicon-eye-open"></span></a>
			    @endif
			</td>
			<td><a title="Удалить" onclick="return confirm('Вы уверены, что хотите удалить этот элемент?');"  href="{{ route('admin.delete.store', ['id'=>$store->id]) }}"><span class="glyphicon glyphicon-trash"></span></a></td>
        </tr>
    @endforeach
</table>

<center>
	{{ $stores->links() }}
</center>

        </div>
    </div>
</div>
@endsection


