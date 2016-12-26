Vue.directive('demo', {
    bind: function (el, binding, vnode) {
        var s = JSON.stringify;
        console.log(el);
        el.innerHTML =
            'name: '       + s(binding.name) + '<br>' +
            'value: '      + s(binding.value.mess) + '<br>' +
            'expression: ' + s(binding.expression) + '<br>' +
            'argument: '   + s(binding.arg) + '<br>' +
            // An object containing modifiers, if any. For example in v-my-directive.foo.bar, the modifiers object would be { foo: true, bar: true }.
            'modifiers: '  + s(binding.modifiers) + '<br>' +
            'vnode keys: ' + Object.keys(vnode).join(', ');
        el.style.backgroundColor = "blue";
        el.style.color = binding.value.color;
    }
})
new Vue({
    el: '#hook-arguments-example',
    data: {
        messagefromparent: {
            mess: 'hello from parent',
            color: "white"
        }
    }
})