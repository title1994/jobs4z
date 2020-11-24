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
                value: '0.01'
            }
            }]
        });
    },
    onApprove: function(data, actions) {
        // This function captures the funds from the transaction.
        return actions.order.capture().then(function(details) {
          // This function shows a transaction success message to your buyer.
          alert('Transaction completed by ' + details.payer.name.given_name);
        });
      }
}).render('#paypal-button-container');



//   paypal.Button.render({
//     env: 'sandbox', // Or 'production'
//     style: {
//       size: 'large',
//       color: 'gold',
//       shape: 'pill',
//     },
//     // Set up the payment:
//     // 1. Add a payment callback
//     payment: function (data, actions) {
//       // 2. Make a request to your server
//       return actions.request.post('/api/create-paypal-transaction')
//         .then(function (res) {
//           // 3. Return res.id from the response
//           console.log(res);
//           return res.id
//         })
//     },
//     // Execute the payment:
//     // 1. Add an onAuthorize callback
//     onAuthorize: function (data, actions) {
//       // 2. Make a request to your server
//       return actions.request.post('/api/confirm-paypal-transaction', {
//         payment_id: data.paymentID,
//         payer_id: data.payerID
//       })
//         .then(function (res) {
//           console.log(res)
//           alert('Payment successfully done!!')
//           // 3. Show the buyer a confirmation message.
//         })
//     }
//   }, '#paypal-button')