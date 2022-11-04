var productId = document.getElementById('product_id').value;
var loaderObj = new Loader();

function eventer(url = "", size_id) {
    if(url !== "") {
        loaderObj.dataLoader(url, size_id);
    }
}

function getId(id) {
    let items = document.getElementById(id);
    let item = items.getElementsByClassName('active')[0];
    if(item !== undefined) {
        let itemId = item.getAttribute('aria-valuenow');
        return itemId;
    }

    return null;
}

function getSizeColors(sizeId = null) {
    if(sizeId === null) {
        sizeId = getId('product-sizes');
    }

    if(sizeId === null) {
        new Creator().manageStock();
    }
    else {
        eventer("http://127.0.0.1:8000/api/products/" + productId + "/sizes/" + sizeId + "/product-details/", sizeId);
    }
}

/********************************************* Toggles *************************************************/
function sizesToggle(size) {
    if(!size.classList.contains('active')) {
        let size_id = size.ariaValueNow;
        let sizes = size.parentElement.parentElement.children;
        for(let i=0; i<sizes.length; i++) {
            let element = sizes[i].firstElementChild;
            if(element.ariaValueNow === size_id) {
                element.classList.add('active');
            }
            else {
                element.classList.remove('active');
            }
        };
        getSizeColors(size_id);
    }
}

function colorsToggle(color) {
    if(!color.classList.contains('active')) {
        let color_id = color.ariaValueNow;
        let colors = color.parentElement.children;
        for(let i=0; i<colors.length; i++) {
            if(colors[i].ariaValueNow === color_id) {
                colors[i].classList.add('active');
            }
            else {
                colors[i].classList.remove('active');
            }
        };
        new Creator().dataGenerator(color_id);
    }
}

window.onload = getSizeColors();