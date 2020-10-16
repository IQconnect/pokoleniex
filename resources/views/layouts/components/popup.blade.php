
@php
$popup = option('popup');
@endphp

@if ($popup['status'])
<div class="popup -is-active" data-popup>
	{!! image($popup['image']['id'], 'full', 'form-box__bg') !!}
  {!! $popup['contant'] !!}
  <button class="popup__close" data-toggle-popup></button>
</div>
@endif
