/**
 * Created by d10cn on 22-Dec-16.
 */
var app = new Vue({
    el: "#app",
    data: {
        message: "Hello Btt"
    },
});

var app2 = new Vue({
    el: '#app-2',
    data: {
        timenow: 'You loaded this page on ' + new Date(),
        classSpan: "first-span"
    }
});

var app3 = new Vue({
    el: '#app-3',
    data: {
        seen: true,
    }
});

var app4 = new Vue({
    el: "#app-4",
    data: {
        todos: [
            {txt: 'monday'},
            {txt: 'tuesday'},
            {txt: 'wednesday'}
        ]
    }
});

var app5 = new Vue({
    el: "#app-5",
    data: {
        mess5: "Message example 5"
    },
    methods: {
        fcClick: function () {
            this.mess5 = this.mess5.split('').reverse().join('');
        },
        fcHover: function () {
            this.mess5 = "You just hover my button";
        }
    }
});

var app6 = new Vue({
    // el: "#app-6",
    data: {
        mess6: "message example 6"
    },
    created: function () {
        // `this` points to the vm instance
        console.log('lifecycle created')
    },
    mounted: function () {
        // `this` points to the vm instance
        console.log('lifecycle mounted')
    },
});

app6.$watch('mess6', function (newVal, oldVal) {
    console.log("newVal : " + newVal + " - oldVal : " + oldVal);
});

app6.$mount('#app-6-mount', function () {
    console.log("mount app6");
});

app6.$el('');

var app7 = new Vue({
    el: "#app-7",
    data: {
        groceryList: [
            {text: 'Vegetables'},
            {text: 'Cheese'},
            {text: 'Whatever else humans are supposed to eat'}
        ]
    }

});

