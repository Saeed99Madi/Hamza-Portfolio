<!DOCTYPE html>

<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8" />
    <title>Ticket</title>
    <link href="{{asset('Ticket/bootstrap-rtl.min.css')}}" rel="stylesheet" />
    <link href="{{asset('Ticket/ticket.css')}}" rel="stylesheet" />
    <link href="{{asset('Ticket/default-rtl.min.css')}}" rel="stylesheet" />
    <style>
        @page {
            size: auto;
            margin: 0;
        }
    </style>
</head>
<!-- END HEAD -->
<body class="page-container-bg-solid">

    <!-- BEGIN CONTAINER -->
    <div class="page-container" style="margin-top:0px">

        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <div class="page-content" style="margin-right:0px; padding:0">
             
                <!-- BEGIN PAGE BASE CONTENT -->
                <div class="invoice-content-2 bordered">
                    <div class="row invoice-head">
                        <div class="col-md-5 col-xs-5">
                            <div class="invoice-logo">
                                <img src="~/Content/ticket-mdeia/logo.png" class="img-responsive logo__moi" alt="" />

                            </div>
                            <div class="text__content-logo">
                                <h1 class="uppercase ticket_name">بسم الله الرحمن الرحيم</h1>
                                <h3 class="uppercase ticker__supname">الإدارة العامة للمعابر والحدود</h3>
                            </div>
                        </div>

                        <div class="col-md-2 col-xs-2" style="background-color:green;">
                            <div class="ticket__namee">
                                <span>بسم الله الرحمن الرحيم</span>
                            </div>
                            <div class="ticket__namee">
                                <p class="ticket__number">
                                <span class="ticket_number_txt" style="font-size: 12pt; font-weight: bold; float: right;">
                                شركة المبادرات الفردية م.خ.غير ربحية
                                </span>
                                </p>
                            </div>
                            <div class="ticket__namee">
                                <p class="ticket__number">
                                <span class="ticket_number_txt" style="font-size: 12pt; font-weight: bold; float: left;">
                                Individual Initiatives Institute n.p
                                </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!--<hr class="ticket-hr__header"/>
                    -->
                    <div class="ticket__body">
                        
                        <div class="ticket__tbl">
                            <div class="row">
                                <div class="col-md-6 col-xs-6">
                                    <div class="table-scrollable">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="uppercase text-left">#</th>
                                                    <th class="uppercase text-left">المعرف</th>
                                                    <th class="uppercase text-left">الاسم</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                        <tr>
                                                            <td class="text-left">i</td>
                                                            <td class="text-left">IDENTITY</td>
                                                            <td class="text-left">NAME</td>
                                                        </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tickettxt__footer">
                      <div class="top__foot">
                          <p class="ticker__notes">لمزيد من التفاصيل يرجى متابعة موقع وزارة الداخلية www.moi.gov.ps 
                          <br />
                              أو من خلال تحميل تطبيق خدمات المواطنين من متجري Google Play و App Store
                          
                          </p>  
                      </div>

                            <div class="ticket_copyrights">
                                <div class="left__cont">
                                    <span>
                                    </span>
                                    <span class="copyright_txt">الإدارة العامة للحاسوب ونظم المعلومات - وزارة الداخلية 2019</span>
                                    <br />
                                    <span>www.moidev.moi.gov.ps</span>
                                </div>
                            </div>
                         </div>
                    </div>
                </div>
                <!-- END PAGE BASE CONTENT -->

                <!-- BEGIN PAGE BASE CONTENT -->
                <div class="invoice-content-2 bordered" style="margin-top:30px;">
                    <div class="row invoice-head">
                        <div class="col-md-5 col-xs-5">
                            <div class="invoice-logo">
                                <img src="~/Content/ticket-mdeia/logo.png" class="img-responsive logo__moi" alt="" />

                            </div>
                            <div class="text__content-logo">
                                <h1 class="uppercase ticket_name">وزارة الداخلية والأمن الوطني</h1>
                                <h3 class="uppercase ticker__supname">الإدارة العامة للمعابر والحدود</h3>
                            </div>
                        </div>

                        <div class="col-md-2 col-xs-2">
                            <div class="ticket__namee">
                                <span>تذكرة سفر</span>
                                <p class="ticket__number">رقم: <span class="ticket_number_txt">TICKET</span></p>
                            </div>
                        </div>

                        <div class="col-md-5 col-xs-5">
                            <div class="company-address">
                                <div class="date__one">
                                    <span class="uppercase">التاريخ: </span>
                                    <span class="regis__date">date</span>
                                    <span>:Date </span>
                                </div>
                                <div class="date__two">
                                    <span class="uppercase">تاريخ التسجيل: </span>
                                    
                                    <span class="regis__date">INSERTED_DATE</span>
                                   
                                    <span>:Registration Date </span>

                                </div>
                               
                                <br />
                                
                            </div>
                        </div>
                    </div>
                    <hr class="ticket-hr__header"/>

                    <div class="ticket__body">
                        <div class="ticket__tit">
                            <p class="ticket__generalinfo">
                                <span class="ticket__clss">الفئة: <span class="ticket__class"> CATEGORY_TITLE</span> </span>
                                <span class="travellers__num">  عدد المسافرين: <span class="travellers__numbers">Count</span></span>
                            </p>
                        </div>
                        <div class="ticket__tbl">
                            <div class="row">
                                <div class="col-md-6 col-xs-6">
                                    <div class="table-scrollable">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="uppercase text-left">#</th>
                                                    <th class="uppercase text-left">المعرف</th>
                                                    <th class="uppercase text-left">الاسم</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                        <tr>
                                                            <td class="text-left">i</td>
                                                            <td class="text-left">IDENTITY</td>
                                                            <td class="text-left">NAME</td>
                                                        </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tickettxt__footer">
                      <div class="top__foot">
                          <p class="ticker__notes">لمزيد من التفاصيل يرجى متابعة موقع وزارة الداخلية www.moi.gov.ps 
                          <br />
                              أو من خلال تحميل تطبيق خدمات المواطنين من متجري Google Play و App Store
                          
                          </p>  
                      </div>

                            <div class="ticket_copyrights">
                                <div class="left__cont">
                                    <span>
                                    </span>
                                    <span class="copyright_txt">الإدارة العامة للحاسوب ونظم المعلومات - وزارة الداخلية 2019</span>
                                    <br />
                                    <span>www.moidev.moi.gov.ps</span>
                                </div>
                            </div>
                         </div>
                    </div>
                </div>
                <!-- END PAGE BASE CONTENT -->

            </div>
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->

        <input type="hidden" id="hdnQr" value="TICKET" />
    </div>
</body>
</html>
