const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js');
mix.styles(['resources/js/app.js'], 'public/css/app.css').version();

mix.styles([
    'public/css/social-icons.css',
    'public/css/owl.carousel.css',
    'public/css/owl.theme.css',
    'public/css/prism.css',
    'public/css/main.css',
    'public/css/custom.css',
], 'public/css/all.css').version();

mix.js(
    'public/js/scripts.js', 'public/js/scripts.min.js')
    .js('resources/assets/js/profile.js', 'public/assets/js/profile.js')
    .js('resources/assets/js/custom/custom.js', 'public/assets/js/custom/custom.js')
    .js('resources/assets/js/custom/custom-datatable.js', 'public/assets/js/custom/custom-datatable.js')
    .version();


mix.copy('node_modules/bootstrap/dist/css/bootstrap.min.css',
    'public/assets/css/bootstrap.min.css');

mix.copy('node_modules/datatables.net-dt/css/jquery.dataTables.min.css',
    'public/assets/css/jquery.dataTables.min.css');
mix.copy('node_modules/datatables.net-dt/images', 'public/assets/images');
mix.copy('node_modules/select2/dist/css/select2.min.css',
    'public/assets/css/select2.min.css');
mix.copy('node_modules/sweetalert/dist/sweetalert.css',
    'public/assets/css/sweetalert.css');
mix.copy('node_modules/izitoast/dist/css/iziToast.min.css',
    'public/assets/css/iziToast.min.css');

mix.copyDirectory('node_modules/@fortawesome/fontawesome-free/css',
    'public/assets/css/@fortawesome/fontawesome-free/css');
mix.copyDirectory('node_modules/@fortawesome/fontawesome-free/webfonts',
    'public/assets/css/@fortawesome/fontawesome-free/webfonts');

mix.babel('node_modules/jquery.nicescroll/dist/jquery.nicescroll.js',
    'public/assets/js/jquery.nicescroll.js');
mix.babel('node_modules/jquery/dist/jquery.min.js',
    'public/assets/js/jquery.min.js');
mix.babel('node_modules/popper.js/dist/umd/popper.min.js',
    'public/assets/js/popper.min.js');
mix.babel('node_modules/bootstrap/dist/js/bootstrap.min.js',
    'public/assets/js/bootstrap.min.js');
mix.babel('node_modules/datatables.net/js/jquery.dataTables.min.js',
    'public/assets/js/jquery.dataTables.min.js');
mix.babel('node_modules/select2/dist/js/select2.min.js',
    'public/assets/js/select2.min.js');
mix.babel('node_modules/sweetalert/dist/sweetalert.min.js',
    'public/assets/js/sweetalert.min.js');
mix.babel('node_modules/izitoast/dist/js/iziToast.min.js',
    'public/assets/js/iziToast.min.js');


 mix.js('resources/assets/js/companies/companies.js', 'public/assets/js/companies/companies.js').version();


 mix.js('resources/assets/js/users/users.js', 'public/assets/js/users/users.js').version();


 mix.js('resources/assets/js/projects/projects.js', 'public/assets/js/projects/projects.js').version();


 mix.js('resources/assets/js/project_fields/project_fields.js', 'public/assets/js/project_fields/project_fields.js').version();


 mix.js('resources/assets/js/project_user/project_user.js', 'public/assets/js/project_user/project_user.js').version();


 mix.js('resources/assets/js/select_values/select_values.js', 'public/assets/js/select_values/select_values.js').version();


 mix.js('resources/assets/js/files/files.js', 'public/assets/js/files/files.js').version();


 mix.js('resources/assets/js/documents/documents.js', 'public/assets/js/documents/documents.js').version();


 mix.js('resources/assets/js/company_document/company_document.js', 'public/assets/js/company_document/company_document.js').version();


 mix.js('resources/assets/js/document_fields/document_fields.js', 'public/assets/js/document_fields/document_fields.js').version();


 mix.js('resources/assets/js/mail_types/mail_types.js', 'public/assets/js/mail_types/mail_types.js').version();


 mix.js('resources/assets/js/mails/mails.js', 'public/assets/js/mails/mails.js').version();


 mix.js('resources/assets/js/mail_user/mail_user.js', 'public/assets/js/mail_user/mail_user.js').version();


 mix.js('resources/assets/js/mail_attachments/mail_attachments.js', 'public/assets/js/mail_attachments/mail_attachments.js').version();
