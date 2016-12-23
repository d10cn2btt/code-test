/**
 * Created by d10cn on 23-Dec-16.
 */
Vue.component('currency-input', {
    props: {
        ttt: {
            type: String
        }
    },
    template: "#cu-com"
});

var currency = new Vue({
    el: "#currency",
    data: {
        label: 'Example Currency',
        price: 0,
        shipping: 0,
        handling: 0,
        discount: 0
    }
});

