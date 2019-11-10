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
            v-loading="isLoading"
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

            <el-container direction="vertical">

                <el-autocomplete
                    class="inline-input"
                    v-model="selectedItemStr"
                    :fetch-suggestions="querySearch"
                    placeholder="Покупка"
                    @select="handleSelect"
                ></el-autocomplete>

                <el-button
                    type="success"
                    icon="el-icon-check"
                    @click="addItemToList"
                    v-if="selectedItemStr"
                >Добавить</el-button>

                <el-button
                    type="danger"
                    icon="el-icon-close"
                    @click="closeAddingItem"
                >Закрыть</el-button>

            </el-container>

        </el-dialog>

        <el-dialog :visible.sync="dialogAddCategoryToNewItem" title="Новый товар? Выбери категорию:">

            <el-table>



            </el-table>

        </el-dialog>

    </div>

</template>

<script>

    export default {
        data() {
            return {
                isLoading: false,
                shoppingList: [],

                selectedItemStr: '',
                addingItem: null,
                dialogAddItemVisible: false,

                possibleItems: [],

                dialogAddCategoryToNewItem: false,
                availableShoppingGroup: [],
            }
        },
        props: {

        },
        methods: {

            // Загружает текущий списко покупок
            async refreshShoppingList() {
                this.isLoading = true;
                this.shoppingList = [];
                axios
                    .get('/api/shopping-list/')
                    .then(response => {
                        this.isLoading = false;
                        this.shoppingList = response.data;
                    })
                    .catch(error => {
                        console.log(error);
                    });

            },

            // Отметить элемент из списка покупок (удаление)
            handleItemCheck(itemArr) {
                //console.log(itemArr);
                if (itemArr.length) {
                    axios
                        .delete(`/api/shopping-list/${itemArr[0].id}`)
                        .then(response => {
                            this.refreshShoppingList();
                        });
                }

            },

            // Показать окно добавления покупки
            addItem() {
                this.dialogAddItemVisible = true;
            },

            // Загружает список доступных элементов покупкок
            loadPossibleItems() {
                axios
                    .get('/api/shopping-items/')
                    .then(response => {
                        for (let i = 0; i < response.data.length; i++) {
                            console.log(response);
                            this.possibleItems.push({
                                value: response.data[i].name,
                                id: response.data[i].id,
                            });
                        }
                    })
            },

            // Обработчик выпадающего списка покупок
            querySearch(queryString, cb) {
                var links = this.possibleItems;
                var results = queryString ? links.filter(this.createFilter(queryString)) : links;
                // call callback function to return suggestions
                cb(results);
            },

            // Фильтр выпадающего списка покупок
            createFilter(queryString) {
                return (link) => {
                    return (link.value.toLowerCase().indexOf(queryString.toLowerCase()) === 0);
                };
            },

            // Обработчик выбора элемента из выпадающего списка покупок
            handleSelect(selectedItem) {
                this.addingItem = selectedItem;
            },

            // Клик по кнопке "Добавить" в окне выбора элемента покупки
            addItemToList() {

                console.log(this.addingItem, this.selectedItemStr)

                if (this.addingItem == null) {
                    this.dialogAddCategoryToNewItem = true;
                    this.refreshAvailableShoppingGroups();
                } else {

                    axios
                        .post('/api/shopping-list/', this.addingItem)
                        .then(response => {
                            //this.dialogAddItemVisible = false;
                            this.selectedItemStr = '';
                            this.addingItem = null;
                            this.refreshShoppingList();
                        });

                }


            },

            async refreshAvailableShoppingGroups() {
                this.availableShoppingGroup = [];
                axios
                    .get('/api/shopping-groups/')
                    .then(response => {
                        console.log(response)
                        this.availableShoppingGroup = response.data;
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },

            // Закрыть окно добавления нового элемента
            closeAddingItem() {
                this.dialogAddItemVisible = false;
                this.selectedItemStr = '';
                this.addingItem = null;
            }

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
