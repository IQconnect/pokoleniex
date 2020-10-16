@extends('layouts.posted')

@section('content')
  <section class="section">
    <div class="container text">
      @include('partials.page-header')

      @if (!have_posts())
        <div class="alert alert-warning">
          {{ __('Brak wyników...', 'sage') }}
        </div>
        {!! get_search_form(false) !!}
      @endif
      @while(have_posts()) @php the_post() @endphp
        @include('partials.content-search')
      @endwhile

      {!! get_the_posts_navigation() !!}
    </div>
  </section>
@endsection
