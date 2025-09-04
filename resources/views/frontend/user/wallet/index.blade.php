@extends('frontend.layouts.user_panel')

@section('panel_content')
    <div class="aiz-titlebar mt-2 mb-4">
    <div class="row align-items-center">
      <div class="col-md-6">
          <h1 class="h3">{{ translate('My Wallet') }}</h1>
      </div>
    </div>
    </div>
    <div class="row gutters-10">
      <div class="col-md-3 mx-auto mb-3" >
          <div class="bg-grad-1 text-white rounded-lg overflow-hidden">
            <span class="size-30px rounded-circle mx-auto bg-soft-primary d-flex align-items-center justify-content-center mt-3">
                <i class="las la-dollar-sign la-2x text-white"></i>
            </span>
            <div class="px-3 pt-3 pb-3">
                <div class="h4 fw-700 text-center">{{ single_price(Auth::user()->balance) }}</div>
                <div class="opacity-50 text-center">{{ translate('Wallet Balance') }}</div>
            </div>
          </div>
      </div>
      <div class="col-md-3 mx-auto mb-3" >
        <div class="p-3 rounded mb-3 c-pointer text-center bg-white shadow-sm hov-shadow-lg has-transition" onclick="show_wallet_modal()">
            <span class="size-60px rounded-circle mx-auto bg-secondary d-flex align-items-center justify-content-center mb-3">
                <i class="las la-plus la-3x text-white"></i>
            </span>
            <div class="fs-18 text-primary">{{ translate('Recharge Wallet') }}</div>
        </div>
      </div>
      @if (addon_is_activated('offline_payment'))
          <div class="col-md-3 mx-auto mb-3" >
              <div class="p-3 rounded mb-3 c-pointer text-center bg-white shadow-sm hov-shadow-lg has-transition" onclick="show_make_wallet_recharge_modal()">
                  <span class="size-60px rounded-circle mx-auto bg-secondary d-flex align-items-center justify-content-center mb-3">
                      <i class="las la-plus la-3x text-white"></i>
                  </span>
                  <div class="fs-18 text-primary">{{ translate('Offline Recharge Wallet') }}</div>
              </div>
          </div>
      @endif
      
      
         <div class="col-md-3 mb-3 mx-auto">
            <div
                class="bg-grad-2 p-3 rounded mb-3 c-pointer text-center bg-white shadow-sm hov-shadow-lg has-transition"
                onclick="show_request_modal()">
              <span
                  class="size-60px rounded-circle mx-auto bg-secondary d-flex align-items-center justify-content-center mb-3">
                  <i class="las la-plus la-3x text-white"></i>
              </span>
                <div class="fs-18 text-white">{{ translate('Send Withdraw Request') }}</div>
            </div>
        </div>
        
        
    </div>
    <div class="card">
      <div class="card-header">
          <h5 class="mb-0 h6">{{ translate('Wallet recharge history')}}</h5>
      </div>
        <div class="card-body">
            <table class="table aiz-table mb-0">
                <thead>
                  <tr>
                      <th>#</th>
                      <th data-breakpoints="lg">{{  translate('Date') }}</th>
                      <th>{{ translate('Amount')}}</th>
                      <th data-breakpoints="lg">{{ translate('Payment Method')}}</th>
                      <th class="text-right">{{ translate('Approval')}}</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($wallets as $key => $wallet)
                      <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ date('d-m-Y', strtotime($wallet->created_at)) }}</td>
                          <td>{{ single_price($wallet->amount) }}</td>
                          <td>{{ ucfirst(str_replace('_', ' ', $wallet ->payment_method)) }}</td>
                          <td class="text-right">
                              @if ($wallet->offline_payment)
                                  @if ($wallet->approval)
                                      <span class="badge badge-inline badge-success">{{translate('Approved')}}</span>
                                  @else
                                      <span class="badge badge-inline badge-info">{{translate('Pending')}}</span>
                                  @endif
                              @else
                                  N/A
                              @endif
                          </td>
                      </tr>
                  @endforeach

                </tbody>
            </table>
            <div class="aiz-pagination">
                {{ $wallets->links() }}
            </div>
        </div>
    </div>
    
    
    
    
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">{{ translate('Withdraw Request history')}}</h5>
        </div>
        <div class="card-body">
            <table class="table aiz-table mb-0">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{ translate('Date') }}</th>
                    <th>{{ translate('Amount')}}</th>
                    <th>{{ translate('Type')}}</th>
                    
                    <th data-breakpoints="lg">{{ translate('Status')}}</th>
                    <th>{{ translate('Withdraw Type')}}</th>
                    <th>{{ translate('Remarks')}}</th>
                    <th data-breakpoints="lg" width="40%">{{ translate('Message')}}</th>
                    
                    
                </tr>
                </thead>
                <tbody>
                @foreach ($seller_withdraw_requests as $key => $seller_withdraw_request)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ date('d-m-Y', strtotime($seller_withdraw_request->created_at)) }}</td>
                        <td>{{ single_price($seller_withdraw_request->amount) }}</td>
                        <td>
                            @if( $seller_withdraw_request->type == 1)
                            
                            {{translate('User Balance')}}
                            @else
                            
                              {{translate('Guarantee')}}
                            @endif
                        </td>
                        <td> 
                            @if ($seller_withdraw_request->status == 1)
                                <span class=" badge badge-inline badge-success">{{ translate('Paid')}}</span>
                             @elseif ($seller_withdraw_request->status == 2)
                                <span class=" badge badge-inline badge-danger">{{ translate('Refuse')}} </span>
                            @else
                                <span class=" badge badge-inline badge-info">{{ translate('Pending')}}</span>
                            @endif
                        </td>
                        <td>
                            
                            @if( $seller_withdraw_request->w_type == 1)
                            
                            {{translate('Cash')}}
                            @elseif( $seller_withdraw_request->w_type == 2)
                            
                              {{translate('Bank')}}
                            @elseif( $seller_withdraw_request->w_type == 3)
                            {{translate('USDT')}}
                            @endif
                        </td>
                             <td>
                            {{ $seller_withdraw_request->remarks }}
                        </td>
                        <td>
                            {{ $seller_withdraw_request->message }}
                        </td>
                   
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="aiz-pagination">
                {{ $seller_withdraw_requests->links() }}
            </div>
        </div>
    </div>



