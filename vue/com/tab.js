/**
 * Created by d10cn on 27-Dec-16.
 */
Vue.component('tabs', {
    template: `
    <div>
        <ul class="nav nav-tabs" id="myTabs">
            <li v-for="tab in tabschildren" :class="{'active' : tab.isActive}">
                <a :href="tab.setHref" @click="selectTab(tab)">{{tab.name}}</a>            
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <slot></slot>
        </div>
    </div>
    `,
    data: function () {
        return {
            tabschildren: []
        }
    },
    created: function () {
        this.tabschildren = this.$children;
    },
    methods: {
        selectTab: function (tabClick) {
            this.tabschildren.forEach(tab => {
                // không dùng được tab.selected vì selected không phải là props của tab, nên phải chuyển về data và mounted của component
                // tab.selected = (tab.name == tabClick.name);
                tab.isActive = (tab.name == tabClick.name);
            });
        }
    }
});

Vue.component('tab', {
    props: {
        'name': String,
        'selected': {
            default: false
        }
    },
    template: `
        <div v-show="isActive"><slot></slot></div>
   `,
    data: function () {
        return {
            isActive: this.selected
        }
    },
    mounted: function () {
        this.isActive = this.selected;
    },
    computed: {
        setHref: function() {
            return '#' + this.name.toLowerCase().replace('/ /g', '-');
        }
    }
});

var appTab = new Vue({
    el: '#app-tab'
});