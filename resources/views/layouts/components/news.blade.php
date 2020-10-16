
@php
$sectiontitle = $data['headline'];
$color = $data['scolor'];
@endphp

<section class="section @if($color=='white')section--white @else section--black @endif news fp-auto-height-responsive fullscroll">
	<div class="container">
		@include('blocks.headline')
		<div class="news__wrapper" >

			<div class="news__carousel news-carousel">
				@foreach (blog() as $post)
				@php
				$title = $post->post_title;
				$excerpt = $post->post_excerpt;
				$link = get_post_permalink($post->ID);
				$thumbnail = get_post_thumbnail_id($post->ID);
				@endphp
					<div class="news__cell" >
						<a href="{!! $link !!}" class="news__cellcontent">
							{!! image($thumbnail, 'full', 'news__image') !!}
							<div class="news__content">
								<p class="news__text" >{!! $title !!}</p>
								<p class="news__text" >{!! $excerpt !!}</p>
							</div>
						</a>
					</div>
				@endforeach
		</div>
		@include('blocks.more')
	</div>
</section>
