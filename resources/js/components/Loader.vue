<template>
        <!-- loader -->
        <!-- v-if="showLoader" -->
        <div v-if="showLoader" id="ftco-loader2" class="show fullscreen">
            <svg class="circular" width="48px" height="48px">
                <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
                <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
            </svg>
        </div>

</template>

<script>
export default {
    data() {
        return {
            showLoader: false
        }
    },
    mounted(){
        this.$root.$on("toggleLoader", (value)=>{
            this.showLoader = value
        })
    },
    
}
</script>