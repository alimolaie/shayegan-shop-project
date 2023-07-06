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
.pro_table{width:100%; overflow-x:scroll;}
.pro_table tr:first-child{font-weight:bold; text-align:center; background-color:#f3f3f3;height:40px; font-family:Tahoma,Arial, Helvetica, sans-serif; font-size:12px;}
.pro_table td:nth-child(1), .pro_table td:nth-child(2), .pro_table td:nth-child(3), .pro_table td:nth-child(5){text-align:center; border:1px #CCCCCC solid;padding:5px;}
.pro_table b{ font-weight:bold; font-size:12px;}
.pro_table h5{font-family:Tahoma,Arial, Helvetica, sans-serif;}

.payment{width:100%; float:<?php echo e($align); ?>;}
.payment td:first-child{font-weight:bold; font-family:Tahoma,Arial, Helvetica, sans-serif;width:120px; font-size:12px;text-align:<?php echo e($align); ?>;padding:5px;background-color:#f3f3f3;height:24px;}

.company{width:100%; float:<?php echo e($oalign); ?>;}
.company td:first-child{font-weight:bold; font-family:Tahoma,Arial, Helvetica, sans-serif;width:70px; font-size:12px;text-align:<?php echo e($oalign); ?>;padding:5px;background-color:#f3f3f3;height:30px;}

.customers{}

.customers b{ font-weight:bold; font-size:12px;}

.orderDetails table{width:100%;border-bottom:solid 1px #999; border-<?php echo e($align); ?>:solid 1px #999; direction:ltr;}
.orderDetails table td{padding:5px 10px; border-top:solid 1px #999; border-<?php echo e($oalign); ?>:solid 1px #999;}
.orderDetails table th{border-top:solid 1px #999; border-<?php echo e($oalign); ?>:solid 1px #999;}

.companytable table{width:100%;border-bottom:solid 1px #999; border-<?php echo e($align); ?>:solid 1px #999; direction:ltr;}
.companytable table td{padding:5px 10px; border-top:solid 1px #999; border-<?php echo e($oalign); ?>:solid 1px #999;}
.companytable table th{border-top:solid 1px #999; border-<?php echo e($oalign); ?>:solid 1px #999;}

.invoicetable table{width:100%;border-bottom:solid 1px #999; border-<?php echo e($align); ?>:solid 1px #999; direction:ltr;}
.invoicetable table td{padding:5px 10px; border-top:solid 1px #999; border-<?php echo e($oalign); ?>:solid 1px #999;}
.invoicetable table th{border-top:solid 1px #999; border-<?php echo e($oalign); ?>:solid 1px #999;}

</style>
</head>
<body> 
<table border="0" width="800" cellspacing="0" cellpadding="0" style="font-family:Tahoma,Arial, Helvetica, sans-serif; font-size:12px;">
	<tr>
		<td>
        <!-- top header start -->
		<table border="0" width="100%" style="border-collapse: collapse" dir="<?php echo e($dir); ?>">
			<tr>
				<td align="<?php echo e($align); ?>">
                <?php if(!empty($settingInfo->emaillogo)): ?>
                <img src="<?php echo e(url('uploads/logo/'.$settingInfo->emaillogo)); ?>" style="max-height:97px;" alt="<?php echo e($settingInfo->name_en); ?>" border="0"/>
                <?php endif; ?>
				</td>
				<td align="<?php echo e($oalign); ?>">
				<img border="0" src="<?php echo e(url('uploads/invoice_03.png')); ?>" width="209" height="97"></td>
			</tr>
		</table>
        <!-- top header end -->
		</td>
	</tr>
	<tr>
		<td dir="<?php echo e($dir); ?>" align="<?php echo e($align); ?>"><hr color="#DFE3EA" ></td>
	</tr>
    <tr>
		<td align="<?php echo e($align); ?>" dir="<?php echo e($dir); ?>">
        <!-- text message start -->
        <b style="font-size:12px;"><?php echo e($deartxt); ?></b>
        <p><?php echo e($bodytxt); ?></p>
        <!-- text message end -->
        </td>
	</tr>
    <tr>
		<td dir="<?php echo e($dir); ?>" align="<?php echo e($align); ?>">&nbsp;</td>
	</tr>
    
    
	<tr>
		<td dir="<?php echo e($dir); ?>" align="<?php echo e($align); ?>"  >
        <!-- order status start -->
		<table border="0" width="100%" cellpadding="0" style="border-collapse: collapse;font-family:Tahoma,Arial, Helvetica, sans-serif; font-size:12px;" dir="<?php echo e($dir); ?>">
			<tr>
				<td valign="top">
                <div style="width:49%;float:<?php echo e($align); ?>;" class="invoicetable"><?php echo $invoiceDetails; ?></div>
                <div style="width:49%;float:<?php echo e($oalign); ?>;" class="companytable"></div>               
				</td>
               
			</tr>
		</table>
        <!-- order status end -->
		</td>
        
	</tr>
	
	
    <tr>
		<td dir="<?php echo e($dir); ?>" align="<?php echo e($align); ?>"><p><b style="font-size:14px;"><?php echo e(trans('webMessage.orderdetails')); ?></b></p></td>
	</tr>
   
	<tr>
		<td dir="<?php echo e($dir); ?>" align="<?php echo e($align); ?>" style="border-style: none;border:1px #DFE3EA solid;" class="orderDetails">
		<!--Order listing start here -->
        <?php echo $orderDetails; ?>

        <!-- Order listing end here -->
		</td>
	</tr>
  	<tr>
		<td dir="<?php echo e($dir); ?>" align="<?php echo e($align); ?>">&nbsp;</td>
	</tr>
	<tr>
		<td dir="<?php echo e($dir); ?>" align="<?php echo e($align); ?>"><p><b style="font-size:14px;"><?php echo e(__('webMessage.customerdetails')); ?></b></p></td>
	</tr>
    
	<tr>
		<td dir="<?php echo e($dir); ?>" align="<?php echo e($align); ?>">
        
        <table class="customers" border="0" width="100%" cellpadding="0" style="border-collapse: collapse;font-family:Tahoma,Arial, Helvetica, sans-serif; font-size:14px;" dir="<?php echo e($dir); ?>">
			<tr>
				<td><?php echo $customerDetails; ?></td>
			</tr>
		</table>
        </td>
     </tr> 
   
   <tr>
		<td dir="<?php echo e($dir); ?>" align="<?php echo e($align); ?>">&nbsp;</td>
	</tr>
    <?php if(!empty($paymentDetails)): ?>
	<tr>
		<td dir="<?php echo e($dir); ?>" align="<?php echo e($align); ?>"><p><b style="font-size:14px;"><?php echo e(trans('webMessage.transactiondetails')); ?></b></p></td>
	</tr>
    <tr>
		<td dir="<?php echo e($dir); ?>" align="<?php echo e($align); ?>">
        
        <table class="customers" border="0" width="100%" cellpadding="0" style="border-collapse: collapse;font-family:Tahoma,Arial, Helvetica, sans-serif; font-size:14px;" dir="<?php echo e($dir); ?>">
			<tr>
				<td><?php echo $paymentDetails; ?></td>
			</tr>
		</table>
        </td>
     </tr>
	<tr>
		<td dir="<?php echo e($dir); ?>" align="<?php echo e($align); ?>"><hr color="#DFE3EA" ></td>
	</tr>
    <?php endif; ?>
	<?php if($strLang=="en" && !empty($settingInfo->order_note_en)): ?>
	<tr>
		<td dir="<?php echo e($dir); ?>" align="<?php echo e($align); ?>"> <i><?php echo $settingInfo->order_note_en; ?></i></td>
	</tr>
    <tr>
		<td dir="<?php echo e($dir); ?>" align="<?php echo e($align); ?>"><hr color="#DFE3EA" ></td>
	</tr>
    <?php endif; ?>
    <?php if($strLang=="ar" && !empty($settingInfo->order_note_ar)): ?>
	<tr>
		<td dir="<?php echo e($dir); ?>" align="<?php echo e($align); ?>"> <i><?php echo $settingInfo->order_note_ar; ?></i></td>
	</tr>
    <tr>
		<td dir="<?php echo e($dir); ?>" align="<?php echo e($align); ?>"><hr color="#DFE3EA" ></td>
	</tr>
    <?php endif; ?>
    
	<tr>
		<td dir="<?php echo e($dir); ?>" align="<?php echo e($align); ?>">
        <!-- footer start -->
		<table border="0" width="100%" cellspacing="0" cellpadding="0" style="font-family:Tahoma,Arial, Helvetica, sans-serif; font-size:12px;">
			<tr>
			
				<td dir="<?php echo e($dir); ?>" align="center">
               
                <?php if($settingInfo->copyrights_en && app()->getLocale()=="en"): ?><?php echo $settingInfo->copyrights_en; ?><?php endif; ?>
                <?php if($settingInfo->copyrights_ar && app()->getLocale()=="ar"): ?><?php echo $settingInfo->copyrights_ar; ?><?php endif; ?>
                <p>
                <small>
                <?php echo e($settingInfo['address_'.$strLang]); ?>

                <?php if(!empty($settingInfo->phone)): ?><br><?php echo e(__('webMessage.phone')); ?>:<?php echo e($settingInfo->phone); ?><?php endif; ?>
                <?php if(!empty($settingInfo->mobile)): ?>,<?php echo e(__('webMessage.mobile')); ?>:<?php echo e($settingInfo->mobile); ?><?php endif; ?>
                <?php if(!empty($settingInfo->email)): ?><br><?php echo e(__('webMessage.email')); ?>:<?php echo e($settingInfo->email); ?><?php endif; ?>
                </small>
                </p>
                </td>
			</tr>
		</table>
         <!-- footer end -->
		</td>
	</tr>
    <tr><td align="center"><p class="text-center"><?php echo $trackYourOrder; ?></p>	
		<p class="text-center"><em><?php echo e(__('webMessage.thankyouforshopping')); ?></em></p></td></tr>
	
</table>
</body>
</html><?php /**PATH /home/kashkha/private/resources/views/emails/template_order_2.blade.php ENDPATH**/ ?>