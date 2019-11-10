<template>

    <div class="shopping-list">

        <h1>Список покупок</h1>

        <div class="controls">

            <el-button
                type="success"
                circle
                icon="el-icon-plus"
                title="Добавить покупку"
                @click="addItem"></el-button>

        </div>

        <el-table
            :data="shoppingList.data"
            ref="shoppingListTable"
            :show-header="false"
            @selection-change="handleItemCheck"
        >

            <el-table-column
                type="selection"
                width="55">
            </el-table-column>

            <el-table-column
                prop="item.name"
                label="Список"
            >
            </el-table-column>


        </el-table>

        <el-dialog
            title="Добавить покупку"
            :visible.sync="dialogAddItemVisible"
        >

            <el-autocomplete
                class="inline-input"
                v-model="addingItem"
                :fetch-suggestions="querySearch"
                placeholder="Покупка"
                @select="handleSelect"
            ></el-autocomplete>

            <el-button
                type="success"
                icon="el-icon-check"
                @click="addItemToList">Добавить</el-button>

        </el-dialog>

    </div>

</template>

<script>

    export default {
        data() {
            return {
                shoppingList: [],

                addingItem: '',
                dialogAddItemVisible: false,

                possibleItems: [],
            }
        },
        props: {

        },
        methods: {

            async refreshShoppingList() {
                axios
                    .get('/api/shopping-list/')
                    .then(response => {
                        console.log(response);
                        this.shoppingList = response.data;
                        console.log(this.shoppingList);
                    })
                    .catch(error => {
                        console.log(error);
                    });

            },

            handleItemCheck(item) {
                console.log(item);
            },

            // Добавить покупку
            addItem() {
                this.dialogAddItemVisible = true;
            },

            loadPossibleItems() {
                axios
                    .get('/api/shopping-items/')
                    .then(response => {
                        for (let i = 0; i < response.data.length; i++) {
                            this.possibleItems.push({value: response.data[i].name});
                        }
                    })
            },

            querySearch(queryString, cb) {
                var links = this.possibleItems;
                var results = queryString ? links.filter(this.createFilter(queryString)) : links;
                // call callback function to return suggestions
                cb(results);
            },

            createFilter(queryString) {
                return (link) => {
                    return (link.value.toLowerCase().indexOf(queryString.toLowerCase()) === 0);
                };
            },

            handleSelect(item) {
                console.log(item);
            },

            addItemToList() {

            },

        },
        mounted() {
            this.refreshShoppingList();
            this.loadPossibleItems();
        }
    }
</script>

<style lang="scss">

    .controls {
        margin-bottom: 20px;
    }

</style>
