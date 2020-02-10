import home from './components/public/HomeComponent';
import adminhome from './components/backend/admin/AdminHome';
import allcategory from './components/backend/admin/category/AllCategory';
import editcategory from './components/backend/admin/category/EditCategory';
export const routes = [
    //Frontend route
    { path: '/', component: home },

    //Backend route
    { path: '/backend/admin/dashboard', component: adminhome},
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
]