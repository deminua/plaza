@extends('layouts.app')

@section('content')


<section id="sale" class="container">
    <div class="row text-center">
        <div class="col-sm-12">
        <h1>Акции и скидки</h1>
        <p class="subtext">Торговый комплекс «Плаза» дарит Вам скидки на покупки!</p>
        </div>
            @foreach($sales as $sale)
            @if(count($sale->avatar) == 1)
                <article class="sale col-sm-6">
                    <a title="{{ $sale->name }}" href="#">
                        <img width="800" height="400" src="{{ route('imagecache', ['medium', $sale->avatar->first()->filename]) }}" class="img-responsive" alt="{{ $sale->name }}" />
                    </a>
                </article>
            @endif
            @endforeach        
    </div>
</section>




<section id="catalog">
    <div class="container-fluid line">
        <h1>КАТАЛОГ МАГАЗИНОВ</h1>
        <p class="subtext">Каталог всех магазинов с акциями и скидками</p>
    </div>


    <div class="container">
        <article class="row text-center">
            @foreach($stores as $store)
            @if(count($store->avatar) == 1)
                <a title="{{ $store->name }}" href="#"><img src="{{ route('imagecache', ['logo', $store->avatar->first()->filename]) }}"></a>
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

            <article class="col-sm-4">
            @if($new->avatar->first())<a title="{{ $new->name }}" href="#"><img alt="{{ $new->name }}" src="{{ route('imagecache', ['medium', $sale->avatar->first()->filename]) }}" class="img-responsive"></a>@endif
            <h2><a href="#">{{ $new->name }}</a></h2>
            <p>{{ $new->description }}</p>
            <div class="info"><span class="left">{{ $new->store->floor->name }}, {{ $new->store->shop->name }}</span><span class="right">15.08.2017</span></div>
            </article>

            @endforeach     


        </div>
    </div>
</section>

@endsection




@section('map')
<iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2674.3795610067823!2d33.39064286564099!3d47.909692829205916!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40db20bcfadce5eb%3A0x2739d6a0c6f494b4!2z0J_Qu9Cw0LfQsC0zLCDQv9GA0L7RgdC_0LXQutGCINCT0LDQs9Cw0YDRltC90LAsIDTQkCwg0JrRgNC40LLQuNC5INCg0ZbQsywg0JTQvdGW0L_RgNC-0L_QtdGC0YDQvtCy0YHRjNC60LAg0L7QsdC70LDRgdGC0YwsIDUwMDAw!5e0!3m2!1sru!2sua!4v1503396699964" width="100%" height="600" frameborder="0" allowfullscreen></iframe>
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
