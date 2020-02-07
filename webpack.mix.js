const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

// Frontend Styles
mix.styles([
    'public/frontend/css/bootstrap.min.css',
    'public/frontend/css/font-awesome.min.css',
    'public/frontend/css/prettyPhoto.css',
    'public/frontend/css/price-range.css',
    'public/frontend/css/animate.css',
    'public/frontend/css/main.css',
    'public/frontend/css/responsive.css',
], 'public/css/frontend.css');
// Frontend js
mix.scripts([
    'public/frontend/js/bootstrap.min.js',
    'public/frontend/js/jquery.scrollUp.min.js',
    'public/frontend/js/price-range.js',
    'public/frontend/js/jquery.prettyPhoto.js',
    'public/frontend/js/main.js',
], 'public/js/frontend.js');

// Backend Styles
mix.styles([
    'public/backend/bower_components/bootstrap/dist/css/bootstrap.min.css',
    'public/backend/bower_components/font-awesome/css/font-awesome.min.css',
    'public/backend/bower_components/Ionicons/css/ionicons.min.css',
    'public/backend/dist/css/AdminLTE.min.css',
    'public/backend/dist/css/skins/_all-skins.min.css',
    //'public/backend/bower_components/morris.js/morris.css',
    //'public/backend/bower_components/jvectormap/jquery-jvectormap.css',
    'public/backend/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css',
    'public/backend/bower_components/bootstrap-daterangepicker/daterangepicker.css',
    'public/backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css',
    'public/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
    'public/backend/fonts.css',
], 'public/css/backend.css');

// Backend js
mix.scripts([
    'public/backend/bower_components/jquery-ui/jquery-ui.min.js',
    'public/backend/bower_components/bootstrap/dist/js/bootstrap.min.js',
    'public/backend/bower_components/raphael/raphael.min.js',
    'public/backend/bower_components/morris.js/morris.min.js',
    'public/backend/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js',
    'public/backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
    'public/backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
    'public/backend/bower_components/jquery-knob/dist/jquery.knob.min.js',
    'public/backend/bower_components/moment/min/moment.min.js',
    'public/backend/bower_components/bootstrap-daterangepicker/daterangepicker.js',
    'public/backend/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
    'public/backend/bower_components/datatables.net/js/jquery.dataTables.min.js',
    'public/backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js',
    'public/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
    'public/backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js',
    'public/backend/bower_components/fastclick/lib/fastclick.js',
    'public/backend/dist/js/adminlte.min.js',
    //'public/backend/dist/js/pages/dashboard.js',
    'public/backend/dist/js/demo.js',
    'public/backend/custom.js',
], 'public/js/backend.js');

