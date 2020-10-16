
@php
$sectiontitle = $data['headline'];
$color = $data['scolor'];
$sponsors= $data['sinfo'];
@endphp

<section class="section @if($color=='white')section--white @else section--black @endif sponsor fullscroll">
	<div class="container">
		@include('blocks.headline')
		<div class="sponsor__wrapper" >

			<div class="sponsor__carousel sponsor-carousel">
				@foreach ($sponsors as $element)
				@php
				$img = $element['sponsorimg'];
				$stext = $element['sponsortext'];
				$stitle = $element['sponsortitle'];
				$slink = $element['sponsorlink']['url'];
				$buttontext = $element['sponsorbutton']
				@endphp
						<div class="sponsor__cell">
							<div class="sponsor__cellcontent">
							<div class="sponsor__imgwrapper">
								{!! image($img['id'], 'full', 'sponsor__img') !!}
							</div>
								<div class="sponsor__title">
									{!! $stitle !!}
								</div>
								@if( $stext )
								<div class="sponsor__text">
									{!! $stext !!}
								</div>
								@endif
								@if( $buttontext )
								<a class="sponsor__button" href="{!! $slink !!}"> {!! $buttontext !!} </a>
								@endif
							</div>
						</div>
				@endforeach
		</div>
	</div>
</section>
