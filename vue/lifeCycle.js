/**
 * Created by d10cn on 22-Dec-16.
 */
var lc = new Vue({
    // el: "#lc",
    data: {
        message: "message example lifecycle"
    },
    // we can access this attribute by : lc.$options.btt
    btt: "nothing btt",
    // Component template should contain exactly one root element:
    // template: "<p>This is a template</p>",
    created: function () {
        // `this` points to the vm instance
        console.log('lifecycle created')
    },
    mounted: function () {
        // `this` points to the vm instance
        console.log('lifecycle mounted')
    },
    updated: function () {
        console.log('UPDATED');
    },
    beforeUpdate: function() {
        console.log('BEFORE UDPATE');
    },
    methods: {
        fcClick: function () {
            this.message = this.message.split('').reverse().join('');
        },
    }
});

lc.$watch('message', function (newVal, oldVal) {
    console.log("newVal : " + newVal + " - oldVal : " + oldVal);
});

lc.$mount('.lc-mount', function () {
    console.log("mount app6");
});