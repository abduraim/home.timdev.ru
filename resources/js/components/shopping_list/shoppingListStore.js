var shoppingListStore = {

    state: {
        shoppingListPaginated: {},
    },

    async loadShoppingList() {
        await axios
            .get('/api/shopping-list/')
            .then(response => {
                this.state.shoppingListPaginated = response.data;
                console.log(this.state.shoppingListPaginated);
            })
            .catch(error => {
                console.log(error);
            });
    },

};

export default shoppingListStore;
