@extends('layouts.site')

@section('css')
    <style>
        button.close {
            display: none;
        }
    </style>
@endsection

@section('content')

        @if($obj)
        @if($obj->active)

        <!-- Start Causes Details Area -->
        <section class="causes-details-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="causes-details-desc">
                            <div class="causes-details-text">
                                <div class="progress pink">
                                    <div class="progress-bar">
                                        <div class="progress-value" style="width: 50%;">50%</div>
                                    </div>
                                </div>
                                <h3>{{$obj->title}}</h3>
                                {!!$obj->desccode!!}
                            </div>
                            @if($obj->id == 3)
                            <script>
                              setTimeout(() => {
                                window.scrollTo(0,450);
                              }, 2000);

                            </script>
                            <div class="causes-details-payment">
								<div class="payment-method" style="margin-bottom:40px;">
									<h3>تواصل معنا</h3>
                                </div>

                                <div class="row">
                                <div class="col-lg-4">
                                    {!!$con->desccode!!}
                                </div>
                                <div class="col-lg-8">
                                    <div class="contact-area">
                                        <!--<div class="contact-content">
                                            <h3>Let’s talk!</h3>
                                            <p>Contact us to get, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ainim veniam.</p>
                                        </div>
                                        -->
                                        <div class="contact-form">
                                            @include("_msg")
                                            <form id="contactForm1" novalidate="true" method="post" action='{{route("home.contact")}}'>
                                            	<input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" name="name" id="name" value='{{ old("name") }}' class="form-control" required="" data-error="يجب إدخال الإسم" placeholder="أدخل الإسم">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group">
                                                            <input type="email" name="email" id="email" value='{{ old("email") }}' class="form-control" required="" data-error="أدخل البريد الإلكتروني" placeholder="البريد الإلكتروني">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="form-group">
                                                            <input type="subjects" name="subjects" id="subjects" value='{{ old("subjects") }}' class="form-control" required="" data-error="أدخل العنوان" placeholder="العنوان">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="form-group">
                                                            <textarea style="height:200px;" name="message" value='{{ old("message") }}' class="form-control" id="message" cols="30" rows="8" required="" data-error="أدخل المراسلة هنا" placeholder="أكتب هنا"></textarea>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="send-btn">
                                                            <button type="submit" class="default-btn disabled" style="pointer-events: all; cursor: pointer;">
                                                                إرسال
                                                                <i class="flaticon-right"></i>
                                                                <span style="top: 59.625px; left: -0.46875px;"></span>
                                                            </button>
                                                        </div>
                                                        <div id="MsgSubmit" class="h3 text-center hidden"></div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                </div>

							</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @else
        <span style="min-height: 400px; display: block; line-height: 400px; text-align: center; font-size: 45pt; color: #ff5a0b;">لا يوجد بيانات للعرض</span>
        @endif
        @else
        <span style="min-height: 400px; display: block; line-height: 400px; text-align: center; font-size: 45pt; color: #ff5a0b;">لا يوجد بيانات للعرض</span>
        @endif
        <!-- End Causes Details Area -->
@endsection

@section('js')
    @if($obj->id == 9)
        <script>
            setTimeout(function (){
                clearCart();
            }, 1000);
        </script>
    @endif

@endsection
