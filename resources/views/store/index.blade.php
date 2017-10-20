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

			
				<a class="brand" href="#">
					<img alt="{{ $store->name }}" src="{{ route('imagecache', ['logo', $store->avatar->first()->filename]) }}">
					@if($store->description)<p>{{ $store->description }}</p>@endif
				</a>
					<div style="position: absolute; right:15px; bottom:25px; background: #eee; font-size:8pt; padding: 2px 6px;">{{ $store->floor->name }}, {{ $shop->name }}</div>
			
<!-- 				<div class="brand" style="min-height: 240px; margin-bottom: 25px; border:1px #eee solid;">
					<div class="logo-container">
						<a title="{{ $store->name }}" href="#"><img style="width:100%; padding:30px 30px 0px 30px;" alt="{{ $store->name }}" src="{{ route('imagecache', ['logo', $store->avatar->first()->filename]) }}"></a>
					</div>
					<div style="max-height: 120px; overflow: hidden; display:block; padding:30px 15px 0px 15px;">{{ $store->description }}</div>
				</div> -->
				<!-- <h1>{{ $store->name }}</h1> -->
			</article>
	@endif
	@endforeach

</div>
@endforeach


    </div>
</section>


@endsection

