@php
    $class = "contact-header";
    $content = option("contact-menu");
@endphp

<div class="{{ $class }}">
    {!! $content !!}
</div>
