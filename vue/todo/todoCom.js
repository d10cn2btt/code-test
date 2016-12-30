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
            console.log('removeTodo');
            this.todos.splice(index, 1);
        },
        reverseTxt: function () {
            console.log('reverseTxt');
            return this.txtCom.split('').reverse().join('');
        },
        testMethod: function() {
            console.log('testMethod');
            return 'btt123';
        }
    },
    computed: {
        computedReverseTxt: function () {
            console.log('computedReverseTxt');
            return this.txtCom.split('').reverse().join('');
        },
        testComputed: function() {
            console.log('testComputed');
            return 'testComputed';
        }
    }

});

Vue.component('com-txt', {
    // template must have a tag html
    template: '<p>this is a component. It\'s a text</p>'
});