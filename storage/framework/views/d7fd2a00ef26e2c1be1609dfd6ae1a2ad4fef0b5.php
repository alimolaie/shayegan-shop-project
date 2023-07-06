<?php
$settingInfo = App\Http\Controllers\webController::settings();
if(!empty(app()->getLocale())){ $strLang = app()->getLocale();}else{$strLang="en";}

if(!empty($productDetails['seo_description_'.$strLang])){
$seo_description = $productDetails['seo_description_'.$strLang];
}else{
$seo_description = $settingInfo['seo_description_'.$strLang];
}
if(!empty($productDetails['seo_keywords_'.$strLang])){
$seo_keywords = $productDetails['seo_keywords_'.$strLang];
}else{
$seo_keywords = $settingInfo['seo_keywords_'.$strLang];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>
<?php if(app()->getLocale()=="en" && !empty($settingInfo->name_en)): ?> 
<?php echo e($settingInfo->name_en); ?> 
<?php elseif(app()->getLocale()=="ar" && !empty($settingInfo->name_ar)): ?>
<?php echo e($settingInfo->name_ar); ?> 
<?php endif; ?> | <?php if(app()->getLocale()=="en" && !empty($productDetails->title_en)): ?> <?php echo e($productDetails->title_en); ?> <?php elseif(app()->getLocale()=="ar" && !empty($productDetails->title_ar)): ?> <?php echo e($productDetails->title_ar); ?> <?php endif; ?></title>
<meta name="description" content="<?php echo e($seo_description); ?>" />
<meta name="abstract" content="<?php echo e($seo_description); ?>">
<meta name="keywords" content="<?php echo e($seo_keywords); ?>" />
<meta name="Copyright" content="<?php if(!empty($settingInfo->name_en)): ?><?php echo e($settingInfo->name_en); ?><?php endif; ?>, Kuwait Copyright 2020 - <?php echo e(date('Y')); ?>" />
<META NAME="Geography" CONTENT="<?php if(app()->getLocale()=="en" && !empty($settingInfo->address_en)): ?> <?php echo e($settingInfo->address_en); ?> <?php elseif(app()->getLocale()=="ar" && !empty($settingInfo->address_ar)): ?> <?php echo e($settingInfo->address_ar); ?> <?php endif; ?>">
<?php if(!empty($settingInfo->extra_meta_tags)): ?> <?php echo $settingInfo->extra_meta_tags; ?> <?php endif; ?>
<?php if($settingInfo->favicon): ?>
<link rel="icon" href="<?php echo e(url('uploads/logo/'.$settingInfo->favicon)); ?>">
<?php endif; ?>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php echo $__env->make("website.includes.css", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--facebook meta tags -->
    <?php if(!empty($settingInfo->og_title)): ?>
    <meta property="og:title" content="<?php if(!empty($productDetails['title_'.$strLang])): ?><?php echo e($productDetails['title_'.$strLang]); ?><?php endif; ?>">
    <?php endif; ?>
    <?php if(!empty($settingInfo->og_description)): ?>
    <meta property="og:description" content="<?php if(!empty($productDetails['details_'.$strLang])): ?><?php echo $productDetails['title_'.$strLang]; ?><?php endif; ?>">
    <?php endif; ?>
    <?php if(!empty($settingInfo->og_url)): ?>
    <meta property="og:url" content="<?php echo e(url('details/'.$productDetails->id.'/'.$productDetails->slug)); ?>">
    <?php endif; ?>
    <?php if(!empty($settingInfo->og_image)): ?>
    <meta property="og:image" content="<?php echo e(url('uploads/product/'.$productDetails->image)); ?>">
    <?php if(!empty($prodGalleries)): ?>
    <?php $__currentLoopData = $prodGalleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <meta property="og:image" content="<?php echo e(url('uploads/product/'.$gallery->image)); ?>">
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <?php endif; ?>
                                    
    <?php if(!empty($settingInfo->og_brand)): ?>
    <?php if(!empty($brandDetails['title_'.$strLang])): ?>
    <meta property="product:brand" content="<?php echo e($brandDetails['title_'.$strLang]); ?>">
    <?php endif; ?>
    <?php endif; ?>
    <?php if(!empty($settingInfo->og_availability)): ?>
    <?php if($availableQty>0): ?>
    <meta property="product:availability" content="in stock">
    <?php endif; ?>
    <?php endif; ?>
    <?php if(!empty($settingInfo->og_condition)): ?>
    <meta property="product:condition" content="new">
    <?php endif; ?>
    <?php if(!empty($settingInfo->og_amount)): ?>
    <?php if(!empty($productDetails->countdown_datetime) && strtotime($productDetails->countdown_datetime)>strtotime(date('Y-m-d'))): ?>
    <meta property="product:price:amount" content="<?php echo e(round($productDetails->countdown_price,3)); ?>">
    <meta property="product:sale_price_dates:start" content="<?php echo e(date('Y-m-d')); ?>">
    <meta property="product:sale_price_dates:end" content="<?php echo e($productDetails->countdown_datetime); ?>">
    <?php else: ?>
    <meta property="product:price:amount" content="<?php echo e(round($productDetails->retail_price,3)); ?>">
    <?php endif; ?>
    <?php endif; ?>
    <?php if(!empty($settingInfo->og_currency)): ?>
    <meta property="product:price:currency" content="KWD">
    <?php endif; ?>
    <?php if(!empty($settingInfo->og_retailer_item_id)): ?>
    <meta property="product:retailer_item_id" content="<?php echo e($productDetails->item_code); ?>">
    <?php endif; ?>
    <?php if(!empty($settingInfo->og_title)): ?>
    <meta property="product:item_group_id" content="<?php echo e($productDetails->item_code); ?>">
    <?php endif; ?>
    <!--end FB tags -->
    
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
    <style>.g-recaptcha {transform:scale(0.90);transform-origin:0 0;}</style>
   <?php 
   if(!empty($productDetails->countdown_datetime) && strtotime($productDetails->countdown_datetime)>strtotime(date('Y-m-d'))){
   $gprice = round($productDetails->countdown_price,3);
   }else{
   $gprice = round($productDetails->retail_price,3);
   }
   ?>
    
   
</head>
<body>
<!--preloader -->
<?php echo $__env->make("website.includes.preloader", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--end preloader -->
<!--header -->
<?php echo $__env->make("website.includes.header", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--end header -->
<?php
$catTreeName =App\Http\Controllers\webController::getCatTreeNameByPid($productDetails->id);
?>
<div class="tt-breadcrumb">
	<div class="container">
		<ul itemscope itemtype="https://schema.org/BreadcrumbList">
			<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <a itemprop="item" href="<?php echo e(url('/')); ?>"><span itemprop="name"><?php echo e(__('webMessage.home')); ?></span></a>
            <meta itemprop="position" content="1" />
            </li>
            <?php echo $catTreeName; ?>

			<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="javascript:;"><span itemprop="name"><?php if(app()->getLocale()=="en"): ?> <?php echo e($productDetails->title_en); ?> <?php else: ?> <?php echo e($productDetails->title_ar); ?> <?php endif; ?></span></a><meta itemprop="position" content="4" /></li>
		</ul>
	</div>
</div>
<div id="tt-pageContent" itemtype="http://schema.org/Product" itemscope>
<meta itemprop="mpn" content="<?php echo e($productDetails->item_code); ?>" />
<meta itemprop="name" content="<?php if(app()->getLocale()=="en" && !empty($productDetails->title_en)): ?> <?php echo e($productDetails->title_en); ?> <?php elseif(app()->getLocale()=="ar" && !empty($productDetails->title_ar)): ?> <?php echo e($productDetails->title_ar); ?> <?php endif; ?>" />

<!-- product details -->
<div class="container-indent">
		<!-- mobile product slider  -->
		<div class="tt-mobile-product-slider visible-xs arrow-location-center slick-animated-show-js">
            <?php if($productDetails->image): ?>
			<div><img id="displaym-<?php echo e($productDetails->id); ?>" src="<?php echo e(url('uploads/product/'.$productDetails->image)); ?>" alt=""><link itemprop="image" href="<?php echo e(url('uploads/product/'.$productDetails->image)); ?>" /></div>
            <?php else: ?>
            <div><img id="displaym-<?php echo e($productDetails->id); ?>" src="<?php echo e(url('uploads/no-image.png')); ?>" alt=""></div>
            <?php endif; ?>
            <?php if(!empty($prodGalleries)): ?>
            <?php $__currentLoopData = $prodGalleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div><img src="<?php echo e(url('uploads/product/'.$gallery->image)); ?>" alt=""><link itemprop="image" href="<?php echo e(url('uploads/product/'.$gallery->image)); ?>" /></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
			<?php if($productDetails->youtube_url_id): ?>
			<div>
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo e($productDetails->youtube_url_id); ?>" allowfullscreen></iframe>
				</div>
			</div>
            <?php endif; ?>
		</div>
        
		<!-- /mobile product slider  -->
		<div class="container container-fluid-mobile">
			<div class="row">
				<div class="col-6 hidden-xs">
					<div class="tt-product-vertical-layout">
						<div class="tt-product-single-img">
                         <?php if($productDetails->is_active=='2'): ?>
                         <span class="tt-label-location-float">
						 <span class="tt-label-new"><?php echo e(__('webMessage.preorder')); ?></span>
						 </span>
                         <?php endif; ?>
							 <div>
                                <?php if($productDetails->image): ?>
								<img id="displayd-<?php echo e($productDetails->id); ?>"   class="zoom-product" src="<?php echo e(url('uploads/product/'.$productDetails->image)); ?>" data-zoom-image="<?php echo e(url('uploads/product/'.$productDetails->image)); ?>" alt="">
                                <?php else: ?>
                                <img id="displayd-<?php echo e($productDetails->id); ?>"   class="zoom-product" src="<?php echo e(url('uploads/no-image.png')); ?>" data-zoom-image="<?php echo e(url('uploads/no-image.png')); ?>" alt="">
                                <?php endif; ?>
								<button class="tt-btn-zomm tt-top-right"><i class="icon-f-86"></i></button>
							</div>
						</div>
						<div class="tt-product-single-carousel-vertical">
							<ul id="smallGallery" class="tt-slick-button-vertical slick-animated-show-js">
                                <?php if($productDetails->image): ?>
								<li><a id="displaya-<?php echo e($productDetails->id); ?>" class="zoomGalleryActive" href="javascript:;" data-image="<?php echo e(url('uploads/product/'.$productDetails->image)); ?>" data-zoom-image="<?php echo e(url('uploads/product/'.$productDetails->image)); ?>"><img src="<?php echo e(url('uploads/product/thumb/'.$productDetails->image)); ?>" alt="" id="displayt-<?php echo e($productDetails->id); ?>"></a></li>
                                <?php endif; ?>
                                <?php if(!empty($prodGalleries)): ?>
                                <?php $__currentLoopData = $prodGalleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="javascript:;" data-image="<?php echo e(url('uploads/product/'.$gallery->image)); ?>" data-zoom-image="<?php echo e(url('uploads/product/'.$gallery->image)); ?>"><img src="<?php echo e(url('uploads/product/thumb/'.$gallery->image)); ?>" alt=""></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
								<?php if($productDetails->youtube_url_id): ?>
								<li>
									<div class="video-link-product" data-toggle="modal" data-type="youtube" data-target="#modalVideoProduct" data-value="https://www.youtube.com/embed/<?php echo e($productDetails->youtube_url_id); ?>">
										<img src="<?php echo e(url('assets/images/product/product-small-empty.png')); ?>" alt="" >
										<div>
											<i class="icon-f-32"></i>
										</div>
									</div>
								</li>
								<?php endif; ?>
							</ul>
						</div>
                         
					</div>
                 
				</div>
				<div class="col-6">
					<div class="tt-product-single-info">
						 <div class="tt-wrapper">
							<div class="tt-label">
							    <span class="tt-label-location">
								<?php if(!empty($productDetails->caption_en)): ?><span class="tt-label-sale" style="background-color:<?php echo e($productDetails['caption_color']); ?>;"><?php echo e($productDetails['caption_'.$strLang]); ?></span><?php endif; ?>
								</span>
							</div>
						</div>
						<div class="tt-add-info">
							<ul> 
                                <?php if(!empty($productDetails->item_code)): ?>
								<li><span><?php echo e(__('webMessage.item_code')); ?>:</span> <?php echo e($productDetails->item_code); ?></li>
                                <?php endif; ?>
                                <?php if(!empty($productDetails->sku_no)): ?>
								<li><span><?php echo e(__('webMessage.sku_no')); ?>:</span> <?php echo e($productDetails->sku_no); ?></li>
                                <meta itemprop="sku" content="<?php echo e($productDetails->sku_no); ?>" />
                                <?php endif; ?>
                                <?php if($availableQty && ($availableQty>0 && $availableQty<=3)): ?>
                                <?php if($availableQty && $availableQty>0): ?>
								<li><span><?php echo e(__('webMessage.availability')); ?>:</span> <span id="display_qty"><?php echo e($availableQty); ?></span> <font color="#009900"><?php echo e(__('webMessage.instock')); ?></font></li>
                                <?php else: ?>
                                <li><span><?php echo e(__('webMessage.availability')); ?>:</span> <span id="display_qty">0</span> <font color="#ff0000"><?php echo e(__('webMessage.outofstock')); ?></font></li>
                                <?php endif; ?>
                                <?php endif; ?>
                                <?php if(!empty($brandDetails['title_'.$strLang])): ?>
                                <li itemprop="brand" itemtype="http://schema.org/Brand" itemscope><span><?php echo e(__('webMessage.brand')); ?>:</span> <a href="<?php echo e(url('brands/'.$brandDetails->slug)); ?>"><?php echo e($brandDetails['title_'.$strLang]); ?></a>
                                <meta itemprop="name" content="<?php echo e($brandDetails['title_'.$strLang]); ?>" />
                                </li>
                                <?php endif; ?>
                                
                                <?php if(!empty($tagsDetails)): ?>
								<li><?php echo $tagsDetails; ?></li>
                                <?php endif; ?>
                                
                                
							</ul>
						</div>
						<h1 class="tt-title"><?php if(app()->getLocale()=="en"): ?> <?php echo e($productDetails->title_en); ?> <?php else: ?> <?php echo e($productDetails->title_ar); ?> <?php endif; ?></h1>
						<div class="tt-price">
                        <?php if(!empty($productDetails->countdown_datetime) && strtotime($productDetails->countdown_datetime)>strtotime(date('Y-m-d'))): ?>
                        <span class="new-price <?php if($productDetails->old_price): ?> price_red <?php endif; ?>"><span id=""><?php echo e(round($productDetails->countdown_price,3)); ?></span><?php echo e(__('webMessage.kd')); ?></span>
                        <span  class="old-price price_black"  id="oldprices"><small><span id=""><?php echo e(round($productDetails->retail_price,3)); ?></span><?php echo e(__('webMessage.kd')); ?></small></span>
                        
                           <div itemprop="offers" itemtype="http://schema.org/Offer" itemscope>
                                <link itemprop="url" href="<?php echo e(url('details/'.$productDetails->id.'/'.$productDetails->slug)); ?>" />
                                <meta itemprop="availability" content="https://schema.org/InStock" />
                                <meta itemprop="priceCurrency" content="KWD" />
                                <meta itemprop="itemCondition" content="https://schema.org/New" />
                                <meta itemprop="price" content="<?php echo e(round($productDetails->countdown_price,3)); ?>" />
                                <meta itemprop="priceValidUntil" content="<?php echo e(date('Y-m-d',strtotime(date('Y-m-d').'+10 days'))); ?>" />
                            </div>
                            <meta itemprop="sell_on_google_price" content="<?php echo e(round($productDetails->retail_price,3)); ?> KWD" />
                            <meta itemprop="sell_on_google_sale_price" content="<?php echo e(round($productDetails->countdown_price,3)); ?> KWD" />  
                        <?php else: ?>
							<span class="<?php if($productDetails->old_price): ?> price_red <?php endif; ?> new-price"><span id="display_price"><?php echo e(round($productDetails->retail_price,3)); ?></span><?php echo e(__('webMessage.kd')); ?></span>
                            <?php if($productDetails->old_price): ?>
							<span class="old-price price_black"  id="oldprices" ><small><span id="display_oldprice"><?php echo e(round($productDetails->old_price,3)); ?></span><?php echo e(__('webMessage.kd')); ?></small></span>
                            <meta itemprop="sell_on_google_price" content="<?php echo e(round($productDetails->old_price,3)); ?> KWD" />
                            <meta itemprop="sell_on_google_sale_price" content="<?php echo e(round($productDetails->retail_price,3)); ?> KWD" />
                            <?php else: ?>
                            <meta itemprop="sell_on_google_price" content="<?php echo e(round($productDetails->retail_price,3)); ?> KWD" />
                            <?php endif; ?>
                            
                            <div itemprop="offers" itemtype="http://schema.org/Offer" itemscope>
                                <link itemprop="url" href="<?php echo e(url('details/'.$productDetails->id.'/'.$productDetails->slug)); ?>" />
                                <meta itemprop="availability" content="https://schema.org/InStock" />
                                <meta itemprop="priceCurrency" content="KWD" />
                                <meta itemprop="itemCondition" content="https://schema.org/New" />
                                <meta itemprop="price" content="<?php echo e(round($productDetails->retail_price,3)); ?>" />
                                <meta itemprop="priceValidUntil" content="<?php echo e(date('Y-m-d',strtotime(date('Y-m-d').'+10 days'))); ?>" />
                            </div>
                            
                            
                         <?php endif; ?>
                         
						</div>
                        <?php
                        $ratingsproducts = App\Http\Controllers\webController::getProductRatings($productDetails->id);
                        ?>
						<div class="tt-review">
							<div class="tt-rating">
								<?php echo $ratingsproducts; ?>

							</div>
							<a href="#showreviews">(<?php echo e(count($ReviewsLists)); ?> <?php echo e(__('webMessage.customerreview')); ?>)</a>
						</div>
						<?php if(!empty($productDetails->countdown_datetime) && strtotime($productDetails->countdown_datetime)>strtotime(date('Y-m-d'))): ?>
						<div class="tt-wrapper">
							<div class="tt-countdown_box_02">
								<div class="tt-countdown_inner">
									<div class="tt-countdown"
										data-date="<?php echo e($productDetails->countdown_datetime); ?>"
										data-year="Yrs"
										data-month="Mths"
										data-week="Wk"
										data-day="Day"
										data-hour="Hrs"
										data-minute="Min"
										data-second="Sec"></div>
								</div>
							</div>
						</div>
                        <?php endif; ?>
                        <form name="addtocartDetailsForm" id="addtocartDetailsForm" method="POST" action="<?php echo e(route('addtocartDetails')); ?>">
                        
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <input type="hidden" name="product_id" id="product_id" value="<?php echo e($productDetails->id); ?>">
                        
                        <?php if(!empty($productDetails->countdown_datetime) && strtotime($productDetails->countdown_datetime)>strtotime(date('Y-m-d'))): ?>
                        <input type="hidden" name="price" id="unit_price" value="<?php echo e($productDetails->countdown_price); ?>">
                        <?php else: ?>
                        <input type="hidden" name="price" id="unit_price" value="<?php echo e($productDetails->retail_price); ?>">
                        <?php endif; ?>
                        <!--attribute -->
                        <?php if(!empty($productDetails->is_attribute) && $availableQty>0): ?>
                        <div class="tt-swatches-container">
                        <img id="loader-gif" src="<?php echo e(url('assets/images/loader.svg')); ?>" style="position:absolute;margin-left:30%;display:none;margin-top:-40px;">
                        <!--product options -->
                        <?php if(!empty($productoptions) && count($productoptions)>0): ?>
                        <?php $__currentLoopData = $productoptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productoption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <input type="hidden" name="option_id[]" id="option_id_<?php echo e($productoption->id); ?>" value="<?php echo e($productoption->id); ?>">
                        
                        <!--check custom option for size/color - 1,2,3-->
                        <?php if($productoption->custom_option_id==1): ?>
                        <input type="hidden" name="option_sc" id="option_sc_<?php echo e($productoption->id); ?>" value="<?php echo e($productoption->custom_option_id); ?>">
                        <?php
                        $SizeAttributes = App\Http\Controllers\webCartController::getSizeByCustomIdProductId($productoption->custom_option_id,$productDetails->id);
                        ?>
                        <!--size-->
                        <?php if(!empty($SizeAttributes) && count($SizeAttributes)>0): ?>
							<div class="tt-wrapper">
								<div class="tt-title-options"><?php echo e(__('webMessage.size')); ?>*:</div>
									<div class="form-group">
										<select class="form-control size_attr" name="size_attr" id="size_attr_<?php echo e($productDetails->id); ?>">
                                            <option value="0"><?php echo e(__('webMessage.choosesize')); ?></option>
											<?php $__currentLoopData = $SizeAttributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $SizeAttribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($strLang=="en"){ $sizeName = $SizeAttribute->title_en;}else{$sizeName = $SizeAttribute->title_ar;}?>
                                            <option value="<?php echo e($SizeAttribute->size_id); ?>"><?php echo e($sizeName); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
									</div>
							</div>
                         <?php endif; ?>
                        <!--size end -->
                        <?php elseif($productoption->custom_option_id==2): ?>
                        <input type="hidden" name="option_sc" id="option_sc_<?php echo e($productoption->id); ?>" value="<?php echo e($productoption->custom_option_id); ?>">
                        <?php
                        $ColorAttributes = App\Http\Controllers\webCartController::getColorByCustomIdProductId($productoption->custom_option_id,$productDetails->id);
                        ?>
                        <!--color-->
                        <?php if(!empty($ColorAttributes) && count($ColorAttributes)>0): ?>
                        <input type="hidden" name="is_color" id="is_color" value="1">
                        <input type="hidden" name="color_attr" id="color_attr" value="">
                            <span id="color_box">
							<div class="tt-wrapper">
								<div class="tt-title-options"><?php echo e(__('webMessage.texture')); ?>:</div>
								<ul class="tt-options-swatch options-large">
									<?php $__currentLoopData = $ColorAttributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ColorAttribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                    if($ColorAttribute->color_code){$colorcode=$ColorAttribute->color_code;}else{$colorcode='none';}
                                    ?>
                                  
                                    <?php if(!empty($ColorAttribute->image)): ?>
                                    <li id="li-<?php echo e($ColorAttribute->color_id); ?>">
                                    <a class="options-color"  href="javascript:;" id="<?php echo e($ColorAttribute->color_id); ?>">
										<span class="swatch-img">
											<img src="<?php echo e(url('uploads/color/thumb/'.$ColorAttribute->image)); ?>" alt="">
										</span>
										<span class="swatch-label color-black"></span>
									</a>
                                    </li>
                                    <?php else: ?>
                                    <li id="li-<?php echo e($ColorAttribute->color_id); ?>"><a href="javascript:;" class="options-color" style="background-color:<?php echo e($colorcode); ?>;" id="<?php echo e($ColorAttribute->color_id); ?>" ></a></li>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</ul>
                                <br clear="all">
							</div>
                            </span>
							<?php endif; ?>
                             <br clear="all">
                        <!--color end -->
                        <?php elseif($productoption->custom_option_id==3): ?>
                        <input type="hidden" name="option_sc" id="option_sc_<?php echo e($productoption->id); ?>" value="<?php echo e($productoption->custom_option_id); ?>">
                        <!--size & color-->
                        <?php
                        $SizeAttributes = App\Http\Controllers\webCartController::getSizeByCustomIdProductId($productoption->custom_option_id,$productDetails->id);
                        ?>
                        <!--size-->
                        <?php if(!empty($SizeAttributes) && count($SizeAttributes)>0): ?>
							<div class="tt-wrapper">
								<div class="tt-title-options"><?php echo e(__('webMessage.size')); ?>:</div>
									<div class="form-group">
										<select class="form-control size_attr" name="size_attr" id="size_attr_<?php echo e($productDetails->id); ?>">
                                            <option value="0"><?php echo e(__('webMessage.choosesize')); ?></option>
											<?php $__currentLoopData = $SizeAttributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $SizeAttribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($strLang=="en"){ $sizeName = $SizeAttribute->title_en;}else{$sizeName = $SizeAttribute->title_ar;}?>
                                            <option value="<?php echo e($SizeAttribute->size_id); ?>"><?php echo e($sizeName); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
									</div>
							</div>
                         <?php endif; ?>
                         
                         <?php
                        $ColorAttributes = App\Http\Controllers\webCartController::getColorByCustomIdProductId($productoption->custom_option_id,$productDetails->id);
                        ?>
                        <!--color-->
                        <?php if(!empty($ColorAttributes) && count($ColorAttributes)>0): ?>
                        <input type="hidden" name="is_color" id="is_color" value="1">
                        <input type="hidden" name="color_attr" id="color_attr" value="">
                            <span id="color_box">
							<div class="tt-wrapper">
								<div class="tt-title-options"><?php echo e(__('webMessage.texture')); ?>:</div>
								<ul class="tt-options-swatch options-large">
									<?php $__currentLoopData = $ColorAttributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ColorAttribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                    if($ColorAttribute->color_code){$colorcode=$ColorAttribute->color_code;}else{$colorcode='none';}
                                    ?>
                                  
                                    <?php if(!empty($ColorAttribute->image)): ?>
                                    <li>
                                    <a class="options-color"  href="javascript:;" id="<?php echo e($ColorAttribute->color_id); ?>">
										<span class="swatch-img">
											<img src="<?php echo e(url('uploads/color/thumb/'.$ColorAttribute->image)); ?>" alt="">
										</span>
										<span class="swatch-label color-black"></span>
									</a>
                                    </li>
                                    <?php else: ?>
                                    <li><a href="javascript:;" class="options-color" style="background-color:<?php echo e($colorcode); ?>;" id="<?php echo e($ColorAttribute->color_id); ?>" ></a></li>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</ul>
                                <br clear="all">
							   </div>
                            </span>
							<?php endif; ?>
                        <br clear="all">
                        <!--size & color end -->
                        <?php else: ?>
                        <!--optiona details-->
                        <?php
                        $customOptions = App\Http\Controllers\webCartController::getCustomOptions($productoption->custom_option_id,$productDetails->id);
                        
                        ?>
                        
                        <!--radio box -->
                        <?php if(!empty($customOptions['CustomOptionName']) && $customOptions['CustomOptionType']=="radio"): ?>
                        <div class="tt-wrapper">
						<div class="tt-title-options"><?php echo e($customOptions['CustomOptionName']); ?> <?php if(!empty($productoption->is_required)): ?>*<?php endif; ?>:</div>
						<ul class="optionradio">
                        <?php if(!empty($customOptions['childs']) && count($customOptions['childs'])>0): ?>
                        <?php $is_cadd_txt=''; ?>
                        <?php $__currentLoopData = $customOptions['childs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        if(!empty($child->retail_price) && !empty($child->is_price_add) && $child->is_price_add==1){
                        $is_cadd="+";

                        $is_cadd_txt=$is_cadd.' '.$child->retail_price.' '.trans('webMessage.kd');
                        }else if(!empty($child->retail_price) && !empty($child->is_price_add) && $child->is_price_add==2){
                        $is_cadd="-";
                        $is_cadd_txt=$is_cadd.' '.$child->retail_price.' '.trans('webMessage.kd');
                        }else if(!empty($child->retail_price) && empty($child->is_price_add)){
                        $is_cadd="";
                        $is_cadd_txt=$child->retail_price.' '.trans('webMessage.kd');
                        }else{
                        $is_cadd="";
                        $is_cadd_txt="";
                        }
                        
                        $option_value_name = $strLang=="en"?$child->option_value_name_en:$child->option_value_name_ar;
                        ?>
                        <li><label for="option-<?php echo e($productDetails->id); ?>-<?php echo e($productoption->custom_option_id); ?>-<?php echo e($child->id); ?>"><input class="checkOptionPrice" type="radio" name="option-<?php echo e($productDetails->id); ?>-<?php echo e($productoption->custom_option_id); ?>" id="option-<?php echo e($productDetails->id); ?>-<?php echo e($productoption->custom_option_id); ?>-<?php echo e($child->id); ?>" value="<?php echo e($child->id); ?>">&nbsp;<?php echo e($option_value_name); ?>(<?php echo e($is_cadd_txt); ?>)</label></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        </ul>
                        </div>     
                        <?php endif; ?>   
                        <!--end radio box -->
                        <!--check box -->
                        <?php if(!empty($customOptions['CustomOptionName']) && $customOptions['CustomOptionType']=="checkbox"): ?>
                        <div class="tt-wrapper">
						<div class="tt-title-options"><?php echo e($customOptions['CustomOptionName']); ?><?php if(!empty($productoption->is_required)): ?>*<?php endif; ?>:</div>
						<ul class="optionradio">
                        <?php if(!empty($customOptions['childs']) && count($customOptions['childs'])>0): ?>
                        <?php $is_cadd_txt=''; ?>
                        <?php $__currentLoopData = $customOptions['childs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <?php
                        if(!empty($child->retail_price) && !empty($child->is_price_add) && $child->is_price_add==1){
                        $is_cadd="+";
                        $is_cadd_txt=$is_cadd.' '.$child->retail_price.' '.trans('webMessage.kd');
                        }else if(!empty($child->retail_price) && !empty($child->is_price_add) && $child->is_price_add==2){
                        $is_cadd="-";
                        $is_cadd_txt=$is_cadd.' '.$child->retail_price.' '.trans('webMessage.kd');
                        }else if(!empty($child->retail_price) && empty($child->is_price_add)){
                        $is_cadd="";
                        $is_cadd_txt=$child->retail_price.' '.trans('webMessage.kd');
                        }else{
                        $is_cadd="";
                        $is_cadd_txt="";
                        }
                        $option_value_name = $strLang=="en"?$child->option_value_name_en:$child->option_value_name_ar;
                        ?>
                        <li><label for="checkbox-<?php echo e($productDetails->id); ?>-<?php echo e($productoption->custom_option_id); ?>-<?php echo e($child->id); ?>"><input class="checkOptionPricechk" type="checkbox" name="checkbox-<?php echo e($productDetails->id); ?>-<?php echo e($productoption->custom_option_id); ?>[]" id="checkbox-<?php echo e($productDetails->id); ?>-<?php echo e($productoption->custom_option_id); ?>-<?php echo e($child->id); ?>" value="<?php echo e($child->id); ?>">&nbsp;<?php echo e($option_value_name); ?>(<?php echo e($is_cadd_txt); ?>)</label></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        </ul>
                        </div>     
                        <?php endif; ?>   
                        <!--end check box -->
                        
                        <!--check box -->
                        <?php if(!empty($customOptions['CustomOptionName']) && $customOptions['CustomOptionType']=="select"): ?>
                        <div class="tt-wrapper">
						<div class="tt-title-options"><?php echo e($customOptions['CustomOptionName']); ?><?php if(!empty($productoption->is_required)): ?>*<?php endif; ?>:</div>
						<div class="form-group">
						<select class="form-control choose_select_options" name="select-<?php echo e($productDetails->id); ?>-<?php echo e($productoption->custom_option_id); ?>" id="select-<?php echo e($productDetails->id); ?>-<?php echo e($productoption->custom_option_id); ?>">
                        <option value="0">---</option>
                        <?php if(!empty($customOptions['childs']) && count($customOptions['childs'])>0): ?>
                        <?php $is_cadd_txt=''; ?>
                        <?php $__currentLoopData = $customOptions['childs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <?php
                        if(!empty($child->retail_price) && !empty($child->is_price_add) && $child->is_price_add==1){
                        $is_cadd="+";
                        $is_cadd_txt=$is_cadd.' '.$child->retail_price.' '.trans('webMessage.kd');
                        }else if(!empty($child->retail_price) && !empty($child->is_price_add) && $child->is_price_add==2){
                        $is_cadd="-";
                        $is_cadd_txt=$is_cadd.' '.$child->retail_price.' '.trans('webMessage.kd');
                        }else if(!empty($child->retail_price) && empty($child->is_price_add)){
                        $is_cadd="";
                        $is_cadd_txt=$child->retail_price.' '.trans('webMessage.kd');
                        }else{
                        $is_cadd="";
                        $is_cadd_txt="";
                        }
                        $option_value_name = $strLang=="en"?$child->option_value_name_en:$child->option_value_name_ar;
                        ?>
                        <option value="select-<?php echo e($productDetails->id); ?>-<?php echo e($productoption->custom_option_id); ?>-<?php echo e($child->id); ?>"><?php echo e($option_value_name); ?>(<?php echo e($is_cadd_txt); ?>)</option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        </select>
                        </div>  
                        </div>     
                        <?php endif; ?>   
                        <!--end check box -->
                        
                        
                        <br clear="all">
                        <!--optiona details end -->
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        <!--end options -->    
                        </div>                 
                        <?php endif; ?>
                        <!--end attribute -->
                        
                        
                        
                        <?php if($availableQty>0): ?>
						<div class="tt-wrapper">
							<div class="tt-row-custom-01">
								<div class="col-item">
									<div class="tt-input-counter style-01">
										<span class="minus-btn" id="<?php echo e($productDetails->id); ?>"></span>
										<input type="text" value="1" size="<?php echo e($availableQty); ?>" name="quantity_attr" id="quantity_attr">
										<span class="plus-btn" id="<?php echo e($productDetails->id); ?>"></span>
									</div>
								</div>
								<div class="col-item">
                                <?php if($productDetails->is_active==2): ?>
						        <button type="submit" class="btn btn-lg"  id="details_cartbtn"><img id="loader-details-gif" src="<?php echo e(url('assets/images/loader.svg')); ?>" style="position:absolute;margin-left:2%;display:none;margin-top:-1px;"><i class="icon-f-39"></i><?php echo e(__('webMessage.preorder')); ?></button>
								<?php else: ?>
                                <button type="submit" class="btn btn-lg"  id="details_cartbtn"><img id="loader-details-gif" src="<?php echo e(url('assets/images/loader.svg')); ?>" style="position:absolute;margin-left:2%;display:none;margin-top:-1px;"><i class="icon-f-39"></i><?php echo e(__('webMessage.addtocart_btn')); ?></button>
                                <?php endif; ?>
                                </div>
							</div>
						</div>
                        <?php else: ?>
                        <div class="tt-wrapper">
                                <div class="row">
                                <div class="col-lg-4">
                                <div class="form-group">
								<label for="inquiry_name" class="control-label"><?php echo e(__('webMessage.name')); ?> </label>
								<input type="text" class="form-control" id="inquiry_name" name="inquiry_name" placeholder="<?php echo e(__('webMessage.enter_name')); ?>">
                                </div>
                                </div>
                                <div class="col-lg-4">
                                <div class="form-group">
								<label for="inquiry_email" class="control-label"><?php echo e(__('webMessage.email')); ?> *</label>
								<input type="email" class="form-control" id="inquiry_email" name="inquiry_email" placeholder="<?php echo e(__('webMessage.enter_email')); ?>">
                                </div>
                                </div>
                                <div class="col-lg-4">
                                <div class="form-group">
								<label for="inquiry_mobile" class="control-label"><?php echo e(__('webMessage.mobile')); ?> *</label>
								<input type="email" class="form-control" id="inquiry_mobile" name="inquiry_mobile" placeholder="<?php echo e(__('webMessage.enter_mobile')); ?>">
                                </div>
                                </div>
                                </div>
								<div class="row">
                                <div class="col-lg-12">
								<div class="form-group">
								<label for="inquiry_message" class="control-label"><?php echo e(__('webMessage.message')); ?> </label>
								<textarea class="form-control"  id="inquiry_message" name="inquiry_message" placeholder="<?php echo e(__('webMessage.write_some_text')); ?>" rows="4"></textarea>                </div>
                               <div class="form-group"><button type="button" class="btn btn-lg btncartInquiry"  id="<?php echo e($productDetails->id); ?>"><i class="icon-f-39"></i><?php echo e(__('webMessage.backorder')); ?></button><img width="40" src="<?php echo e(url('assets/images/ajax-loader.gif')); ?>" id="loading-gif" style="display:none;"></div>
                               </div>
                               </div>  
                                         
						</div>
                        <?php endif; ?>
                        </form>
						<div class="tt-wrapper">
                        <div class="row">
                        <?php if(!empty($productDetails->attachfile)): ?>
                        <div class="col-3"><a class="btn-link" target="_blank" href="<?php echo e(url('uploads/product/'.$productDetails->attachfile)); ?>"><i class="icon-e-39"></i><?php echo e(strtoupper(__('webMessage.catalogue'))); ?></a></div>
                        <?php endif; ?>
                         <div class="col-4">
							<ul class="tt-list-btn">
								<li><a class="btn-link addtowishlist" href="javascript:;" id="<?php echo e($productDetails->id); ?>"><i class="icon-n-072"></i><?php echo e(strtoupper(__('webMessage.addtowishlist'))); ?></a></li>
							</ul>
                           </div>
                           <div class="col-5" align="right">
						   
                           <?php
                           if(app()->getLocale()=="en"){
                           $text = $productDetails->title_en;
                           }else{
                           $text = $productDetails->title_ar;
                           }
                           $url = URL::to('/');
                           $image = URL::to('/').'/uploads/product/'.$productDetails->image;
                           $facebook_Share=App\Http\Controllers\webController::createSocialLinks("facebook",$url,$text);
                           $twitter_Share=App\Http\Controllers\webController::createSocialLinks("twitter",$url,$text);
                           $google_Share=App\Http\Controllers\webController::createSocialLinks("googleplus",$url,$text);
                           $pinterest_Share=App\Http\Controllers\webController::createSocialLinks("pinterest",$url,$text,$image);
                           ?>
                            <ul class="tt-social-icon">
                                <li><?php echo e(strtoupper(trans('webMessage.share'))); ?></li>
                                <li><a class="icon-g-64" target="_blank" href="<?php echo e($facebook_Share); ?>"></a></li>
                                <li><a class="icon-h-58" target="_blank" href="<?php echo e($twitter_Share); ?>"></a></li>
                                <li><a class="icon-g-66" target="_blank" href="<?php echo e($google_Share); ?>"></a></li>
                                <li><a class="icon-g-70" target="_blank" href="<?php echo e($pinterest_Share); ?>"></a></li>
                            </ul>
                           </div>
                           </div> 
						</div>
                        <span id="quickresponse"></span>
						
						<!--details start -->
						<?php if(!empty($productDetails['details_'.$strLang]) && strlen($productDetails['details_'.$strLang])>30): ?>
                       
						<div class="tt-collapse-block">
							<div class="tt-item active">
								<div class="tt-collapse-title"><?php echo e(strtoupper(__('webMessage.description'))); ?></div>
								<div class="tt-collapse-content" itemprop="description" content="<?php if(app()->getLocale()=="en"): ?> <?php echo strip_tags($productDetails->details_en); ?> <?php else: ?> <?php echo strip_tags($productDetails->details_ar); ?> <?php endif; ?>">
									<?php if(app()->getLocale()=="en"): ?> <?php echo $productDetails->details_en; ?> <?php else: ?> <?php echo $productDetails->details_ar; ?> <?php endif; ?>
                                    
								</div>
							</div>							
						</div>
						<?php endif; ?>
						<!--details end -->
						<!--warranty -->
                        <?php if(!empty($productDetails['warranty'])): ?>
                        <?php
                        $warrantyDetails = App\Http\Controllers\webController::getWarrantyDetails($productDetails['warranty']);
                        ?>
						<div class="tt-collapse-block">
							<div class="tt-item">
								<div class="tt-collapse-title"><?php echo e(strtoupper(__('webMessage.warranty'))); ?></div>
								<div class="tt-collapse-content">
                                    <p><strong><?php if(app()->getLocale()=="en" && !empty($warrantyDetails->title_en)): ?> <?php echo $warrantyDetails->title_en; ?> <?php elseif(app()->getLocale()=="ar" && $warrantyDetails->title_ar): ?> <?php echo $warrantyDetails->title_ar; ?> <?php endif; ?></strong></p>
									<?php if(app()->getLocale()=="en" && !empty($warrantyDetails->details_en)): ?> <?php echo $warrantyDetails->details_en; ?> <?php elseif(app()->getLocale()=="ar" && !empty($warrantyDetails->details_ar)): ?> <?php echo $warrantyDetails->details_ar; ?> <?php endif; ?>
								</div>
							</div>							
						</div>
						<?php endif; ?>
                        <!--warrant end -->
					</div>
				</div>
			</div>
            
      
            <!--description -->
            
 <?php if(!empty($settingInfo->is_review_active)): ?>           
            
 <div class="container-indent">
                       <div class="tt-collapse-block">
							<div class="tt-item active" id="showreviews">
								<div class="tt-collapse-title"><?php echo e(strtoupper(__('webMessage.reviews'))); ?>(<?php echo e(count($ReviewsLists)); ?>)</div>
								<div class="tt-collapse-content">
									<div class="tt-review-block">
                                        <?php $k=0; ?>
                                        <?php if(!empty($ReviewsLists) && count($ReviewsLists)>0): ?>
										<div class="tt-review-comments">
                                        <?php
                                        $agRating = 0;
                                        $k=0;
                                        ?>
                                        <?php $__currentLoopData = $ReviewsLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ReviewsList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                        if($ReviewsList->customer_id){
                                        $customerDetails = App\Http\Controllers\webController::getCustomerDetails($ReviewsList->customer_id);
                                        $reviewRatings = App\Http\Controllers\webController::getRatings($ReviewsList->ratings);
                                        }
                                        $agRating+=$ReviewsList->ratings;
                                        ?>
                                        
											<div class="tt-item" itemprop="review" itemtype="http://schema.org/Review" itemscope>
												<div class="tt-avatar">
                                                    <?php if(!empty($customerDetails) && $customerDetails->image): ?>
													<a href="javascript:;"><img src="<?php echo e(url('uploads/customers/thumb/'.$customerDetails->image)); ?>" alt=""></a>
                                                    <?php else: ?>
                                                    <a href="javascript:;"><img src="<?php echo e(url('assets/images/product/single/review-comments-img-01.jpg')); ?>" alt=""></a>
                                                    <?php endif; ?>
												</div>
												<div class="tt-content">
													<div class="tt-rating" itemprop="reviewRating" itemtype="http://schema.org/Rating" itemscope>
														<?php if(!empty($reviewRatings)): ?> <?php echo $reviewRatings; ?> <?php endif; ?>
                                                        <meta itemprop="ratingValue" content="<?php echo e($ReviewsList->ratings); ?>" />
                                                        <meta itemprop="bestRating" content="5" />
													</div>
													<div class="tt-comments-info" itemprop="author" itemtype="http://schema.org/Person" itemscope>
														<span class="username" itemprop="name" content="<?php echo e($ReviewsList->name); ?>"><?php echo e(__('webMessage.by')); ?> <span><?php echo e($ReviewsList->name); ?></span></span>
														<span class="time"><?php echo e(__('webMessage.on')); ?> <?php echo e(\Carbon\Carbon::parse($ReviewsList->created_at)->diffForHumans()); ?></span>
													</div>
													<div class="tt-comments-title">Very Good!</div>
													<p>
														<?php echo $ReviewsList->message; ?>

													</p>
												</div>
											</div>
                                            <?php $k++; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
										</div>
                                        <?php
                                        if(isset($k) && empty($k)){$k=1;}
                                        
                                        if(empty($agRating)){$agRating=1;}
                                        $avrgRat = !empty($k)?($agRating/$k):1;
                                        ?>
                                        <div itemprop="aggregateRating" itemtype="http://schema.org/AggregateRating" itemscope>
                                        <meta itemprop="reviewCount" content="<?php echo e($k); ?>" />
                                        <meta itemprop="ratingValue" content="<?php echo e($avrgRat); ?>" />
                                        </div>
                                        
										<div class="tt-review-form">
                                            <?php if(count($ReviewsLists)==0): ?>
											<div class="tt-message-info">
												<?php echo e(__('webMessage.bethefirstreview')); ?> <strong><span>“<?php echo e($text); ?>”</span></strong>
											</div>
                                            <?php endif; ?>
											<p><?php echo e(__('webMessage.reviewnote')); ?></p>
											<br>
											<form class="form-default" name="reviewform" id="reviewform" method="post" action="<?php echo e(url('details/'.request()->id.'/'.request()->slug)); ?>">
                                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                            <input type="hidden" name="product_id" value="<?php echo e($productDetails->id); ?>">
                                            <div class="form-group">
													<label for="ratings" class="control-label"><?php echo e(__('webMessage.ratings')); ?> *</label>
													<select name="ratings" id="ratings" class="form-default">
                                                    <option value="5" <?php if(old('ratings')=="5"): ?> selected <?php endif; ?>><?php echo e(__('webMessage.superexcellent')); ?></option>
                                                    <option value="4.5" <?php if(old('ratings')=="4.5"): ?> selected <?php endif; ?>><?php echo e(__('webMessage.excellent')); ?></option>
                                                    <option value="4" <?php if(old('ratings')=="4"): ?> selected <?php endif; ?>><?php echo e(__('webMessage.verygood')); ?></option>
                                                    <option value="3.5" <?php if(old('ratings')=="3.5"): ?> selected <?php endif; ?>><?php echo e(__('webMessage.good')); ?></option>
                                                    <option value="3" <?php if(old('ratings')=="3"): ?> selected <?php endif; ?>><?php echo e(__('webMessage.poor')); ?></option>
                                                    <option value="2.5" <?php if(old('ratings')=="2.5"): ?> selected <?php endif; ?>><?php echo e(__('webMessage.verypoor')); ?></option>
                                                    <option value="2" <?php if(old('ratings')=="2"): ?> selected <?php endif; ?>><?php echo e(__('webMessage.notbad')); ?></option>
                                                    <option value="1.5" <?php if(old('ratings')=="1.5"): ?> selected <?php endif; ?>><?php echo e(__('webMessage.bad')); ?></option>
                                                    <option value="1" <?php if(old('ratings')=="1"): ?> selected <?php endif; ?>><?php echo e(__('webMessage.verybad')); ?></option>
                                                    </select>
                                                    <?php if($errors->has('ratings')): ?>
                                                    <label id="ratings-error" class="error" for="ratings"><?php echo e($errors->first('ratings')); ?></label>
                                                    <?php endif; ?>
												</div>
												<div class="form-group">
													<label for="name" class="control-label"><?php echo e(__('webMessage.name')); ?> *</label>
													<input type="text" class="form-control" id="name" name="name" placeholder="<?php echo e(__('webMessage.enter_name')); ?>">
                                                    <?php if($errors->has('name')): ?>
                                                    <label id="name-error" class="error" for="name"><?php echo e($errors->first('name')); ?></label>
                                                    <?php endif; ?>
												</div>
												<div class="form-group">
													<label for="email" class="control-label"><?php echo e(__('webMessage.email')); ?> *</label>
													<input type="email" class="form-control" id="email" name="email" placeholder="<?php echo e(__('webMessage.enter_email')); ?>">
                                                    <?php if($errors->has('email')): ?>
                                                    <label id="email-error" class="error" for="email"><?php echo e($errors->first('email')); ?></label>
                                                    <?php endif; ?>
												</div>
												<div class="form-group">
													<label for="message" class="control-label"><?php echo e(__('webMessage.yourreview')); ?> *</label>
													<textarea class="form-control"  id="message" name="message" placeholder="<?php echo e(__('webMessage.writeyourreview')); ?>" rows="8"></textarea>
                                                    <?php if($errors->has('message')): ?>
                                                    <label id="message-error" class="error" for="message"><?php echo e($errors->first('message')); ?></label>
                                                    <?php endif; ?>
												</div>
                                                <div class="form-group">
                                                <div class="g-recaptcha" data-sitekey="6LeMueQUAAAAAJ-ZUe9ZqGK3pma9VwbeoaYDgJte"></div>
                                                <?php if($errors->has('recaptchaError')): ?>
                                                <label id="message-error" class="error" for="message"><?php echo e($errors->first('recaptchaError')); ?></label>
                                                <?php endif; ?>
                                               </div>
												<div class="form-group">
													<button type="submit" class="btn"><?php echo e(__('webMessage.sendnow')); ?></button>
												</div>
                                                 <?php if(session('session_msg')): ?>
                                    <div class="alert-success"><?php echo e(session('session_msg')); ?></div>
                                    <?php endif; ?>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
    </div>
    <?php endif; ?>
		</div>
	</div>
    
<!-- end product details -->	
<?php if(!empty($relatedProducts) && count($relatedProducts)>0): ?>

<!--related products -->
<div class="container-indent">
		<div class="container container-fluid-custom-mobile-padding">
			<div class="tt-block-title text-left">
				<h3 class="tt-title-small"><?php echo e(trans('webMessage.related_product')); ?></h3>
			</div>
				<div class="tt-carousel-products row arrow-location-right-top tt-alignment-img tt-layout-product-item slick-animated-show-js">
               <?php $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relatedProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <?php
               if(!empty($relatedProduct->image)){
               $imageUrl = url('uploads/product/'.$relatedProduct->image);
               }else{
               $imageUrl = url('uploads/no-image.png');
               }
               $isStock = App\Http\Controllers\webCartController::IsAvailableQuantity($relatedProduct->id);
               ?>
				<div class="col-2 col-md-4 col-lg-3">
					<div class="tt-product thumbprod-center">
						<div class="tt-image-box">
							<a href="javascript:;" class="tt-btn-wishlist addtowishlistquick" data-tooltip="<?php echo e(__('webMessage.addtowishlist')); ?>" <?php echo e(__('webMessage.align')); ?> id="<?php echo e($relatedProduct->id); ?>"></a>
							<a href="<?php echo e(url('details/'.$relatedProduct->id.'/'.$relatedProduct->slug)); ?>">
								<span class="tt-img"><img src="<?php echo e(url('assets/images/loader.svg')); ?>" data-src="<?php echo e($imageUrl); ?>" alt=""></span>
                                <?php if($relatedProduct->rollover_image): ?>
								<span class="tt-img-roll-over"><img src="<?php echo e(url('assets/images/loader.svg')); ?>" data-src="<?php echo e(url('uploads/product/'.$relatedProduct->rollover_image)); ?>" alt=""></span><?php endif; ?>
							</a>
						</div>
						<div class="tt-description">
							<span id="responseMsg-<?php echo e($relatedProduct->id); ?>"></span> 
                            
							<h2 class="tt-title"><a href="<?php echo e(url('details/'.$relatedProduct->id.'/'.$relatedProduct->slug)); ?>"><?php if(app()->getLocale()=="en"): ?> <?php echo e($relatedProduct->title_en); ?> <?php else: ?> <?php echo e($relatedProduct->title_ar); ?> <?php endif; ?></a></h2>
							<div class="tt-price">
							<?php if(!empty($relatedProduct->countdown_datetime) && strtotime($relatedProduct->countdown_datetime)>strtotime(date('Y-m-d'))): ?> 	                            <span class="new-price"><?php echo e($relatedProduct->countdown_price); ?> <?php echo e(__('webMessage.kd')); ?></span>
                            <?php else: ?>
                            <span class="new-price"><?php echo e($relatedProduct->retail_price); ?> <?php echo e(__('webMessage.kd')); ?></span>
						    <?php if(!empty($relatedProduct->old_price)): ?>
							<span class="old-price"><?php echo e($relatedProduct->old_price); ?> <?php echo e(__('webMessage.kd')); ?></span>
							<?php endif; ?>
                            <?php endif; ?>
							</div>
							<div class="tt-product-inside-hover">
								<div class="tt-row-btn">
                                    <?php if($relatedProduct->is_attribute): ?>
                                    <a href="<?php echo e(url('details/'.$relatedProduct->id.'/'.$relatedProduct->slug)); ?>" class="tt-btn-addtocart thumbprod-button-bg" id="<?php echo e($relatedProduct->id); ?>"><?php echo e(__('webMessage.details')); ?></a>
                                    <?php else: ?>
                                    <?php if(!empty($isStock)): ?>
									<?php if($relatedProduct->is_active=='2'): ?>
									<a href="javascript:;" class="tt-btn-addtocart thumbprod-button-bg addtocartsingle" id="<?php echo e($relatedProduct->id); ?>"><?php echo e(__('webMessage.preorder')); ?></a>
                                    <?php else: ?>
                                    <a href="javascript:;" class="tt-btn-addtocart thumbprod-button-bg addtocartsingle" id="<?php echo e($relatedProduct->id); ?>"><?php echo e(__('webMessage.addtocart_btn')); ?></a>
                                    <?php endif; ?>
									<?php endif; ?>
                                    <?php endif; ?>
								</div>
                                <div class="tt-row-btn">
									<a href="javascript:;" class="tt-btn-quickview loadquickviewmodal"  id="<?php echo e($relatedProduct->id); ?>"></a>
									<a href="javascript:;"  class="tt-btn-wishlist addtowishlistquick" id="<?php echo e($relatedProduct->id); ?>"></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>				
			</div>
		</div>
	</div>
 <?php endif; ?>   
<!-- end related products -->
</div>
<!--footer-->
<?php echo $__env->make("website.includes.footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- modal (AddToCartProduct) -->
<?php echo $__env->make("website.includes.addtocart_modal", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="modal fade"  id="modalVideoProduct" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-video">
		<div class="modal-content ">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
			</div>
			<div class="modal-body">
				<div class="modal-video-content">

				</div>
			</div>
		</div>
	</div>
</div>
<?php if(!empty($settingInfo->facebook_pixel)): ?>
<script>
	fbq('track', 'ViewContent', {
	  content_ids: ['<?php echo e($productDetails->id); ?>'],
	  content_type: 'product'
	});

 </script>
<?php endif; ?>    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="<?php echo e(url('assets/external/bootstrap/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/external/elevatezoom/jquery.elevatezoom.js')); ?>"></script>
<script src="<?php echo e(url('assets/external/slick/slick.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/external/perfect-scrollbar/perfect-scrollbar.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/external/panelmenu/panelmenu.js')); ?>"></script>
<script src="<?php echo e(url('assets/external/countdown/jquery.plugin.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/external/countdown/jquery.countdown.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/external/magnific-popup/jquery.magnific-popup.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/external/lazyLoad/lazyload.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/js/main.js')); ?>"></script>
<script defer src="<?php echo e(url('hakum_assets/js/bundle.js')); ?>"></script>
<script src="<?php echo e(url('assets/js/gulfweb.js')); ?>"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!--recaptcha-->
<script src='https://www.google.com/recaptcha/api.js'></script>
</body>
</html><?php /**PATH /home/kashkha/private/resources/views/website/details/details1.blade.php ENDPATH**/ ?>