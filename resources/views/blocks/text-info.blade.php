@php
  $info = $data['text-info'];
  $date = $info['label'];
  $title = $info['title'];
  $dsc = $info['dsc'];
  $link = $info['link'];
@endphp


<div class="text-info">
  <h2 class="text-info__title">
    {!! $title !!}
  </h2>
  @if ($date)
  <p class="text-info__date">
	{!! $date !!}
  </p>
  @endif
  @if ($dsc)
  <p class="text-info__description">
    {!! $dsc !!}
  </p>
  @endif
  @if ($link)
    <a class="text-info__button" href="{{ $link['url'] }}" class="link link--arrow link--invert text bold">
      {{ $link['title'] }}
    </a>
  @endif
</div>
