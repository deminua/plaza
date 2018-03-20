<article class="{{ $class_name }}" style="margin-bottom: 10px; margin-top: 10px;">
		
		@if(empty($sale->avatar->first()) and !empty($sale->youtube))
			<iframe width="800" height="400" class="youtube img-responsive" src="https://www.youtube.com/embed/{{ $sale->youtube }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
		@else
			<a title="{{ $sale->name }}" href="{{ route('sale.show', ['id'=>$sale->slug, 'store'=>$sale->store->slug]) }}">
			@if($sale->avatar->first())
			<img src="{{ route('imagecache', ['medium', $sale->avatar->first()->filename]) }}" class="img-responsive" alt="{{ $sale->name }}" />
			@else
			<img style="padding: 90px 30px;" src="images/logo.png" class="img-responsive" alt="{{ $sale->name }}" />
			@endif
			</a>
		@endif

	<h2><a title="{{ $sale->name }}" href="{{ route('sale.show', ['id'=>$sale->slug, 'store'=>$sale->store->slug]) }}">{{ $sale->name }}</a></h2>
	<div style="font-size: 8pt;">{{ $sale->store->name }}, {{ $sale->store->floor->name }}, {{ $sale->store->shop->name }} | {{ $sale->created_at }}</div>
	<p>{!! nl2br($sale->description) !!}</p>
	<hr>
</article>