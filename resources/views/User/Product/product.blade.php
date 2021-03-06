@extends('User.Layouts.index')

@section('title', 'Страница товара')
		
@section('content')
<div class="container mb-5">
  {{ Breadcrumbs::render('catalog.product', $product) }}

	<h1 class="mb-4">{{ $product->name }}</h1>
	<div class="row gx-xxl-5 mb-5 pe-xxl-5 justify-content-between align-items-start position-relative">
		<div class=" col-lg-6 mb-4">

			<!-- slider -->
			<div class="card-swiper d-flex justify-content-between mb-4">
				<div class="swiper-container gallery-thumbs card-gallery-thumbs me-2">
					<div class="swiper-wrapper">
						<div class="swiper-slide"><img src="{{ $product->image }}" alt="">
						</div>

            @foreach ($product->productImages as $item)
              <div class="swiper-slide"><img
                src="{{ Storage::url($item->image) }}" alt=""></div>
            @endforeach
					</div>
					<!-- Add Arrows -->
					<div class="swiper-button-next swiper-button-white rounded-circle border bg-white">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M12 5L12 19" stroke="#FF9900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							<path d="M19 12L12 19L5 12" stroke="#FF9900" stroke-width="2" stroke-linecap="round"
								stroke-linejoin="round" />
						</svg>
					</div>
					<div class="swiper-button-prev swiper-button-white rounded-circle border bg-white">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M12 19V5" stroke="#FF9900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							<path d="M5 12L12 5L19 12" stroke="#FF9900" stroke-width="2" stroke-linecap="round"
								stroke-linejoin="round" />
						</svg>
					</div>
				</div>
				<div class="swiper-container rounded-10 gallery-top card-gallery-top my-auto">
					<div class="swiper-wrapper">
						<div class="swiper-slide"><img src="{{ $product->image }}" alt="">
						</div>

            @foreach ($product->productImages as $item)
              <div class="swiper-slide"><img
                src="{{ Storage::url($item->image) }}" alt=""></div>
            @endforeach
					</div>
				</div>
			</div>
			<!-- slider -->
      
			{{-- <div class="mb-4">
				<h4 class="mb-3">Полное описание</h4>
        
				<div>{{ $product->description }}</div>
			</div> --}}
			<div class="mb-4">
				<h4 class="mb-3">Услуга распиловки и кромления</h4>
				<div>Равным образом, постоянный количественный рост и сфера нашей активности в значительной степени
					обусловливает важность инновационных методов управления процессами.</div>
			</div>

			<legend class="fw-6 fs-6 mb-4">Выберите стороны для кромления и введите требуемые размеры плиты:</legend>
			<div class="d-flex flex-column-reverse align-items-start add-sawing-block" id="services"></div>

      <button id="addService" class="fw-5 fs-5 c-accent roboto">
        <svg class="me-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M12 5V19" stroke="#FF9900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          <path d="M5 12H19" stroke="#FF9900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        <span>Добавить деталь</span>
      </button>
			<button class="bttn fs-6 d-flex mx-auto mt-5 py-3 px-5" id="servicesAdd">Добавить к заказу</button>
		</div>
		<div class="col-lg-5 position-sticky top-0 start-0">
			<div class="shopping-sidebar py-4 py-xxl-5 fw-6 rounded-10">
				<div
					class="border-bottom d-flex flex-wrap justify-content-between p-3 pt-0 px-xl-4 px-xxl-5 text-muted fw-normal">
					<div class="me-3">Код: {{ $product->code }}</div>
					<div>В наличии: {{ $product->count }} штук</div>
				</div>

        @if(!empty($product->format) || !empty($product->thickness) || !empty($product->article) || !empty($product->manufacturer))
          <div class="mb-4 p-3 px-xl-4 px-xxl-5">
            <div class="h4 mb-3">Характеристики</div>

            @if(!empty($product->format))
              <div class="d-flex justify-content-between mb-2 mb-lg-3">
                <div class="fw-normal">Формат:</div>
                <div>{{ $product->format }}</div>
              </div>
            @endif

            @if(!empty($product->thickness))
              <div class="d-flex justify-content-between mb-2 mb-lg-3">
                <div class="fw-normal">Толщина:</div>
                <div>{{ $product->thickness->name }}</div>
              </div>
            @endif

            @if(!empty($product->article))
              <div class="d-flex justify-content-between mb-2 mb-lg-3">
                <div class="fw-normal">Артикул:</div>
                <div>{{ $product->article }}</div>
              </div>
            @endif

            @if(!empty($product->manufacturer))
              <div class="d-flex justify-content-between">
                <div class="fw-normal">Производитель:</div>
                <div>{{ $product->manufacturer->name }}</div>
              </div>
            @endif
          </div>
        @endif

				<div>
					<div class="h4 mb-3 mt-2 px-3 px-xl-4 px-xxl-5">Выбранные услуги</div>

          <div id="productServices"></div>
				</div>
				<div class="d-flex flex wrap justify-content-between align-items-center px-3 px-xl-4 px-xxl-5 mt-2 mt-xxl-4">
					<div class="h4 fw-6 mb-3">{{ $product->price }} руб./{{ $product->measure }}</div>
          <form action="{{ route('user.cart.add', $product->id) }}" method="POST">
            @csrf
            <input type="hidden" name="services_sides" id="formSides" value="[]">
					  <button type="submit" class="bttn py-3 mb-3">В корзину</button>
          </form>
				</div>
			</div>
		</div>
	</div>

	<section>
		<h2 class="h1 mb-4">Сопутствующие товары</h2>
		<div class="row row-cols-2 row-cols-lg-4 row-cols-xxl-6 g-2 g-xl-4 me-xxl-5">

      @foreach ($other as $item)
        <div class="position-relative product">
          <div class="card">
            <img class="card-img-top"
              src="{{ $item->image }}"
              alt="{{ $item->name }}">
            <div class="card-body d-flex flex-column d-flex flex-column p-2 p-xxl-3 text-center">
              <a href="{{ route('user.product', [$category->slug, $item->slug]) }}" class="card-title stretched-link fw-6">{{ $item->name }}</a>
              @if(!empty($item->format))
                <div class="card-subtitle">{{ $item->format }}</div>
              @endif
              <div class="small text-muted text-end my-2">Код: {{ $item->code }}</div>
              <div class="fw-6 mb-3">{{ $item->price }} руб./{{ $item->measure }}</div>
              <div class="card-hov flex-column justify-content-between mt-auto">
                <div
                  class="rounded-pill px-2 px-lg-3 d-flex align-items-center justify-content-center border b-accent mb-2">
                  <button class="px-0 decrement">
                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M3.77246 8H13.1058" stroke="black" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                    </svg>
                  </button>
                  <div>
                    <input class="bg-transparent border-0 text-center fw-6" type="number" value="1" readonly>
                  </div>
                  <button class="px-0 increment">
                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M8.56055 3.33337V12.6667" stroke="black" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                      <path d="M3.89355 8H13.2269" stroke="black" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                    </svg>
                  </button>
                </div>
                <form action="{{ route('user.cart.add', $item->id) }}" method="POST">
                  @csrf
                  <input type="hidden" name="count" value="1">
                  <button type="submit" class="fs-6 bttn open-sans p-2 px-3">
                    <span>В корзину</span>
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      @endforeach
			
		</div>
	</section>

</div>

<input type="hidden" id="serviceImage" value="{{ asset('img/images/sawing.png') }}">

<!-- CTA FORM -->
@include('User.Components.cta_form')
@endsection

@section('scripts')
<script src="{{ asset('js/User/cart.js') }}"></script>
<script src="{{ asset('js/User/Service.js') }}"></script>
<script src="{{ asset('js/User/product.js') }}"></script>
@endsection