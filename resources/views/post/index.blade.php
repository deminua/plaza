@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

<h1>{{ $title }}</h1>

<hr>

<table class="table table-hover">
<thead>
	<tr>
		<th>#</th>
		<th>Название</th>
		<th>Магазин</th>
		<th>Создано</th>
		<th>Обновлено</th>
		<th></th>
		<th></th>
	</tr>
</thead>

    @foreach ($posts as $post)
        <tr @if(!$post->confirmed) class="danger" @endif>
        	<td>{{ $post->id }}</td>
        	<td><a href="{{ route('admin.create.post', ['id'=>$post->id]) }}">{{ $post->name }}</a></td>
        	<td><a href="{{ route('admin.index.post', ['store_id'=>$post->store->id]) }}">{{ $post->store->name }}</a></td>
        	<td>{{ $post->created_at }}</td>
        	<td>{{ $post->updated_at }}</td>
        	<td>@if(!$post->confirmed)
			        <a title="Включить" href="{{ route('admin.edit.post', ['id'=>$post->id, 'confirmed'=>'1']) }}"><span class="glyphicon glyphicon-eye-close"></span></a>
			    @else
			   		<a title="Выключить" href="{{ route('admin.edit.post', ['id'=>$post->id, 'confirmed'=>'0']) }}"><span class="glyphicon glyphicon-eye-open"></span></a>
			    @endif
			</td>
			<td><a title="Удалить" onclick="return confirm('Вы уверены, что хотите удалить этот элемент?');"  href="{{ route('admin.delete.post', ['id'=>$post->id]) }}"><span class="glyphicon glyphicon-trash"></span></a></td>
        </tr>
    @endforeach
</table>

<center>
	{{ $posts->links() }}
</center>

        </div>
    </div>
</div>
@endsection


