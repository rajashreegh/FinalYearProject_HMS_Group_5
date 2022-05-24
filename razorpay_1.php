<button id="rzp-button1">Pay</button>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    var options = {    
    "key": "rzp_test_mE9XDNP376RHLY", // Enter the Key ID generated from the Dashboard
    "key_secret": "fWJwX5sGmbGbyoA2DoRF9Ucq",
    "amount": "50000", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise    
    "currency": "INR",    
    "name": "Acme Corp",    
    "description": "Test Transaction",    
    "image": "https://example.com/your_logo",
    "handler": function (response){  
        console.log(response); 
        alert(response.razorpay_payment_id);          
        }
    };
    var rzp1 = new Razorpay(options);
    
    document.getElementById('rzp-button1').onclick = function(e){    
        rzp1.open();    
        e.preventDefault();
    }
</script>