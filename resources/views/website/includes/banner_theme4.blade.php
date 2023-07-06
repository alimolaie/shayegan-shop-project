@php
$leftbanners = App\Http\Controllers\webController::banners();
@endphp
@if(!empty($leftbanners) && count($leftbanners)>0)
<div class="container container-fluid-custom-mobile-padding">
		<div class="container-fluid-custom">
			<div class="row tt-list-sm-shift">
				<div class="col-12 col-md-12 col-12">
					<div class="row">
                    @foreach($leftbanners as $leftbanner)
						<div class="col-lg-2 col-md-3 col-6">
                        @if(!empty($leftbanner->image))
							<a href="@if(!empty($leftbanner->link)) {{$leftbanner->link}} @else javascript:; @endif " class="tt-promo-box tt-one-child bannerCounts" id="{{$leftbanner->id}}" >
								<img src="{{url('assets/images/loader.svg')}}" data-src="{{url('uploads/banner/thumb/'.$leftbanner->image)}}" alt="">
							</a>
                            <p align="center"><a href="@if(!empty($leftbanner->link)) {{$leftbanner->link}} @else javascript:; @endif ">{{Common::getLangString($leftbanner->title_en,$leftbanner->title_ar)}}</a></p>
                         @endif   
						</div>
						@endforeach		
					</div>
				</div>
			</div>
		</div>
	</div>
@endif