var stripe = Stripe('pk_test_G4gdUEHX6RMp3OYkMW0a0QzY');

var form = document.getElementById('ach-payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();
  stripe.createToken('bank_account', {
    country: 'US',
    currency: 'usd',
    routing_number: '110000000',
    account_number: '000123456789',
    account_holder_name: 'Jenny Rosen',
    account_holder_type: 'individual',
  }).then(function(result) {
    // Handle result.error or result.token
    if (result.error) {
        // Inform the user if there was an error.
        var errorElement = document.getElementById('card-errors');
        errorElement.textContent = result.error.message;
    } else {
        // Send the token to your server.
        stripeTokenHandler(result.token);
    }
  });
});

function stripeTokenHandler(token) {
    // Insert the token ID into the form so it gets submitted to the server
    var form = document.getElementById('ach-payment-form');
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);
  
    // Submit the form
    form.submit();
}