<template>
    <div id="edit_brand">
        <div class="content-wrapper" style="min-height: 946px;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Brand Edit Form
                </h1>
                <ol class="breadcrumb">
                    <li><RouterLink :to="{name:'adminhome'}"><i class="fa fa-dashboard"></i> Home</RouterLink></li>
                    <li><RouterLink :to="{name:'brandlist'}">Brand</RouterLink></li>
                    <li class="active">Edit Brand</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6 col-md-offset-3">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Brand Update</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" @submit.prevent="brand_update" @keydown="form.onKeydown($event)">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="name">Brand Name</label>
                                        <div class="form-group" :class="{ 'has-error': form.errors.has('name') }">
                                            <input type="text" class="form-control" id="name" v-model="form.name" name="name">
                                            <has-error :form="form" field="name"></has-error>
                                        </div>

                                    </div>
                                </div>
                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.box -->
                    </div>
                    <!--/.col (left) -->

                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
    </div>
</template>

<script>
    import Vue from 'vue'
    import { Form, HasError, AlertError } from 'vform'

    Vue.component(HasError.name, HasError)
    Vue.component(AlertError.name, AlertError)
    export default {
        name: "EditBrand",

        data() {
            return{
                form: new Form({
                    name: '',
                })
            }
        },
        mounted(){
            axios.get(`/api/v1/brands/${this.$route.params.slug}`)
                .then((res) =>{
                    this.form.name = res.data.data.name
                })
        },
        methods:{
            brand_update(){
                this.form.put(`/api/v1/brands/${this.$route.params.slug}`)
                    .then(({ data }) => {

                            this.$router.push({name: 'brandlist'})
                            toast.fire({
                                icon: 'success',
                                title: 'Brand Updated successfully'
                            })
                        }
                    )


            }
        }
    }
</script>

<style scoped>

</style>