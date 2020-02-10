<template>
    <div id="new_brand">
        <div class="content-wrapper" style="min-height: 946px;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Add New Brand Form
                </h1>
                <ol class="breadcrumb">
                    <li><RouterLink :to="{name:'adminhome'}"><i class="fa fa-dashboard"></i> Home</RouterLink></li>
                    <li><RouterLink :to="{name:'brandlist'}">Brand</RouterLink></li>
                    <li class="active">Add Brand</li>
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
                                <h3 class="box-title">New Brand</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" @submit.prevent="brand_insert" @keydown="form.onKeydown($event)">
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
        name: "NewBrand",
        data() {
            return{
                form: new Form({
                    name: '',
                })
            }
        },
        methods:{
            brand_insert(){
                this.form.post('/api/v1/brands')
                    .then(({ data }) => {

                            this.$router.push({name: 'brandlist'});
                            toast.fire({
                                icon: 'success',
                                title: 'Brand Inserted successfully'
                            });
                        }
                    )


            }
        }
    }
</script>

<style scoped>

</style>