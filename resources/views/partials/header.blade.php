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
        <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ) ?>">
          <label>
            <span class="screen-reader-text"><?php _x( 'Search for:', 'label' )?></span>
            <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" />
          </label>
          <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
        </form>
      </nav>


      </div>
    </div>
  </div>
</header>
