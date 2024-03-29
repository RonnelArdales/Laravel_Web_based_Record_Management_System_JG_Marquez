@extends('layouts.admin_navigation')
@section('title', 'Billing')
@section('content')
<style>
    label{
        font-family: 'Poppins';
    }
        .addtocart_input, .service_input{
        background: #D0B894;
        border-radius: 10px;
        border:none;
        margin-bottom: 1%;
        text-align: center; 
    }

    #payment .modal-dialog.modal-dialog-centered.modal-lg {
        max-height: 60px; /* Adjust the value as needed */
    }
    

</style>

<div class="row m-3">
    {{----------- Billing tab ---------------}}
    <div class="col-md-8 col-md-offset-5">
        <h1> <b>BILLING</b> </h1>
    </div>

    <div id="success" class="success alert alert-success" role="alert" style="display:none">
        <p style="margin-bottom: 0px" id="message-success"></p> 
    </div>
    <div class="main-spinner" style=" position:fixed; width:100%; left:0;right:0;top:0;bottom:0; background-color: rgba(255, 255, 255, 0.279); z-index:9999; display:none;"> 
        <div class="spinner">
            <div class="spinner-border" role="status" style="width: 8rem; height: 8rem;">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>	


    <div class="card"  style="background:#EDDBC0;border:none; " >
        <div class="table-appointment" style="padding: 0%" >
            <div class="card-body" style="width:100%; min-height:64vh;  font-size: 15px; ">
    <table class="table  table-bordered table-striped " id="billingtable" style="background-color: white; width:100%">

        <thead>
            <tr>
                <th>Trans no.</th>
                <th >User ID</th>
                <th>Fullname</th>
                <th>Sub-total</th>
                <th>Status</th>
                <th style="width: 230px">Action</th>
            </tr>
        </thead>
        <tbody class="patient-error" >
    
        </tbody>
        </table>
            </div>


        </div>
    </div>

    {{-- ------------- PAyment view ---------------------}}
    {{-- create --}}
    <div class="modal fade" id="payment"  tabindex="-1"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content"  style="background:  #EDDBC0 ">
                <div class="modal-header" style="border-bottom-color: gray">
                    <h4 class="modal-title fs-5" style="font-weight:700;">Proceed to Payment</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="text" style="background-color:transparent; text-align:center; " name="billingno" hidden readonly id="getbillingno">
                    
                    <div>
                        <label class="mb-0 rounded bg-[#EDDBC0]  ml-3" >Billing no.</label><br>
                        <input type="text" readonly class=" w-100 rounded  text-gray-700 focus:outline-none border-b-4 border-gray-400" style="background: #D0B894;"  id="payment_billingno"  name="userid">
                    </div>
                            
                    <div style="margin-top:15px">
                        <input type="text" hidden class="rounded"  id="payment_userid"  name="userid">
                        <label class="mb-0 rounded bg-[#EDDBC0]  ml-3" >Fullname</label><br>
                        <input type="text" readonly class=" w-100 rounded  text-gray-700 focus:outline-none border-b-4 border-gray-400" style="background: #D0B894;"  id="payment_fullname" name="fullname">
                    </div>

                    <div style="margin-top:15px">
                        <label class="mb-0 rounded bg-[#EDDBC0]  ml-3" >Sub-total</label><br>
                        <input hidden type="text" id="compute_subtotal">
                        <input type="text" readonly class=" w-100 rounded  text-gray-700 focus:outline-none border-b-4 border-gray-400" style="background: #D0B894;"   id="payment_subtotal" name="subtotal">
                    </div>

                    <div class="row" style="margin-top:15px">
                        <div class="col-sm-6">
                            <label class="mb-0 rounded bg-[#EDDBC0]  ml-3" >Discount</label><br>
                            <input type="text" id="discount_name" hidden>
                            <input type="text" hidden id="discount_price">
                            <select name="discount" id="payment_discount" class="  payment_discount rounded rounded text-gray-700 focus:outline-none border-b-4 border-gray-400 mg-5" style="background: #D0B894; height:29px; width:100%">
                                <option value="">--select--</option>
                                <option value="None">none</option>  
                                @foreach ($discounts as $discount)
                                <option value="{{$discount->discountcode}}">{{$discount->discountname}}</option>
                                @endforeach
                            </select> 
                        </div>

                        <div class="col-sm-6">
                            <label for="">Total</label>
                            <input type="text" readonly id="total_price"  class="rounded" style=" background-color:#D0B894; width:100%"    name="total_price"><br> 
                            <input hidden type="text" id="totalprice_nosymbol" name="totalprice_nosymbol" >
                        </div>
                    </div>

                    <div style="margin-top:15px" >
                        <label class="mb-0 rounded bg-[#EDDBC0]  ml-3" >Mode of payment</label><br>
                        <select name="mode_payment" id="mode_payment" class="rounded rounded text-gray-700 focus:outline-none border-b-4 border-gray-400 mg-5" style="background: #D0B894; height:29px; width:100%">
                            <option value="">--select--</option>
                            <option value="Cash">Cash</option>
                            @foreach ($mops as $mop)
                            <option value="{{$mop->modeofpayment}}">{{$mop->modeofpayment}}</option>
                            @endforeach
                        </select>

                        <div class="mt-0 mb-2">
                            <span  role="alert" class="block mt-5   text-danger" id="error_modeofpayment"></span>
                        </div>
                    </div>

                    <div id="cash" style="display: none; margin-top:15px" >
                        <div class="row">
                            <div class="col-6">
                                <label for="">Payment</label>
                                <div class="currency-wrap-payment w-100">
                                    <span class="currency-code-payment">₱</span>
                                    <input type="number" class="text-currency-payment w-100" id="payment_cash" placeholder="0.00" class="payment_cash" name="payment_cash" value=""/>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="">Change</label>
                                <div class="currency-wrap-payment w-100">
                                    <span class="currency-code-payment">₱</span> 
                                    <input type="text" class=" refresh text-currency-payment w-100" placeholder="0.00" readonly id="change" name="change" />
                                </div>
                            </div>
                            <div class="mt-0 mb-2">
                                <span  role="alert" class="block mt-5   text-danger" id="error_payment"></span>
                            </div>
                        </div>
                    </div>

                    <div  id="gcash" style="display:none; margin-top:15px">
                        <label for="">Reference no</label>
                        <input type="text" class="rounded rounded text-gray-700 focus:outline-none border-b-4 border-gray-400 mg-5" style="background: #D0B894; height:29px; width:100%" id="reference_no" name="reference_no">
                        <div class="mt-0 mb-2">
                            <span  role="alert" class="block mt-5   text-danger" id="error_reference_no"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer w-5" style=" border-top-color: gray  "  >
                    <button type="button" class="  "style="background: transparent; border-radius: 30px; color:#829460; border: 2px solid #829460;width: 110px;height: 37px; " data-bs-dismiss="modal">Close</button>
                    <button class="pay_billing "style="background: #829460;border-radius: 30px; color:white; border:#829460;width: 110px;height: 37px; " >Pay</button>
                </div>
            </div>
        </div>
    </div>

    {{---- delete modal ---}}
    <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background: #EDDBC0;">
                <div style="display: flex; justify-content: flex-end;">
                    <button type="button" style="margin-top:5px; margin-right:5px" class="btn-close text-right" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-header" style="border-bottom-color: gray; display: flex; justify-content: center; padding:10px">
                    <h2 class="modal-title text-center" id="exampleModalLabel"> <b>HOLD ON.</b> </h2>
                </div>
                <div class="modal-body">
                    <div class="mb-3 mt-4  ">
                        <div class=" columns-1 sm:columns-2 " style="display: flex; justify-content: center; ">
                            <input type="text" hidden id="delete_no">
                            <h4>Do you want to delete this data?</h4>
                        </div>
                    </div>

                    <div style=" display: flex; justify-content: center; margin-bottom:40px "  >
                        <button type="button" class=" close btn btn-secondary" style="margin-right:15px; background: transparent; border-radius: 30px; color:#829460; border: 2px solid #829460;width: 110px;height: 37px;  " data-bs-dismiss="modal">Close</button>
                        <button class="delete_user" id="deletefile"  style="background: #829460;border-radius: 30px; color:white; border:#829460;width: 110px;height: 37px; ">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('scripts')

<script>
    let usertype = '{{ Auth::user()->usertype }}';
</script>

@vite( 'resources/js/admin_secretary/billing.js')

@endsection
