import home from './components/public/HomeComponent';
import adminhome from './components/backend/admin/AdminHome';
import allcategory from './components/backend/admin/category/AllCategory';
import editcategory from './components/backend/admin/category/EditCategory';
import newcategory from './components/backend/admin/category/NewCategory';
import allbrand from './components/backend/admin/brand/AllBrand';
import newbrand from './components/backend/admin/brand/NewBrand';
import editbrand from './components/backend/admin/brand/EditBrand';
export const routes = [
    //Frontend route
    { path: '/', component: home },

    /******* Route For Backend *********/
    {
        path: '/backend/admin/dashboard',
        component: adminhome,
        name: 'adminhome'
    },
            // Category Route
    {
        path: '/backend/admin/category/create',
        component: newcategory,
        name : 'categorycreate'
    },
    {
        path: '/backend/admin/category',
        component: allcategory,
        name : 'categorylist'
    },
    {
        path: '/backend/admin/category/edit/:slug',
        component: editcategory,
        name : 'categoryupdate'
    },
            // Brands Route
    {
        path: '/backend/admin/brand',
        component: allbrand,
        name : 'brandlist'
    },
    {
        path: '/backend/admin/brand/create',
        component: newbrand,
        name : 'brandcreate'
    },
    {
        path: '/backend/admin/brand/edit/:slug',
        component: editbrand,
        name : 'brandupdate'
    },
]