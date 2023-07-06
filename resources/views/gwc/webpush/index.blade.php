@php
$settings = App\Http\Controllers\AdminSettingsController::getSetting();
$theme    = $settings->theme;
@endphp
<!DOCTYPE html>
<html lang="en">
	<!-- begin::Head -->
	<head>
		
		<meta charset="utf-8" />
		<title>{{__('adminMessage.websiteName')}}|{{__('adminMessage.webpush')}}</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--css files -->
		@include('gwc.css.user')
        
		<!-- token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed @if(!empty($settings->is_admin_menu_minimize)) kt-aside--minimize @endif  kt-page--loading">

		<!-- begin:: Page -->

		<!-- begin:: Header Mobile -->
		<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
			<div class="kt-header-mobile__logo">
				@php
                $settingDetailsMenu = App\Http\Controllers\AdminDashboardController::getSettingsDetails();
                @endphp
                <a href="{{url('/gwc/home')}}">
                @if($settingDetailsMenu['logo'])
				<img alt="{{__('adminMessage.websiteName')}}" src="{!! url('uploads/logo/'.$settingDetailsMenu['logo']) !!}" height="40" />
                @endif
			   </a>
			</div>
			<div class="kt-header-mobile__toolbar">
				<button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
				
				<button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
			</div>
		</div>

		<!-- end:: Header Mobile -->
		<div class="kt-grid kt-grid--hor kt-grid--root">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

				<!-- begin:: Aside -->
				@include('gwc.includes.leftmenu')

				<!-- end:: Aside -->
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

					<!-- begin:: Header -->
					@include('gwc.includes.header')
                   

					<!-- end:: Header -->
					<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

						<!-- begin:: Subheader -->
						<div class="kt-subheader   kt-grid__item" id="kt_subheader">
							<div class="kt-container  kt-container--fluid ">
								<div class="kt-subheader__main">
                                <div class="btn-group">
                                        @if(auth()->guard('admin')->user()->can('sections-create'))
										<a href="javascript:;" data-toggle="modal" data-target="#kt_modal_contact_2" class="btn btn-success btn-bold"><i class="la la-plus"></i>&nbsp;{{__('adminMessage.mobilepush')}}</a>
                                        <a href="javascript:;" data-toggle="modal" data-target="#kt_modal_contact_1" class="btn btn-warning btn-bold"><i class="la la-plus"></i>&nbsp;{{__('adminMessage.webpush')}}</a>
                                        @endif
										
										
									</div>
								</div>
								<div class="kt-subheader__toolbar">
									<form class="kt-margin-l-20" id="kt_subheader_search_form" action="{{url('gwc/webpush')}}" method="get">
											<div class="kt-input-icon kt-input-icon--right kt-subheader__search">
												<input type="text" class="form-control" placeholder="{{__('adminMessage.searchhere')}}" id="q" name="q">
												<button style="border:0;" type="submit" class="kt-input-icon__icon kt-input-icon__icon--right">
													<span>
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<rect x="0" y="0" width="24" height="24" />
																<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
															</g>
														</svg>

														<!--<i class="flaticon2-search-1"></i>-->
													</span>
												</button>
											</div>
										</form>
									
								</div>
							</div>
						</div>

						<!-- end:: Subheader -->

						<!-- begin:: Content -->
						<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                            @include('gwc.includes.alert') 
							<div class="kt-portlet kt-portlet--mobile">
								<div class="kt-portlet__head kt-portlet__head--lg">
									<div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon2-line-chart"></i>
										</span>
										<h3 class="kt-portlet__head-title">
											{{__('adminMessage.webpushlisting')}}
										</h3>
									</div>
								</div>
                      
								<div class="kt-portlet__body">
                                @if(auth()->guard('admin')->user()->can('webpush-list'))
									<!--begin: Datatable -->
									<table class="table table-striped- table-bordered table-hover table-checkable " id="kt_table_1">
										<thead>
											<tr>
												<th width="10">#</th>
												<th>{{__('adminMessage.title')}}</th>
												<th>{{__('adminMessage.message')}}</th>
                                                <th>{{__('adminMessage.type')}}</th>
												<th width="100">{{__('adminMessage.status')}}</th>
												<th width="100">{{__('adminMessage.createdat')}}</th>
												<th width="10">{{__('adminMessage.actions')}}</th>
											</tr>
										</thead>
										<tbody>
                                        @if(count($webPushLists))
                                        @php $p=1; @endphp
                                        @foreach($webPushLists as $webPushList)
											<tr class="search-body">
												<td>{{$p}}</td>
												<td>{!! $webPushList->title !!}</td>
												<td>{!! $webPushList->message !!}</td>
                                                <td>{!! $webPushList->message_for !!}</td>
												<td>@if(!empty($webPushList->is_sending))<span class="kt-badge info">{{trans('adminMessage.sending')}}</span>@else <span class="kt-badge kt-badge-danger">{{trans('adminMessage.stopped')}}</span>@endif</td>
												<td>{!! $webPushList->created_at !!}</td>
                                                <td class="kt-datatable__cell" align="center">
                                                @if(auth()->guard('admin')->user()->can('webpush-edit') && $webPushList->message_for=='web')
                                                
                                                 <a title="{{__('adminMessage.edit')}}" href="javascript:;" data-toggle="modal" data-target="#kt_modal_editsection_web_{{$webPushList->id}}" class="kt-nav__link"><i class="kt-nav__link-icon flaticon2-edit"></i><span class="kt-nav__link-text"></span></a>
                                                 @else
                                                 <a title="{{__('adminMessage.edit')}}" href="javascript:;" data-toggle="modal" data-target="#kt_modal_editsection_mobile_{{$webPushList->id}}" class="kt-nav__link"><i class="kt-nav__link-icon flaticon2-edit"></i><span class="kt-nav__link-text"></span></a>
                                                 @endif
                                                 @if(auth()->guard('admin')->user()->can('webpush-delete'))
                                                 <a title="{{__('adminMessage.delete')}}" href="javascript:;" data-toggle="modal" data-target="#kt_modal_{{$webPushList->id}}" class="kt-nav__link"><i class="kt-nav__link-icon flaticon2-trash"></i><span class="kt-nav__link-text"></span></a>
                                                 @endif
                                                 
                                                 <!--Delete modal -->
                       <div class="modal fade" id="kt_modal_{{$webPushList->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">{{__('adminMessage.alert')}}</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											</button>
										</div>
										<div class="modal-body" align="center">
											<h6 class="modal-title">{!!__('adminMessage.alertDeleteMessage')!!}</h6>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('adminMessage.no')}}</button>
											<button type="button" class="btn btn-danger"  onClick="Javascript:window.location.href='{{url('gwc/webpush/delete/'.$webPushList->id)}}'">{{__('adminMessage.yes')}}</button>
										</div>
									</div>
								</div>
							</div>
                            <!--edit -->
                            <div class="modal fade" id="kt_modal_editsection_web_{{$webPushList->id}}" tabindex="-1" role="dialog" aria-labelledby="kt_modal_editsection_web_{{$webPushList->id}}" aria-hidden="true" align="left">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">{{__('adminMessage.manageWebPush')}}</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											</button>
										</div>
										<div class="modal-body">
											<p><!--begin::Form-->
					@if(auth()->guard('admin')->user()->can('webpush-edit'))
                    
                         <form name="tFrm"  id="form_validation_{{$webPushList->id}}"  method="post"
                          class="kt-form" enctype="multipart/form-data" action="{{route('saveEdit',$webPushList->id)}}">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="hidden" name="id" value="{{$webPushList->id}}">
                          <input type="hidden" name="message_for" value="web">
											<div class="kt-portlet__body">
											
											<!--edit section -->
											<div class="form-group">
                                                <label>{{__('adminMessage.title')}}</label>
                                                <input required type="text" class="form-control @if($errors->has('title')) is-invalid @endif" name="title"
                                                               value="@if($webPushList->title){{$webPushList->title}}@else{{old('title')}}@endif" autocomplete="off" placeholder="{{__('adminMessage.enter_title')}}*" />
                                                @if($errors->has('title'))
                                                <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                                                @endif
                                                </div>
                                                <div class="form-group">
                                                <label>{{__('adminMessage.message')}}</label>
                                                <textarea required class="form-control @if($errors->has('message')) is-invalid @endif" name="message"
                                                               placeholder="{{__('adminMessage.enter_message')}}*">@if($webPushList->message){{$webPushList->message}}@else{{old('message')}}@endif</textarea>
                                                @if($errors->has('message'))
                                                <div class="invalid-feedback">{{ $errors->first('message') }}</div>
                                                @endif
                                                </div>
                                             
											    <div class="form-group row">
												<div class="col-lg-6">
                                                <label>{{__('adminMessage.large_image_url')}}</label>
                                                <input  type="text" class="form-control @if($errors->has('large_image_url')) is-invalid @endif" name="large_image_url"
                                                               value="@if($webPushList->large_image_url){{$webPushList->large_image_url}}@else{{old('large_image_url')}}@endif" autocomplete="off"  />
                                                @if($errors->has('large_image_url'))
                                                <div class="invalid-feedback">{{ $errors->first('large_image_url') }}</div>
                                                @endif
                                                </div>
												<div class="col-lg-6">
                                                <label>{{__('adminMessage.logo_image_url')}}</label>
                                                <input  type="text" class="form-control @if($errors->has('logo_image_url')) is-invalid @endif" name="logo_image_url"
                                                               value="@if($webPushList->logo_image_url){{$webPushList->logo_image_url}}@else{{old('logo_image_url')}}@endif" autocomplete="off" />
                                                @if($errors->has('logo_image_url'))
                                                <div class="invalid-feedback">{{ $errors->first('logo_image_url') }}</div>
                                                @endif
                                                </div>
												</div>
												<div class="form-group row">
												<div class="col-lg-6">
                                                <label>{{__('adminMessage.badge_image_url')}}</label>
                                                <input  type="text" class="form-control @if($errors->has('badge_image_url')) is-invalid @endif" name="badge_image_url"
                                                               value="@if($webPushList->badge_image_url){{$webPushList->badge_image_url}}@else{{old('badge_image_url')}}@endif" autocomplete="off" />
                                                @if($errors->has('badge_image_url'))
                                                <div class="invalid-feedback">{{ $errors->first('badge_image_url') }}</div>
                                                @endif
                                                </div>
												<div class="col-lg-6">
                                                <label>{{__('adminMessage.action_url')}}</label>
                                                <input  type="text" class="form-control @if($errors->has('action_url')) is-invalid @endif" name="action_url"
                                                               value="@if($webPushList->action_url){{$webPushList->action_url}}@else{{old('action_url')}}@endif" autocomplete="off" />
                                                @if($errors->has('action_url'))
                                                <div class="invalid-feedback">{{ $errors->first('action_url') }}</div>
                                                @endif
                                                </div>
												</div>
												<div class="form-group row">
                                                <div class="col-lg-12">
                                                <div class="form-group row">
													<label class="col-3 col-form-label">{{__('adminMessage.sendnow')}}</label>
													<div class="col-3">
														<span class="kt-switch">
															<label>
																<input type="checkbox"  name="sendnow"  id="sendnow" value="1"/>
																<span></span>
															</label>
														</span>
													</div>
													<label class="col-3 col-form-label">{{__('adminMessage.alignment')}}</label>
													<div class="col-3">
														<select class="form-control @if($errors->has('alignment')) is-invalid @endif" name="alignment">
														<option value="auto" @if($webPushList->alignment=='auto') selected @endif>{{__('adminMessage.auto')}}</option>
														<option value="rtl" @if($webPushList->alignment=='rtl') selected @endif>{{__('adminMessage.rtl')}}</option>
														<option value="ltr" @if($webPushList->alignment=='ltr') selected @endif>{{__('adminMessage.ltr')}}</option>
														</select>
														@if($errors->has('alignment'))
														<div class="invalid-feedback">{{ $errors->first('alignment') }}</div>
														@endif
													</div>
												   </div>
                                                </div>
                                                </div>
											<!--end edit -->
										</div>
											<div class="kt-portlet__foot">
												<div class="kt-form__actions">
													<button type="submit" class="btn btn-success">{{__('adminMessage.save')}}</button>
													<button type="button" onClick="Javascript:;" data-dismiss="modal" aria-label="Close"  class="btn btn-secondary cancelbtn">{{__('adminMessage.cancel')}}</button>
												</div>
											</div>
										</form>
                                  
                            @else
                            <div class="alert alert-light alert-warning" role="alert">
								<div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
								<div class="alert-text">{{__('adminMessage.youdonthavepermission')}}</div>
							</div>
                            @endif
										<!--end::Form--></p>
										</div>
										
									</div>
								</div>
							</div>
                            <!--end-->
                            
                            <div class="modal fade" id="kt_modal_editsection_mobile_{{$webPushList->id}}" tabindex="-1" role="dialog" aria-labelledby="kt_modal_editsection_mobile_{{$webPushList->id}}" aria-hidden="true" align="left">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">{{__('adminMessage.manageWebPush')}}</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											</button>
										</div>
										<div class="modal-body">
											<p><!--begin::Form-->
					@if(auth()->guard('admin')->user()->can('webpush-edit'))
                    
                         <form name="tFrm"  id="form_validation_{{$webPushList->id}}"  method="post"
                          class="kt-form" enctype="multipart/form-data" action="{{route('saveEdit',$webPushList->id)}}">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="hidden" name="id" value="{{$webPushList->id}}">
                          <input type="hidden" name="message_for" value="mobile">
											<div class="kt-portlet__body">
											
											<!--edit section -->
											<div class="form-group">
                                                <label>{{__('adminMessage.title')}}</label>
                                                <input required type="text" class="form-control @if($errors->has('title')) is-invalid @endif" name="title"
                                                               value="@if($webPushList->title){{$webPushList->title}}@else{{old('title')}}@endif" autocomplete="off" placeholder="{{__('adminMessage.enter_title')}}*" />
                                                @if($errors->has('title'))
                                                <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                                                @endif
                                                </div>
                                                <div class="form-group">
                                                <label>{{__('adminMessage.message')}}</label>
                                                <textarea required class="form-control @if($errors->has('message')) is-invalid @endif" name="message"
                                                               placeholder="{{__('adminMessage.enter_message')}}*">@if($webPushList->message){{$webPushList->message}}@else{{old('message')}}@endif</textarea>
                                                @if($errors->has('message'))
                                                <div class="invalid-feedback">{{ $errors->first('message') }}</div>
                                                @endif
                                                </div>
                                             
											    
												
												<div class="form-group row">
                                                <div class="col-lg-12">
                                                <div class="form-group row">
													<label class="col-3 col-form-label">{{__('adminMessage.sendnow')}}</label>
													<div class="col-3">
														<span class="kt-switch">
															<label>
																<input type="checkbox"  name="sendnow"  id="sendnow" value="1"/>
																<span></span>
															</label>
														</span>
													</div>
												
												   </div>
                                                </div>
                                                </div>
											<!--end edit -->
										</div>
											<div class="kt-portlet__foot">
												<div class="kt-form__actions">
													<button type="submit" class="btn btn-success">{{__('adminMessage.save')}}</button>
													<button type="button" onClick="Javascript:;" data-dismiss="modal" aria-label="Close"  class="btn btn-secondary cancelbtn">{{__('adminMessage.cancel')}}</button>
												</div>
											</div>
										</form>
                                  
                            @else
                            <div class="alert alert-light alert-warning" role="alert">
								<div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
								<div class="alert-text">{{__('adminMessage.youdonthavepermission')}}</div>
							</div>
                            @endif
										<!--end::Form--></p>
										</div>
										
									</div>
								</div>
							</div>
                                                </td>
											</tr>
                                        
                                        @php $p++; @endphp
                                        @endforeach   
                                        <tr><td colspan="8" class="text-center">{{ $webPushLists->links() }}</td></tr> 
                                        @else
                                        <tr><td colspan="8" class="text-center">{{__('adminMessage.recordnotfound')}}</td></tr>
                                        @endif    
										</tbody>
									</table>
                            @else
                            <div class="alert alert-light alert-warning" role="alert">
								<div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
								<div class="alert-text">{{__('adminMessage.youdonthavepermission')}}</div>
							</div>
                            @endif
									<!--end: Datatable -->
								</div>
							</div>
						</div>

						<!-- end:: Content -->
					</div>

					<!-- begin:: Footer -->
					@include('gwc.includes.footer');

					<!-- end:: Footer -->
				</div>
			</div>
		</div>

		<!-- end:: Page -->

		<!-- begin::Quick Panel -->
		
        
        <!--begin::Modal-->
							<div class="modal fade" id="kt_modal_contact_1" tabindex="-1" role="dialog" aria-labelledby="kt_modal_contact_1" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">{{__('adminMessage.manageWebPush')}}</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											</button>
										</div>
										<div class="modal-body">
											<p><!--begin::Form-->
					@if(auth()->guard('admin')->user()->can('webpush-create'))
                    
                         <form name="tFrm"  id="form_validation"  method="post"
                          class="kt-form" enctype="multipart/form-data" action="{{route('savePush')}}">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="hidden" name="message_for" value="web">
											<div class="kt-portlet__body">
                                                <div class="form-group">
                                                <label>{{__('adminMessage.title')}}</label>
                                                <input required type="text" class="form-control @if($errors->has('title')) is-invalid @endif" name="title"
                                                               value="{{old('title')}}" autocomplete="off" placeholder="{{__('adminMessage.enter_title')}}*" />
                                                               @if($errors->has('title'))
                                                               <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                                                               @endif
                                                </div>
                                                <div class="form-group">
                                                <label>{{__('adminMessage.message')}}</label>
                                                <textarea required class="form-control @if($errors->has('message')) is-invalid @endif" name="message"
                                                               placeholder="{{__('adminMessage.enter_message')}}*">{{old('message')}}</textarea>
                                                @if($errors->has('message'))
                                                <div class="invalid-feedback">{{ $errors->first('message') }}</div>
                                                @endif
                                                </div>
                                             
											    <div class="form-group row">
												<div class="col-lg-6">
                                                <label>{{__('adminMessage.large_image_url')}}</label>
                                                <input  type="text" class="form-control @if($errors->has('large_image_url')) is-invalid @endif" name="large_image_url"
                                                               value="{{old('large_image_url')}}" autocomplete="off"  />
                                                               @if($errors->has('large_image_url'))
                                                               <div class="invalid-feedback">{{ $errors->first('large_image_url') }}</div>
                                                               @endif
                                                </div>
												<div class="col-lg-6">
                                                <label>{{__('adminMessage.logo_image_url')}}</label>
                                                <input  type="text" class="form-control @if($errors->has('logo_image_url')) is-invalid @endif" name="logo_image_url"
                                                               value="{{old('logo_image_url')}}" autocomplete="off" />
                                                               @if($errors->has('logo_image_url'))
                                                               <div class="invalid-feedback">{{ $errors->first('logo_image_url') }}</div>
                                                               @endif
                                                </div>
												</div>
												<div class="form-group row">
												<div class="col-lg-6">
                                                <label>{{__('adminMessage.badge_image_url')}}</label>
                                                <input  type="text" class="form-control @if($errors->has('badge_image_url')) is-invalid @endif" name="badge_image_url"
                                                               value="{{old('badge_image_url')}}" autocomplete="off" />
                                                               @if($errors->has('badge_image_url'))
                                                               <div class="invalid-feedback">{{ $errors->first('badge_image_url') }}</div>
                                                               @endif
                                                </div>
												<div class="col-lg-6">
                                                <label>{{__('adminMessage.action_url')}}</label>
                                                <input  type="text" class="form-control @if($errors->has('action_url')) is-invalid @endif" name="action_url"
                                                               value="{{old('action_url')}}" autocomplete="off" />
                                                               @if($errors->has('action_url'))
                                                               <div class="invalid-feedback">{{ $errors->first('action_url') }}</div>
                                                               @endif
                                                </div>
												</div>
												<div class="form-group row">
                                                <div class="col-lg-12">
                                                <div class="form-group row">
													<label class="col-3 col-form-label">{{__('adminMessage.sendnow')}}</label>
													<div class="col-3">
														<span class="kt-switch">
															<label>
																<input type="checkbox"  name="sendnow"  id="sendnow" value="1"/>
																<span></span>
															</label>
														</span>
													</div>
													<label class="col-3 col-form-label">{{__('adminMessage.alignment')}}</label>
													<div class="col-3">
														<select class="form-control @if($errors->has('alignment')) is-invalid @endif" name="alignment">
														<option value="auto">{{__('adminMessage.auto')}}</option>
														<option value="rtl">{{__('adminMessage.rtl')}}</option>
														<option value="ltr">{{__('adminMessage.ltr')}}</option>
														</select>
														@if($errors->has('alignment'))
														<div class="invalid-feedback">{{ $errors->first('alignment') }}</div>
														@endif
													</div>
												   </div>
                                                </div>
                                                </div>
											
											    											
											</div>
											<div class="kt-portlet__foot">
												<div class="kt-form__actions">
													<button type="submit" class="btn btn-success">{{__('adminMessage.save')}}</button>
													<button type="button" onClick="Javascript:;" data-dismiss="modal" aria-label="Close"  class="btn btn-secondary cancelbtn">{{__('adminMessage.cancel')}}</button>
												</div>
											</div>
										</form>
                                  
                            @else
                            <div class="alert alert-light alert-warning" role="alert">
								<div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
								<div class="alert-text">{{__('adminMessage.youdonthavepermission')}}</div>
							</div>
                            @endif
										<!--end::Form--></p>
										</div>
										
									</div>
								</div>
							</div>




                        <!-- moda for mobile -->
                        
                        <div class="modal fade" id="kt_modal_contact_2" tabindex="-1" role="dialog" aria-labelledby="kt_modal_contact_2" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">{{__('adminMessage.managemobilePush')}}</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											</button>
										</div>
										<div class="modal-body">
											<p><!--begin::Form-->
					@if(auth()->guard('admin')->user()->can('webpush-create'))
                    
                         <form name="tFrm"  id="form_validation"  method="post"
                          class="kt-form" enctype="multipart/form-data" action="{{route('savePush')}}">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="hidden" name="message_for" value="mobile">
                          
											<div class="kt-portlet__body">
                                                <div class="form-group">
                                                <label>{{__('adminMessage.title')}}</label>
                                                <input required type="text" class="form-control @if($errors->has('title')) is-invalid @endif" name="title"
                                                               value="{{old('title')}}" autocomplete="off" placeholder="{{__('adminMessage.enter_title')}}*" />
                                                               @if($errors->has('title'))
                                                               <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                                                               @endif
                                                </div>
                                                <div class="form-group">
                                                <label>{{__('adminMessage.message')}}</label>
                                                <textarea required class="form-control @if($errors->has('message')) is-invalid @endif" name="message"
                                                               placeholder="{{__('adminMessage.enter_message')}}*">{{old('message')}}</textarea>
                                                @if($errors->has('message'))
                                                <div class="invalid-feedback">{{ $errors->first('message') }}</div>
                                                @endif
                                                </div>
												<div class="form-group row">
                                                <div class="col-lg-12">
                                                <div class="form-group row">
													<label class="col-3 col-form-label">{{__('adminMessage.sendnow')}}</label>
													<div class="col-3">
														<span class="kt-switch">
															<label>
																<input type="checkbox"  name="sendnow"  id="sendnow" value="1"/>
																<span></span>
															</label>
														</span>
													</div>
												
												   </div>
                                                </div>
                                                </div>
											
											    											
											</div>
											<div class="kt-portlet__foot">
												<div class="kt-form__actions">
													<button type="submit" class="btn btn-success">{{__('adminMessage.save')}}</button>
													<button type="button" onClick="Javascript:;" data-dismiss="modal" aria-label="Close"  class="btn btn-secondary cancelbtn">{{__('adminMessage.cancel')}}</button>
												</div>
											</div>
										</form>
                                  
                            @else
                            <div class="alert alert-light alert-warning" role="alert">
								<div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
								<div class="alert-text">{{__('adminMessage.youdonthavepermission')}}</div>
							</div>
                            @endif
										<!--end::Form--></p>
										</div>
										
									</div>
								</div>
							</div>
							<!--end::Modal-->

		<!-- end::Quick Panel -->

		<!-- begin::Scrolltop -->
		<div id="kt_scrolltop" class="kt-scrolltop">
			<i class="fa fa-arrow-up"></i>
		</div>

		<!-- end::Scrolltop -->

		<!-- js files -->
		@include('gwc.js.user')
        
  
    <script type="text/javascript">
	$(document).ready(function(){
	 $('#searchCat').keyup(function(){
	  // Search text
	  var text = $(this).val();
	  // Hide all content class element
	  $('.search-body').hide();
	  // Search 
	   $('.search-body').each(function(){
	 
		if($(this).text().indexOf(""+text+"") != -1 ){
		 $(this).closest('.search-body').show();
		 
		}
	  });
	 
	 });
	});
	</script>
	</body>
	<!-- end::Body -->
</html>