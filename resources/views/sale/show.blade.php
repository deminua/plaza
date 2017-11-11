@extends('layouts.app')

@section('title', $meta['title'])

@section('content')

<img class="topLine" src="/svg/top.svg">

<section id="store_show">
<div class="container">

	<div class="row">


			@if($itemPost)
			<div class="col-sm-9">

						<h1>{{ $meta['title'] }}</h1>

				                <article style="margin-bottom: 10px; margin-top: 10px;">

				                   <div style="float:right; font-size: 8pt;">{{ $itemPost->created_at }}</div>
				                   <p>{!! nl2br($itemPost->content) !!}</p>
				                
				                @if(count($itemPost->avatar) >= 1)
				                @foreach($itemPost->images as $image)
				                	
									<img style="width: 100%; padding-bottom:10px;" alt="{{ $itemPost->name }}" src="{{ route('imagecache', ['large', $image->filename]) }}">
								
								@endforeach
								@endif

				                </article>

			</div>
			@endif


		<div class="col-sm-3">
					<article style="margin: 20px 0px 20px 0px;">
					@if($itemPost->store->avatar->first())
					<a title="{{ $itemPost->store->name }}" href="{{ route('store.show', ['slug'=>$itemPost->store->slug]) }}">
						<img style="width: 100%; opacity: 0.4" alt="{{ $itemPost->store->name }}" src="{{ route('imagecache', ['large', $itemPost->store->avatar->first()->filename]) }}">
					</a>
					@endif
					
					<div class="description" style="margin: 40px 0px 40px 0px;">
						<h1>{{ $itemPost->store->name }}</h1>
						@if($itemPost->store->description)<p>{{ $itemPost->store->description }}</p>@endif
						<p>Торговый комплекс: {{ $itemPost->store->shop->name }} - {{ $itemPost->store->floor->name }}</p>
					</div>
					</article>

					<section id="news">
					<h1>Новости и события</h1>
					@if(count($itemPost->store->news) >= 1)
						@foreach($itemPost->store->news as $new)
							@if($new->id != $itemPost->id)
							@include('news.item', ['class_name' => ''])
							@endif
						@endforeach
					@else
					<div style="text-align: center; margin: 5vw 0px;">На данный момент новостей нет</div>
					@endif
					</section>
				
		</div>


</div>


</div>
</section>


@endsection

