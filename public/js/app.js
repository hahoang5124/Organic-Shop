$productQuantity = document.getElementById('productQuantity');
$increaseBtn = document.getElementById('increase');
$decreaseBtn = document.getElementById('decrease');
document.addEventListener('DOMContentLoaded', function() {
    console.log("ok");
fetch('http://127.0.0.1:8000/api/products')
  .then(response => response.json())
  .then(data => console.log(data))
  .catch(error => console.error('Error:', error));
});
checkQuantityProduct();
function increaseBtn(){
    $productQuantity.value = parseInt($productQuantity.value) + 1;
    checkQuantityProduct();
}
function decreaseBtn(){
    $productQuantity.value = parseInt($productQuantity.value) - 1;
    checkQuantityProduct();
}
function checkQuantityProduct(){
    if (parseInt(productQuantity.value) <=1) {
        $decreaseBtn.disabled = true;
    } else {
        $decreaseBtn.disabled = false;
    }
}
