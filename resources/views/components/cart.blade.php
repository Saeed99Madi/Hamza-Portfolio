<div>
    <style>
        <link rel="stylesheet" href="{{ asset('site/assets/cart/style.css') }}">
    </style>
    <div class="modal-dialog">


    <div id="globalCart"> <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header custom-modal-header">
                <div class="col-md-10 col-xs-10"><h4 class="modal-title">YOUR DONATION CART</h4></div>
                <div class="col-md-2 col-xs-2"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
            </div>

            <div class="modal-body">
                <div class="container donation-types"><div class="donation-col-each p-2">
                        <div class="row">
                            <div class="col-1 my-auto">
                                <i class="fas fa-times" id="0" onclick="removeItem(this.id)"></i>
                            </div>
                            <div class="col-6">
                                <p class="donation-title" id="model-description">Medical Aid Project</p><p class="donation-title"><small> £50 – CAN PROVIDE MEDICATION   </small></p><p style="color: #154272; text-transform: capitalize; font-size: 13px;">Gaza</p></div>
                            <div class="col-2">
                                <input onchange="addQuantityItem(this)" type="number" key="0" id="qty_0_48" name="qty_0_48" class="donate-qty" value="1" min="1" max="1000">
                            </div>
                            <div class="col-3 text-align-r">
                                <p class="cart-amt" id="model-price">£50</p>
                            </div>
                        </div></div><div class="donation-col-each p-2">
                        <div class="row">
                            <div class="col-1 my-auto">
                                <i class="fas fa-times" id="1" onclick="removeItem(this.id)"></i>
                            </div>
                            <div class="col-6">
                                <p class="donation-title" id="model-description">Bread Distribution Page</p><p class="donation-title"><small> £30 – Will Provide 500 pieces of Bread   </small></p><p style="color: #154272; text-transform: capitalize; font-size: 13px;">Gaza</p></div>
                            <div class="col-2">
                                <input onchange="addQuantityItem(this)" type="number" key="1" id="qty_1_49" name="qty_1_49" class="donate-qty" value="1" min="1" max="1000">
                            </div>
                            <div class="col-3 text-align-r">
                                <p class="cart-amt" id="model-price">£30</p>
                            </div>
                        </div></div></div><div class="container support-donation-pop">
                    <h6 class="support-heading text-center">Support us further by donating:</h6><div class="container">
                        <div class="row text-center mt-2">
                            <div class="col-2"><input type="checkbox" class="cbfeatured" id="cbfeatured1103" name="cbfeatured" onclick="myfeatured(this.id)"></div>
                            <div class="col-3">£50</div>
                            <div class="col-7" id="appealname1103">Most Needy</div>

                            <input type="hidden" id="amount_1103" value="50">
                            <input type="hidden" id="dttype_1103" value="">
                            <input type="hidden" id="appealid_1103" value="1">
                            <input type="hidden" id="key_1103" value="">
                        </div>
                    </div></div></div>
            <div class="modal-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-12 card-fees my-3 text-center">
                            <input name="cbccfees" type="checkbox" id="cbccfees" onclick="addper(this)">
                            <label for="cbccfees">Add 3% to my donation to cover credit card fees.</label>
                        </div><div class="row text-center">
                            <div class="col-6 text-center donate-pop-title">Total</div>
                            <div class="col-6 text-center donate-pop-total">£80</div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6"><input type="button" class="btn add-an-btn" data-bs-dismiss="modal" aria-label="Close" value="Add Another"></div>
                        <div class="col-md-6"><input type="button" class="btn check-out-btn" value="Checkout" onclick="myCheckout();"></div>
                    </div>
                </div>
            </div></div></div>
{{--    <script src="https://www.sawaed.org.uk/wp-content/themes/sawaed/template-parts/donate/app.js"></script>--}}

</div>
    <script src="{{ asset('site/assets/cart/cart.js') }}"></script>
</div>
