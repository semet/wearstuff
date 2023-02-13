function addToCart(product) {
    var amount = document.getElementById("productQuantity").value;
    var a = route("cart.add", [product, amount]);

    location.href = a;
}
