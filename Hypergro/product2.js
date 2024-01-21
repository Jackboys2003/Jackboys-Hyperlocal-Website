
function initMap() {
    
    var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 37.7749, lng: -122.4194}, 
        zoom: 12
    });

    
}

document.getElementById('addToCartBtn').addEventListener('click', function() {
    var quantity = document.getElementById('quantity').value;
    window.location.href = 'cart.html?quantity=' + quantity;
});

document.getElementById('toggle').addEventListener('change', function() {
    alert("Toggle feature is " + (this.checked ? "enabled" : "disabled"));
});
