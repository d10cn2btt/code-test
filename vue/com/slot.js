/**
 * Created by d10cn on 26-Dec-16.
 */
Vue.component('com-slot', {
    props: ['txtslot'],
    template: "#com-slot"
});

var slot = new Vue({
    el: "#parent"
})