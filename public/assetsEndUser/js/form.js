var sizeInput = document.getElementById('form-size-id');
var colorInput = document.getElementById('form-color-id');
var quantityInput = document.getElementById('form-quantity');
var form = document.getElementById('product-form');

function submitForm(button) {
    let link = button.ariaValueNow;
    form.setAttribute('action', link);
    sizeInput.value = getId('product-sizes');
    colorInput.value = getId('size-colors');
    quantityInput.value = document.getElementById('value').value;

    form.submit();
}