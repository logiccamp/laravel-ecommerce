<template>
 <div class="row mt-4">
        <div class="col-md-6 d-none">
            <div class="form-group d-flex">
                <div class="select-wrap">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                    <select name="" id="" class="form-control">
                    <option value="">Small</option>
                    <option value="">Medium</option>
                    <option value="">Large</option>
                    <option value="">Extra Large</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="w-100"></div>

        <div class="input-group col-md-6 d-flex mb-3">
            <span class="input-group-btn mr-2">
                <button type="button" @click="decreaseCart" class="quantity-left-minus btn" data-type="minus" data-field="">
                <i class="ion-ios-remove"></i>
                </button>
            </span>
            <input type="text" id="quantity" name="quantity" class="form-control input-number" v-model="qty" min="1" max="100">
            <span class="input-group-btn ml-2">
                <button type="button" @click="increaseCart" class="quantity-right-plus btn" data-type="plus" data-field="">
                    <i class="ion-ios-add"></i>
                </button>
            </span>
        </div>
        <div class="w-100"></div>
        <p><a href="#?" @click="addToCart" class="btn btn-black py-3 px-5">Add to Cart</a></p>
 </div>
</template>


<script>
export default {
    props : ["userId", "pId"],
    data() {
        return {
            qty : 1,
        }
    },
    methods: {
        async addToCart(){
            if (this.userId == "0"){
                this.$root.$emit("toggleLogin")
                return false;
            }

            let response = await axios.post('/addcartbk', {
                'product_id' : this.pId,
                'qty' : this.qty
            });
            
            this.$root.$emit('changeInCart', response.data.items);
            setTimeout(() => {
                this.$root.$emit('addToCart', response.data.message);
            }, 100);

        },
        decreaseCart(){
            if (this.qty == 1) return false;
            this.qty -= 1;
        },
        increaseCart(){
            this.qty += 1;
        },
    },
    mounted() {
    },
}
</script>