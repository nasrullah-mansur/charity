@extends('admin.layouts.master')
@section('page_title', isset($menu) ? $menu:'Category')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">{{isset($page_title) ? $page_title:'Tag'}}</h3>
                        </div>

                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Campaign </label>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" name="campaign_id"
                                                id="exampleInputEmail1"
                                                value="{{isset($withdraw->campaign) ? $withdraw->campaign->pl_title : ''}}">
                                            <span class="text-danger">{{$errors->first('pl_name')}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Goal </label>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" name="campaign_id"
                                                id="exampleInputEmail1"
                                                value="{{$withdraw->goal_amount}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Raised </label>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" name="campaign_id"
                                                id="exampleInputEmail1"
                                                value="{{$withdraw->raised_amount}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Servie charge </label>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" name="campaign_id"
                                                id="exampleInputEmail1"
                                                value="{{$withdraw->is_percentage_service_charge ? $withdraw->service_charge.'%' :$withdraw->service_charge }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Totaol Service Charge </label>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" name="campaign_id"
                                                id="exampleInputEmail1"
                                                value="{{$withdraw->total_service_charge}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Witdrawal Amount</label>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" name="withdrawal_amount"
                                                id="exampleInputEmail1"
                                                value="{{$withdraw->withdrawal_amount}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">{{ $withdraw->is_paypal_withdraw ? 'Paypal Account' : 'Stripe Account' }}</label>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" name="account"
                                                id="exampleInputEmail1"
                                                value="{{$withdraw->is_paypal_withdraw ? $withdraw->paypal_account : $withdraw->stripe_account	}}">
                                        </div>
                                    </div>
                                </div>
                                @if($withdraw->stripe_card_number)
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Card Number</label>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" name="account"
                                                id="exampleInputEmail1"
                                                value="{{$withdraw->stripe_card_number	}}">
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Withdraw</label>
                                        </div>
                                        @if($withdraw->is_approved == false)
                                            @if($withdraw->withdraw_method == PAYMENT_PAYPAL)

                                                <form role="form" method="POST" action="{{route('admin.paypal.withdraw')}}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="withdraw_id"  value="{{$withdraw->id}}">
                                                    <input type="hidden" name="amount"  value="{{$withdraw->withdrawal_amount}}">
                                                    <input type="hidden" name="account"  value="{{$withdraw->paypal_account}}">
                                                    <div class=" card-footer text-left">
                                                        <button type="submit" class="btn btn-info"><img src="{{ asset('uploaded_file/images/payment/paypal.png') }}" alt=""></button>
                                                    </div>
                                                </form>

                                                @elseif ($withdraw->withdraw_method == PAYMENT_STRIPE)

                                                    <form role="form" method="POST" action="{{route('admin.stripe.withdraw')}}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="withdraw_id"  value="{{$withdraw->id}}">
                                                    <input type="hidden" name="value"  value="{{$withdraw->withdrawal_amount}}">
                                                    <input type="hidden" name="account"  value="{{$withdraw->stripe_account}}">
                                                    <input type="hidden" name="card_number"  value="{{$withdraw->stripe_account}}">
                                                        <div class=" card-footer text-left">
                                                            <button type="submit" class="btn btn-info"><img src="{{ asset('uploaded_file/images/payment/stripe.png') }}" alt=""></button>
                                                        </div>
                                                    </form>
                                                @endif
                                        @else
                                                <p>Allready Withdraw </p>
                                        @endif
                                    </div>
                                </div>


                                </div>

                        <!-- /.card -->

                    </div>

                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </section>

@endsection



@section('post_script')

    <script>
        function showImage(src, target) {
            var fr = new FileReader();
            fr.onload = function () {
                target.src = fr.result;
            }
            fr.readAsDataURL(src.files[0]);
        }

        function putImage(src, target) {
            let imagesrc = src.getAttribute('id')
            var src = document.getElementById(imagesrc);
            var target = document.getElementById(target);
            target.style.width = '120px';
            target.style.height = '80px';
            showImage(src, target);
        }
    </script>

@endsection



