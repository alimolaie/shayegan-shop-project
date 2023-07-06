<?php
$settingInfo = App\Http\Controllers\webController::settings();
if(app()->getLocale()=="en"){
$strLang="en";
$dir='ltr';
$align = 'left';
$oalign = 'right';
}else{
$strLang="ar";
$dir='rtl';
$align = 'right';
$oalign = 'left';
}
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="utf-8">
<style type="text/css">
/* body */
body{margin:50px 0 100px 0; font:13px Arial, Helvetica, sans-serif; line-height:23px; color:#333;}

/* Animaiton */
:hover{transition:ease-in 0.2s; -moz-transition:ease-in 0.2s; -o-transition:ease-in 0.2s; -webkit-transition:ease-in 0.2s;}

/* float */
.left{float:<?php echo $align;?>;}
.right{float:<?php echo $oalign;?>;}

/* alignment */
.text-right{text-align:<?php echo $oalign;?>;}
.text-left{text-align:<?php echo $align;?>;}
.text-center{text-align:center;}
.text-justify{text-align:justify;}
strong{font-weight:bold;}

/* clear */
.clear{clear:both;}
.clear5x{clear:both; height:5px;}
.clear10x{clear:both; height:10px;}
.clear15x{clear:both; height:15px;}
.clear20x{clear:both; height:20px;}
.clear30x{clear:both; height:30px;}
.clear40x{clear:both; height:40px;}
.clear50x{clear:both; height:50px;}
.clear60x{clear:both; height:60px;}

.header_date{width:45%;}
.customer{width:45%;}
/* table */
table{width:100%;border-bottom:solid 1px #999; border-<?php echo $align;?>:solid 1px #999; direction:<?php echo $dir;?>;}
table td{padding:5px 10px; border-top:solid 1px #999; border-<?php echo $oalign;?>:solid 1px #999;}
table th{border-top:solid 1px #999; border-<?php echo $oalign;?>:solid 1px #999;}
/* Main */
.container{width:800px; margin:20px auto;}
.header{width:100%;}
.logo{float:<?php echo $align;?>;}
.header_date, .customer{float:<?php echo $oalign;?>; direction:<?php echo $dir;?>;}

.payment{width:280px; float:<?php echo $align;?>;}
.payment td:first-child{background-color:#f3f3f3; font-weight:bold; width:110px;}
.pro_table{width:100%; overflow-x:scroll;}
.pro_table tr:first-child{font-weight:bold; text-align:center; background-color:#f3f3f3;}
.pro_table td:nth-child(1), .pro_table td:nth-child(2), .pro_table td:nth-child(3), .pro_table td:nth-child(5){text-align:center;}
.headertd{background-color:#333333; color:#FFFFFF;min-width:70px !important;}
</style>
</head>
<body>   
<div class="container">
		<div class="header">
            <?php if(!empty($settingInfo->emaillogo)): ?><img src="<?php echo e(url('uploads/logo/'.$settingInfo->emaillogo)); ?>" style="max-height:100px;" alt="<?php echo e($settingInfo->name_en); ?>" class="logo"/><?php endif; ?>
			<div class="header_date">
				<strong><?php echo e(__('webMessage.address')); ?>:</strong> <?php echo e($settingInfo['address_'.$strLang]); ?>

                <?php if(!empty($settingInfo->phone)): ?><br>
				<strong><?php echo e(__('webMessage.phone')); ?>:</strong> <?php echo e($settingInfo->phone); ?>

                <?php endif; ?>
                <?php if(!empty($settingInfo->mobile)): ?><br>
				<strong><?php echo e(__('webMessage.mobile')); ?>:</strong> <?php echo e($settingInfo->mobile); ?>

                <?php endif; ?>
			</div>
		<div class="clear"></div>	
		</div>
		
		<div class="clear50x"></div>
        <!-- text message start -->
        <b style="font-size:12px;"><?php echo e($deartxt); ?></b>
        <p><?php echo e($bodytxt); ?></p>
        <!-- text message end -->
        <div class="clear50x"></div>
		
		<div class="customer">
			<strong><?php echo e(__('webMessage.customerdetails')); ?></strong><br/>
			<?php echo $customerDetails; ?>

		</div>
			<?php echo $invoiceDetails; ?>

		<div class="clear50x"></div>
			<?php echo $orderDetails; ?>

	    <div class="clear50x"></div>
	        <?php echo $paymentDetails; ?>

        <div class="clear50x"></div>
        <?php if($strLang=="en" && !empty($settingInfo->order_note_en)): ?><i><?php echo $settingInfo->order_note_en; ?></i><?php endif; ?>
        <?php if($strLang=="ar" && !empty($settingInfo->order_note_ar)): ?><i><?php echo $settingInfo->order_note_ar; ?></i><?php endif; ?>
        <div class="clear50x"></div>
        <p class="text-center"><?php echo $trackYourOrder; ?></p>	
		<p class="text-center"><em><?php echo e(__('webMessage.thankyouforshopping')); ?></em></p>	
      <div class="clear"></div>
	</div>
</body>
</html><?php /**PATH /home/kashkha/private/resources/views/emails/template_order.blade.php ENDPATH**/ ?>