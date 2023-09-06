@extends('front.master')
@section('content')
    @include('front.website.partials.header')
    <main class="main login-page ml-auto mr-auto">
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">حساب کاربری</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <!-- End of Breadcrumb -->
        <div class="page-content">
            <div class="container">
                <div class="login-popup">
                    <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
                        <ul class="nav nav-tabs text-uppercase" role="tablist">
                            <li class="nav-item">
                                <a href="{{url('users/login')}}" class="nav-link active">ورود / ثبت نام</a>
                            </li>
                        </ul>
                        <form action="{{url('confirm-code')}}" method="post">
                            @csrf
                            <div class="tab-content">
                                <div class="tab-pane active" id="sign-in">
                                    <div class="form-group">
                                        <label>لطفا شماره موبایل خود را وارد کنید *</label>
                                        <input type="text" class="form-control" name="mobile" id="mobile" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">ورود </button>
                                </div>

                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

    </main>

    @include('front.website.partials.footer')
@endsection