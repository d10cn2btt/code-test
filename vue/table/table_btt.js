/**
 * Created by truongbt on 29/12/2016.
 */
Vue.component('table-btt', {
    props: ['columns', 'content', 'filterKey'],
    data: function () {
        let sortType = {}
        this.columns.forEach(function (key) {
            sortType[key] = 1
        });
        return {
            sortKey: '',
            sortType: sortType
        }
    },
    template: '#table-template',
    // when content in props was change, which function use param was changed, will be called
    computed: {
        // this function will be called when change filter
        filterData: function () {
            let content = this.content;
            let filterKey = this.filterKey.toLowerCase();
            let sortKey = this.sortKey;
            let sortType = this.sortType[sortKey] || 1;
            let columns = this.columns;

            if (filterKey != "") {
                content = _.filter(content, function (row) {
                    let result = _.filter(columns, function (cl) {
                        if (String(row[cl]).toLowerCase().indexOf(filterKey) > -1) {
                            return true;
                        }
                    });

                    if (result != "") {
                        return true;
                    }
                    
                    // if (String(row.name).toLowerCase().indexOf(filterKey) > -1 || String(row.power).toLowerCase().indexOf(filterKey) > -1) {
                    //     return true;
                    // }
                })
            }

            if (sortKey) {
                console.log(sortKey);
                content = _.sortBy(content, sortKey);

                if (sortType == -1) {
                    content = content.reverse();
                }
            }

            return content;
        },

        // this function will be called when change column
        testcomuted: function() {
            console.log('testcomuted');
            return this.columnta;
        }
    },
    methods: {
        sortBy: function (key) {
            this.sortKey = key
            this.sortType[key] = this.sortType[key] * -1;
        }
    }
});

let table = new Vue({
    el: "#table_btt",
    data: {
        keysearch: "",
        tableColumn: ["name", "power"],
        tableContent: [
            {name: 'Chuck Norris', power: Infinity},
            {name: 'Jet Li', power: 8000},
            {name: 'Bruce Lee', power: 9000},
            {name: 'Jackie Chan', power: 7000}
        ]
    }
});


