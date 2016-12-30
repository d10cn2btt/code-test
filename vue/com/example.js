/**
 * Created by d10cn on 24-Dec-16.
 */
var dataCom = {
    count: 0
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
    template: '<button @click="incrementCount">{{count}}</button>',
    data: function () {
        return {
            count: 0
        }
    },
    methods: {
        incrementCount: function() {
            this.count += 1;
            this.$emit('eventparent');
        }
    }
});

var example2 = new Vue({
    el: "#example2",
    data: {
        total: 0,
        arg : 'button nay'
    },
    methods: {
        incrementParent: function() {
            this.total += 1;
        },
        testmethod: function () {
            this.arg = 'abc123';
        }
    },
    computed: {
        // testmethod: function () {
        //     this.arg = 'computed';
        // }
    }
})