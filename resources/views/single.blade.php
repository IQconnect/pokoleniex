@extends('layouts.posted')

@section('news')
@php
$title = $post->post_title;
$dayname = get_field('dayname');
$date = get_field('date');

@endphp

@php $sections = get_field('components') @endphp
  <div class="posts">
    <div class="container container--slim">
      <div class="posts__info">
      @if($title)
        <h2 class="posts__title">
          {!! $title !!}
        </h2>
        @endif
      @if($date)
        <p class="posts__date">
          {!! $date !!}
        </p>
      @endif
      </div>
    </div>
    @if($sections)
      @foreach ($sections as $section)
        @php ($sectionName = $section['acf_fc_layout']) @endphp
        @include('layouts.components.' . $sectionName, ['data'=>$section])
      @endforeach
    @endif
  </div>
@endsection
