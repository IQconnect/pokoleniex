@php
 $title = $data['headline'];
 $color = $data['scolor'];
@endphp

@if($title)
<div class="headline ">
	<h1 class="headline__title @if($color=='black')headline--white @else headline--black @endif">
	{!! $title !!}
	</h1>
</div>
@endif
