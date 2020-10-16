@php
$cat_article= $data['cat_article'];
$title_cat= $data['title_cat'];
$acat= $data['tax_id'];
$term_link = get_category_link($acat);
$i = 0;
$grid = $data["articlegrid"];
@endphp

@foreach ($cat_article as $post)
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

<section class="bigcat_article section">
    <div class="container">
		@if($title_cat)
			<div class="bigcat_article__titlesection">
			<a href="{{ $term_link  }}">{{ $title_cat }} </a>
			</div>
		@endif
        <div class="bigcat_article__row ">
                <div class="bigcat_article__bigarticle bigcat_article__bigarticle--left" >
					<a class="bigcat_article__bigimagewrapper" href="{!! $link[0] !!}" >
						{!! image($thumbnail[0], 'full', 'bigcat_article__image') !!}
				   </a>
						<div class="bigcat_article__bar">
							<div class="bigcat_article__categories">
								@foreach ($category[0] as $c )
									@php
									$cat = get_category($c);
									$cat_id = get_cat_ID( $cat->name );
									echo '<a class="bigcat_article__tcategory" href="'.get_category_link($cat_id).'">'.$cat->name. '</a>';
									@endphp
								@endforeach
							</div>
							<p  class="bigcat_article__bigtitle ">{!! $title[0] !!}</p>
							<p class="bigcat_article__tdate">{!!  $the_date[0] !!}</p>
						</div>
					</div>

					<div class="bigcat_article__bigarticle bigcat_article__bigarticle--right" >
						<a class="bigcat_article__bigimagewrapper" href="{!! $link[1] !!}" >
							{!! image($thumbnail[1], 'full', 'bigcat_article__image') !!}
					   </a>
							<div class="bigcat_article__bar">
								<div class="bigcat_article__categories">
									@foreach ($category[1] as $c )
										@php
										$cat = get_category($c);
										$cat_id = get_cat_ID( $cat->name );
										echo '<a class="bigcat_article__tcategory" href="'.get_category_link($cat_id).'">'.$cat->name. '</a>';
										@endphp
									@endforeach
								</div>
								<p  class="bigcat_article__bigtitle ">{!! $title[1] !!}</p>
								<p class="bigcat_article__tdate">{!!  $the_date[1] !!}</p>
							</div>
						</div>

                @for ($a=2;$a<$max;$a++)
					<div class="bigcat_article__article">
						<a class="bigcat_article__imagewrapper" href="{!! $link[$a] !!}" >
							{!! image($thumbnail[$a], 'full', 'bigcat_article__image') !!}
					   </a>
							<div class="bigcat_article__bar">
								<div class="bigcat_article__categories">
									@foreach ($category[$a] as $c )
										@php
										$cat = get_category($c);
										$cat_id = get_cat_ID( $cat->name );
										echo '<a class="bigcat_article__tcategory" href="'.get_category_link($cat_id).'">'.$cat->name. '</a>';
										@endphp
									@endforeach
								</div>
								<a class="bigcat_article__smalltitle " href="{!! $link[$a] !!}"><p>{!! $title[$a] !!}</p></a>
								<p class="bigcat_article__tdate">{!!  $the_date[$a] !!}</p>
							</div>
					</div>
				@endfor
            </div>
        </div>
    </div>
</section>
