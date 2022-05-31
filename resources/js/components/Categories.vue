<template>
    <div>
         <!-- <div class="row justify-content-center">
            <div class="col-md-10 mb-5 text-center">
                <ul class="product-category1">
                    <li><a href="#" class="active">All</a></li>
                    <li v-for="(category, index) in categories" :key="index">
                        <a href="#">{{category.title}}</a>
                    </li>
                </ul>
            </div>
        </div> -->

        <div class="row">
            <div v-for="(product, index) in productToDisplay" :key="index" class="col-md-6 col-lg-3 ftco-animate1">
                <div class="product">
                    <a :href="'/product/'+product.slug" class="img-prod"><img class="img-fluid" :src="'/assets/images/'+product.image_link" :alt="product.title">
                        <span v-if="product.discount != 0 || product.disount != '0'" class="status">{{product.discount}}%</span>
                        <div class="overlay"></div>
                    </a>
                    <div class="text py-3 pb-4 px-3 text-center">
                        <h3><a :href="'/product/'+product.slug">{{product.title}}</a></h3>
                        <div class="d-flex">
                            <div class="pricing">
                                <p class="price">
                                    <span v-if="product.discount != 0 || product.disount != '0'" class="mr-2 price-dc">N{{product.old_price}}</span>
                                    <span class="price-sale">N{{product.price}}</span>
                                </p>
                            </div>
                        </div>
                        <div class="bottom-area d-flex px-3">
                            <div class="m-auto d-flex">
                                <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                    <span><i class="ion-ios-menu"></i></span>
                                </a>
                                <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                    <span><i class="ion-ios-cart"></i></span>
                                </a>
                                <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                    <span><i class="ion-ios-heart"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    


        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <!-- <li><a href="#">&lt;</a></li> -->
                        <li v-for="page in pageCount" :key="page" @click="changeProductToDisplay(page)" :class="Math.round(limit/initLimit) == page ? 'active' : ''" style="cursor: pointer;"><span>{{page}}</span></li>
                        <!-- <li><a href="#">&gt;</a></li> -->
                    </ul>
                </div>
            </div>
        </div>


    </div>
</template>

<script>
export default {
    data() {
        return {
            categories : [],
            products : [],
            productToDisplay : [],
            initLimit : 20,
            limit : 20,
            offset : 0,
            pageCount : 1,
        }
    },
    methods: {
        changeProductToDisplay(page = 1){
            this.$root.$emit("toggleLoader", true);
            if (page == 1){
                this.offset = 0;
                this.limit = 20;
            }else{
                this.offset = this.limit;
                this.limit = this.products.length < this.offset * page ? this.products.length : this.offset * page;
                this.$root.$emit("shopage", page)
            }
            const allproducts = [...this.products]
            this.productToDisplay = allproducts.splice(this.offset, this.limit);
            window.scrollTo(0,0)
            setTimeout(() => {
                this.$root.$emit("toggleLoader", false);
            }, 1000);
            
        },
        async getAll(){
            let response = await axios.get("/categoriesbk")
            this.categories = response.data.categories
            this.products = response.data.products
            this.pageCount = Math.round(this.products.length/this.initLimit)
            this.changeProductToDisplay()
        }
    },
    mounted() {
        this.getAll()
    },
}
</script>