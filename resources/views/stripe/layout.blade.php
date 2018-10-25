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
    <title>Payment</title>
  </head>
  <body>
    <div class="app">
        include("include.navbar")
        yield("content")
    </div>

    <script src="/js/stripeToken.js"></script>
  </body>
</html>