/**
 * Created by d10cn on 23-Dec-16.
 */
Vue.component('todo-com', {
    template: "#template-com",
    props: ['todos'],
    // in component, data must be a function and return an object
    data: function () {
        return {
            txtCom: "text in component"
        }
    },
    methods: {
        removeTodo: function (index) {
            this.todos.splice(index, 1);
        },
        reverseTxt: function () {
            return this.txtCom.split('').reverse().join('');
        }
    },
    computed: {
        computedReverseTxt: function () {
            return this.txtCom.split('').reverse().join('');
        }
    }

});

Vue.component('com-txt', {
    // template must have a tag html
    template: '<p>this is a component. It\'s a text</p>'
});