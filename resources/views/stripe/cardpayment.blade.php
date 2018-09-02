@extends('designs.app')

@section('head')
    <link rel="stylesheet" href="/css/stripe.css">
    <link rel="stylesheet" href="/css/dashboard.css">

    <style>
        .dashboard-body{
            padding: 20px;
            background-color: #e0e7e2;
        }
    </style>
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-2 dashboard-list">

            <div class="partner-logo">
                <img id="partner-logo" class="img-responsive" src="https://www.benefactory.in<?php echo $logo;?>">
            </div>

            <div class="partner-info">
                <p id="partner-name"><b><?php echo $name; ?></b></p>
                <hr class="info-break">
                Contact Person: <p id="partner-contact-person"><b><?php echo $contact_person; ?></b></p>
                Email: <p id="partner-contact-email"><b><?php echo $contact_email; ?></b></p>
                Website: <p id="partner-website"><b><a href="<?php echo $website; ?>"><?php echo $website; ?></a></b></p>
            </div>
        </div>

        <div class="col-md-10 dashboard-body">
            <script src="https://js.stripe.com/v3/"></script>

            <div class="form-container">
            
                <form action="/stripe/charge" method="post" id="payment-form">
                    {{ csrf_field() }}
                    
                    <div class="">
                        <div class="card">
                            <label for="first_name">First Name&nbsp&nbsp</label>
                            <input id="first_name" name="first_name">
                        </div>
                        &nbsp&nbsp&nbsp&nbsp&nbsp
                        <div class="card">
                            <label for="last_name">Last Name&nbsp&nbsp</label>
                            <input id="last_name" name="last_name">    
                        </div>
                        <br><br>
                        <div class="card">
                            <label for="mobile">Mobile&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                            <input id="mobile" name="mobile">    
                        </div>
                        &nbsp&nbsp&nbsp&nbsp&nbsp
                        <div class="card">
                            <label for="email">Email&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                            <input id="email" name="email">    
                        </div>
                    </div>

                    <hr>

                    <div class="form-row">
                        <div class="card">
                            <label for="amount">
                                Amount&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            </label>
                            <input type="text" id="amount" name="amount">
                        </div>
                        <br><br>

                        <label for="card-element">
                        Credit or debit card
                        </label>
                        <div id="card-element">
                        <!-- A Stripe Element will be inserted here. -->
                        </div>

                        <!-- Used to display form errors. -->
                        <div id="card-errors" role="alert"></div>
                    </div>
                    <hr>
                    <button>Submit Payment</button>
                </form>

            </div>
        </div>
    </div>
</div>

<script src="https://checkout.stripe.com/checkout.js"></script>
<script src="/js/stripe.js"></script>
@endsection
