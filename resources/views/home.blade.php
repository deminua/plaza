@extends('layouts.app')

@section('content')

<div id="home">

<section id="sale" class="container">
    <div class="row text-center">
        <div class="col-sm-12">
        <h1>Акции и скидки</h1>
        <p class="subtext">Торговый комплекс «Плаза» дарит Вам скидки на покупки!</p>
        </div>
            @foreach($sales as $sale)
            @if(count($sale->avatar) == 1)
                <article class="sale col-sm-6">
                    <a title="{{ $sale->name }}" href="{{ route('sale.show', ['slug'=>$sale->slug, 'store'=>$sale->store->slug]) }}">
                        <img width="800" height="400" src="{{ route('imagecache', ['medium', $sale->avatar->first()->filename]) }}" class="img-responsive" alt="{{ $sale->name }}" />
                    </a>
                </article>
            @endif
            @endforeach        
    </div>
</section>




<section id="catalog">
    <div class="container-fluid line">
        <h1>Каталог магазинов</h1>
        <p class="subtext">Каталог всех магазинов с акциями и скидками</p>
    </div>


    <div class="container">
        <article class="row text-center">
            @foreach($stores as $store)
            @if(count($store->avatar) == 1)
                <a title="{{ $store->name }}" href="{{ route('store.show', ['slug'=>$store->slug]) }}"><img src="{{ route('imagecache', ['logo', $store->avatar->first()->filename]) }}"></a>
            @endif
            @endforeach
         </article>
    </div>
</section>



<section id="news">
    <div class="container-fluid line">
            <h1>Новости и события</h1>
            <p class="subtext">Только актуальные новости нашего торгового комплекса...</p>
    </div>

    <div class="container">
        <div class="row">

            @foreach($news as $new)

              @include('news.item', ['class_name' => 'col-sm-4'])

            @endforeach     


        </div>
    </div>
</section>

</div>

@endsection




@section('map')
  @include('layouts.map')
@endsection



@section('slider')

<!-- Carousel -->
<aside id="plazaCarousel" class="carousel slide" data-ride="carousel">
    <img class="topLine" src="/svg/top.svg">
    <img class="bottomLine" src="/svg/bottom.svg">

      <!-- Indicators -->
      <ol class="carousel-indicators">
      @foreach($sliders as $slider)
        <li role="button" data-target="#plazaCarousel" data-slide-to="{{ $slider->sorting }}" @if($slider->sorting == '0') class="active" @endif ></li>
      @endforeach
      </ol>
      <section class="carousel-inner" role="listbox">
      @foreach($sliders as $slider)
        <article class="item @if($slider->sorting == '0') active @endif">
          <img class="day-slide" src="/storage/sliders/{{ $slider->filename }}" alt="{{ $slider->name }}">
          @if($slider->title and $slider->description)
            <div class="container">
                <div class="carousel-caption">
                  <h1><a href="#" role="button">{{ $slider->name }}</a></h1>
                  <p class="hidden-xs"><a href="#" role="button">Скидки до -20% на всю летнюю коллекцию! Акция действует до 31 августа, спешите!</a></p>
                </div>
            </div>
          @endif
        </article>
      @endforeach
      </section>
      <a class="left carousel-control" href="#plazaCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#plazaCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
</aside><!-- /.carousel -->
@endsection
