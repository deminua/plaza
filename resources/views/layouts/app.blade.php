<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $meta['title'] or 'Акции, скидки и новости' }} - Торговый комплекс «Плаза»</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @include('layouts.favicon')
</head>
<body>





<span id="top"></span>

<header>
    <nav class="navbar">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <li><a title="Торговый комплекс «Плаза»" class="navbar-brand" href="/"><img height="100%" src="/images/logo.png"></a></li>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right navbar2">
            <li><a data-toggle="tooltip" data-placement="bottom" title="Время работы комплекса с 09:00-20:00" href="#"><i class="glyphicon glyphicon-dashboard"></i> 09:00-20:00</a></li>
            <li><a data-toggle="tooltip" data-placement="bottom" title="Перейти к карте проезда" href="#map"><i class="glyphicon glyphicon-globe"></i> Карта проезда</a></li>
            <li><a data-toggle="tooltip" data-placement="bottom" title="Позвонить нам сейчас!" href="tel:+380564123456"><i class="glyphicon glyphicon-earphone"></i> (0564) 12-34-56</a></li>
          </ul>
          <div class="menu-%d0%b2%d0%b5%d1%80%d1%85%d0%bd%d0%b5%d0%b5-%d0%bc%d0%b5%d0%bd%d1%8e-container"><ul id="menu-%d0%b2%d0%b5%d1%80%d1%85%d0%bd%d0%b5%d0%b5-%d0%bc%d0%b5%d0%bd%d1%8e" class="nav navbar-nav navbar-right navbar1"><li id="menu-item-80" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-80"><a href="/category/news/">Новости и события</a></li>
<li id="menu-item-81" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-81"><a href="/category/sale/">Акции и скидки</a></li>
<li><a href="{{ route('store.index') }}">Магазины</a></li>
<li id="menu-item-83" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-83"><a href="/rent_and_advertisement/">Аренда и реклама</a></li>
<li id="menu-item-82" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-82"><a href="/contacts/">Контакты</a></li>
</ul></div>        </div>
      </div>
    </nav>
</header>



@yield('slider')

<main role="main">
@yield('content')
</main>

@yield('map')



@include('layouts.footer')


    <!-- Scripts -->
    <script type='text/javascript' src='//cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js'></script>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
