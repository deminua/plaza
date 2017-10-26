@extends('layouts.app')

@section('title', $meta['title'])

@section('content')

<img class="topLine" src="/svg/top.svg">

<section id="store_show">
<div class="container">

	<div class="row">
		<div class="col-sm-3 col-sm-push-9">
					
					<article style="margin: 20px 0px 20px 0px;">
					@if($store->avatar->first())<img style="width: 100%; opacity: 0.4" alt="{{ $store->name }}" src="{{ route('imagecache', ['large', $store->avatar->first()->filename]) }}">@endif
					
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
					<div style="text-align: center; margin: 5vw 0px;">На данный момент новостей нет</div>
					@endif
					</section>
				
		</div>


		<div class="col-sm-9 col-sm-pull-3">

@if($sale and count($sale->avatar) == 1)

			<h1>Акции и скидки от {{ $store->name }}</h1>

	                <article style="margin-bottom: 10px; margin-top: 10px;">
	                        <img width="100%" src="{{ route('imagecache', ['medium', $sale->avatar->first()->filename]) }}" class="img-responsive" alt="{{ $sale->name }}" />
	                        <div style="float:right; font-size: 8pt;">{{ $sale->created_at->format('d.m.Y') }}</div>
	                    	<h2>{{ $sale->name }}</h2>
	                        <p>{!! nl2br($sale->description) !!}</p>
	                        <hr>
	                    
	                </article>
	        	<?php $gallery_class = 'col-sm-12'; ?>
	        @else
	        	<?php $gallery_class = 'col-sm-9 col-sm-pull-3'; ?>
@endif

<div class="row">
            @if(count($sales) >= 1)
	            @foreach($sales as $sale)
	            @if(count($sale->avatar) == 1)
	                <article style="margin-bottom: 10px; margin-top: 10px;" class="col-sm-6">
	                        <img width="100%" src="{{ route('imagecache', ['medium', $sale->avatar->first()->filename]) }}" class="img-responsive" alt="{{ $sale->name }}" />
	                        <div style="float:right; font-size: 8pt;">{{ $sale->created_at->format('d.m.Y') }}</div>
	                    	<h2>{{ $sale->name }}</h2>
	                        <hr>
	                    
	                </article>
	            @endif
	            @endforeach   
            @endif
</div>


		</div>





			@if(count($store->gallery) >= 1)

		<article class="{{ $gallery_class }}" style="margin-bottom: 25px">
			<h1>Галерея {{ $store->name }}</h1>
			

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
		</article>

			@endif

					<article class="{{ $gallery_class }}">
						<h1>{{ $store->name }}</h1>
						@if($store->content)
							<div style="margin-bottom: 25px">{!! nl2br($store->content) !!}</div>
						@else
							<div style="text-align: center; margin: 5vw 0px;">Полная информация о {{ $store->name }} на данный момент отсутствует.</div>
						@endif
					</article>

	</div>

</div>
</section>


@endsection

