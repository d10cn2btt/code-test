/**
 * Created by d10cn on 23-Dec-16.
 */
Vue.component('currency-input', {
    data: function () {
        return {
            data_currency: {
                first_name: 'btt'
            }
        }
    },
    props: {
        ttt: {
            type: Array
        }
    },
    template: "#cu-com",
    methods: {
        clickBtn: function () {
            var tmpObject = {
                label: 'label_2',
                price: 'price_2',
                shipping: 'shipping_2',
                handling: 'handling_2',
                discount: 'discount_2',
            };

            this.ttt.push(tmpObject);
        }
    }
});

Vue.component('component2', {
    props: {
        data_from_vue: {}
    },
    template: "#com2",

});

var currency = new Vue({
    el: "#currency",
    data: {
        list_data: [{
            label: 'Example Currency',
            price: 1,
            shipping: 2,
            handling: 3,
            discount: 4
        }]
    }
});

