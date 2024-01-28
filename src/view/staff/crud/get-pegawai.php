<?php 

include '../../../config.php';

$id_user = $_POST['id'];

$getUser = mysqli_query($con, "SELECT * FROM user WHERE UserID = $id_user");

$user = mysqli_fetch_array($getUser);
?>
<div class="leading-3 flex flex-col w-full justify-center items-center">
    <h1 class="text-emerald-700 font-bold text-2xl py-2">Update Pegawa<span class="text-red-600">i</span></h1>
    <p class="text-semibold text-amber-700 -mt-2 mb-2"><?= $user['Nama'] ?></p>
</div>
<svg class="absolute pointer-events-none opacity-20" width="23rem" height="23rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path opacity="0.4" d="M17.5291 7.77C17.4591 7.76 17.3891 7.76 17.3191 7.77C15.7691 7.72 14.5391 6.45 14.5391 4.89C14.5391 3.3 15.8291 2 17.4291 2C19.0191 2 20.3191 3.29 20.3191 4.89C20.3091 6.45 19.0791 7.72 17.5291 7.77Z" fill="#e5ae38"></path> <path opacity="0.4" d="M20.7896 14.6999C19.6696 15.4499 18.0996 15.7299 16.6496 15.5399C17.0296 14.7199 17.2296 13.8099 17.2396 12.8499C17.2396 11.8499 17.0196 10.8999 16.5996 10.0699C18.0796 9.86992 19.6496 10.1499 20.7796 10.8999C22.3596 11.9399 22.3596 13.6499 20.7896 14.6999Z" fill="#e5ae38"></path> <path opacity="0.4" d="M6.44039 7.77C6.51039 7.76 6.58039 7.76 6.65039 7.77C8.20039 7.72 9.43039 6.45 9.43039 4.89C9.43039 3.3 8.14039 2 6.54039 2C4.95039 2 3.65039 3.29 3.65039 4.89C3.66039 6.45 4.89039 7.72 6.44039 7.77Z" fill="#e5ae38"></path> <path opacity="0.4" d="M6.54914 12.8501C6.54914 13.8201 6.75914 14.7401 7.13914 15.5701C5.72914 15.7201 4.25914 15.4201 3.17914 14.7101C1.59914 13.6601 1.59914 11.9501 3.17914 10.9001C4.24914 10.1801 5.75914 9.8901 7.17914 10.0501C6.76914 10.8901 6.54914 11.8401 6.54914 12.8501Z" fill="#e5ae38"></path> <path d="M12.1208 15.87C12.0408 15.86 11.9508 15.86 11.8608 15.87C10.0208 15.81 8.55078 14.3 8.55078 12.44C8.55078 10.54 10.0808 9 11.9908 9C13.8908 9 15.4308 10.54 15.4308 12.44C15.4308 14.3 13.9708 15.81 12.1208 15.87Z" fill="#e5ae38"></path> <path d="M8.87078 17.9399C7.36078 18.9499 7.36078 20.6099 8.87078 21.6099C10.5908 22.7599 13.4108 22.7599 15.1308 21.6099C16.6408 20.5999 16.6408 18.9399 15.1308 17.9399C13.4208 16.7899 10.6008 16.7899 8.87078 17.9399Z" fill="#e5ae38"></path> </g></svg>
<div class="flex flex-col relative z-10 w-full">
    <input type="text" value="<?=$user['UserID']?>" name="id_user" hidden>
    <div class="input-form flex flex-col mt-1 w-[90%] ">
        <label for="">Nama pegawai</label>
        <input value="<?= $user['Nama'] ?>" name="nama_pegawai" type="text" class="border-b-2 border-slate-700 focus:right-0 focus:outline-none bg-transparent">
    </div>
    <div class="input-form flex flex-col mt-1 w-[90%]">
        <label for="">Username</label>
        <input value="<?= $user['NamaUser'] ?>" name="username" type="text" class="border-b-2 border-slate-700 focus:right-0 focus:outline-none bg-transparent">
    </div>
    <div class="input-form flex flex-col mt-1 w-[90%]">
        <label for="">Password</label>
        <input name="password" placeholder="password is encrypted" type="password" class="border-b-2 border-slate-700 focus:right-0 focus:outline-none bg-transparent">
    </div>
    <div class="input-form flex flex-col mt-1 w-[90%]">
        <label for="">Bidang</label>
        <select name="bidang" class="border-b-2 border-slate-700 focus:right-0 focus:outline-none bg-transparent">
            <option <?= $user['Level'] == 'kasir' ? 'selected' : '' ?> value="kasir">kasir</option>
            <option <?= $user['Level'] == 'petugas' ? 'selected' : '' ?> value="petugas">petugas</option>
            <option <?= $user['Level'] == 'administrator' ? 'selected' : '' ?> value="administrator">administrator</option>
        </select>
    </div>
    <div class=" flex justify-around items-center w-full mt-4">
        <button type="button" id="hapus-modal-update" class="btn bg-red-500 rounded-md shadow-md shadow-red-300/20 w-20 text-white font-semibold py-1 px-2">Go back!</button>
        <button class="btn bg-emerald-500 rounded-md shadow-md shadow-emerald-300/20 w-20 text-white font-semibold py-1 px-2">Submit</button>
    </div>
</div>
<script>
    $('#hapus-modal-update').on('click', function () {
        $('#modal-bg').addClass('opacity-0 pointer-events-none').removeClass('pointer-events-auto opacity-100');
        $('#modal-update-pegawai').removeClass('scale-100').addClass('scale-0')
        setTimeout(() => {
            $('#modal-update-pegawai').addClass('hidden')
        }, 100);
    });
</script>