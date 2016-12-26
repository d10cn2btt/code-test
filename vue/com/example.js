/**
 * Created by d10cn on 24-Dec-16.
 */
var dataCom = {
    count: 1
};

Vue.component('simple-counter', {
    template: '<button @click="count += 1">{{count}}</button>',
    // data is technically a function, so Vue won't
    // complain, but we return the same object
    // reference for each component instance
    data: function () {
        return dataCom;
    },
});

var example = new Vue({
    el: "#example"
});

Vue.component('counter2', {
    template: '<button @click="count += 1">{{count}}</button>',
    data: function () {
        return {
            count: 1
        }
    }
});

var example2 = new Vue({
    el: "#example2"
})