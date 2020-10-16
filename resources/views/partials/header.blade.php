<div class="search-modal">
  <form class="search-modal__form" action="<?php echo esc_url( home_url( '/' ) ) ?>">
    <input type="text" placeholder="Szukaj..." class="search-modal__input" name="s">
    <button type="submit" class="search-modal__button">
      Szukaj
    </button>
    <a href="#" class="search-modal__close">
      <i class="fas fa-times"></i>
    </a>
  </form>
</div>
<header class="header" header>
  <div class="container">
    <div class="header__wrapper">
      @if(get_option_field("logo"))
        <a class="header__brandwrapper" href="{{ home_url('/') }}">
          <img class="header__brand" src="{{  get_option_field("logo")['url'] }}" alt="{{  get_option_field("logo")['alt'] }}">
        </a>
      @else
        <span>
        </span>
      @endif

      <div class="header__hamburger burger burger-rotate" data-toggle-menu>
        <div class="burger-lines"></div>
      </div>
      <nav class="header__nav" data-nav>
         @if (has_nav_menu('primary_navigation'))
          {!! wp_nav_menu(
            [
              'theme_location' => 'primary_navigation',
              'menu_class' => 'header__menu',
            ]) !!}
        @endif

      </nav>
      <a href="#" class="header__search">
        <i class="fas fa-search"></i>
      </a>


      </div>
    </div>
  </div>
</header>
