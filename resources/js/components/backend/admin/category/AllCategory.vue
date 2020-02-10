<template>
    <div id="allcategory">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Category List
                </h1>
                <ol class="breadcrumb">
                    <li><a href="/baackend/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Category List</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All Category</h3>
                        <RouterLink to=""><button class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New</button></RouterLink>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>SL.NO</th>
                                <th>Category Name</th>
                                <th>Slug</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(category,id) in categories" :key="id" role="row">
                                <td v-text="id" class="shorting_1"></td>
                                <td>{{ category.name }}</td>
                                <td>{{ category.slug }}</td>
                                <td>{{ category.created_at }}</td>
                                <td>
                                    <RouterLink :to="{ name: 'categoryupdate', params: { slug: `${category.slug}` }}" class="btn btn-primary">Edit</RouterLink>
                                    <button v-on:click="delete_cat(`${category.slug}`)" class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr style="display:none">
                                <td>1</td>
                                <td>kjh</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>SL.NO</th>
                                <th>Category Name</th>
                                <th>Slug</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
</template>

<script>
    export default {
        name: "AllCategory",
        mounted(){
            this.$store.dispatch('allCategories')
        },
        computed :{
            categories (){
                return this.$store.getters.getAllCategories;
            }
        },
        methods:{
            delete_cat(slug){
                //console.log(slug);
                confirm_btn.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {

                        // delete category request
                        axios.delete(`/api/v1/categories/${slug}`)
                            .then(( res ) => {
                                this.$store.state.categories = res.data.data;
                                confirm_btn.fire(
                                    'Deleted!',
                                    'Category has been deleted.',
                                    'success'
                                )
                            })

                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        confirm_btn.fire(
                            'Cancelled',
                            'Your imaginary file is safe :)',
                            'error'
                        )
                    }
                })
            }
        }
    }
</script>

<style scoped>

</style>