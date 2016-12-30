/**
 * Created by truongbt on 29/12/2016.
 */
Vue.component('table-btt', {
    props: ['columns', 'content', 'filterKey'],
    data: function () {
        let tmpType = {};
        this.columns.forEach(function (key) {
            tmpType[key] = 1
        });
        return {
            sortKey: '',
            sortType: tmpType,
            testcontent: this.content,
            querySearch: this.filterKey
        }
    },
    template: '#table-template',
    // when content in props was change, which function use param was changed, will be called
    computed: {
        // this function will be called when change filter
        filterData: function () {
            console.log('filterdata');
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
                })
            }

            if (sortKey) {
                content = _.sortBy(content, sortKey);

                if (sortType == -1) {
                    content = content.reverse();
                }
            }
            return content;
        },

        // this function will be called when change column
        testcomuted: function () {
            console.log('testcomuted');
            return this.content;
        }
    },
    methods: {
        sortBy: function (key) {
            this.sortKey = key;
            this.sortType[key] = this.sortType[key] * -1;
        },
        settypeorder: function (column) {
            if (this.sortType[column] == 1) {
                return 'asc';
            } else {
                return 'desc';
            }
            // console.log(column + " : " + this.sortKey + " : " + this.sortType);
        },
        removeItem: function (item) {
            this.filterData.splice(item, 1);
        },
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
        ],
        itemContent: {
            name: '',
            power: ''
        },
        newname: '',
        newpower: '',
    },
    methods: {
        addNewItem: function () {
            var newItem = {name: this.newname, power: this.newpower};
            // can not use object, because it will be two-way binding
            // var newItem = this.itemContent;
            this.tableContent.push(newItem);
        }
    }
});

