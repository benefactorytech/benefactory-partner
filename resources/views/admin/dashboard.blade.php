@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="/css/dashboard.css">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        @include("include.partnerDetails")

        <div class="col-xs-12 col-sm-3 col-md-3 dashboard-tab">
            <div class="tab-title">
                <h3 class="title text-center">Integration</h3>
            </div>

            <div class="tab-image">
                <img class="center" src="/images/dashboard/integrate.png">
            </div>

            <p class="tab-description">
            Manual on how to integrate with our APIs.<br><br>
            Detailed description and pre-defined code that you can use directly on your website.<br><br>
            Click below to know more.
            </p>
            <a href="/admin/integrations">
                <button class="btn btn-custom-orange">Integrate</button>
            </a>
        </div>

        <div class="col-xs-12 col-sm-3 col-md-3 dashboard-tab">
            <div class="tab-title">
                <h3 class="title text-center">Customer<br>Transaction<br>Log</h3>
            </div>

            <div class="tab-image">
                <img class="center" src="/images/dashboard/log.png">
            </div>

            <p class="tab-description">
                Customers who donated through your website.<br><br>
                Tabular format. Payments are calculated on accumulated amount.<br><br>
                Export available as PDF, Excel sheet.
            </p>
            <a href="/admin/customertransactionlog">
                <button class="btn btn-custom-orange">CT Log</button>
            </a>
        </div>

        <div class="col-xs-12 col-sm-3 col-md-3 dashboard-tab">
            <div class="tab-title">
                <h3 class="title text-center">Payment<br>and<br>History</h3>
            </div>

            <div class="tab-image" id="payment-tab-image">
                <img class="center" src="/images/dashboard/payment.png">
            </div>

            <p class="tab-description">
                Total month-wise donation.<br><br>
                Payable amount is accumulation of transactions.<br><br>
                History of previous payments
            </p>
            <a href="/admin/payment">
                <button class="btn btn-custom-orange">Pay</button>
            </a>
            <br>
            <a href="">
                <button class="btn btn-custom-orange">Payment History</button>
            </a>
        </div>
    </div>
</div>
@endsection
