/**
 * Created by d10cn on 23-Dec-16.
 */
var todo = new Vue({
    el: "#todo-list-example",
    data: {
        txtNew: "",
        listTodo: [
            'wake up',
            'clean your face',
            'have breakfast'
        ]
    },
    methods: {
        addNewTodo: function () {
            this.listTodo.push(this.txtNew);
            this.txtNew = '';
        },
    },
});