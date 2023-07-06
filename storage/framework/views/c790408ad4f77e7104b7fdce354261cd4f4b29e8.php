<?php
use Illuminate\Support\Facades\Cookie;
?>
<div class="col-md-4 col-lg-3 col-xl-3 leftColumn aside desctop-no-sidebar ">
					<div class="tt-btn-col-close">
						<a href="javascript:;"><?php echo e(__('webMessage.close')); ?></a>
					</div>
					<!--list filter history-->
                    <?php if(!empty($filterHistory) && count($filterHistory)>0): ?>
					<div class="tt-collapse open">
						<h3 class="tt-collapse-title"><?php echo e(strtoupper(__('webMessage.filterby'))); ?></h3>
						<div class="tt-collapse-content">
							<ul class="tt-filter-list">
                                <?php $__currentLoopData = $filterHistory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo $history; ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>
							<a href="javascript:;" id="clearallfilter" class="btn-link-02"><?php echo e(strtoupper(__('webMessage.clearall'))); ?></a>
						</div>
					</div>
                    <?php endif; ?>
                    <!--end filter history -->
                    <!-- list sub categpories -->
                    <?php if(!empty($productCategoriesLists) && count($productCategoriesLists)>0): ?>
					<div class="tt-collapse open">
						<h3 class="tt-collapse-title"><?php echo e(strtoupper(__('webMessage.categories'))); ?></h3>
						<div class="tt-collapse-content">
							<ul class="tt-list-row">
                                <?php $__currentLoopData = $productCategoriesLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                $countProductss = App\Http\Controllers\webController::countProductsByCatId($productCategory->id);
                                ?>
								<li><a href="<?php echo e(url('products/'.$productCategory->id.'/'.$productCategory->friendly_url)); ?>"><?php if(app()->getLocale()=="en" && !empty($productCategory->name_en)): ?> <?php echo e($productCategory->name_en); ?> <?php elseif(app()->getLocale()=="ar" && $productCategory->name_ar): ?> <?php echo e($productCategory->name_ar); ?> <?php endif; ?> <span class="float-right">(<?php echo e($countProductss); ?>)</span></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>
						</div>
					</div>
                    <?php endif; ?>
                    <!--end sub categories -->
                    <!--filter by price range -->
                    <?php if(!empty($retailPriceRanges) && $retailPriceRanges>0): ?>
					<div class="tt-collapse open">
						<h3 class="tt-collapse-title"><?php echo e(strtoupper(__('webMessage.filterbyprice'))); ?></h3>
						<div class="tt-collapse-content">
							<ul class="tt-list-row">
                                <?php for($i=0;$i<=$retailPriceRanges;$i+=15): ?>
								<li><a href="javascript:;" id="<?php echo e($i); ?>-<?php echo e($i+15); ?>" class="rangeprice"> <?php echo e($i); ?> <?php echo e(__('webMessage.kd')); ?> —  <?php echo e($i+15); ?> <?php echo e(__('webMessage.kd')); ?></a></li>
                                <?php endfor; ?>
							</ul>
						</div>
					</div>
                    <?php endif; ?>
                    <!--end price range filter -->
                    <!--filter by size-->
                    <?php if(!empty($prodSizes) && count($prodSizes)>0): ?>
					<div class="tt-collapse open">
						<h3 class="tt-collapse-title"><?php echo e(strtoupper(__('webMessage.filterbysize'))); ?></h3>
						<div class="tt-collapse-content">
							<ul class="tt-options-swatch options-middle">
                               <?php $__currentLoopData = $prodSizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prodSize): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<li <?php if(!empty(Cookie::get('filter_by_size')) && Cookie::get('filter_by_size')==$prodSize->id): ?> class="active" <?php endif; ?>><a href="javascript:;" class="filter_by_size" id="<?php echo e($prodSize->id); ?>"><?php if(app()->getLocale()=="en" && !empty($prodSize->title_en)): ?> <?php echo e($prodSize->title_en); ?> <?php elseif(app()->getLocale()=="ar" && $prodSize->title_ar): ?> <?php echo e($prodSize->title_ar); ?> <?php endif; ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>
						</div>
					</div>
                    <?php endif; ?>
                    <!-- end size filter -->
                    
                    <!--filter by color-->
                    <?php if(!empty($prodColors) && count($prodColors)>0): ?>
					<div class="tt-collapse open">
						<h3 class="tt-collapse-title"><?php echo e(strtoupper(__('webMessage.filterbycolor'))); ?></h3>
						<div class="tt-collapse-content">
							<ul class="tt-options-swatch options-middle">
                               <?php $__currentLoopData = $prodColors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prodColor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($prodColor->image): ?>
                                <li <?php if(!empty(Cookie::get('filter_by_color')) && Cookie::get('filter_by_color')==$prodColor->id): ?> class="active" <?php endif; ?>><a href="javascript:;" class="options-color tt-border filter_by_color" id="<?php echo e($prodColor->id); ?>"><img src="<?php echo e(url('uploads/color/thumb/'.$prodColor->image)); ?>"  width="40" height="40"/></a></li>
                                <?php else: ?>
								<li <?php if(!empty(Cookie::get('filter_by_color')) && Cookie::get('filter_by_color')==$prodColor->id): ?> class="active" <?php endif; ?>><a href="javascript:;" class="options-color tt-border filter_by_color" id="<?php echo e($prodColor->id); ?>" style="background-color:<?php echo e($prodColor->color_code); ?>;"></a></li>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>
						</div>
					</div>
                    <?php endif; ?>
                    <!--end color filter-->
                   <!-- popular items --> 
					<?php if(!empty($mostpopularitems) && count($mostpopularitems)>0): ?>
					<div class="tt-collapse open">
						<h3 class="tt-collapse-title"><?php echo e(strtoupper(__('webMessage.mostpopular'))); ?></h3>
						<div class="tt-collapse-content">
							<div class="tt-aside">
                            <?php $__currentLoopData = $mostpopularitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mostpopularitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<a class="tt-item" href="<?php echo e(url('details/'.$mostpopularitem->id.'/'.$mostpopularitem->slug)); ?>">
									<div class="tt-img">
										<span class="tt-img-default"><img src="<?php echo e(url('assets/images/loader.svg')); ?>" data-src="<?php if($mostpopularitem->image): ?> <?php echo e(url('uploads/product/thumb/'.$mostpopularitem->image)); ?> <?php else: ?> <?php echo e(url('uploads/no-image.png')); ?> <?php endif; ?>" alt="<?php if(app()->getLocale()=='en'): ?> <?php echo e($mostpopularitem->title_en); ?> <?php else: ?> <?php echo e($mostpopularitem->title_ar); ?> <?php endif; ?>"></span>
                                        <?php if($mostpopularitem->rollover_image): ?>
										<span class="tt-img-roll-over"><img src="<?php echo e(url('assets/images/loader.svg')); ?>" data-src="<?php if($mostpopularitem->rollover_image): ?> <?php echo e(url('uploads/product/thumb/'.$mostpopularitem->rollover_image)); ?> <?php else: ?> <?php echo e(url('uploads/no-image.png')); ?> <?php endif; ?>" alt="<?php if(app()->getLocale()=='en'): ?> <?php echo e($mostpopularitem->title_en); ?> <?php else: ?> <?php echo e($mostpopularitem->title_ar); ?> <?php endif; ?>"></span>
                                        <?php endif; ?>
									</div>
									<div class="tt-content">
										<h6 class="tt-title"><?php if(app()->getLocale()=="en"): ?> <?php echo e($mostpopularitem->title_en); ?> <?php else: ?> <?php echo e($mostpopularitem->title_ar); ?> <?php endif; ?></h6>
										<div class="tt-price">
											<span class="sale-price"> <?php echo e($mostpopularitem->retail_price); ?> <?php echo e(__('webMessage.kd')); ?></span>
                                            <?php if($mostpopularitem->old_price): ?>
											<span class="old-price"> <?php echo e($mostpopularitem->old_price); ?> <?php echo e(__('webMessage.kd')); ?></span>
                                            <?php endif; ?>
										</div>
									</div>
								</a>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
							</div>
						</div>
					</div>
                   <?php endif; ?>
                   <!--end popular items --> 
                   <!--tags -->
                   <?php if(!empty($cattags) && count($cattags)>0): ?>
					<div class="tt-collapse open">
						<h3 class="tt-collapse-title"><?php echo e(strtoupper(__('webMessage.tags'))); ?></h3>
						<div class="tt-collapse-content">
							<ul class="tt-list-inline">
                                <?php $__currentLoopData = $cattags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cattag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<li><a href="javascript:;" class="filter_by_tags" id="<?php echo e($cattag); ?>"><?php echo e($cattag); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>
						</div>
					</div>
                    <?php endif; ?>
                    <!--end tags -->
                    <!--banner-->
                    <?php
                    $rightbanner6 = App\Http\Controllers\webController::banners(6);
                    ?>
                     <?php if(!empty($rightbanner6->image)): ?>
					<div class="tt-content-aside">
						<a href="<?php if(!empty($rightbanner6->link)): ?> <?php echo e($rightbanner6->link); ?> <?php else: ?> javascript:; <?php endif; ?>" class="tt-promo-03">
							<img src="<?php echo e(url('assets/images/loader.svg')); ?>" data-src="<?php echo e(url('uploads/banner/'.$rightbanner6->image)); ?>" alt="">
						</a>
					</div>
                    <?php endif; ?>
                    <!--end banner -->
				</div><?php /**PATH /home/kashkha/private/resources/views/website/includes/product_filter_left_panel.blade.php ENDPATH**/ ?>