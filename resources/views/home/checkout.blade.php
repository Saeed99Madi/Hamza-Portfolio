@extends('layouts.site')

@section('css')
    <style>
        button.close {
            display: none;
        }
        .ptb-100 {
            padding-top: 20px;
        }


        .checkout-summry #checkout-page-sidebar {
            min-height: auto;
            position: -webkit-sticky;
            position: sticky;
            top: 9%;
        }


        .checkout-summry .donation-summry-cont{
            background-color: #154272;
        }

        .checkout-summry .donation-all-total{
            background-color: #154272;
        }

        .checkout-summry .donation-all-total p{
            color: #FFF;
        }

        .checkout-summry .donation-summry-heading{
            color: #FFF;
            font-weight: 600;
        }

        .checkout-summry .donation-types {
            height: 190px;
            overflow-y: scroll;
            overflow-x: hidden;
            background: #f5f5f5;
        }

        .checkout-summry .donation-col-each{
            padding-bottom: 5px;
            border-bottom: 2px solid #154272;
        }


        .checkout-summry .donation-col-each span{
            font-size: 10px;
            margin: 0px;
            padding: 0px;
        }


        .checkout-summry .donation-col-each .donate-qty{
            width: 50px;
            padding-left: 10px;
        }


    </style>
@endsection

@section('content')

    <section class="causes-details-area ptb-100">
        <div class="container">
            <div class="row">


                <div class="col-lg-8 col-md-12">
                    <section class="causes-details-area ptb-100">
                        {{--                       <div class="container">--}}
                        {{--                           <div class="row">--}}
                        {{--                               <div class="col-lg-12 col-md-12">--}}
                        <div class="causes-details-desc">
                            <div class="causes-details-payment">
                                <div class="payment-method" style="margin-bottom:40px;">
                                    <h3>تواصل معنا</h3>
                                </div>
                                <div class="row">
                                    {{--                                        <div class="col-lg-12">--}}
                                    <div class="contact-area">
                                        <div class="contact-form">
                                            @include("_msg")
                                            <form id="contactForm1" novalidate="true" method="post" action='{{route("checkout.post")}}'>
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" name="firstname" id="firstname"  class="form-control" required="" data-error="يجب إدخال الإسم الاول" placeholder="أدخل الإسم">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" name="lastname" id="lastname"  class="form-control" required="" data-error="يجب إدخال إسم العائلة" placeholder="أدخل الإسم">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="form-group">
                                                            <input type="email" name="email" id="email"  class="form-control" required="" data-error="أدخل البريد الإلكتروني" placeholder="البريد الإلكتروني">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="form-group">
                                                            <input type="text" name="line1" id="line1"  class="form-control" required="" data-error="أدخل العنوان" placeholder="العنوان">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" name="country" id="country"  class="form-control" required="" data-error="يجب إدخال إسم الدولة" placeholder="أدخل إسم الدولة">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" name="city" id="city"  class="form-control" required="" data-error="يجب إدخال إسم المدينة" placeholder="أدخل إسم المدينة">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>

