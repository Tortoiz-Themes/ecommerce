<template>
    <div id="new_category">
        <div class="content-wrapper" style="min-height: 946px;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Add New Category Form
                </h1>
                <ol class="breadcrumb">
                    <li><RouterLink :to="{name:'adminhome'}"><i class="fa fa-dashboard"></i> Home</RouterLink></li>
                    <li><RouterLink :to="{name:'categorylist'}">Category</RouterLink></li>
                    <li class="active">Add Category</li>
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
                                <h3 class="box-title">New Category</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" @submit.prevent="cat_insert" @keydown="form.onKeydown($event)">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="name">Category Name</label>
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
        name: "NewCategory",
        data() {
            return{
                form: new Form({
                    name: '',
                })
            }
        },
        methods:{
            cat_insert(){
                this.form.post('/api/v1/categories')
                    .then(({ data }) => {
                            toast.fire({
                                icon: 'success',
                                title: 'Category Inserted successfully'
                            })
                            this.$router.push({name: 'categorylist'})
                        }
                    )


            }
        }
    }
</script>

<style scoped>

</style>