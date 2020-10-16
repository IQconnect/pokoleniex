@php
    $gallery = $data['gallerymain'];
	$text = $data['text-info'];
	$sectiontitle = $data['headline'];
	$color = $data['scolor'];
@endphp

@if($gallery)
<section class="section section--post @if($color=='white')section--white @else section--black @endif maingallery">
    @if ($text)
    <div class="container">
		@include('blocks.headline')
        <div class="maingallery__wrapper">
            <div class="maingallery__cells">
                @include('blocks.text-info', ['data'=>$data])
            </div>
        </div>
    </div>
    @endif
    @foreach ($gallery as $img)
    <div class="maingallery__cell">
        {!! image($img['ID'], 'full','') !!}
    </div>
    @endforeach
</section>
@endif
