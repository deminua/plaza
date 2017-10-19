<head>
    <title>Торговый комплекс «Плаза»</title>
	@include('layouts.favicon')
</head>


<link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">

<style type="text/css">
div, body {
		margin: 0;
		padding: 0;
		font-family: 'Roboto', 'Open Sans', sans-serif;
		color: #666;
	}

	.content {
		width: 100vw;
		height: 100vh;
		background: #efefef;
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;

	}
	.item {
		font-size: 1.5vh;
		text-transform: uppercase;
	}
	h1 {

		font-size: 5vh;
		margin: 1vh 0vh 1vh 0vh;
		padding: 2vh 0vh 2vh 0vh;
		color: #000;

	}

	h1 img {
		height: 20vh;
	}
</style>

<div class="content">
	<h1><img src="/images/logo.png"></h1>
	<small class="item">© 2017</small>
</div>
