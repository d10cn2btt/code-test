/**
 * Created by d10cn on 23-Dec-16.
 */
var exComputed = new Vue({
    el: "#ex-computed",
    data: {
        mess1: "hello btt"
    },
    computed: {
        reverseTxt: function () {
            return this.mess1.split('').reverse().join('');
        }
    }
});

var exCondition = new Vue({
    el: "#ex-condition",
    data: {
        conIf: false,
        conShow: false
    }
});