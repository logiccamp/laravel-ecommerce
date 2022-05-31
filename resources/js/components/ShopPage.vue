<template>
    <span> PAGE {{page}} </span>
</template>

<script>
export default {
    data() {
        return {
            page : 1,
        }
    },

    mounted() {
        this.$root.$on("shopage", (pagenumber)=>{
            this.page = pagenumber
        })
    },
}
</script>