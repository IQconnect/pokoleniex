@php
$hero= $data['posthero'];
$i = 0;
@endphp


<section class="hero">
    <div class="container--fluid">
        @foreach ($hero as $post)
                @php
                    $id[$i] = $post -> ID;
                    $title[$i] = $post->post_title;
                    $excerpt[$i] = $post->post_excerpt;
                    $link[$i] = get_post_permalink($post->ID);
                    $category[$i] = wp_get_post_categories($post->ID);
                    $catname[$i] = $category[$i]->cat_name;
                    $the_date[$i] = get_post_time( get_option( 'date_format'), false, $post, true );
                    $thumbnail[$i] = get_post_thumbnail_id($post->ID);
                    $i++;
                @endphp
        @endforeach

        <div class="hero__wrapper">
                <div class="hero__bigarticle" >
                    <a href="{!! $link[0] !!}" > {!! image($thumbnail[0], 'full', 'hero__image') !!} </a>
                    <div class="hero__bar">
                        <div class="hero__categories">
                        @foreach ($category[0] as $c )
                        @php
                             $cat = get_category($c);
                             $cat_id = get_cat_ID( $cat->name );
                             echo '<a class="hero__tcategory" href="'.get_category_link($cat_id).'">'.$cat->name. '</a>';
                         @endphp
                        @endforeach
                        </div>
                       <a href="{!! $link[0] !!}" class="hero__bigtitle"><p>{!! $title[0] !!}</p></a>
                       <a href="{!! $link[0] !!}" class="hero__tdate">{!!  $the_date[0] !!}</a>
                </div>
            </div>
                @for ($a=1;$a<5;$a++)
                <div class="hero__smallarticle">
                    <a href="{!! $link[$a] !!}" > {!! image($thumbnail[$a], 'full', 'hero__image') !!} </a>
                    <div class="hero__bar">
                        <div class="hero__categories">
                        @foreach ($category[$a] as $c )
                        @php
                             $cat = get_category($c);
                             $cat_id = get_cat_ID( $cat->name );
                             echo '<a class="hero__tcategory" href="'.get_category_link($cat_id).'">'.$cat->name. '</a>';
                         @endphp
                        @endforeach
                        </div>
                            <a href="{!! $link[$a] !!}" class="hero__smalltitle"><p>{!! $title[$a] !!}</p></a>
                            <a href="{!! $link[$a] !!}" class="hero__tdate">{!!  $the_date[$a] !!}</a>
                        </div>
                    </div>
                @endfor


        </div>
    </div>
</section>
