<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="/css/app_layout.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/dashboard.css">
    <link rel="stylesheet" href="/css/stripe.css">
    <title>Benefactory - Pay</title>
  </head>
  <body>
    <div class="app">
        @include('include.navbar');
        <div class="container">
            <div class="row">
                @include("include.partnerDetails")

                <div class="col-md-10 dashboard-body">
                    <script src="https://js.stripe.com/v3/"></script>

                    <form action="/stripe/charge" method="post" id="payment-form">
                        {{ csrf_field() }}
                        <div class="form-row">
                            <label for="card-element">
                            Credit or debit card
                            </label>
                            <div id="card-element">
                            <!-- A Stripe Element will be inserted here. -->
                            </div>

                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
                        </div>

                        <button>Submit Payment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/stripeToken.js"></script>
  </body>
</html>