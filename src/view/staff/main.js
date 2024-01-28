$(document).ready(function() {
    $('#tambah-pegawai-btn').on('click', function () {
        $('#modal-bg').removeClass('opacity-0 pointer-events-none').addClass('pointer-events-auto opacity-100');
        $('#modal-tambah-pegawai').removeClass('hidden')
        setTimeout(() => {
            $('#modal-tambah-pegawai').removeClass('scale-0 hidden').addClass('scale-110')
            setTimeout(() => {
                $('#modal-tambah-pegawai').removeClass('scale-110').addClass('scale-100')
            }, 200);
        }, 50);
    });

    $('#hapus-modal-tambah').on('click', function () {
        $('#modal-bg').addClass('opacity-0 pointer-events-none').removeClass('pointer-events-auto opacity-100');
        $('#modal-tambah-pegawai').removeClass('scale-100').addClass('scale-0')
        setTimeout(() => {
            $('#modal-tambah-pegawai').addClass('hidden')
        }, 100);
    });
    


    // $(document).off('click', '#update-modal').on('click', '#update-modal', function () {
    //     $('#modal-bg').removeClass('opacity-0 pointer-events-none').addClass('pointer-events-auto opacity-100');
    //     $('#modal-update-pegawai').removeClass('hidden')
    //     setTimeout(() => {
    //         $('#modal-update-pegawai').removeClass('scale-0').addClass('scale-110')
    //         setTimeout(() => {
    //             $('#modal-update-pegawai').removeClass('scale-110').addClass('scale-100')
    //         }, 200);
    //     }, 50);
    // });

    // $('#hapus-modal-update').on('click', function () {
    //     $('#modal-bg').addClass('opacity-0 pointer-events-none').removeClass('pointer-events-auto opacity-100');
    //     $('#modal-update-pegawai').removeClass('scale-100').addClass('scale-0')
    // });
});