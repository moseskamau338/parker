require('./bootstrap');

import Alpine from 'alpinejs';
import Swal from 'sweetalert2'

window.Swal = Swal

window.Alpine = Alpine;

Alpine.start();

//Jquery tabels:
$(document).ready(function () {
    $('#example').DataTable({
        fixedColumns: true
    });
});
