@extends('layouts.app')

@section('title', $meta['title'])

@section('content')

<img class="topLine" src="/svg/top.svg">

<section id="store_show">
<div class="container">

	<div class="row">
		<div class="col-sm-3 col-sm-push-9" style="margin: 20px 0px 20px 0px;">
					
					<article>
					<img style="width: 100%; opacity: 0.4" alt="{{ $store->name }}" src="{{ route('imagecache', ['large', $store->avatar->first()->filename]) }}">
					
					<div class="description" style="margin: 40px 0px 40px 0px;">
						<h1>{{ $meta['title'] }}</h1>
						@if($store->description)<p>{{ $store->description }}</p>@endif
						<p>Торговый комплекс: {{ $store->shop->name }}<br>Этаж: {{ $store->floor->name }}</p>
					</div>
					</article>



					<section>
					<h1>Новости и события</h1>
					<div style="text-align: center; margin: 20vh 0vh;">На данный момент новостей нет</div>
					</section>
				
		</div>

		<div class="col-sm-9 col-sm-pull-3">
			<h1>Акции и скидки от {{ $store->name }}</h1>
            @if(empty($sales))

	            @foreach($sales as $sale)
	            @if(count($sale->avatar) == 1)
	                <article>
	                    <a title="{{ $sale->name }}" href="#">
	                        <img src="{{ route('imagecache', ['medium', $sale->avatar->first()->filename]) }}" class="img-responsive" alt="{{ $sale->name }}" />
	                    </a>
	                </article>
	            @endif
	            @endforeach   

	        @else
	        	<div style="text-align: center; margin: 20vh 0vh;">На данный момент акций и скидок нет, но скоро будут!</div>
            @endif

		</div>



					<article class="col-sm-12">
						<h1>{{ $store->name }}</h1>
						<div>{!! nl2br($store->content) !!}</div>
						<div style="text-align: center; margin: 20vh 0vh;">Полная информация о {{ $store->name }}</div>
					</article>


		<article class="col-sm-12">
			<h1>Галерея {{ $store->name }}</h1>
			<div style="text-align: center; margin: 20vh 0vh;">Фотогалерея  {{ $store->name }}</div>
		</article>
	</div>

</div>
</section>


@endsection

