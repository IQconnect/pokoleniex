@php
$galleryone = $data['instaline_galleryone'];
$gallerytwo = $data['instaline_gallerytwo'];

$text = $data['instaline_text'];
$link = $data['instaline_link'];
@endphp

<section class="instaline section section--post section--nomargindown">
  <div class="container--fluid">
	  <div class="instaline__wrapper">
    <div class="instaline__row">
      @php
        $galleryName = rand(1, 999);
      @endphp
      @foreach ($galleryone as $img)
        <div class="instaline__imagewrapper">
          <a data-fancybox="instaline{{$galleryName}}" data-animation-effect="fade" data-caption="{{ $img['caption'] }}" href="{{ $img['url'] }}">
            {!! image($img['ID'], 'full','instaline__image') !!}
          </a>
        </div>
      @endforeach
	</div>
	<div class="instaline__bar">
		<a href="{!! $link['url'] !!}" class="instaline__text">
			<i class="fab fa-instagram instaline__icon"></i>
			{{ $text }}

		</a>
	</div>
	<div class="instaline__row">
		@php
		  $galleryName = rand(1, 999);
		@endphp
		@foreach ($gallerytwo as $img)
		  <div class="instaline__imagewrapper">
			<a data-fancybox="instaline{{$galleryName}}" data-animation-effect="fade" data-caption="{{ $img['caption'] }}" href="{{ $img['url'] }}">
			  {!! image($img['ID'], 'full','instaline__image') !!}
			</a>
		  </div>
		@endforeach
	  </div>
	</div>
  </div>
</section>
