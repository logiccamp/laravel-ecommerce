<template>
    <div>
        <div class="row">
            <div class="col-md-12 ftco-animate1">
                <div class="cart-list">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>Product name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(cartItem, index) in cartItems" :key="index" class="text-center">
                                <td class="product-remove" ><a @click="removeCart(cartItem.id)" href="#"><span class="ion-ios-close"></span></a></td>
                                <td class="image-prod">
                                    <div class="img" :style="'background-image : url('+appCdn+'/'+cartItem.product.image_link +')'"></div>
                                </td>
                                <td class="product-name">
                                    <h3>{{cartItem.product.title}}</h3>
                                </td>
                                <td class="price">N{{cartItem.product.price}}</td>

                                <td class="quantity">
                                    <div class="input-group d-flex align-items-center px-3">
                                        <a href="#?" @click="updateCart(cartItem.id, 'decrease', cartItem.quantity)" style="font-weight: bold" class="cartqty p-2 d-flex align-items-center px-1">-</a>
                                        <input type="text" disabled name="quantity" class="quantity form-control input-number" :value="cartItem.quantity" min="1" max="100">
                                        <a href="#?" @click="updateCart(cartItem.id, 'increase', cartItem.quantity)" style="font-weight: bold" class="cartqty p-2 d-flex align-items-center px-1">+</a>
                                    </div>
                                </td>

                                <td class="total">N{{cartItem.price}}</td>
                            </tr><!-- END TR-->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="row justify-content-end">
            <div class="col-lg-4 mt-5 cart-wrap ftco-animate1">
                <div class="cart-total mb-3">
                    <h3>Coupon Code</h3>
                    <p>Enter your coupon code if you have one</p>
                    <form action="#" class="info">
                        <div class="form-group">
                            <label for="">Coupon code</label>
                            <input type="text" class="form-control text-left px-3" placeholder="">
                        </div>
                    </form>
                </div>
                <p><a href="#?" class="btn btn-primary py-3 px-4">Apply Coupon</a></p>
            </div>
            <div class="col-lg-4 mt-5 cart-wrap ftco-animate1" style="display: none">
                <div class="cart-total mb-3">
                    <h3>Estimate shipping and tax</h3>
                    <p>Enter your destination to get a shipping estimate</p>
                    <form action="#" class="info">
                        <div class="form-group">
                            <label for="">Country</label>
                            <input type="text" class="form-control text-left px-3" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="country">State/Province</label>
                            <input type="text" class="form-control text-left px-3" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="country">Zip/Postal Code</label>
                            <input type="text" class="form-control text-left px-3" placeholder="">
                        </div>
                    </form>
                </div>
                <p><a href="checkout.html" class="btn btn-primary py-3 px-4">Estimate</a></p>
            </div>
            <div class="col-lg-4 mt-5 cart-wrap ftco-animate1">
                <div class="cart-total mb-3">
                    <h3>Cart Totals</h3>
                    <p class="d-flex">
                        <span>Subtotal</span>
                        <span>N{{total}}</span>
                    </p>
                    <p class="d-flex">
                        <span>Delivery</span>
                        <span>N0.00</span>
                    </p>
                    <hr>
                    <p class="d-flex total-price">
                        <span>Total</span>
                        <span>N{{total}}</span>
                    </p>
                </div>
                <p><a href="/checkout" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
            </div>
        </div>
    </div>
</template>



<script>
export default {
    data() {
        return {
            cartItems : [],
            appCdn : '',
            total : 0,
        }
    },
    methods: {
        async removeCart(cartId){
            this.$root.$emit("toggleLoader", true);
            await axios.get(`/cartbk/r/${cartId}`)
            .then((response)=>{
                this.getCart()
            })

        },
        async updateCart(cartId, action, qty){
            if (action == 'decrease' && qty == 1) return false;
            this.$root.$emit("toggleLoader", true);
            await axios.get(`/cartbk/u/${cartId}/${action}`)
            .then((response)=>{
                this.getCart()
            })
        },
        async getCart(){
            this.$root.$emit("toggleLoader", true);
            let response = await axios.get("/cartbk")
            this.cartItems = response.data.cartItems
            this.appCdn = response.data.appCdn
            this.total = response.data.total
            console.log(response)
            setTimeout(() => {
                this.$root.$emit("toggleLoader", false);
            }, 100);
        }
    },

    mounted() {
        
        this.getCart()
    },
}
</script>