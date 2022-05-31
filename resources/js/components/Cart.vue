<template>
    <a href="/cart" class="nav-link"><span class="icon-shopping_cart"></span>[{{count}}]</a>
</template>

<script>
    export default {
        data() {
            return {
                count : 0,
            }
        },
        mounted() {
            this.getCart()
            this.$root.$on('changeInCart', (item) => {
                this.count = item;
            })
        },
        methods : {
            async getCart (){
                let response =await axios.get("/getcart")
                this.count = response.data
            }
        }
    }
</script>
