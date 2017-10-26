@extends('layouts.app')

@section('title', 'Контакты')

@section('content')

<img class="topLine" src="/svg/top.svg">

<style type="text/css">
	.contacts {
		margin: 40px 0px;
	}
</style>

<section id="catalog_list">
    <div class="container">
					
			<div class="row">
				<article class="contacts col-sm-6">
					<h1>Аренда площадей и размещение</h1>
					<h4><a href="tel:+380973370605"><span class="glyphicon glyphicon-phone"></span>  097 337 0605</a> - Светлана</h4>
				</article>
				<article class="contacts col-sm-5 col-sm-offset-1">
					<h1>Размещение рекламы</h1>
					<h4><a href="tel:+380967870076"><span class="glyphicon glyphicon-phone"></span> 096 787 0076</a> - Ирина</h4>
				</article>
				<article class="contacts col-sm-6">
					<h1>Контент-менеджер веб ресурса</h1>
					<h4><a href="tel:+380673794934"><span class="glyphicon glyphicon-phone"></span> 067 379 4934</a> - Анна</h4>
				</article>
				<article class="contacts col-sm-5 col-sm-offset-1">
					<h1>Тех.обеспечение сайта</h1>
					<h4><a href="tel:+380962609709"><span class="glyphicon glyphicon-phone"></span> 096 260 9709</a> - Дмитрий</h4>
				</article>
			</div>
			<div class="row">
				<article class="contacts col-sm-12" style="text-align:center">
					<h1>Торговый комплекс «Плаза 3» и  «Плаза 4», Кривой Рог, проспект Гагарина, 4А</h1>

  					@include('layouts.map')
				</article>
			</div>






    </div>
					</section>



@endsection

