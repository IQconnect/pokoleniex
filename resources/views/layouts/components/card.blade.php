@php
$name = $data['name'];
$nick =$data['nick'];
$text = $data['maintext'];
$photo = $data['photo']['ID'];

@endphp

<section class="section textimg">
<div class="container">
    <div class="textimg__content-wrapper" >
        <div class="textimg__content">
            <div>
                <h3 class="textimg__title">
                    {!! $name !!}
                </h3>

                <h4 class="textimg__subtitle">
                    {!! $nick !!}
                </h4>
                <h5 class="textimg__text">
                    {!! $text !!}
                </h5>
            </div>
            <div class="textimg__img-wrapper">
                <div class="textimg__twoimg">
                    <div class="textimg__squareup">
                         {!! image($photo, 'full', 'textimg__img') !!}
                    </div>
            </div>
        </div>
    </div>
</section>
