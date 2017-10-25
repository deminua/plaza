@extends('layouts.app')

@section('title', $meta['title'])

@section('content')

<img class="topLine" src="/svg/top.svg">

<section id="catalog_list">

    <div class="container">
        


@foreach($shops as $shop)
<div class="row">
<div class="col-sm-12"><h1>{{ $meta['title'] }} {{ $shop->name }}</h1></div>





	@foreach($stores as $store)
	
	

	@if($store->shop_id == $shop->id and count($store->avatar) == 1)
			
			<article class="col-xs-6 col-sm-4 col-md-3">
				<a class="brand" href="{{ route('store.show', ['id'=>$store->id]) }}">
					<img alt="{{ $store->name }}" src="{{ route('imagecache', ['logo', $store->avatar->first()->filename]) }}">
					<!-- @if($store->description)<p>{{ $store->description }}</p>@endif -->
				</a>
					<div class="floor_shop">{{ $store->floor->name }}, {{ $shop->name }}</div>
			</article>

	@endif
	
	
	@endforeach

</div>
@endforeach


    </div>
</section>


@endsection

