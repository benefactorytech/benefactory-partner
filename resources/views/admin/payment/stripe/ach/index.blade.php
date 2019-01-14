@extends("layouts.app")

@section("head")
  <link rel="stylesheet" href="/css/stripe/index.css">
  <link rel="stylesheet" href="/css/dashboard.css">
@endsection()

@section("content")
  <div class="container">
    <div class="row">
      
      <div class="content-bar col-md-12">
        <div class="content-card">
          <div class="agreement-box">
            <p>
            By providing your Routing number, Account number and confirming this payment, you are authorizing Benefactory and Stripe, our payment service provider, to send instructions to your bank to debit your account and your bank to debit your account in accordance with those instructions. You are entitled to a refund from your bank under the terms and conditions of your agreement with your bank. A refund must be claimed within 8 weeks starting from the date on which your account was debited.
            </p>
          </div>

          <script src="https://js.stripe.com/v3/"></script>
          <form id="ach-payment-form" action="/admin/payment/do/ach/configure" method="POST">
            {{ csrf_field() }}
            
            

            <div class="form-box">
              <div class="form-section">
                <input class="form-element" name="name_payee" id="name_payee" placeholder="Name of Payee">
              </div>

              <div class="form-section">
                <input class="form-element" name="email_payee" id="email_payee" placeholder="Email">
              </div>

              <div class="form-section">
                <input class="form-element" name="mobile_payee" id="mobile_payee" placeholder="Mobile">
              </div>

              <div class="form-section">
                <input class="form-element" name="routing_number" id="routing_number" placeholder="Routing Number">
              </div>

              <div class="form-section">
                <input class="form-element" name="account_number" id="account_number" placeholder="Account Number">
              </div>

              <div class="form-section" style="font-family: 'Colfax Medium Italic'; color: #000000">
                <input type="checkbox" name="authorization_check" id="authorization_check">&nbsp&nbspI authorize Benefactory Pvt. Ltd. to electronically debit my account and, if necessary, electronically credit my account to correct erroneous debits.
              </div>

              <input class="btn btn-benefactory" type="submit" value="Proceed">
              <input class="btn btn-benefactory" type="clear" value="Clear">
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>

  <script src="/js/stripe/stripe.js"></script>
@endsection