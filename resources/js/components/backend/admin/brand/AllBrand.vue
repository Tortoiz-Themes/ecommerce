<template>
    <div id="all_brand">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Brand List
                </h1>
                <ol class="breadcrumb">
                    <li><RouterLink :to="{name: 'adminhome'}"><i class="fa fa-dashboard"></i> Home</RouterLink></li>
                    <li class="active">Brand List</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All Brand</h3>
                        <RouterLink :to="{name: 'brandcreate'}"><button class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New</button></RouterLink>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>SL.NO</th>
                                <th>Brand Name</th>
                                <th>Slug</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(brand,id) in brands" :key="id" role="row">
                                <td v-text="id+1" class="shorting_1"></td>
                                <td>{{ brand.name }}</td>
                                <td>{{ brand.slug }}</td>
                                <td>{{ brand.created_at }}</td>
                                <td>
                                    <RouterLink :to="{ name: 'brandupdate', params: { slug: `${brand.slug}` }}" class="btn btn-primary">Edit</RouterLink>
                                    <button v-on:click="delete_brand(`${brand.slug}`)" class="btn btn-danger">Delete</button>
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
                                <th>Brand Name</th>
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
        name: "AllBrand",
        mounted(){
            this.$store.dispatch('allBrands')
        },
        computed :{
            brands (){
                return this.$store.getters.getAllBrands;
            }
        },
        methods:{
            delete_brand(slug){
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
                        axios.delete(`/api/v1/brands/${slug}`)
                            .then(( res ) => {
                                this.$store.state.brands = res.data.data;
                                confirm_btn.fire(
                                    'Deleted!',
                                    'Brand has been deleted.',
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