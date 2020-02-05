import home from './components/public/HomeComponent';
import adminhome from './components/backend/admin/AdminHome';
import allcategory from './components/backend/admin/category/AllCategory';
export const routes = [
    //Frontend route
    { path: '/', component: home },

    //Backend route
    { path: '/backend/admin/dashboard', component: adminhome},
    { path: '/backend/admin/category', component: allcategory},
]