var dataCollection = {};
var data = "";

class Creator {
    stock = document.getElementById('stock');
    stockMessage = document.getElementById('stock-message');
    colorsBox = document.getElementById('size-colors');

    manageStock(stockValue = 0) {
        this.stock.value = stockValue;
        if(this.stock.value > 0) {
            this.stockMessage.innerHTML = "In stock";
            this.stock.previousElementSibling.value = 1;
        }
        else {
            this.stockMessage.innerHTML = "Out of stock";
            this.stock.previousElementSibling.value = 0;
        }
    }

    dataGenerator(color_id) {
        this.colorsBox.innerHTML = "";
        data.forEach((product) => {
            let newElement = document.createElement('a');
            newElement.style.backgroundColor = product.color.hexa;
            newElement.ariaValueNow = product.color.id;
            newElement.setAttribute('onclick', 'colorsToggle(this)');
            if(product.color.id == color_id) {
                newElement.classList.add('active');
                this.manageStock(product.stock);
            }
            newElement.appendChild(document.createElement('span'));
            this.colorsBox.appendChild(newElement);
        });
    }

    errorGenerator() {
        let newElement = document.createElement('span');
        newElement.style.color = '#f55';
        newElement.innerHTML = 'This size not longer available.';
        this.manageStock();

        this.colorsBox.innerHTML = "";
        this.colorsBox.appendChild(newElement);
    }

    run() {
        this.dataGenerator(data[0].color.id);
    }
}