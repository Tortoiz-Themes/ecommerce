<template>
    <div id="customermaster">
        <Header />
        <Sidebar />
        <RouterView> </RouterView>
        <Footer />
    </div>
</template>

<script>
    import Header from '../layouts/HeaderComponent';
    import Sidebar from '../layouts/CustomerSidebarComponent';
    import Footer from '../layouts/FooterComponent';
    export default {
        name: "CustomerMaster",
        components :{
            Header,
            Sidebar,
            Footer,
        },

    }
</script>

<style scoped>

</style>