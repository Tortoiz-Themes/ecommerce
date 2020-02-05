<template>
    <div id="master">
        <Header />
        <Slider />
        <Footer />
    </div>
</template>

<script>
    import Header from './layouts/headersection'
    import Slider from './layouts/slider'
    import Footer from './layouts/footersection'
    export default {
        components : {
            Header,
            Slider,
            Footer
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
