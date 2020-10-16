@php
$six_article= $data['six_article'];
$margin_up = $data['uparticlemargin'];
$margin_down = $data['downarticlemargin'];
$i = 0;
@endphp

@foreach ($six_article as $post)
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


<section class="six_article section @if($margin_up=='upmarginoff') section--nomarginup @endif @if($margin_down=='upmarginoff') section--nomargindown @endif">
	<div class="container">
		<div class="six_article__wraparticles">
			@for ($a=0;$a<$max;$a++)
				@if($category[$a])
				<div class="six_article__article">
					<a class="six_article__imagewrapper" href="{!! $link[$a] !!}" >
						 {!! image($thumbnail[$a], 'full', 'six_article__image') !!}
					</a>
					<div class="six_article__bar">
						<div class="six_article__categories">
							@foreach ($category[$a] as $c )
							@php
							$cat = get_category($c);
							$cat_id = get_cat_ID( $cat->name );
							echo '<a class="six_article__tcategory" href="'.get_category_link($cat_id).'">'.$cat->name. '</a>';
							@endphp
							@endforeach
						</div>
						<a href="{!! $link[$a] !!}" class="six_article__smalltitle"><p>{!! $title[$a] !!}</p></a>
						<a  class="six_article__tdate">{!!  $the_date[$a] !!}</a>
					</div>
				</div>
				@endif
			@endfor
			</div>
		</div>
	</div>
</section>
