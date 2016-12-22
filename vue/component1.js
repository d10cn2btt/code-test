/**
 * Created by d10cn on 22-Dec-16.
 */
Vue.component('todo-item', {
    // The todo-item component now accepts a
    // "prop", which is like a custom attribute.
    // This prop is called todo.
    props: ['todo'],
    template: '<li>{{ todo.text }}</li>'
});


Vue.component('com-txt', {
    // template must have a tag html
    template: '<p>this is a component. It\'s a text</p>'
});