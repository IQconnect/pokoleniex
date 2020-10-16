@php
  $info = option('info');
  $brandlogo = option('brand')['url'];
  $iqlogo = option('iqlogo')['url'];
  $right = option('copyright');
  $title = option('titlefooter');
  $color = option('fcolor');
  $follow = option('followtext');
  $fb = get_field('facebook','option');
  $inst = get_field('instagram','option');
@endphp

<footer class="footer">
  <div class="container">
    <div class="footer__wrapper">
    <a class="footer__brand" href="{{ home_url('/') }}">
      <img class="footer__image" src="{{ option('brand')['url'] }}" alt="{{ option('brand')['alt'] }}">
    </a>
    <div class="lg-pick footer__social">
      @if ($fb)
      <a target="_blank" class="lg-pick__wrapper footer__icon" href="{!! $fb !!}">
          <i class="fab fa-facebook-f"></i>
      </a>
      @endif
      @if ($inst)
      <a target="_blank" class="lg-pick__wrapper footer__icon" href="{!! $inst!!}">
          <i class="fab fa-instagram"></i>
      </a>
      @endif
  </div>
  <nav class="footer__nav">
    @if (has_nav_menu('footer_navigation'))
    {!! wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'footer__menu']) !!}
    @endif
  </nav>
      <a class="footer__logo" href="http://iqconnect.pl">
        <img class="footer__image" src="{{ option('iqlogo')['url'] }}" alt="{{ option('iqlogo')['alt'] }}">
      </a>
    </div>
    </div>
</footer>
