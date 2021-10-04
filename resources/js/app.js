require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

//Jquery tabels:
$(document).ready(function () {
    $('#example').DataTable({
        fixedColumns: true
    });
});
