<article class="{{ $class_name }}">
@if(!empty($new->avatar->first()))
    <a title="{{ $new->name }}" href="{{ route('news.show', ['slug'=>$new->slug, 'store'=>$new->store->slug]) }}">
        <img alt="{{ $new->name }}" src="{{ route('imagecache', ['medium', $new->avatar->first()->filename]) }}" class="img-responsive">
    </a>
@endif

@if(empty($new->avatar->first()) and !empty($new->youtube))
<iframe width="800" height="400" class="youtube img-responsive" src="https://www.youtube.com/embed/{{ $new->youtube }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
@endif

<h2><a href="{{ route('news.show', ['slug'=>$new->slug, 'store'=>$new->store->slug]) }}">{{ $new->name }}</a></h2>
<p>{{ $new->description }}</p>
<div class="info"><span class="left">{{ $new->store->floor->name }}, {{ $new->store->shop->name }}</span><span class="right">{{ $new->created_at }}</span></div>
</article>