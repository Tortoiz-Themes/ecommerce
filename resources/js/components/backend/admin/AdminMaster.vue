<template>
    <div id="adminmaster">
        <Header />
        <Sidebar />
        <RouterView></RouterView>
        <Footer />
    </div>
</template>

<script>
    import Header from '../layouts/HeaderComponent';
    import Sidebar from '../layouts/AdminSidebarComponent';
    import Footer from '../layouts/FooterComponent';
    export default {
        name: "AdminMaster",
        components : {
            Header,
            Sidebar,
            Footer
        },
        mounted()  {

        }
    }
</script>

<style scoped>

</style>