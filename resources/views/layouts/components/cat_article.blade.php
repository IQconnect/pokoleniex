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

<section class="cat_article section">
    <div class="container">
		@if($title_cat)
			<div class="cat_article__titlesection">
			<a href="{{ $term_link  }}">{{ $title_cat }} </a>
			</div>
		@endif
        <div class="cat_article__row @if($grid=='1bx5') cat_article__row--3c @endif  @if($grid=='2bx6' || $grid=='2rbx6') cat_article__row--4c @endif ">
                <a href="{!! $link[0] !!}" class="cat_article__bigarticle @if($grid=='1bx5') cat_article__bigarticle--grid3 @endif @if($grid=='2bx6') cat_article__bigarticle--grid3 @endif " >
						{!! image($thumbnail[0], 'full', 'cat_article__image') !!}
						<div class="cat_article__bar">
							<p  class="cat_article__bigtitle ">{!! $title[0] !!}</p>
							<p class="cat_article__tdate">{!!  $the_date[0] !!}</p>
						</div>
					</a>

					<a href="{!! $link[1] !!}" class="cat_article__secondbigarticle @if($grid=='2bx6') cat_article__secondbigarticle--grid3 @endif ">
						{!! image($thumbnail[1], 'full', 'cat_article__image') !!}
						<div class="cat_article__bar">
							<p  class="cat_article__smalltitle">{!! $title[1] !!}</p>
							<p class="cat_article__tdate">{!!  $the_date[1] !!}</p>
						</div>
					</a>

                @for ($a=2;$a<$max;$a++)
					<a href="{!! $link[$a] !!}" class="cat_article__smallarticle @if($grid=='2rbx6') cat_article__smallarticle--gridright @endif">
						{!! image($thumbnail[$a], 'full', 'cat_article__image') !!}
						<div class="cat_article__bar">
							<p  class="cat_article__smalltitle">{!! $title[$a] !!}</p>
							<p class="cat_article__tdate">{!!  $the_date[$a] !!}</p>
						</div>
					</a>
				@endfor
            </div>
        </div>
    </div>
</section>
