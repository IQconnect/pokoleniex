@php
	$video = $data['videotext'];
	$i = 0;
@endphp

@foreach ($video as $post)
@php
		$id[$i] = $post -> ID;
		$title[$i] = $post->post_title;
		$excerpt[$i] = $post->post_excerpt;
		$link[$i] = get_post_permalink($post->ID);
		$category[$i] = wp_get_post_categories($post->ID);
		$catname[$i] = $category[$i]->cat_name;
		$the_date[$i] = get_post_time( get_option( 'date_format'), false, $post, true );
		$thumbnail[$i] = get_post_thumbnail_id($post->ID);
		$max = ($loop->count)+1;
		$components[$i] = get_field('components',$id[$i]);
		$yt[$i] = get_field('videolink',$id[$i]);
		$videoarticle[$i] = get_field('videoarticle',$id[$i]);

		$i++;
	@endphp
@endforeach

<section class="section videotext">
	<div class="container">
		<div class="videotext__wrapper carousel-slidervideo">
			@for ($a=0;$a<$max;$a++)
			@if($title[$a])
				<div class="videotext__cell">
					<div class="videotext__title">
					<h3 > <span>{{ $title[$a] }}</h3>
					</div>
					<div class="videotext__twocolls">

								<div  class="videotext__videowrapper">

									<?php
										$iframe = $yt[$a];
										// use preg_match to find iframe src
										preg_match('/src="(.+?)"/', $iframe, $matches);
										$src = $matches[1];
										// add extra params to iframe src
										$params = array(
											'enablejsapi' => 1,
											'controls'  => 1,
											'hd'        => 0,
											'autohide'  => 0,
											'modestbranding'  => 0,
											'rel'  => 0,
										);
										$new_src = add_query_arg($params, $src);
										$iframe = str_replace($src, $new_src, $iframe);
										// add extra attributes to iframe html
										$attributes = 'class="videotext__video" ytvideo';

										$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

										echo $iframe;
										?>
								</div>
								<div class="videotext__article">
									{!! $videoarticle[$a] !!}
								</div>
					</div>
				</div>
				@endif
			@endfor
		</div>
	</div>
</section>
