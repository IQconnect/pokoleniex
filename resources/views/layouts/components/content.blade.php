<section class="section section--post  page-content">
  <div class="container container--slim">
    @while(have_posts()) @php the_post() @endphp
    @php the_content() @endphp
    @endwhile
  </div>
</section>
