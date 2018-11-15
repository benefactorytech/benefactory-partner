<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Benefactory</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="/css/paypal/index.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
    <div class="container-fluid">
      <div class="panel">
        <div class="panel-heading"><img src="/images/benefactorylogo.png" height="20px" style="margin-left: 8px;margin-top:10px;"></div>
        <div class="panel-content">
          <div class="content-holder">Total amount: <div class="content">${{ $amount }}</div></div>
          <div class="content-holder">Account: <div class="content">{{ auth()->user()->email }}</div></div>
          <div class="content-holder">Date: <div class="content">{{ date('d/m/Y') }}</div></div>
          <hr>
          <div id="paypal-button-container"></div>
          <hr>
          <a href="/admin/payment"><div class="btn panel-btn">Go back</div></a>
          <a href="/dashboard"><div class="btn panel-btn">Dashboard</div></a>
        </div>
        <div class="panel-footer">&copy; Benefactory 2018</div>
      </div>
    </div>
      




     
      <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script>
    // Render the PayPal button
    paypal.Button.render({
    // Set your environment
    env: 'sandbox', // sandbox | production

    // Specify the style of the button
    style: {
      layout: 'vertical',  // horizontal | vertical
      size:   'medium',    // medium | large | responsive
      shape:  'rect',      // pill | rect
      color:  'gold'       // gold | blue | silver | white | black
    },

    // Specify allowed and disallowed funding sources
    //
    // Options:
    // - paypal.FUNDING.CARD
    // - paypal.FUNDING.CREDIT
    // - paypal.FUNDING.ELV
    funding: {
      allowed: [
        paypal.FUNDING.CARD,
        paypal.FUNDING.CREDIT
      ],
      disallowed: []
    },

    // PayPal Client IDs - replace with your own
    // Create a PayPal app: https://developer.paypal.com/developer/applications/create
    client: {
      sandbox: 'ASzzmW5GxLzlWGvsOd0wYhAre3NVVpuXi7UqrVzkgK9uuJVQg6VsBczrN6PVZTu3ZXV67IqGZXxl5gYz',
      production: '<insert production client id>'
    },

    payment: function (data, actions) {
      return actions.payment.create({
        payment: {
          transactions: [
            {
              amount: {
                total: '{{ $amount }}',
                currency: 'USD'
              }
            }
          ]
        }
      });
    },

    onAuthorize: function (data, actions) {
      return actions.payment.execute()
        .then(function () {
          window.alert('Payment Complete!');
          console.log(data);
          var str = "/admin/payment/do/gateway/paid?amount={{ $amount }}&paymentToken=" + data['paymentToken'] + '&orderID=' + data['orderID'] + '&payerID=' + data['payerID'] + '&paymentID=' + data['paymentID'];
          window.location = str;
        });
    }
    }, '#paypal-button-container');
    </script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>