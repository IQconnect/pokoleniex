
@php
$link = $data['morelink'];
$tekst = $data['moretext'];
@endphp

<div class="more">
	<a class="more__text @if($color=='white')more--black @else more--white @endif" href="{!! $link['url'] !!}">
		{!! $tekst !!}
	</a>
</div>
