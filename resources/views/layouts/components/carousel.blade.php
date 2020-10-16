@php
$carousel= $data['carousel'];
$i = 0;
@endphp

@foreach ($carousel as $post)
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


<section class="carousel section">
	<div class="container">
		<div class="carousel__wraparticles">
		<div class="carousel__slider carousel-slider">
			@for ($a=0;$a<$max;$a++)
				@if($category[$a])
				<div class="carousel__cell">
					<a class="carousel__imagewrapper" href="{!! $link[$a] !!}" >
						 {!! image($thumbnail[$a], 'full', 'carousel__image') !!}
						 </a>
					<div class="carousel__bar">
						<div class="carousel__categories">
							@foreach ($category[$a] as $c )
							@php
							$cat = get_category($c);
							$cat_id = get_cat_ID( $cat->name );
							echo '<a class="carousel__tcategory" href="'.get_category_link($cat_id).'">'.$cat->name. '</a>';
							@endphp
							@endforeach
						</div>
						<a href="{!! $link[$a] !!}" class="carousel__smalltitle"><p>{!! $title[$a] !!}</p></a>
						<a href="{!! $link[$a] !!}" class="carousel__tdate">{!!  $the_date[$a] !!}</a>
					</div>
				</div>
				@endif
			@endfor
			</div>
		</div>
	</div>
</section>
