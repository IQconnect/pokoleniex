
@php
    $sectiontitle = $data['headline'];
    $color = $data['scolor'];

    $buttonone = $data['firstbutton'];
    $buttontwo = $data['secondbutton'];
    $imgbuttonone = $buttonone['imgone']['ID'];
    $imgbuttontwo = $buttontwo['imgtwo']['ID'];
    $linkone = $buttonone['linkone'];
    $linktwo = $buttontwo['linktwo'];
    $textone = $buttonone['textone'];
    $texttwo = $buttontwo['texttwo'];


@endphp

<section class="section @if($color=='white')section--white @else section--black @endif media fullscroll">
    <div class="container">
        @include('blocks.headline')
        <div class="media__content-wrapper" >
                <a class="media__button" href={!! $linkone['url'] !!}>
                    <div class="media__button-wrapper">

                        {!! image($imgbuttonone, 'full', 'media__img') !!}
                        <div class="media__text">
                            {!! $textone !!}
                        </div>
                    </div>
                </a>
                <a class="media__button" href={!! $linktwo['url'] !!}>
                    <div class="media__button-wrapper">
                        {!! image($imgbuttontwo, 'full', 'media__img') !!}
                        <div class="media__text">
                            {!! $texttwo !!}
                        </div>
                    </div>
              </a>
            </div>
        </div>
</section>
