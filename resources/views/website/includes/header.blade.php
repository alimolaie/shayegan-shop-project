@php
if(!empty(app()->getLocale())){ $strLang = app()->getLocale();}else{$strLang="en";}
@endphp
<!--theme1 start-->
@if($settingInfo->theme==1 || $settingInfo->theme==4 || $settingInfo->theme==6 || $settingInfo->theme==7) 
@include("website.includes.header_theme1")
@endif
<!--theme1 end-->

@if($settingInfo->theme==5) 
<!--theme2 start -->
@include("website.includes.header_theme5")
<!--theme2 end -->
@endif

@if($settingInfo->theme==2) 
<!--theme2 start -->
@include("website.includes.header_theme2")
<!--theme2 end -->
@endif
<!--theme1 start-->
@if($settingInfo->theme==3) 
@if(Route::getCurrentRoute()->getActionName()=="App\Http\Controllers\webController@index")
@include("website.includes.header_theme3")
@else
@include("website.includes.header_theme3_inner")
@endif
@endif

<!--theme 8-->
@if($settingInfo->theme==8) 
@include("website.includes.header_theme8")
@endif

<!--theme 8-->
@if($settingInfo->theme==9) 
@include("website.includes.header_theme9")
@endif


<!--theme 10-->
@if($settingInfo->theme==10) 
@include("website.includes.header_theme10")
@endif