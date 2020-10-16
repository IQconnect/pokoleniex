@extends('layouts.posted')

@section('news')

@php

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args = array('post_type' => 'post', 'posts_per_page'=>6, 'cat'=>4, 'paged'=>$paged);
    $work = new WP_Query($args);


@endphp

<section class="section section--post aktualnosci section--black">
	<div class="container">
		<h1 class="headline__title @if($color=='white')headline--black @else headline--white @endif">
			Kalendarz
			</h1>
		<div class="aktualnosci__wrapper" >
			@if($work)
			@foreach($work->posts as $post)

				@php
				$id = $post-> ID;
				$desc = $post->post_excerpt;
				$title = $post->post_title;
				$dayname = get_field('dayname', $id);
				$day = get_field('day', $id);
				$month = get_field('month', $id);
				$year = get_field('year', $id);
				$date = ("$dayname $day.$month.$year");
				$link = get_post_permalink($post->ID);
				$thumbnail = get_post_thumbnail_id($post->ID);
				@endphp
				<a class="aktualnosci__postcontent" href="{!! $link !!}">
					@if($thumbnail)
					<div class="aktualnosci__postimage">
					{!! image($thumbnail, 'full', ' aktualnosci__image') !!}
					</div>
					@endif
					<div class="aktualnosci__content">
						<div class="aktualnosci__title">
						{!! $title !!}
						</div>
						@if($day)
						<div class="aktualnosci__date">
							{!! $date !!}
							</div>
						@endif
						<div class="aktualnosci__text">
						{!! $desc !!}
						</div>
					</div>
				</a>
				@endforeach
			@endif
		</div>
		<div class="aktualnosci__pagination">
		@php
    $args = array(
        'query' => $work,
    );
    boot_pagination( $args );
@endphp
		</div>
	</div>
</section>

@endsection
