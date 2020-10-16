@php
$showarticle= $data['showarticle'];
$title_cat= $data['title_show'];
$i = 0;
@endphp

@foreach ($showarticle as $post)
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


<section class="showarticle section">
	<div class="container">
		@if($title_cat)
			<div class="showarticle__titlesection">
			<a href="{{ $term_link  }}">{{ $title_cat }} </a>
			</div>
		@endif
		<div class="showarticle__wraparticles">
			@for ($a=0;$a<$max;$a++)
				@if($category[$a])
				<div class="showarticle__article">
					<a class="showarticle__imagewrapper" href="{!! $link[$a] !!}" >
						 {!! image($thumbnail[$a], 'full', 'showarticle__image') !!}
					</a>
					<div class="showarticle__bar">
						<div class="showarticle__categories">
							@foreach ($category[$a] as $c )
							@php
							$cat = get_category($c);
							$cat_id = get_cat_ID( $cat->name );
							echo '<a class="showarticle__tcategory" href="'.get_category_link($cat_id).'">'.$cat->name. '</a>';
							@endphp
							@endforeach
						</div>
						<a href="{!! $link[$a] !!}" class="showarticle__smalltitle"><p>{!! $title[$a] !!}</p></a>
						<a  class="showarticle__tdate">{!!  $the_date[$a] !!}</a>
					</div>
				</div>
				@endif
			@endfor
			</div>
		</div>
	</div>
</section>
