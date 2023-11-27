@extends('UserViews/Layout.layout')
@section('title','Khas Wallet ')
@section('style')
@endsection
@section('content')
<section class="checkout-wrapper section col-12 pt-4 pb-4 ">
   <div class="container">
      <div class="row justify-content-center ">
        @include('UserViews/Profile/Components/sidebar')

          <div class="my-4 col-md-9">

              <div class="col-12 shadow p-4 rounded-3 mb-4 d-flex justify-content-between">
                  <div><h2>Balance: RS {{number_format($authUser->balance)}}</h2></div>
                  <div>
              <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#withdrawModal"id="withdrawBtn">Withdraw</button>
              <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#depositModal">
                Deposit
              </button>                  </div>
              </div>
<h3 class="my-4">Payment History</h3>
<table class="table table-striped  rounded-4 p-4 bg-white">
    <tr>
        <th>Txn ID</th>
        <th>Amount</th>
        <th>Type</th>
        <th>Status</th>
        <th>Date</th>
    </tr>
    @forelse ($transactions as $transaction)
    <tr>
        <td>{{ $transaction->transaction_id }}</td>
        <td>{{ number_format($transaction->amount) }}</td>
        <td>{{ $transaction->transaction_type }}</td>
        <td class="{{ $transaction->status=="failed" || $transaction->status=="pending" || $transaction->status=="rejected" ? "text-danger":"text-success"}}">{{ $transaction->status }}</td>
        <td>{{ $transaction->created_at->format('d/m/Y') }}</td>

    </tr>
    @empty
    <tr class="text-muted text-center w-100"><td colspan="5">No Transctions Available</td></tr>
@endforelse

</table>
</div>
      </div>
   </div>
</section>


<!-- Deposit Modal -->
<!-- Deposit Modal -->
<div class="modal fade" id="depositModal" tabindex="-1" aria-labelledby="depositModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="depositModalLabel">Deposit Money</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/deposit" method="post" id="payment-form">
            @csrf
            <div class="mb-3">
              <label for="amount" class="form-label">Amount</label>
              <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter amount" required>
            </div>

            <div id="card-element">
              <!-- Stripe Elements will insert the card fields here -->
            </div>
            <div id="card-errors" role="alert"></div>
            <button class="btn btn-primary mt-3">Submit Payment</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>

<!-- Modal -->
<div class="modal fade" id="withdrawModal" tabindex="-1" aria-labelledby="withdrawModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="withdrawModalLabel">Withdraw Funds</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('wallet.withdraw') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="amount" class="form-label">Amount</label>
              <input type="number" class="form-control" id="amount" name="amount" required>
            </div>
            <div class="mb-3">
                @if(count($authUser->payMethod)>0)
                <label for="amount" class="form-label">Withdraw Method</label>
                @endif
                @forelse($authUser->payMethod as $payMethod)
                  <div class="form-check">
                    <input required class="form-check-input" type="radio" name="withdrawMethod" id="withdrawMethod_{{$payMethod->id}}" value="{{$payMethod->id}}">
                    <label class="form-check-label" for="withdrawMethod_{{$payMethod->id}}">
                      {{$payMethod->bank_name ."(".$payMethod->account_number.")"}}
                    </label>
                  </div>
                  @empty
                  <span>You have not added any bank account in your account yet. First add bank account from <a href="{{route('profile_settings.show')}}">settings</a> to withdraw the amount.</span>
                @endforelse
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              @if(count($authUser->payMethod)>0)

              <button type="submit" class="btn btn-primary">Submit</button>
              @endif
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


@endsection
@section('script')
<script src="https://js.stripe.com/v3/"></script>
<script>
    // Create a Stripe client.
    var stripe = Stripe('{{env("STRIPE_KEY")}}');
    const elements = stripe.elements();
    // Custom styling can be passed to options when creating an Element.

    const style = {
    base: {
    fontSize: '16px',
    fontSmoothing: 'antialiased',
    color: '#495057',
    '::placeholder': {
      color: '#6c757d',
    },
    lineHeight: '1.5',
    },
    invalid: {
    color: '#dc3545',
    iconColor: '#dc3545',
    },
    };


    // Create an instance of the card Element.
    const card = elements.create('card', {style});

    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');

    // Create a token or display an error when the form is submitted.
    const form = document.getElementById('payment-form');
    form.addEventListener('submit', async (event) => {
    event.preventDefault();

    const {token, error} = await stripe.createToken(card);

    if (error) {
    // Inform the customer that there was an error.
    const errorElement = document.getElementById('card-errors');
    errorElement.textContent = error.message;
    } else {
    // Send the token to your server.
    stripeTokenHandler(token);
    }
    });

    const stripeTokenHandler = (token) => {
    // Insert the token ID into the form so it gets submitted to the server
    const form = document.getElementById('payment-form');
    const hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);

    // Submit the form
    form.submit();
    }
 </script>
@endsection