{{--                                                    <div class="col-lg-6 col-md-6">--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <input type="text" name="name" id="name"  class="form-control" required="" data-error="يجب إدخال الإسم" placeholder="أدخل الرمز البريدي">--}}
{{--                                                            <div class="help-block with-errors"></div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}

{{--                                                    <div class="col-lg-6 col-md-6">--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <input type="text" name="name" id="name"  class="form-control" required="" data-error="يجب إدخال الإسم" placeholder="أدخل الإسم">--}}
{{--                                                            <div class="help-block with-errors"></div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}

                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="form-group">
                                                            <input type="phone" name="phone" id="phone"  class="form-control" required="" data-error="أدخل رقم الموبايل" placeholder="رقم الموبايل">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="form-group">
                                                            <textarea style="height:200px;" name="on_behalf_off"  class="form-control" id="on_behalf_off" cols="30" rows="8"   placeholder="نيابة عن (اختياري)"></textarea>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>

                                                    <input  type="hidden" value="{{$subAmount}}" name="subtotal" />
                                                    @if($fees>0)
                                                    <input  type="hidden" value="{{$fees}}" name="fees" />
                                                    @endif
                                                    @if($cbfeatured>0)
                                                    <input  type="hidden" value="{{$cbfeatured}}" name="forCompany" />
                                                    @endif
                                                    <input  type="hidden" value="{{$totalAmount}}" name="total" />
                                                    @if($objs)
                                                    <input  type="hidden" value="{{$objs}}" name="cart" />
                                                    @endif
                                                    <div class="row py-2 " style="display:block">
                                                        <div class="col-md-12 col-xs-12 cart-button cart-button-cc">
                                                            <button type="button" class="default-btn disabled" id="btnpay">تبرع ببطاقة الائتمان</button>
                                                        </div>
                                                    </div>
                                                    <div class="c-card-section pt-2 pb-4" id="ccshow" style="display:none;">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <input type="text" name="cc_number" id="cc_number" maxlength="22"  class="form-control" data-error="يجب إدخال رقم البطاقة" placeholder="أدخل رقم البطاقة">
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-4 my-1">
                                                                <input type="text" name="cc_expiration_m" id="cc_expiration_m" maxlength="2"  class="form-control" data-error="يجب إدخال انتهاء شهر" placeholder="*أدخل انتهاء شهر(MM)">
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="col-md-4 my-1">
                                                                <input type="text" name="cc_expiration_y" id="cc_expiration_y" maxlength="4"  class="form-control" data-error="يجب إدخال انتهاء السنة" placeholder="*أدخل انتهاء السنة(YYYY)">
                                                                <div class="help-block with-errors"></div>
                                                            </div>

                                                            <div class="col-md-4 my-1">
                                                                <input type="password" name="cc_cvv" id="cc_cvv" maxlength="3"  class="form-control" data-error="يجب إدخال الرقم السري" placeholder="*أدخل الرقم السري*">
                                                                <div class="help-block with-errors"></div>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-12 col-xs-12 cart-button mt-2">
                                                            <button type="submit" class="btn check-btn-donate w-100">Donate Now</button>
                                                        </div>

                                                    </div>

{{--                                                    <div class="col-lg-12">--}}
{{--                                                        <div class="send-btn">--}}
{{--                                                            <button type="submit" class="default-btn disabled" style="pointer-events: all; cursor: pointer;">--}}
{{--                                                                تبرع الان--}}
{{--                                                                <i class="flaticon-right"></i>--}}
{{--                                                                <span style="top: 59.625px; left: -0.46875px;"></span>--}}
{{--                                                            </button>--}}
{{--                                                        </div>--}}
{{--                                                        <div id="MsgSubmit" class="h3 text-center hidden"></div>--}}
{{--                                                        <div class="clearfix"></div>--}}
{{--                                                    </div>--}}


                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    {{--                                        </div>--}}
                                </div>
                            </div>
                        </div>
                        {{--                               </div>--}}
                        {{--                           </div>--}}
                        {{--                       </div>--}}
                    </section>
                </div>

                <div class="col-lg-4 checkout-summry mb-5">
                    <div class="checkout-summry-sticky" id="checkout-page-sidebar">
                        <div class="donation-summry-cont p-2">
                            <div class="row">
                                <div class="col-12">
                                    <h3 class="donation-summry-heading">ملخص التبرع</h3>
                                </div>
                            </div>
                        </div>

                        <div class="donation-types">
                            <!--Each Donation Col-->
                            @if($objs)
                                @foreach($objs as $obj)
                            <div class="donation-col-each p-2 mb-2">
                                <div class="row">

{{--                                    <p class="donation-title" id="model-appealname">{{$projects}}</p>--}}

                                        <div class="col-6">
                                            <p class="donation-title" id="model-appealname">{{$obj['title']}}</p>
                                            <span><small> £{{$obj['cost']}} – Can provide 1 mother </small>
                                        </span>
                                            <br>
                                            <p style="color: #154272; text-transform: capitalize; font-size: 13px;" id="model-fundlist">حيث تشتد الحاجة</p>
                                        </div>
                                        <div class="col-2 m-auto">
                                            <p>{{$obj['quantity']}}</p>
                                        </div>
                                        <div class="col-4 m-auto">
                                            <p class="cart-amt text-center">£{{$obj['cost']}}</p>
                                        </div>

                                </div>
                            </div>
                            @endforeach
                        @endif


                            <!--Each Donation Col Ends-->
                        </div>

                        <div class="donation-all-total p-2">
                            <div class="row">
                                <div class="col-8">
                                    <p class="fw-bold">المجموع الفرغي</p>
                                </div>
                                <div class="col-4">
                                    <p class="donation-total-amount text-center fw-bold">£{{$subAmount}}</p>
                                </div>
                                @if($fees>0)
                                    <div class="col-8">
                                        <p class="fw-bold">مصاريف التحويل</p>
                                    </div>
                                    <div class="col-4">
                                        <p class="donation-total-amount text-center fw-bold">£{{$fees}}</p>
                                    </div>
                                @endif
                                @if($cbfeatured>0)
                                    <div class="col-8">
                                        <p class="fw-bold">دعم المؤسسة</p>
                                    </div>
                                    <div class="col-4">
                                        <p class="donation-total-amount text-center fw-bold">£{{$cbfeatured}}</p>
                                    </div>
                                @endif
                                <div class="col-8">
                                    <p class="fw-bold">الإجمالي</p>
                                </div>
                                <div class="col-4">
                                    <p class="donation-total-amount text-center fw-bold">£{{$totalAmount}}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </section>
@endsection

@section('js')
    <script>
        $("#btnpay").click(function (){
            $("#ccshow").show();
        });
    </script>
@endsection
