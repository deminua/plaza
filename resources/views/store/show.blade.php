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



					<section id="news">
					<h1>Новости и события</h1>
					@if(count($news) >= 1)
						@foreach($news as $new)
							@include('news.item', ['class_name' => ''])
						@endforeach
					@else
					<div style="text-align: center; margin: 20vh 0vh;">На данный момент новостей нет</div>
					@endif
					</section>
				
		</div>

		<div class="col-sm-9 col-sm-pull-3">
			<h1>Акции и скидки от {{ $store->name }}</h1>
			
            @if(count($sales) >= 1)
	            @foreach($sales as $sale)
	            @if(count($sale->avatar) == 1)
	                <article style="margin-bottom: 10px; margin-top: 10px;">
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
						@if($store->content)
							<div>{!! nl2br($store->content) !!}</div>
						@else
							<div style="text-align: center; margin: 20vh 0vh;">Полная информация о {{ $store->name }}</div>
						@endif
					</article>


		<article class="col-sm-12">
			<h1>Галерея {{ $store->name }}</h1>
			
			@if(count($store->gallery) >= 1)

<div id="galleryCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
  <?php $i = 0; ?>
	  @foreach($store->gallery as $image)
	    <li data-target="#galleryCarousel" data-slide-to="{{ $i }}" @if($i == '0') class="active" @endif></li>
	    <?php $i++; ?>
	  @endforeach
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
				<?php $i = 0; ?>
				@foreach($store->gallery as $image)
				<div class="item @if($i == '0') active @endif">
				<img src="{{ route('imagecache', ['large', $image->filename]) }}" alt="{{ $store->name }}">
				</div>
				<?php $i++; ?>
				@endforeach
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#galleryCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#galleryCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>

</div>
			@else
			<div style="text-align: center; margin: 20vh 0vh;">Фотогалерея  {{ $store->name }}</div>
			@endif
		</article>
	</div>

</div>
</section>


@endsection
