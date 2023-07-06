<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="utf-8">
</head>
<body>
<?php
$settingInfo = App\Http\Controllers\webController::settings();
?>   
<div style="margin:5%;">        
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td height="100" align="center" style="border-bottom:1px #CCCCCC solid;"><?php if($settingInfo->emaillogo): ?><img src="<?php echo e(url('uploads/logo/'.$settingInfo->emaillogo)); ?>" style="max-height:100px;" alt="<?php echo e($settingInfo->name_en); ?>"/><?php endif; ?></td>
    </tr>
    <tr>
      <td style="padding:20px; font-family: arial, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'; color: #000; text-align: justify; font-size: 14px; line-height:23px;">
            <p><?php echo $dear; ?></p>
		  	<p><?php echo $email_body; ?></p>
            
		</td>
    </tr>
    <tr><td><p><?php echo $email_footer; ?></p></td></tr>
    <tr>
      <td height="50" align="center"  style="font-family: arial, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'; color:#000; font-size: 14px;border-top:1px #CCCCCC solid;"><?php if($settingInfo->copyrights_en): ?><?php echo $settingInfo->copyrights_en; ?><?php endif; ?></td>
    </tr>
  </tbody>
</table>
</div>
</body>
</html><?php /**PATH /home/kashkha/private/resources/views/emails/template.blade.php ENDPATH**/ ?>