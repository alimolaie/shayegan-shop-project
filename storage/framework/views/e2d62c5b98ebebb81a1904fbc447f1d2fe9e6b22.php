<?php
if(!empty(app()->getLocale())){ $strLang = app()->getLocale();}else{$strLang="en";}
?>

<header>
<?php if($settingInfo['top_header_note_'.$strLang]): ?>
<div class="topheadernote"><?php echo $settingInfo['top_header_note_'.$strLang]; ?></div>
<?php endif; ?>
	<!-- tt-top-panel -->
	<div class="tt-color-scheme-01">
		<div class="container">
			<div class="tt-header-row tt-top-row">
				<div class="tt-col-left">
					<div class="tt-box-info">
						<ul>
							<li>
                            <?php if($settingInfo->phone): ?> 
                            <i class="icon-f-93"></i><a href="tel:<?php echo e($settingInfo->phone); ?>"><?php echo e($settingInfo->phone); ?></a>
                            <?php endif; ?>
                            <?php if(app()->getLocale()=="ar" && $settingInfo->office_hours_ar): ?>
							<i class="icon-f-92"></i>&nbsp;<?php echo e($settingInfo->office_hours_ar); ?>

                            <?php elseif(app()->getLocale()=="en" && $settingInfo->office_hours_en): ?>
							<i class="icon-f-92"></i>&nbsp;<?php echo e($settingInfo->office_hours_en); ?>

                            <?php endif; ?>
                            </li>
						</ul>
					</div>
				</div>
				<div class="tt-col-right ml-auto">
					<ul class="tt-social-icon">
					    <li><a  href="javascript:;" id="trackmyorder" class="trackorder icon-f-55" title="<?php echo e(trans('webMessage.trackorder')); ?>">&nbsp;<span><?php echo e(__('webMessage.trackorder')); ?></span></a></li>
                        <?php if($settingInfo->social_facebook): ?>
						<li><a title="<?php echo e(__('webMessage.facebook')); ?>" class="icon-g-64" target="_blank" href="<?php echo e($settingInfo->social_facebook); ?>"></a></li>
                        <?php endif; ?>
                        <?php if($settingInfo->social_twitter): ?>
						<li><a title="<?php echo e(__('webMessage.twitter')); ?>" class="icon-h-58" target="_blank" href="<?php echo e($settingInfo->social_twitter); ?>"></a></li>
                        <?php endif; ?>
                        <?php if($settingInfo->social_instagram): ?>
						<li><a title="<?php echo e(__('webMessage.instagram')); ?>" class="icon-g-67" target="_blank" href="<?php echo e($settingInfo->social_instagram); ?>"></a></li>
                        <?php endif; ?>
                        <?php if($settingInfo->social_linkedin): ?>
						<li><a title="<?php echo e(__('webMessage.linkedin')); ?>" class="icon-g-68" target="_blank" href="<?php echo e($settingInfo->social_linkedin); ?>"></a></li>
                        <?php endif; ?>
                        <?php if($settingInfo->social_youtube): ?>
						<li><a title="<?php echo e(__('webMessage.youtube')); ?>" class="icon-g-76" target="_blank" href="<?php echo e($settingInfo->social_youtube); ?>"></a></li>
                        <?php endif; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- /tt-top-panel -->
    <?php
    $mobileMenusTrees = App\Categories::CategoriesTree();
	$mobilebrandMenus = App\Http\Controllers\webController::BrandsList();
    ?>
	<!-- tt-mobile menu -->
	<nav class="panel-menu mobile-main-menu">
	<ul>
    <li><a href="<?php echo e(url('/')); ?>"><?php echo e(__('webMessage.home')); ?></a></li>
    <?php if(!empty($mobileMenusTrees)): ?>
    <?php echo $__env->renderEach('website.includes.mobilemenu', $mobileMenusTrees, 'category', 'website.includes.nothing'); ?>
    <?php endif; ?> 
	<li><a href="<?php echo e(url('/offers')); ?>"><?php echo e(__('webMessage.offers')); ?></a></li>
    <?php if(!empty($settingInfo->is_brand_active) && !empty($mobilebrandMenus) && count($mobilebrandMenus)>0): ?>
    <li><a href="javascript:;"><?php echo e(__('webMessage.brands')); ?></a>
	<ul>
    <?php $__currentLoopData = $mobilebrandMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brandMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li>
    <a href="<?php echo e(url('/brands/'.$brandMenu->slug)); ?>"><?php if(app()->getLocale()=="en"): ?> <?php echo e($brandMenu->title_en); ?> <?php else: ?> <?php echo e($brandMenu->title_ar); ?> <?php endif; ?></a>
    <?php if(!empty($brandMenu->image) && !empty($settingInfo->is_brand_image_name) && $settingInfo->is_brand_image_name=='image'): ?>
    <img src="<?php echo e(url('uploads/brand/thumb/'.$brandMenu->image)); ?>" style="max-width:40px;max-height:40px;float:right;margin-top:-40px;"/>
    <?php endif; ?>
	</li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
	</li>
    <?php endif; ?>
									
	 </ul>
		<div class="mm-navbtn-names">
			<div class="mm-closebtn"><?php echo e(__('webMessage.close')); ?></div>
			<div class="mm-backbtn"><?php echo e(__('webMessage.back')); ?></div>
		</div>
	</nav>
	<!-- tt-mobile-header -->
	<div class="tt-mobile-header">
		<div class="container-fluid">
			<div class="tt-header-row">
				<div class="tt-mobile-parent-menu">
					<div class="tt-menu-toggle">
						<i class="icon-03"></i>
					</div>
				</div>
				<!-- search -->
				<div class="tt-mobile-parent-search tt-parent-box"></div>
				<!-- /search -->
				<!-- cart -->
				<div class="tt-mobile-parent-cart tt-parent-box"></div>
				<!-- /cart -->
				<!-- account -->
				<div class="tt-mobile-parent-account tt-parent-box"></div>
				<!-- /account -->
				<!-- currency -->
				<div class="tt-mobile-parent-multi tt-parent-box"></div>
				<!-- /currency -->
			</div>
		</div>
		<div class="container-fluid tt-top-line">
			<div class="row">
				<div class="tt-logo-container">
					<!-- mobile logo -->
                    <?php if($settingInfo->logo): ?>
					<a class="tt-logo tt-logo-alignment" href="<?php echo e(url('/')); ?>"><img class="tt-retina" src="<?php echo e(url('uploads/logo/'.$settingInfo->logo)); ?>" alt="<?php if(app()->getLocale()=="en"): ?> <?php echo e($settingInfo->name_en); ?> <?php else: ?> <?php echo e($settingInfo->name_ar); ?> <?php endif; ?>" title="<?php if(app()->getLocale()=="en"): ?> <?php echo e($settingInfo->name_en); ?> <?php else: ?> <?php echo e($settingInfo->name_ar); ?> <?php endif; ?>"></a>
                    <?php endif; ?>
					<!-- /mobile logo -->
				</div>
			</div>
		</div>
	</div>
	<!-- tt-desktop-header -->
	<div class="tt-desktop-header">
		<div class="container">
			<div class="tt-header-holder">
				<div class="tt-obj-logo obj-aligment-center">
					<!-- logo -->
					<?php if($settingInfo->logo): ?>
					<a class="tt-logo tt-logo-alignment" href="<?php echo e(url('/')); ?>"><img class="tt-retina" src="<?php echo e(url('uploads/logo/'.$settingInfo->logo)); ?>" alt="<?php if(app()->getLocale()=="en"): ?> <?php echo e($settingInfo->name_en); ?> <?php else: ?> <?php echo e($settingInfo->name_ar); ?> <?php endif; ?>" title="<?php if(app()->getLocale()=="en"): ?> <?php echo e($settingInfo->name_en); ?> <?php else: ?> <?php echo e($settingInfo->name_ar); ?> <?php endif; ?>"></a>
                    <?php endif; ?>
					<!-- /logo -->
				</div>
				<div class="tt-obj-options obj-move-right tt-position-absolute">
					<!-- tt-search -->
					<div class="tt-desctop-parent-search tt-parent-box">
						<div class="tt-search tt-dropdown-obj">
							<button class="tt-dropdown-toggle" data-tooltip="<?php echo e(__('webMessage.search_txt')); ?>" data-tposition="bottom">
								<i class="icon-f-85"></i>
							</button>
							<div class="tt-dropdown-menu">
								<div class="container">
									<form name="topsearchform1" id="topsearchform1" method="get" action="<?php echo e(url('/search')); ?>">
										<div class="tt-col">
											<input type="text" class="tt-search-input" name="sq" id="search_keyname" placeholder="<?php echo e(__('webMessage.searchproducts')); ?>" value="<?php if(Request()->sq): ?><?php echo e(Request()->sq); ?><?php endif; ?>">
											<button name="" id="search_btns" class="tt-btn-search" type="submit"></button>
										</div>
										<div class="tt-col">
											<button name="close_btn" id="close_btn" value="<?php echo e(__('webMessage.close')); ?>" class="tt-btn-close icon-g-80"></button>
										</div>
										<div class="tt-info-text">
											<?php echo e(__('webMessage.whatareyoulookingfor')); ?>

										</div>
										<div class="search-results">
                                            <p>
											<span id="search_child_results"></span>
                                            </p>
											<button id="viewallsearchresult" type="button" class="tt-view-all"><?php echo e(__('webMessage.viewallproducts')); ?></button>
										</div>
                                        </form>
								</div>
							</div>
						</div>
					</div>
					<!-- /tt-search -->
                    
					<!-- tt-cart -->
					<div class="tt-desctop-parent-cart tt-parent-box">
                    <?php
                    $tempOrdersCount = App\Http\Controllers\webCartController::countTempOrders();
                    $tempOrders = App\Http\Controllers\webCartController::loadTempOrders();
                    ?>
						<div class="tt-cart tt-dropdown-obj" data-tooltip="Cart" data-tposition="bottom">
							<button class="tt-dropdown-toggle">
								<i class="icon-f-39"></i>
								<span class="tt-badge-cart"><span id="tt-badge-cart"><?php echo e($tempOrdersCount); ?></span></span>
							</button>
							<div class="tt-dropdown-menu">
								<div class="tt-mobile-add">
									<h6 class="tt-title"><?php echo e(__('webMessage.shoppingcart')); ?></h6>
									<button class="tt-close"><?php echo e(__('webMessage.close')); ?></button>
								</div>
								<div class="tt-dropdown-inner">
									<div class="tt-cart-layout" id="TempOrderBoxDiv"> 
                                       <?php if(empty($tempOrders) || count($tempOrders)==0): ?>
										<!-- layout emty cart -->
										<a href="javascript:;" class="tt-cart-empty">
											<i class="icon-f-39"></i>
											<p><?php echo e(__('webMessage.yourcartisempty')); ?></p>
										</a>
                                       <?php else: ?> 
                                          
										<div class="tt-cart-content">
                                           
											<div class="tt-cart-list">
                                            <?php 
                                            $subTotalAmount =0;
                                            $attrtxt='';$t=1;
                                            ?>
                                            <?php $__currentLoopData = $tempOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tempOrder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                            $prodDetails = App\Http\Controllers\webCartController::getProductDetails($tempOrder->product_id);
                                            if($prodDetails->image){
                                            $prodImage = url('uploads/product/thumb/'.$prodDetails->image);
                                            }else{
                                            $prodImage = url('uploads/no-image.png');
                                            }
                                            
                                            $subTotalAmount+=($tempOrder->quantity*$tempOrder->unit_price);
                                            if(!empty($tempOrder->size_id)){
                                            $sizeName = App\Http\Controllers\webCartController::sizeNameStatic($tempOrder->size_id,$strLang);
                                            $attrtxt .='<li>'.__('webMessage.size').': '.$sizeName.'</li>';
                                            }
                                            if(!empty($tempOrder->color_id)){
                                            $colorName = App\Http\Controllers\webCartController::colorNameStatic($tempOrder->color_id,$strLang);
                                            $attrtxt .='<li>'.__('webMessage.color').': '.$colorName.'</li>';
                                            $colorImageDetails = App\Http\Controllers\webCartController::getColorImage($tempOrder->product_id,$tempOrder->color_id);
                                            if(!empty($colorImageDetails->color_image)){
                                            $prodImage = url('uploads/product/colors/thumb/'.$colorImageDetails->color_image);
                                            }
                                            }
											$optionsDetailstxt = App\Http\Controllers\webCartController::getOptionsDtails($tempOrder->id);
											
                                            ?>
												<div class="tt-item" style="<?php if($t>3): ?> display:none; <?php endif; ?>" >
													<a href="<?php echo e(url('details/'.$prodDetails->id.'/'.$prodDetails->slug)); ?>">
														<div class="tt-item-img">
															<img src="<?php echo e(url('assets/images/loader.svg')); ?>" data-src="<?php echo e($prodImage); ?>" alt="<?php if(app()->getLocale()=='en'): ?> <?php echo e($prodDetails->title_en); ?> <?php else: ?> <?php echo e($prodDetails->title_ar); ?> <?php endif; ?>">
														</div>
														<div class="tt-item-descriptions">
															<h2 class="tt-title"><?php if(app()->getLocale()=="en"): ?> <?php echo e($prodDetails->title_en); ?> <?php else: ?> <?php echo e($prodDetails->title_ar); ?> <?php endif; ?></h2>
															<ul class="tt-add-info">
																<?php echo $attrtxt; ?>

																<?php echo $optionsDetailstxt; ?>

															</ul>
															<div class="tt-quantity"><?php echo e($tempOrder->quantity); ?> X</div> <div class="tt-price"><?php echo e($tempOrder->unit_price); ?> <?php echo e(__('webMessage.kd')); ?> </div>
														</div>
													</a>
													<div class="tt-item-close">
														<a href="javascript:;" id="<?php echo e($tempOrder->id); ?>" class="tt-btn-close deleteFromTemp"></a>
													</div>
												</div>
                                            <?php $attrtxt='';$t++;?>    
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
											
											<?php if($t>3): ?>
											<div class="tt-item" align="center"><a href="<?php echo e(url('/cart')); ?>"><?php echo e(trans('webMessage.viewall')); ?>(+<?php echo e($t-4); ?>)</a></div>
											<?php endif; ?>
											</div>
											<div class="tt-cart-total-row">
												<div class="tt-cart-total-title"><?php echo e(__('webMessage.subtotal')); ?>:</div>
												<div class="tt-cart-total-price"> <?php echo e(round($subTotalAmount,3)); ?> <?php echo e(__('webMessage.kd')); ?></div>
											</div>
											<div class="tt-cart-btn">
												<div class="tt-item">
													<a href="<?php echo e(url('/checkout')); ?>" class="btn"><?php echo e(__('webMessage.checkout')); ?></a>
												</div>
												<div class="tt-item">
													<a href="<?php echo e(url('/cart')); ?>" class="btn-link-02 tt-hidden-mobile"><?php echo e(__('webMessage.viewcart')); ?></a>
													<a href="<?php echo e(url('/cart')); ?>" class="btn btn-border tt-hidden-desctope"><?php echo e(__('webMessage.viewcart')); ?></a>
												</div>
											</div>
										</div>
                                        <?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /tt-cart -->
					<!-- tt-account -->
					<div class="tt-desctop-parent-account tt-parent-box">
						<div class="tt-account tt-dropdown-obj">
							<button class="tt-dropdown-toggle"  data-tooltip="<?php echo e(__('webMessage.myaccount')); ?>" data-tposition="bottom"><i class="icon-f-94"></i></button>
							<div class="tt-dropdown-menu">
								<div class="tt-mobile-add">
									<button class="tt-close"><?php echo e(__('webMessage.close')); ?></button>
								</div>
								<div class="tt-dropdown-inner">
									<ul>
									   
                                        <?php if(!empty(Auth::guard('webs')->user()->id)): ?>
                                        <li><a href="<?php echo e(url('/account')); ?>"><i class="icon-f-94"></i><?php echo e(__('webMessage.dashboard')); ?></a></li>
									    <li><a href="<?php echo e(url('/changepass')); ?>"><i class="icon-g-40"></i><?php echo e(__('webMessage.changepassword')); ?></a></li>
									    <li><a href="<?php echo e(url('/editprofile')); ?>"><i class="icon-01"></i><?php echo e(__('webMessage.editprofile')); ?></a></li>
                                        <li><a href="<?php echo e(url('/myorders')); ?>"><i class="icon-f-68"></i><?php echo e(__('webMessage.myorders')); ?></a></li>
                                        <li><a href="<?php echo e(url('/wishlist')); ?>"><i class="icon-n-072"></i><?php echo e(__('webMessage.wishlists')); ?></a></li>
                                        <li><a href="javascript:void(0);" onclick="event.preventDefault();document.getElementById('logout-forms').submit();" target="_blank"><i class="icon-f-77"></i><?php echo e(__('webMessage.signout')); ?></a></li>
                                        <form id="logout-forms" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                        </form>
                                        <?php else: ?>
									    <li><a href="<?php echo e(url('/login')); ?>"><i class="icon-f-76"></i><?php echo e(__('webMessage.signin')); ?></a></li>
									    <li><a href="<?php echo e(url('/register')); ?>"><i class="icon-f-94"></i><?php echo e(__('webMessage.signup')); ?></a></li>
                                        <?php endif; ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- /tt-account -->
					<!-- tt-langue and tt-currency -->
					<div class="tt-desctop-parent-multi tt-parent-box">
						<div class="tt-multi-obj tt-dropdown-obj">
                            <?php if($settingInfo->is_lang==1): ?>
                             <?php if(app()->getLocale()=='ar'): ?>
							<button onclick="javascript:window.location.href='<?php echo e(url('locale/en')); ?>'" class="languageButton" data-tooltip="<?php echo e(__('webMessage.english')); ?>">E</button>
                            <?php else: ?>
                            <button onclick="javascript:window.location.href='<?php echo e(url('locale/ar')); ?>'" class="languageButton" data-tooltip="<?php echo e(__('webMessage.arabic')); ?>">ع</button>
                            <?php endif; ?>
                            <?php endif; ?>
						</div>
					</div>
					<!-- /tt-langue and tt-currency -->
				</div>

			</div>
		</div>
    <?php
    $desktopMenusTrees = App\Categories::CategoriesTree();
    $brandMenus = App\Http\Controllers\webController::BrandsList();
    ?>
		<div class="my_menu">
		<div class="container">
			<div class="tt-header-holder">
				<div class="tt-obj-menu obj-aligment-center">
					<!-- tt-menu -->
					<div class="tt-desctop-parent-menu tt-parent-box">
						<div class="tt-desctop-menu tt-menu-small">
							<nav>
								<ul>
                                    <li class="dropdown tt-megamenu-col-02 selected"><a href="<?php echo e(url('/')); ?>"><?php echo e(__('webMessage.home')); ?></a></li>
                                   <?php if(!empty($desktopMenusTrees) && count($desktopMenusTrees)>0): ?>
                                   <?php $__currentLoopData = $desktopMenusTrees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $desktopMenusTree): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <?php if(!empty($desktopMenusTree->childs) && count($desktopMenusTree->childs)>0): ?>
									<li class="dropdown <?php if(empty($desktopMenusTree->is_full_width)): ?> tt-megamenu-col-01 <?php else: ?> megamenu <?php endif; ?> <?php if(!empty($desktopMenusTree->is_highlighted)): ?> deals <?php endif; ?>"><a href="<?php echo e(url('/products/'.$desktopMenusTree->id.'/'.$desktopMenusTree->friendly_url)); ?>"><?php if(app()->getLocale()=="en"): ?> <?php echo e($desktopMenusTree->name_en); ?> <?php else: ?> <?php echo e($desktopMenusTree->name_ar); ?> <?php endif; ?></a>
										<div class="dropdown-menu">
                                        <?php if(!empty($desktopMenusTree->is_full_width)): ?>
											<div class="row">
												<div <?php if($desktopMenusTree->is_offer): ?> class="col-sm-9 <?php else: ?>  class="col-sm-12 <?php endif; ?>">
													<div class="row tt-col-list">
                                                      <?php $__currentLoopData = $desktopMenusTree->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<div class="col-sm-4">
                                                        
															<a href="<?php echo e(url('/products/'.$childCategory->id.'/'.$childCategory->friendly_url)); ?>" class="tt-title-submenu"><?php if(app()->getLocale()=="en"): ?> <?php echo e($childCategory->name_en); ?> <?php else: ?> <?php echo e($childCategory->name_ar); ?> <?php endif; ?> <?php if($childCategory->image): ?><img  src="<?php echo e(url('assets/images/loader.svg')); ?>" data-src="<?php if($childCategory->image): ?> <?php echo e(url('uploads/category/thumb/'.$childCategory->image)); ?> <?php else: ?> <?php echo e(url('assets/images/custom/header-category-01.jpg')); ?> <?php endif; ?>" alt=""><?php endif; ?></a>
                                                            <?php if(!empty($childCategory->childs) && count($childCategory->childs)>0): ?>
                                                            
															<ul class="tt-megamenu-submenu">
                                                                <?php $__currentLoopData = $childCategory->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subchildCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																<li><a href="<?php echo e(url('/products/'.$subchildCategory->id.'/'.$subchildCategory->friendly_url)); ?>"><?php if(app()->getLocale()=="en"): ?> <?php echo e($subchildCategory->name_en); ?> <?php else: ?> <?php echo e($subchildCategory->name_ar); ?> <?php endif; ?></a></li>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
															</ul>
                                                            <?php endif; ?>   
														</div>
													 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
														
													</div>
												</div>
                                                <?php if($desktopMenusTree->is_offer): ?> 
												<div class="col-sm-3">
													<div class="tt-offset-7">
														<a href="<?php if($desktopMenusTree->offer_link): ?> <?php echo e($desktopMenusTree->offer_link); ?> <?php else: ?> javascript:; <?php endif; ?>" class="tt-promo-02"><?php if($desktopMenusTree->offer_image): ?>
															<img  src="<?php echo e(url('assets/images/loader.svg')); ?>" data-src="<?php echo e(url('uploads/category/'.$desktopMenusTree->offer_image)); ?>" alt=""><?php endif; ?>
															<div class="tt-description tt-point-h-l tt-point-v-t">
																<div class="tt-description-wrapper">
																	<div class="tt-title-small tt-white-color"><?php if(app()->getLocale()=="en"): ?> <?php echo e($desktopMenusTree->title_1_en); ?> <?php else: ?> <?php echo e($desktopMenusTree->title_1_ar); ?> <?php endif; ?></div>
																	<div class="tt-title-xlarge tt-white-color"><?php if(app()->getLocale()=="en"): ?> <?php echo e($desktopMenusTree->title_2_en); ?> <?php else: ?> <?php echo e($desktopMenusTree->title_2_ar); ?> <?php endif; ?></div>
																	<p class="tt-white-color"><?php if(app()->getLocale()=="en"): ?> <?php echo e($desktopMenusTree->title_3_en); ?> <?php else: ?> <?php echo e($desktopMenusTree->title_3_ar); ?> <?php endif; ?></p>
																	<span class="btn-underline tt-obj-bottom tt-white-color"><?php if(app()->getLocale()=="en"): ?> <?php echo e($desktopMenusTree->title_4_en); ?> <?php else: ?> <?php echo e($desktopMenusTree->title_4_ar); ?> <?php endif; ?></span>
																</div>
															</div>
														</a>
													</div>
												</div>
                                                <?php endif; ?>
											</div>
                                            <?php else: ?>
                                            <div class="row tt-col-list">
                                            <?php $__currentLoopData = $desktopMenusTree->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<div class="col">
													<h6 class="tt-title-submenu"><a href="<?php echo e(url('/products/'.$childCategory->id.'/'.$childCategory->friendly_url)); ?>"><?php if(app()->getLocale()=="en"): ?> <?php echo e($childCategory->name_en); ?> <?php else: ?> <?php echo e($childCategory->name_ar); ?> <?php endif; ?></a></h6>
                                                    <?php if(!empty($childCategory->childs) && count($childCategory->childs)>0): ?>
													<ul class="tt-megamenu-submenu">
												    <?php $__currentLoopData = $childCategory->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subchildCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<li><a href="<?php echo e(url('/products/'.$subchildCategory->id.'/'.$subchildCategory->friendly_url)); ?>"><?php if(app()->getLocale()=="en"): ?> <?php echo e($subchildCategory->name_en); ?> <?php else: ?> <?php echo e($subchildCategory->name_ar); ?> <?php endif; ?></a></li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													</ul>
                                                    <?php endif; ?>
												</div>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
											</div>
                                            <?php endif; ?>
										</div>
									</li>
                                    <?php else: ?>
                                    <li class="dropdown <?php if(!empty($desktopMenusTree->is_highlighted)): ?> deals <?php endif; ?>"><a href="<?php echo e(url('/products/'.$desktopMenusTree->id.'/'.$desktopMenusTree->friendly_url)); ?>"><?php if(app()->getLocale()=="en"): ?> <?php echo e($desktopMenusTree->name_en); ?> <?php else: ?> <?php echo e($desktopMenusTree->name_ar); ?> <?php endif; ?></a></li>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endif; ?>
                                    <?php if(!empty($settingInfo->is_offer_menu)): ?>
									<li class="dropdown deals"><a href="<?php echo e(url('/offers')); ?>"><?php echo e(__('webMessage.offers')); ?></a></li>
                                    <?php endif; ?>
                                    <?php if(!empty($settingInfo->is_brand_active) && !empty($brandMenus) && count($brandMenus)>0): ?>
                                    <li class="dropdown megamenu">
                                    <a href="javascript:;"><?php echo e(__('webMessage.brands')); ?></a>
										<div class="dropdown-menu">
                                                 <div class="row tt-col-list">
												    <?php $__currentLoopData = $brandMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brandMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-sm-2">
													<a href="<?php echo e(url('/brands/'.$brandMenu->slug)); ?>">
                                                    <?php if(!empty($brandMenu->image) && $settingInfo->is_brand_image_name=='image'): ?>
                                                    <img src="<?php echo e(url('uploads/brand/thumb/'.$brandMenu->image)); ?>" style="max-width:100px;max-height:100px;"/>
                                                    <?php else: ?>
                                                    <?php if(app()->getLocale()=="en"): ?> <?php echo e($brandMenu->title_en); ?> <?php else: ?> <?php echo e($brandMenu->title_ar); ?> <?php endif; ?>
                                                    <?php endif; ?></a></div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													</div>  
                                         </div>
                                         </li>
                                    <?php endif; ?>
									
								</ul>
							</nav>
						</div>
					</div>
					<!-- /tt-menu -->
				</div>
			</div>
		</div>
		</div>
	</div>
	<!-- stuck nav -->
	<div class="tt-stuck-nav">
		<div class="container">
			<div class="tt-header-row ">
				<div class="tt-stuck-parent-menu"></div>
				<div class="tt-stuck-parent-search tt-parent-box"></div>
				<div class="tt-stuck-parent-cart tt-parent-box"></div>
				<div class="tt-stuck-parent-account tt-parent-box"></div>
				<div class="tt-stuck-parent-multi tt-parent-box"></div>
			</div>
		</div>
	</div>
</header>
<!--theme1 end--><?php /**PATH /home/kashkha/private/resources/views/website/includes/header_theme1.blade.php ENDPATH**/ ?>