@php
$people_article= $data['people_article'];
$title_cat= $data['title_people'];
$i = 0;
@endphp

@foreach ($people_article as $post)
@php
		$id[$i] = $post -> ID;
		$title[$i] = $post->post_title;
		$excerpt[$i] = $post->post_excerpt;
		$link[$i] = get_post_permalink($post->ID);
		$category[$i] = wp_get_post_categories($post->ID);
		$catname[$i] = $category[$i]->cat_name;
		$the_date[$i] = get_post_time( get_option( 'date_format'), false, $post, true );
		$thumbnail[$i] = get_post_thumbnail_id($post->ID);
		$max = $loop->count;
		$i++;
	@endphp
@endforeach


<section class="people_article section">
	<div class="container">
		@if($title_cat)
			<div class="people_article__titlesection">
			<a href="{{ $term_link  }}">{{ $title_cat }} </a>
			</div>
		@endif
		<div class="people_article__wraparticles">
			@for ($a=0;$a<$max;$a++)
				@if($title[$a])
				<div class="people_article__article">
					<a class="people_article__imagewrapper" href="{!! $link[$a] !!}" >
						 {!! image($thumbnail[$a], 'full', 'people_article__image') !!}
					</a>
					<div class="people_article__bar">
						<a href="{!! $link[$a] !!}" class="people_article__smalltitle"><p>{!! $title[$a] !!}</p></a>
					</div>
				</div>
				@endif
			@endfor
			</div>
		</div>
	</div>
</section>
