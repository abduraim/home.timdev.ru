<template>

    <div class="shopping-list">

        <h1>Список покупок</h1>

    </div>

</template>

<script>
    import store from './shoppingListStore';
    export default {
        data() {
            return {
                store,
            }
        },
        props: {

        },
        mounted() {
            this.store.loadShoppingList();
        }
    }
</script>

<style lang="scss" scoped>

</style>
