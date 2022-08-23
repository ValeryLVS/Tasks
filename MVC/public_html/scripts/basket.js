let basketModal = document.querySelector('.basket');
let closeButton = document.querySelector('.closeButtonBasket');
let basketBtns = document.querySelectorAll('.toBasketBtn');
//берем все кнопки "В корзину" и слушаем клики по ним
basketBtns.forEach(function (btn) {
    btn.addEventListener('click', function (event) {
        let id = event.srcElement.dataset.id;
        let price = event.srcElement.dataset.price;
        let name = event.srcElement.dataset.name;
        basket.addProduct({ id: id, price: price, name: name })
        basketModal.classList.remove('hidden');
    })

});

let basket = {
    products: {},
    /**
     * Метод добавляет продукт в корзину.
     * @param {{ id: string, price: string, name: string }} product
     */

    addProduct(product) {
        this.addProductToObject(product);
        //this.renderProductInBasket(product);
        this.renderTotalSum();
        this.addRemoveBtnsListeners();
    },


    /**
     * Обработчик события клика по кнопке удаления товара.
     * @param {MouseEvent} event
     */
    removeProductListener(event) {
        //console.log(this); this будет указывать на кнопку, а не на объект basket
        //здесь мы используем basket вместо this, потому что контекст вызова не имеет
        //этих методов и нам надо явно обратиться к нашему объекту корзины
        basket.removeProduct(event);
        basket.renderTotalSum();
    },

    /**
     * Добавляем слушателей события клика по кнопкам удалить.
     */
    addRemoveBtnsListeners() {
        let btns = document.querySelectorAll('.productRemoveBtn');
        for (let i = 0; i < btns.length; i++) {
            //важно указать именно this.removeProductListener, чтобы это была одна и та же
            //функция, а не несколько одинаковых.
            btns[i].addEventListener('click', this.removeProductListener);
        }
    },

    /**
     * Метод отображает общую сумму заказа в корзине.
     */
    renderTotalSum() {
        document.querySelector('.total').textContent = this.getTotalSum();
    },

    /**
     * Метод добавляет продукт в объект с продуктами.
     * @param {{ id: string, price: string, name: string }} product
     */
    addProductToObject(product) {
        if (this.products[product.id] == undefined) {
            this.products[product.id] = {
                price: product.price,
                name: product.name,
                count: 1
            }
        } else {
            this.products[product.id].count++;

        }
    },

    /**
     * Метод отрисовывает продукт в корзине, если там такой уже есть просто
     * увеличивает счетчик на 1.
     * @param {{ id: string, price: string, name: string }} product
     * @returns
     */
    // renderProductInBasket(product) {
    //     let productExist = document.querySelector(`.productCount[data-id="${product.id}"]`);
    //
    //     if (productExist) {
    //         productExist.textContent++;
    //         return;
    //     }
    //     let productRow = `
    //                         <ul class="basket__ul blockBaskets">
    //                             <li class="basket__listBasket"><p class="fonts fonts__about fonts__about_main">${product.name}</p></li>
    //                             <li class="basket__listBasket"><p class="fonts fonts__about fonts__about_main"><span class="spanBlue">${product.price} руб.</span></p></li>
    //                             <li class="basket__listBasket productCount" data-id="${product.id}"><p class="fonts fonts__about fonts__about_main">1</p></li>
    //                             <li>
    //                                 <button
    //                                     type="button"
    //                                     class="deleteBasket listBasket productRemoveBtn"
    //                                     data-id="${product.id}">Удалить
    //                                 </button>
    //                             </li>
    //                         </ul>
    //     `;
    //     let tbody = document.querySelector('.serviceNext');
    //     tbody.insertAdjacentHTML("beforeend", productRow);
    // },

    /**
     * Метод считает стоимость всех продуктов в корзине.
     * @returns {number}
     */
    getTotalSum() {
        let sum = 0;
        for (let key in this.products) {
            sum += this.products[key].price * this.products[key].count;
        }
        return sum;
    },

    getTotalSumCount() {
        let sumCount = 0;
        for (let key in this.products) {
            sumCount += this.products[key].count;
        }
        return sumCount;
    },

    /**
     * Метод удаляет продукт из объекта продуктов, а также из корзины на странице.
     * @param {MouseEvent} event
     */
    removeProduct(event) {
        let id = event.srcElement.dataset.id;
        this.removeProductFromObject(id);
        this.removeProductFromBasket(id);
    },

    /**
     * Метод удаляет товар из корзины. Если количество больше 1, то просто уменьшает его.
     * @param {string} id
     */
    removeProductFromBasket(id) {
        let countTd = document.querySelector(`.productCount[data-id="${id}"]`);
        let count = this.getTotalSumCount();
        if (count == 0) {
            basketModal.classList.add('hidden');
        }
        if (countTd.textContent == 1) {
            countTd.parentNode.remove();
        } else {
            countTd.textContent--;
        }
    },

    /**
     * Метод удаляет продукт из объекта с продуктами.
     * @param {string} id
     */
    removeProductFromObject(id) {
        if (this.products[id].count == 1) {
            delete this.products[id];
        } else {
            this.products[id].count--;
        }
    }
}

closeButton.addEventListener('click', function (event) {
    arr = document.querySelectorAll('.blockBaskets')

    arr.forEach(function (item) {
        document.querySelector('.blockBaskets').remove()
    });

    basket.products = {}

    basketModal.classList.add('hidden');
});