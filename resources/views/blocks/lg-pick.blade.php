@php
      $fb = get_field('facebook','option');
      $inst = get_field('instagram','option');
@endphp

    <div class="lg-pick">
        @if ($fb)
        <a class="lg-pick__wrapper text" href="{!! $fb !!}">
            <i class="fab fa-facebook-f"></i>
        </a>
        @endif
        @if ($inst)
        <a class="lg-pick__wrapper text" href="{!! $inst!!}">
            <i class="fab fa-instagram"></i>
        </a>
        @endif
    </div>
