

	                <article class="{{ $class_name }}" style="margin-bottom: 10px; margin-top: 10px;">
	                        <a title="{{ $sale->name }}" href="{{ route('store.show', ['id'=>$sale->store_id]) }}">
	                        	<img src="{{ route('imagecache', ['medium', $sale->avatar->first()->filename]) }}" class="img-responsive" alt="{{ $sale->name }}" />
	                        </a>
	                        <h2>{{ $sale->name }}</h2>
	                        <div style="font-size: 8pt;">{{ $sale->store->name }}, {{ $sale->store->floor->name }}, {{ $sale->store->shop->name }} | {{ $sale->created_at->format('d.m.Y') }}</div>
	                    	<p>{!! nl2br($sale->description) !!}</p>
	                        <hr>
	                    
	                </article>

<center>{{ $sales->links() }}</center>