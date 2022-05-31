<template>
    <div>
        <div v-if="isAdded" class="product-added-to-cart" style="position: fixed; top: 0; z-index: 10000000011; height: fit-content; width: 100%">
            <div class="cart-added" style="height: 100vh; display: flex; justify-content: center; align-items: center">
                <div class="card px-3 shadow-sm rounded p-2 justify-content-center align-items-center">
                    <h3 class="text-center text-uppercase w-75 mt-2" style="font-weight: bold;">{{message}}</h3>
                    <div class="d-flex">
                        <a href="/cart" class="btn btn-primary">View Cart</a>
                        <span class="mx-3"></span>
                        <a href="/checkout" class="btn">Checkout</a>
                    </div>
                    <p>
                        <a href="#?" @click="isAdded = false" class="btn btn-link">close</a>
                    </p>
                </div>
            </div>
        </div>    
    </div>
</template>


<script>
export default {
    data() {
        return{
            isAdded : false,
            message : ""
        }
    },
    mounted() {
        
        this.$root.$on("addToCart", (msg)=>{
            this.message = msg;
            this.isAdded = true;
        })
    },
}
</script>