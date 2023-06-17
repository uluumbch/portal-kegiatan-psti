import './bootstrap';
import '../css/mybg.css';
import Swal from 'sweetalert2';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// add sweet alert for button with class delete
const deleteButtons = document.querySelectorAll('.delete');
deleteButtons.forEach((button) => {
    button.addEventListener('click', (e) => {
        e.preventDefault();
        // get form 
        const form = button.parentElement;
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: 'Data yang dihapus tidak dapat dikembalikan!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) form.submit();
        });
    });
});
