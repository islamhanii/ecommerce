var cartTotal = [];
var price = []
var count = document.getElementById('num-of-items').innerHTML;
var priceTotal = document.getElementById('price-total');
var checkoutTotal = document.getElementById('checkout-total');

function addTotal(total) {
    priceTotal.innerHTML = total;
    checkoutTotal.innerHTML = total;
}

function calcItem(num) {
    let items = document.getElementById('items'+num).value;
    let total = price[num] * items;
    
    document.getElementById('total'+num).innerHTML = total;
    cartTotal[num] = total;

    return total;
}

function calcBill() {
    let sum = 0;
    for(let i=0; i<count; i++) {
        price[i] = document.getElementById('price'+i).innerHTML;
        sum += calcItem(i);
    }

    addTotal(sum);
}

function changeBill(num) {
    let oldPrice = cartTotal[num];
    let newPrice = calcItem(num);

    let sum = checkoutTotal.innerHTML - oldPrice + newPrice;
    addTotal(sum);
}

window.onload = calcBill();