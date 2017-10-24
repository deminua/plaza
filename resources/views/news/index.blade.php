@extends('layouts.app')

@section('title', $meta['title'])

@section('content')

<img class="topLine" src="/svg/top.svg">

<section id="catalog_list">

    <div class="container">

					<section id="news">
					<h1>{{ $meta['title'] }}</h1>

						@foreach($news->chunk(2) as $items)
						<div class="row">
						    @foreach($items as $new)
						            @include('news.item', ['class_name' => 'col-sm-6'])
						    @endforeach
						</div>
						@endforeach


					</section>




    </div>
</section>


@endsection

