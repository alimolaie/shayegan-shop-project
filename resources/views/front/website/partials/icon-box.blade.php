<div class="swiper-container swiper-theme icon-box-wrapper appear-animate br-sm mt-6 mb-10"
     data-swiper-options="{
                    'loop': true,
                    'slidesPerView': 1,
                    'autoplay': {
                        'delay': 4000,
                        'disableOnInteraction': false
                    },
                    'breakpoints': {
                        '576': {
                            'slidesPerView': 2
                        },
                        '768': {
                            'slidesPerView': 3
                        },
                        '1200': {
                            'slidesPerView': 4
                        }
                    }
                }">
    @php
    $intro=\Illuminate\Support\Facades\DB::table('intro_sections')->get();

 @endphp

        <div class="swiper-wrapper row cols-md-4 cols-sm-3 cols-1">
            @foreach($intro as $i)
            <div class="swiper-slide icon-box icon-box-side text-dark">
                            <span class="icon-box-icon icon-shipping">
                                <i class="{{$i->icon}}"></i>
                            </span>
                <div class="icon-box-content">
                    <h4 class="icon-box-title">{{$i->title}}</h4>
                    <p class="text-default">{{$i->description}}</p>
                </div>
            </div>
            @endforeach
        </div>


</div>
