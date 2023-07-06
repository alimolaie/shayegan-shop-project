<?php
$settingInfo = App\Http\Controllers\webController::settings();
if(app()->getLocale()=="en"){$strLang="en";}else{$strLang="ar";}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php if(app()->getLocale()=="en"): ?> <?php echo e($settingInfo->name_en); ?> <?php else: ?> <?php echo e($settingInfo->name_ar); ?> <?php endif; ?> | <?php echo e(__('webMessage.newaddress')); ?></title>
<meta name="description" content="<?php if(app()->getLocale()=="en"): ?> <?php echo e($settingInfo->seo_description_en); ?> <?php else: ?> <?php echo e($settingInfo->seo_description_ar); ?> <?php endif; ?>" />
<meta name="abstract" content="<?php if(app()->getLocale()=="en"): ?> <?php echo e($settingInfo->seo_description_en); ?> <?php else: ?> <?php echo e($settingInfo->seo_description_ar); ?> <?php endif; ?>">
<meta name="keywords" content="<?php if(app()->getLocale()=="en"): ?> <?php echo e($settingInfo->seo_keywords_en); ?> <?php else: ?> <?php echo e($settingInfo->seo_keywords_ar); ?> <?php endif; ?>" />
<meta name="Copyright" content="<?php echo e($settingInfo->name_en); ?>, Kuwait Copyright 2020 - <?php echo e(date('Y')); ?>" />
<META NAME="Geography" CONTENT="<?php if(app()->getLocale()=="en"): ?> <?php echo e($settingInfo->address_en); ?> <?php else: ?> <?php echo e($settingInfo->address_ar); ?> <?php endif; ?>">
<?php if($settingInfo->extra_meta_tags): ?> <?php echo $settingInfo->extra_meta_tags; ?> <?php endif; ?>
<?php if($settingInfo->favicon): ?>
<link rel="icon" href="<?php echo e(url('uploads/logo/'.$settingInfo->favicon)); ?>">
<?php endif; ?>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php echo $__env->make("website.includes.css", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
</head>
<body>
<!--preloader -->
<?php echo $__env->make("website.includes.preloader", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--end preloader -->
<!--header -->
<?php echo $__env->make("website.includes.header", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--end header -->
<div class="tt-breadcrumb">
	<div class="container">
		<ul>
			<li><a href="<?php echo e(url('/')); ?>"><?php echo e(__('webMessage.home')); ?></a></li>
			<li><a href="<?php echo e(url('/account')); ?>"><?php echo e(__('webMessage.dashboard')); ?></a></li>
			<li><?php echo e(__('webMessage.newaddress')); ?></li>
		</ul>
	</div>
</div>
<div id="tt-pageContent">
	<div class="container-indent">
		<div class="container">
			<h1 class="tt-title-subpages noborder"><?php echo e(__('webMessage.newaddress')); ?></h1>
			<div class="tt-login-form">
				<div class="row justify-content-center">
					<div class="col-md-12 col-lg-12">
						<div class="tt-item">
							
							<div class="form-default">
                            <div class="row">
                               <div class="col-xs-8 col-md-8 col-lg-8">
                                    
								<form id="customer_reg_form" method="post" action="<?php echo e(route('addressSave')); ?>" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                   <div class="row">
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                    <label for="title"><?php echo e(__('webMessage.title')); ?><font color="#FF0000">*</font></label>
									<input type="text" name="title"  class="form-control" id="title" placeholder="<?php echo e(__('webMessage.enter_title')); ?>" autcomplete="off" value="<?php if(old('title')): ?> <?php echo e(old('title')); ?> <?php endif; ?>">
                                    <?php if($errors->has('title')): ?>
                                    <label id="title-error" class="error" for="title"><?php echo e($errors->first('title')); ?></label>
                                    <?php endif; ?>
									</div>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                    <label for="latitude"><?php echo e(__('webMessage.latitude')); ?></label>
									<input type="text" name="latitude"  class="form-control" id="latitude" placeholder="<?php echo e(__('webMessage.enter_latitude')); ?>" autcomplete="off" value="<?php if(old('latitude')): ?> <?php echo e(old('latitude')); ?> <?php endif; ?>">
                                    <?php if($errors->has('latitude')): ?>
                                    <label id="block-error" class="error" for="block"><?php echo e($errors->first('latitude')); ?></label>
                                    <?php endif; ?>
									</div>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                    <label for="longitude"><?php echo e(__('webMessage.longitude')); ?></label>
									<input type="text" name="longitude"  class="form-control" id="longitude" placeholder="<?php echo e(__('webMessage.enter_longitude')); ?>" autcomplete="off" value="<?php if(old('longitude')): ?> <?php echo e(old('longitude')); ?> <?php endif; ?>">
                                    <?php if($errors->has('longitude')): ?>
                                    <label id="block-error" class="error" for="block"><?php echo e($errors->first('longitude')); ?></label>
                                    <?php endif; ?>
									</div>
                                    </div>
                                    </div>
									<?php
                                    $countryid=0;
                                    $countryLists = App\Http\Controllers\webCartController::get_country($countryid);
                                    ?>       
                                    <div class="row">
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                    <label for="country"><?php echo e(__('webMessage.country')); ?><font color="#FF0000">*</font></label>
									<select name="country"  class="form-control country_checkout" id="country" >
                                    <option value="0"><?php echo e(__('webMessage.choosecountry')); ?></option>
                                    <?php if(!empty($countryLists) && count($countryLists)>0): ?>
                                    <?php $__currentLoopData = $countryLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $countryList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($countryList->id); ?>" <?php if((!empty(old('country')) && old('country')==$countryList->id)): ?> selected <?php endif; ?>><?php echo e($countryList['name_'.$strLang]); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    </select>
                                    <?php if($errors->has('country')): ?>
                                    <label id="country-error" class="error" for="country"><?php echo e($errors->first('country')); ?></label>
                                    <?php endif; ?>
									</div>
                                    </div>
                                     
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                    <label for="state"><?php echo e(__('webMessage.state')); ?><font color="#FF0000">*</font></label>
									<select name="state"  class="form-control state_checkout" id="state_checkout" >
                                    <option value="0"><?php echo e(__('webMessage.choosestate')); ?></option>
                                    <?php if(!empty(old('country'))): ?>
                                    <?php
                                    if(!empty(old('country'))){$country_id=old('country');}else{$country_id='';}
                                    $stateLists = App\Http\Controllers\webCartController::get_country($country_id);
                                    ?>
                                    <?php $__currentLoopData = $stateLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stateList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($stateList->id); ?>" <?php if((!empty(old('state')) && old('state')==$stateList->id)): ?> selected <?php endif; ?>><?php echo e($stateList['name_'.$strLang]); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    </select>
                                    <?php if($errors->has('state')): ?>
                                    <label id="state-error" class="error" for="state"><?php echo e($errors->first('state')); ?></label>
                                    <?php endif; ?>
                                    </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                    <label for="area"><?php echo e(__('webMessage.area')); ?><font color="#FF0000">*</font></label>
									<select name="area"  class="form-control" id="area_checkout" >
                                    <option value="0"><?php echo e(__('webMessage.choosearea')); ?></option>
                                    <?php if(!empty(old('state'))): ?>
                                    <?php
                                    if(!empty(old('state'))){$state_id=old('state');}else{$state_id=0;}
                                    $areaLists = App\Http\Controllers\webCartController::get_country($state_id);
                                    ?>
                                    <?php $__currentLoopData = $areaLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $areaList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($areaList->id); ?>" <?php if((!empty(old('area')) && old('area')==$areaList->id)): ?> selected <?php endif; ?>><?php echo e($areaList['name_'.$strLang]); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    </select>
                                    <?php if($errors->has('area')): ?>
                                    <label id="area-error" class="error" for="area"><?php echo e($errors->first('area')); ?></label>
                                    <?php endif; ?>
                                    </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                    <label for="block"><?php echo e(__('webMessage.block')); ?><font color="#FF0000">*</font></label>
									<input type="text" name="block"  class="form-control" id="block" placeholder="<?php echo e(__('webMessage.enter_block')); ?>" autcomplete="off" value="<?php if(old('block')): ?> <?php echo e(old('block')); ?> <?php endif; ?>">
                                    <?php if($errors->has('block')): ?>
                                    <label id="block-error" class="error" for="block"><?php echo e($errors->first('block')); ?></label>
                                    <?php endif; ?>
									</div>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                    <label for="street"><?php echo e(__('webMessage.street')); ?><font color="#FF0000">*</font></label>
                                    <input type="text" name="street"  class="form-control" id="street" placeholder="<?php echo e(__('webMessage.enter_street')); ?>" autcomplete="off" value="<?php if(old('street')): ?> <?php echo e(old('street')); ?> <?php endif; ?>">
                                    <?php if($errors->has('street')): ?>
                                    <label id="street-error" class="error" for="street"><?php echo e($errors->first('street')); ?></label>
                                    <?php endif; ?>
                                    </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                    <label for="avenue"><?php echo e(__('webMessage.avenue')); ?></label>
                                    <input type="text" name="avenue"  class="form-control" id="avenue" placeholder="<?php echo e(__('webMessage.enter_avenue')); ?>" autcomplete="off" value="<?php if(old('avenue')): ?> <?php echo e(old('avenue')); ?> <?php endif; ?>">
                                    <?php if($errors->has('avenue')): ?>
                                    <label id="avenue-error" class="error" for="avenue"><?php echo e($errors->first('avenue')); ?></label>
                                    <?php endif; ?>
                                    </div>
                                    </div>
                                    </div>
                                    
                                    <div class="row">
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                    <label for="house"><?php echo e(__('webMessage.house')); ?><font color="#FF0000">*</font></label>
                                    <input type="text" name="house"  class="form-control" id="house" placeholder="<?php echo e(__('webMessage.enter_house')); ?>" autcomplete="off" value="<?php if(old('house')): ?> <?php echo e(old('house')); ?> <?php endif; ?>">
                                    <?php if($errors->has('house')): ?>
                                    <label id="house-error" class="error" for="house"><?php echo e($errors->first('house')); ?></label>
                                    <?php endif; ?>
                                    </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                    <label for="floor"><?php echo e(__('webMessage.floor')); ?></label>
									<input type="text" name="floor"  class="form-control" id="floor" placeholder="<?php echo e(__('webMessage.enter_floor')); ?>" autcomplete="off" value="<?php if(old('floor')): ?> <?php echo e(old('floor')); ?> <?php endif; ?>">
                                    <?php if($errors->has('floor')): ?>
                                    <label id="floor-error" class="error" for="floor"><?php echo e($errors->first('floor')); ?></label>
                                    <?php endif; ?>
									</div>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                    <label for="is_default" style="margin-top:10px;"><input type="checkbox" name="is_default"  id="is_default" autcomplete="off" value="1">&nbsp;<?php echo e(__('webMessage.default_address')); ?></label>
									
									</div>
                                    </div>
                                    
                                    </div>
									
									<div class="row">
										<div class="col-auto">
											<div class="form-group">
												<button class="btn btn-border" type="submit"><?php echo e(__('webMessage.save')); ?></button>
											</div>
										</div>
									</div>
                                    <?php if(session('session_msg')): ?>
                                    <div class="alert-success"><?php echo e(session('session_msg')); ?></div>
                                    <?php endif; ?>
								</form>
                                </div>
                                <div class="col-xs-4 col-md-4 col-lg-4" align="right">
                                 <div id="mapids" style="width:320px;height:400px;"></div>
                                </div>
                                </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--footer-->
<?php echo $__env->make("website.includes.footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- modal (AddToCartProduct) -->
<?php echo $__env->make("website.includes.addtocart_modal", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="<?php echo e(url('assets/external/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/external/bootstrap/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/external/slick/slick.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/external/perfect-scrollbar/perfect-scrollbar.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/external/panelmenu/panelmenu.js')); ?>"></script>
<script src="<?php echo e(url('assets/external/instafeed/instafeed.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/external/countdown/jquery.plugin.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/external/countdown/jquery.countdown.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/external/rs-plugin/js/jquery.themepunch.tools.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/external/rs-plugin/js/jquery.themepunch.revolution.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/external/lazyLoad/lazyload.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/js/main.js')); ?>"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script defer src="<?php echo e(url('hakum_assets/js/bundle.js')); ?>"></script>
<script src="<?php echo e(url('assets/js/gulfweb.js')); ?>"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAZDl2BsDI2qPQ0l-eJp5eVXetkFGkO75E&callback=initMap&libraries=&v=weekly" async ></script>
<script>

<!-- map -->
	  function initMap() { 
      const myLatlng = { lat: 29.3117, lng: 47.4818 };
      const map = new google.maps.Map(document.getElementById("mapids"), {
      zoom: 10,
      center: myLatlng
     });

  // Create the initial InfoWindow.
  let infoWindow = new google.maps.InfoWindow({
    content: "Click the map to get Lat/Lng!",
    position: myLatlng
  });
  infoWindow.open(map);
  // Configure the click listener.
  map.addListener("click", (mapsMouseEvent) => {
    // Close the current InfoWindow.
    infoWindow.close();
    // Create a new InfoWindow.
    infoWindow = new google.maps.InfoWindow({
      position: mapsMouseEvent.latLng,
    });
    infoWindow.setContent(
      JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
    );
	var obj = $.parseJSON(JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2));
	if(obj.lat!=""){
	$("#latitude").val(obj.lat)
	}
	if(obj.lng!=""){
	$("#longitude").val(obj.lng)
	}
    infoWindow.open(map);
  });
}


</script>
</body>
</html><?php /**PATH /home/kashkha/private/resources/views/website/newaddress.blade.php ENDPATH**/ ?>