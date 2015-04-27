<?php
/*  if ($submission) {
      $email = Input::get('email');
      $amount = Input::get('amount');
      $description = Input::get('description');
  } else */{
      $email = '';
      $amount = '';
      $description = '';
	  $submission = '';
	  $message = '';
  }
?>

<section class="payment">
  <h1>Make A Payment</h1>

  @if(!$submission || $message != '')
          <form action="" method="post" id="paymentForm">
      @unless($message == '')
              <h1 class="error">{{ $messageTitle }}</h1>
              <p class="error">{{ $message }}</p>
      @endunless
              <label for="email">Email: </label>
              <input type="email" name="email" id="email" required="required" value="{{$email}}"/>
              <label for="amount">Amount: </label>
              <input type="number" name="amount" id="amount" min="0" step=".01" required="required" value="{{$amount}}" />
              <label for="description">Description: </label>
              <input type="text" name="description" id="description" required="required" value="{{$description}}" />
              <label>&nbsp;</label>
              <button id="submitPayment">Pay with Card</button>
          </form>
  @else
          <h2 style="text-align: center;">Your payment of ${{$amount}} was successful!</h2>
  @endif
</section>


<script type="javascript">
	
function validateEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }
    $(document).ready(function() {
        $('#submitPayment').click(function(e){
            e.preventDefault();
            var email = $("#email").val();
            var amount = $("#amount").val()*100;
            var desc = $("#description").val();

            if(email != '' && validateEmail(email)) {
                if($("#email").hasClass('error')) {
                    $("#email").removeClass('error');
                }
                if(amount != '' && amount > 0) {
                    if($("#amount").hasClass('error')) {
                        $("#amount").removeClass('error');
                    }
                    if(desc != '') {
                        if($("#description").hasClass('error')) {
                            $("#description").removeClass('error');
                        }
                        var token = function(res){
                            var $input = $('<input type=hidden name=stripeToken />').val(res.id);
                            $('#paymentForm').append($input).submit();
                        };
                        StripeCheckout.open({
                            key: "@stripeKey",
                            address: false,
                            amount: amount,
                            name: 'David Myers',
                            email: email,
                            description: desc,
                            panelLabel: 'Make Payment',
                            token: token,
                            image: 'img/avatar.png'
                        });
                        return false;
                    } else {
                        if(!$("#description").hasClass('error')) {
                            $("#description").addClass('error');
                        }
                        alert('You must enter a valid payment description.');
                    }
                } else {
                    if(!$("#amount").hasClass('error')) {
                        $("#amount").addClass('error');
                    }
                    alert('You must enter a valid payment amount.');
                }
            } else {
                if(!$("#email").hasClass('error')) {
                    $("#email").addClass('error');
                }
                alert('You must enter a valid email address.');
            }
        });
    });
</script>