@endsection

@section('modal')

  <div class="modal fade" id="wallet_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ translate('Recharge Wallet') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
              </div>
              <form class="" action="{{ route('wallet.recharge') }}" method="post">
                  @csrf
                  <div class="modal-body gry-bg px-3 pt-3">
                      <div class="row">
                          <div class="col-md-4">
                              <label>{{ translate('Amount')}} <span class="text-danger">*</span></label>
                          </div>
                          <div class="col-md-8">
                              <input type="number" lang="en" class="form-control mb-3" name="amount" placeholder="{{ translate('Amount')}}" required>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-4">
                              <label>{{ translate('Payment Method')}} <span class="text-danger">*</span></label>
                          </div>
                          <div class="col-md-8">
                              <div class="mb-3">
                                  <select class="form-control selectpicker" data-minimum-results-for-search="Infinity" name="payment_option" data-live-search="true">
                                    @if (get_setting('paypal_payment') == 1)
                                        <option value="paypal">{{ translate('Paypal')}}</option>
                                    @endif
                                    @if (get_setting('stripe_payment') == 1)
                                        <option value="stripe">{{ translate('Stripe')}}</option>
                                    @endif
                                    @if (get_setting('mercadopago_payment') == 1)
                                        <option value="mercadopago">{{ translate('Mercadopago')}}</option>
                                    @endif
                                    @if(get_setting('toyyibpay_payment') == 1)
                                        <option value="toyyibpay">{{ translate('ToyyibPay')}}</option>
                                    @endif
                                    @if (get_setting('sslcommerz_payment') == 1)
                                        <option value="sslcommerz">{{ translate('SSLCommerz')}}</option>
                                    @endif
                                    @if (get_setting('instamojo_payment') == 1)
                                        <option value="instamojo">{{ translate('Instamojo')}}</option>
                                    @endif
                                    @if (get_setting('paystack') == 1)
                                        <option value="paystack">{{ translate('Paystack')}}</option>
                                    @endif
                                    @if (get_setting('voguepay') == 1)
                                        <option value="voguepay">{{ translate('VoguePay')}}</option>
                                    @endif
                                    @if (get_setting('payhere') == 1)
                                        <option value="payhere">{{ translate('Payhere')}}</option>
                                    @endif
                                    @if (get_setting('ngenius') == 1)
                                        <option value="ngenius">{{ translate('Ngenius')}}</option>
                                    @endif
                                    @if (get_setting('razorpay') == 1)
                                        <option value="razorpay">{{ translate('Razorpay')}}</option>
                                    @endif
                                    @if (get_setting('iyzico') == 1)
                                        <option value="iyzico">{{ translate('Iyzico')}}</option>
                                    @endif
                                    @if (get_setting('bkash') == 1)
                                        <option value="bkash">{{ translate('Bkash')}}</option>
                                    @endif
                                    @if (get_setting('nagad') == 1)
                                        <option value="nagad">{{ translate('Nagad')}}</option>
                                    @endif
                                    @if (get_setting('payku') == 1)
                                        <option value="payku">{{ translate('Payku')}}</option>
                                    @endif
                                    @if(addon_is_activated('african_pg'))
                                        @if (get_setting('mpesa') == 1)
                                            <option value="mpesa">{{ translate('Mpesa')}}</option>
                                        @endif
                                        @if (get_setting('flutterwave') == 1)
                                            <option value="flutterwave">{{ translate('Flutterwave')}}</option>
                                        @endif
                                        @if (get_setting('payfast') == 1)
                                            <option value="payfast">{{ translate('PayFast')}}</option>
                                        @endif
                                    @endif
                                    @if (addon_is_activated('paytm') && get_setting('paytm_payment'))
                                        <option value="paytm">{{ translate('Paytm')}}</option>
                                    @endif
                                    @if(get_setting('authorizenet') == 1)
                                        <option value="authorizenet">{{ translate('Authorize Net')}}</option>
                                    @endif
                                  </select>
                              </div>
                          </div>
                      </div>
                      <div class="form-group text-right">
                          <button type="submit" class="btn btn-sm btn-primary transition-3d-hover mr-1">{{translate('Confirm')}}</button>
                      </div>
                  </div>
              </form>
          </div>
      </div>
  </div>


  <!-- offline payment Modal -->
  <div class="modal fade" id="offline_wallet_recharge_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">{{ translate('Offline Recharge Wallet') }}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
              </div>
              <div id="offline_wallet_recharge_modal_body"></div>
          </div>
      </div>
  </div>
 
    @php
    $balance = \App\Models\User::where(['id'=>Auth::user()->id])->first()['balance'];
    @endphp
    <div class="modal fade" id="request_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ translate('Send A Withdraw Request') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                @if ($balance > 5)
                    <form class="" action="{{ route('wallet.do_money_withdraw_request') }}" method="post">
                        @csrf
                        <div class="modal-body gry-bg px-3 pt-3">
                            <div class="row">
                                <div class="col">
                                    <div class="alert alert-success" role="alert">
                                        <h6>{{ translate('Your wallet balance :') }} ${{ $balance }}</h6>
                                    </div>
                                    
                              
                                    
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>{{ translate('Amount')}} <span class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-9">
                                    <input type="number" lang="en" class="form-control mb-3" name="amount"
                                         
                                           placeholder="{{ translate('Amount') }}" required>
                                </div>
                            </div>
                             <div class="row" style="margin-bottom:5px; display:none;">
                                
                                 <div class="col-md-3">
                                    <label>{{ translate('Opera Type')}}</label>
                                </div>
                                 <div class="col-md-9">
                                     <select name="type" class="form-control">
                                         <option value="1">{{translate('User Balance')}}</option>
                                         
                                     </select>
                                </div>
                                
                                </div>
                            <div class="row" style="margin-bottom:5px;">
                                
                                 <div class="col-md-3">
                                    <label>{{ translate('Withdraw Type')}}</label>
                                </div>
                                 <div class="col-md-9">
                                     <select name="w_type" class="form-control" id="p">
                                        <option value="1">{{translate('Cash')}}</option>
                                        <option value="2">{{translate('Bank')}}</option>
                                        <option value="3">{{translate('USDT')}}</option>
                            
                                     </select>
                                </div>
                                
                                </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>{{ translate('Message')}}</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea name="message" rows="8" class="form-control mb-3"></textarea>
                                </div>
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-sm btn-primary">{{translate('Send')}}</button>
                            </div>
                        </div>
                    </form>
                @else
                    <div class="modal-body gry-bg px-3 pt-3">
                        <div class="p-5 heading-3">
                            {{ translate('You do not have enough balance to send withdraw request') }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    
@endsection

@section('script')
    <script type="text/javascript">
    
        function show_request_modal() {
            $('#request_modal').modal('show');
        }



        function show_wallet_modal(){
            $('#wallet_modal').modal('show');
        }

        function show_make_wallet_recharge_modal(){
            $.post('{{ route('offline_wallet_recharge_modal') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#offline_wallet_recharge_modal_body').html(data);
                $('#offline_wallet_recharge_modal').modal('show');
            });
        }
        
        $(function(){
            @php 
            $user = \App\Models\User::find(Auth::user()->id);
            @endphp
         $("#p").change(function(){
            var usdt_status = {{$user->usdt_payment_status}};
            var bank_payment_status = {{$user->bank_payment_status}};
            var cash_on_delivery_status = {{$user->cash_on_delivery_status}};
            var type = $(this).val();
            if (type == 3 && usdt_status == 0) {
                window.location.href = "/profile"
                $(".btn").attr("disabled")
            }
            if (type == 2 && bank_payment_status == 0) {
                window.location.href = "/profile#bank"
                 $(".btn").attr("disabled")
            }
            if (type == 1 && cash_on_delivery_status == 0) {
                window.location.href = "/profile#cash"
                 $(".btn").attr("disabled")
            }
        })
        
        
        })
    </script>
@endsection
