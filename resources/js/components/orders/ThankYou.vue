<template>
    <div>
        <header-nav></header-nav>
        <div id="main">
            <div class="row">
                <div class="col s12">
                    <div class="container" style="min-height: 70vh">
                        <div class="section">
                            <div class="row center-align">
                                <div>
                                    <h5>
                                        <h5>Your Order is Submitted.</h5>
                                        <span>Thank you for your order.</span>
                                    </h5>
                                    <i class="material-icons">sentiment_very_satisfied</i>
                                    <br>
                                    <router-link :to="{name: 'products.index'}" class="btn btn-small">Continue Shopping</router-link>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="content-overlay"></div>
                </div>
            </div>
        </div>
        <footer-section></footer-section>
    </div>
</template>

<script>
export default {
    name: "ThankYou",
    props: ['success'],
    mounted() {
        if (!this.success){
            this.$router.push({ name: 'products.index' });
        }
    }
}
</script>

<style scoped>

</style>
