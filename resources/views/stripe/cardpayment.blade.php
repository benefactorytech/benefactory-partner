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
    <title>Hello, world!</title>
  </head>
  <body>
    <div class="app">
        @include('include.navbar');
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