<article class="{{ $class_name }}">
@if(!empty($new->avatar->first()))
    <a title="{{ $new->name }}" href="#">
        <img alt="{{ $new->name }}" src="{{ route('imagecache', ['medium', $new->avatar->first()->filename]) }}" class="img-responsive">
    </a>
@endif
<h2><a href="#">{{ $new->name }}</a></h2>
<p>{{ $new->description }}</p>
<div class="info"><span class="left">{{ $new->store->floor->name }}, {{ $new->store->shop->name }}</span><span class="right">{{ $new->created_at->format('d.m.Y') }}</span></div>
</article>