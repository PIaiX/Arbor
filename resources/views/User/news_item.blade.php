@extends('User.Layouts.index')

@section('title', 'Новость')

@section('content')
<div class="mb-5">
	<div class="container">
		<nav aria-label="breadcrumb" class="mt-4 mt-xxl-5">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.html">Главная</a></li>
				<li class="breadcrumb-item"><a href="news.html">Новости</a></li>
				<li class="breadcrumb-item active" aria-current="page">Новое тиснение в Компании</li>
			</ol>
		</nav>
		<h2 class="h1 mb-4">Новое тиснение в Компании</h2>
		<div class="row">
			<!-- slider -->
			<div class="col-md-4 pe-xxl-5 mb-4">
				<!-- Swiper -->
				<div class="swiper-container position-relative gallery-top new-gallery-top mb-3 rounded-10">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<img src="img/images/cart-item.jpeg" alt="">
						</div>
						<div class="swiper-slide">
							<img src="img/images/production-3.jpg" alt="">
						</div>
						<div class="swiper-slide">
							<img src="img/images/production-4.jpg" alt="">
						</div>
						<div class="swiper-slide">
							<img src="img/images/production-5.jpg" alt="">
						</div>
					</div>
					<!-- Add Arrows -->
					<div class="swiper-button-next swiper-button-white h-100 top-0 bottom-0 end-0 px-3 w-auto mt-0">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M9 18L15 12L9 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
					</div>
					<div class="swiper-button-prev swiper-button-white h-100 top-0 bottom-0 start-0 px-3 w-auto mt-0">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M15 18L9 12L15 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
					</div>
				</div>
				<div class="swiper-container gallery-thumbs new-gallery-thumbs">
					<div class="swiper-wrapper w-100">
						<div class="swiper-slide">
							<img src="img/images/cart-item.jpeg" alt="">
						</div>
						<div class="swiper-slide">
							<img src="img/images/production-3.jpg" alt="">
						</div>
						<div class="swiper-slide">
							<img src="img/images/production-4.jpg" alt="">
						</div>
						<div class="swiper-slide">
							<img src="img/images/production-5.jpg" alt="">
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="text-muted mb-3">9 марта 2021</div>
				<div>
					<p>Равным образом, постоянный количественный рост и сфера нашей активности в значительной степени обусловливает
						важность инновационных методов управления процессами. Для современного мира укрепление и развитие внутренней
						структуры
						прекрасно подходит для реализации своевременного выполнения сверхзадачи. Безусловно, внедрение современных
						методик создаёт необходимость включения в производственный план целого ряда внеочередных мероприятий с учётом
						комплекса
						первоочередных требований. Разнообразный и богатый опыт говорит нам, что укрепление и развитие внутренней
						структуры не оставляет шанса для системы массового участия. Не следует, однако, забывать, что существующая
						теория является
						качественно новой ступенью вывода текущих активов.</p>
					<p>Как принято считать, сторонники тоталитаризма в науке, вне зависимости от их уровня, должны быть описаны
						максимально подробно. А ещё интерактивные прототипы призваны к ответу. Прежде всего, современная методология
						разработки предопределяет
						высокую востребованность существующих финансовых и административных условий. Предварительные выводы
						неутешительны: разбавленное изрядной долей эмпатии, рациональное мышление говорит о возможностях распределения
						внутренних резервов
						и ресурсов. А ещё активно развивающиеся страны третьего мира освещают чрезвычайно интересные особенности
						картины в целом, однако конкретные выводы, разумеется, ассоциативно распределены по отраслям. </p>
					<p>Но некоторые особенности внутренней политики представлены в исключительно положительном свете.
						Как уже неоднократно упомянуто, акционеры крупнейших компаний ограничены исключительно образом мышления.
						Каждый из нас понимает очевидную
						вещь: экономическая повестка сегодняшнего дня не оставляет шанса для анализа существующих паттернов поведения.
						И нет сомнений, что непосредственные участники технического прогресса объективно рассмотрены соответствующими
						инстанциями.</p>
	
				</div>
				<a href="news.html" class="c-accent fw-5 fs-5 roboto">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M19 12L5 12" stroke="#FF9900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						<path d="M12 19L5 12L12 5" stroke="#FF9900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
					<span>К другим новостям</span>
				</a>
			</div>
		</div>
	</div>
</div>
@endsection