@extends('layouts.app')

@section('title', $meta['title'])

@section('content')

<img class="topLine" src="/svg/top.svg">

<section id="catalog_list">

    <div class="container">

					<section id="sale">
					<h1>{{ $meta['title'] }}</h1>

						@foreach($sales->chunk(2) as $items)
						<div class="row">
						    @foreach($items as $sale)
						            @include('sale.item', ['class_name' => 'col-sm-6'])
						    @endforeach
						</div>
						@endforeach

            		<center>{{ $sales->links() }}</center>

					</section>



    </div>
</section>


@endsection

