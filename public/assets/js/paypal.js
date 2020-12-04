paypal.Buttons({
    style: {
        layout:  'horizontal',
        color:   'blue',
        shape:   'rect',
        label:   'paypal',
        height:  40,
           
    },

    createOrder: function(data, actions) {
        // This function sets up the details of the transaction, including the amount and line item details.
        return actions.order.create({
            purchase_units: [{
            amount: {
                value: $('#Amount').val()
            }
            }]
        });
    },
    onApprove: function(data, actions) {
        // This function captures the funds from the transaction.
        return actions.order.capture().then(function(details) {
          // This function shows a transaction success message to your buyer.
          alert('Transaction completed by ' + details.payer.name.given_name);
          
          // Insert the transaction History
          
          $("#transactionform").submit();

          // Send the Email 

        });
      }
}).render('#paypal-button-container');