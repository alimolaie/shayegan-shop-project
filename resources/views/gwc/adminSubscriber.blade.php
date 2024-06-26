@php
$settings = App\Http\Controllers\AdminSettingsController::getSetting();
$theme    = $settings->theme;
@endphp
<!DOCTYPE html>
<html lang="en">
	<!-- begin::Head -->
	<head>
		
		<meta charset="utf-8" />
		<title>{{__('adminMessage.websiteName')}} | {{__('adminMessage.emailsubscribers')}}</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--css files -->
		@include('gwc.css.user')
		<!-- token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed  kt-page--loading">

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
									<h3 class="kt-subheader__title">{{__('adminMessage.emailsubscribers')}}</h3>
								</div>
                                <div class="kt-subheader__toolbar">
									<div class="btn-group">
                                      <form class="kt-margin-l-20" method="post" id="kt_subheader_search_form" action="{{route('searchSubscribers')}}">
											<div class="kt-input-icon kt-input-icon--right kt-subheader__search">
												<input value="{{Request()->q}}" type="text" class="form-control" placeholder="{{__('adminMessage.searchhere')}}" id="q" name="q">
												<button style="border:0;" class="kt-input-icon__icon kt-input-icon__icon--right">
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
                                        
                                        @if(auth()->guard('admin')->user()->can('email-subscribers-list'))
										<a href="{{url('gwc/subscribers/csv')}}" class="btn btn-brand btn-bold"><i class="la la-plus"></i>&nbsp;{{__('adminMessage.exportascsv')}}</a>
                                        @endif
										
									</div>
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
											{{__('adminMessage.emailsubscribers')}}
										</h3>
									</div>
									
								</div>
								<div class="kt-portlet__body">
                                @if(auth()->guard('admin')->user()->can('email-subscribers-list'))
									<!--begin: Datatable -->
									<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
										<thead>
											<tr>
												<th>#</th>
												<th>{{__('adminMessage.email')}}</th>
												<th>{{__('adminMessage.createdat')}}</th>
												<th>{{__('adminMessage.actions')}}</th>
											</tr>
										</thead>
										<tbody>
                                        @if(count($subscriberLists))
                                        @php $p=1; @endphp
                                        @foreach($subscriberLists as $key=>$subscriberList)
                                        
											<tr>
												<td>{{$subscriberLists->firstItem() + $key}}</td>
												<td>{!! $subscriberList->newsletter_email !!}</td>
												<td>{{ \Carbon\Carbon::parse($subscriberList->created_at)->diffForHumans() }}</td>
                                                <td class="kt-datatable__cell">
                                                 @if(auth()->guard('admin')->user()->can('logs-delete'))
                                                 <a  title="{{__('adminMessage.delete')}}" href="javascript:;" data-toggle="modal" data-target="#kt_modal_{{$subscriberList->id}}" class="kt-nav__link"><i class="kt-nav__link-icon flaticon2-trash"></i></a>
                                                 @endif
                                                 
                                                 <!--Delete modal -->
                        <div class="modal fade" id="kt_modal_{{$subscriberList->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">{{__('adminMessage.alert')}}</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											</button>
										</div>
										<div class="modal-body">
											<h6 class="modal-title">{!!__('adminMessage.alertDeleteMessage')!!}</h6>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('adminMessage.no')}}</button>
											<button type="button" class="btn btn-danger"  onClick="Javascript:window.location.href='{{url('gwc/subscribers/delete/'.$subscriberList->id)}}'">{{__('adminMessage.yes')}}</button>
										</div>
									</div>
								</div>
							</div>
                                                </td>
											</tr>
                                        
                                        @php $p++; @endphp
                                        @endforeach   
                                        
                                        <tr><td colspan="9" class="text-center">{{$subscriberLists->links()}}</td></tr>
                                         
                                        @else
                                        <tr><td colspan="9" class="text-center">{{__('adminMessage.recordnotfound')}}</td></tr>
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
		

		<!-- end::Quick Panel -->

		<!-- begin::Scrolltop -->
		<div id="kt_scrolltop" class="kt-scrolltop">
			<i class="fa fa-arrow-up"></i>
		</div>

		<!-- end::Scrolltop -->

		<!-- js files -->
		@include('gwc.js.user')
        
        
	</body>

	<!-- end::Body -->
</html>