@extends('site.app')
@section('title', 'Checkout')
@section('content')
    <section class="section-content bg padding-y">
  <div class="container mt-4">
  @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}        
            </div>
                @endif
  </div>
        <div class="container" style="padding-top: 50px;">
            <div class="row">
                <div class="col-sm-12">
                    @if (Session::has('error'))
                        <p class="alert alert-danger">{{ Session::get('error') }}</p>
                    @endif
                </div>
 
            </div>
            <form action="{{ route('site.checkouts.store')}}" method="POST" role="form" id="payment-form">
                @csrf
               
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <header class="card-header">
                                <h4 class="card-title mt-2">Billing Details bo</h4>
                            </header>
                            <article class="card-body">

                                <div class="form-row">
                                    <div class="col form-group">
                                        <label>First name</label>
                                        <input type="text" class="form-control" value="{{ auth()->user()->first_name }}" name="first_name" id="first_name" >
                                    </div>
                                    <div class="col form-group">
                                        <label>Last name</label>
                                        <input type="text" class="form-control" value="{{ auth()->user()->last_name}}" name="last_name" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" value="{{ auth()->user()->address }}" name="address" >
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>City</label>
                                        <input type="text" class="form-control" value="{{ auth()->user()->city }}" name="city" >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Country</label>
                                        <input type="text" class="form-control" value="{{ auth()->user()->country }}" name="country" >
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group  col-md-6">
                                        <label>Post Code</label>
                                        <input type="text" class="form-control" name="post_code" required="">
                                    </div>
                                    <div class="form-group  col-md-6">
                                        <label>Phone Number</label>
                                        <input type="text" class="form-control" name="phone_number" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}" disabled>
                                    <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                                </div>
                                <div class="form-group">
                                    <label>Order Notes</label>
                                    <textarea class="form-control" name="notes" rows="6"></textarea>
                                </div>

                                <div class="form-group">
                                <label for="card-element">
                                   Carte bancaire
                                </label>
                                <div id="card-element">
                                  <!-- A Stripe Element will be inserted here. -->
                                </div>

                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                              </div>
                            
                                
                            </article>
                        </div>
                    </div>
                    
                    <aside class="col-sm-3">

                      <p class="alert alert-success">Add USD 5.00 of eligible items to your order to qualify for FREE Shipping. </p>

                      <dl class="dlist-align h6">
                          <dt>SubTotal:</dt>
                          <dd class="text-right"><strong>{{ Cart::subtotal() }} €</strong></dd>
                      </dl>
                      <hr>

                      <dl class="dlist-align h6">
                          <dt>TVA:</dt>
                          <dd class="text-right"><strong>{{ Cart::tax() }} €</strong></dd>
                      </dl>

                      <hr>
                      <dl class="dlist-align h6">
                          <dt>Total:</dt>
                          <dd class="text-right"><strong>{{ Cart::total() }} €</strong></dd>
                      </dl>
                      
                      <figure class="itemside mb-3">
                            
                          <aside class="aside"><img src="{{ asset('frontend/images/icons/pay-visa.png') }}"></aside>
                          <div class="text-wrap small text-muted">
                              Pay 84.78 AED ( Save 14.97 AED ) By using ADCB Cards
                          </div>
                      </figure>
                      <figure class="itemside mb-3">
                          <aside class="aside"> <img src="{{ asset('frontend/images/icons/pay-mastercard.png') }}"> </aside>
                          <div class="text-wrap small text-muted">
                              Pay by MasterCard and Save 40%.
                              <br> Lorem ipsum dolor
                          </div>
                      </figure>
                      <button type="submit" class="btn btn-success btn-lg btn-block">Checkout</button>
                      </aside>
                  
                </div>
            </form>
        </div>
    </section>
@endsection

@section('js')

  <script src="https://js.stripe.com/v3/"></script>
 
<script>
    (function(){
        // Create a Stripe client.
var stripe = Stripe('pk_test_B221brafzN6MMhwb9yB4SHNg');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {
  style: style,
  hidePostalCode: true
});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  var options = {
    name: document.getElementById('first_name').value,
  }

  stripe.createToken(card, options).then(function(result) {
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

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
    })();
</script>

@endsection

