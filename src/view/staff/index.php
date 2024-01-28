<?php include '../partials/_header.php' ?>
<link href="table.css" rel="stylesheet">
<div class="w-full flex justify-center items-center py-12">
    <div class="">
        <div class="row row--top-40">
            <div class="col-md-12">
            <h2 class="row__title"><span class="font-semibold ">Pegawai</span> (<?= mysqli_fetch_array(mysqli_query($con, "SELECT count(UserID) as jumlah FROM user"))['jumlah'] ?>)</h2>
            </div>
        </div>
        <div class="row row--top-20">
            <div class="col-md-12">
            <div class="table-container">
                <table class="table">
                <thead class="table__thead">
                    <tr>
                    <!-- <th class="table__th"><input id="selectAll" type="checkbox" class="table__select-row"></th> -->
                        <th class="table__th">Id</th>
                        <th class="table__th">Nama pegawai</th>
                        <th class="table__th">Bidang</th>
                        <th class="table__th">Status</th>
                        <th class="table__th">Action</th>
                    </tr>
                </thead>
                <tbody class="table__tbody">
                    <?php 
                        $getKaryawan = mysqli_query($con, "SELECT * FROM user ORDER BY STATUS DESC");
                        while ($p = mysqli_fetch_array($getKaryawan)) {
                    ?>
                        <tr class="table-row transition-all duration-50 ease-linear <?= $p['status'] == 1 ? '' : 'table-row--red' ?> ">
                            <td class="table-row__td">
                                <div class="<?= $p['status'] == 1 ? '' : 'table-row--overdue' ?>"></div>
                                <p class="table-row__name"><?= $p['UserID'] ?></p>
                            </td>
                            <td class="table-row__td">
                                <!-- <div class="table-row__img"></div>-->
                                <div class="table-row__info"> 
                                    <p class="table-row__name"><?= $p['Nama'] ?></p>
                                    <span class="table-row__small"><?= $p['NamaUser'] ?></span>
                                </div>
                            </td>
                            <td data-column="Bidang" class="table-row__td">
                                <div class="">
                                    <p class="table-row__policy"><?= $p['Level'] ?></p>
                                </div>                
                            </td>
                            <td data-column="Status" class="table-row__td">
                                <div class="">
                                    <p class="table-row__policy"><?= $p['status'] == 1 ? 'Active' : 'Non-active' ?></p>
                                </div>                
                            </td>
                            <td class="table-row__td">
                                <button class="btn">
                                    <svg data-toggle="tooltip" data-placement="bottom" title="Edit" version="1.1" class="table-row__edit" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve"><g>	<g>		<path d="M496.063,62.299l-46.396-46.4c-21.2-21.199-55.69-21.198-76.888,0l-18.16,18.161l123.284,123.294l18.16-18.161    C517.311,117.944,517.314,83.55,496.063,62.299z" style="fill: rgb(1, 185, 209);"></path>	</g></g><g>	<g>
                                        <path d="M22.012,376.747L0.251,494.268c-0.899,4.857,0.649,9.846,4.142,13.339c3.497,3.497,8.487,5.042,13.338,4.143    l117.512-21.763L22.012,376.747z" style="fill: rgb(1, 185, 209);"></path>	</g></g><g>	<g>		<polygon points="333.407,55.274 38.198,350.506 161.482,473.799 456.691,178.568   " style="fill: rgb(1, 185, 209);"></polygon>	</g></g><g></g><g></g><g></g>
                                        <g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
                                    </svg>
                                </button>
                                <button class="btn">
                                    <svg data-toggle="tooltip" data-placement="bottom" title="Delete" version="1.1" class="table-row__bin" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g>	<g>		<path d="M436,60h-90V45c0-24.813-20.187-45-45-45h-90c-24.813,0-45,20.187-45,45v15H76c-24.813,0-45,20.187-45,45v30    c0,8.284,6.716,15,15,15h16.183L88.57,470.945c0.003,0.043,0.007,0.086,0.011,0.129C90.703,494.406,109.97,512,133.396,512    h245.207c23.427,0,42.693-17.594,44.815-40.926c0.004-0.043,0.008-0.086,0.011-0.129L449.817,150H466c8.284,0,15-6.716,15-15v-30    C481,80.187,460.813,60,436,60z M196,45c0-8.271,6.729-15,15-15h90c8.271,0,15,6.729,15,15v15H196V45z M393.537,468.408    c-0.729,7.753-7.142,13.592-14.934,13.592H133.396c-7.792,0-14.204-5.839-14.934-13.592L92.284,150h327.432L393.537,468.408z     M451,120h-15H76H61v-15c0-8.271,6.729-15,15-15h105h150h105c8.271,0,15,6.729,15,15V120z" style="fill: rgb(158, 171, 180);"></path>	</g></g><g>	<g>		<path d="M256,180c-8.284,0-15,6.716-15,15v212c0,8.284,6.716,15,15,15s15-6.716,15-15V195C271,186.716,264.284,180,256,180z" style="fill: rgb(158, 171, 180);"></path>	</g></g><g>	<g>		<path d="M346,180c-8.284,0-15,6.716-15,15v212c0,8.284,6.716,15,15,15s15-6.716,15-15V195C361,186.716,354.284,180,346,180z" style="fill: rgb(158, 171, 180);"></path>	</g></g><g>	<g>		<path d="M166,180c-8.284,0-15,6.716-15,15v212c0,8.284,6.716,15,15,15s15-6.716,15-15V195C181,186.716,174.284,180,166,180z" style="fill: rgb(158, 171, 180);"></path>	</g></g><g></g><g></g><g></g><g></g><g></g><g></g>
                                        <g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
                                    </svg>                
                                </button>
                            </td>   
                        </tr>                    
                    <?php } ?>
                </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
    <div class="w-full h-full bg-slate-700/40 absolute top-0 left-0 flex justify-center items-center">
        <form class="bg-white flex flex-col justify-center items-center p-4 w-full md:w-[35rem] rounded-lg shadow-xl shadow-slate-50/50">
            <h1 class="text-emerald-700 font-bold text-2xl py-2">Tambah Pegawa<span class="text-red-600">i</span></h1>
            <svg class="absolute pointer-events-none opacity-20" width="23rem" height="23rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path opacity="0.4" d="M17.5291 7.77C17.4591 7.76 17.3891 7.76 17.3191 7.77C15.7691 7.72 14.5391 6.45 14.5391 4.89C14.5391 3.3 15.8291 2 17.4291 2C19.0191 2 20.3191 3.29 20.3191 4.89C20.3091 6.45 19.0791 7.72 17.5291 7.77Z" fill="#e5ae38"></path> <path opacity="0.4" d="M20.7896 14.6999C19.6696 15.4499 18.0996 15.7299 16.6496 15.5399C17.0296 14.7199 17.2296 13.8099 17.2396 12.8499C17.2396 11.8499 17.0196 10.8999 16.5996 10.0699C18.0796 9.86992 19.6496 10.1499 20.7796 10.8999C22.3596 11.9399 22.3596 13.6499 20.7896 14.6999Z" fill="#e5ae38"></path> <path opacity="0.4" d="M6.44039 7.77C6.51039 7.76 6.58039 7.76 6.65039 7.77C8.20039 7.72 9.43039 6.45 9.43039 4.89C9.43039 3.3 8.14039 2 6.54039 2C4.95039 2 3.65039 3.29 3.65039 4.89C3.66039 6.45 4.89039 7.72 6.44039 7.77Z" fill="#e5ae38"></path> <path opacity="0.4" d="M6.54914 12.8501C6.54914 13.8201 6.75914 14.7401 7.13914 15.5701C5.72914 15.7201 4.25914 15.4201 3.17914 14.7101C1.59914 13.6601 1.59914 11.9501 3.17914 10.9001C4.24914 10.1801 5.75914 9.8901 7.17914 10.0501C6.76914 10.8901 6.54914 11.8401 6.54914 12.8501Z" fill="#e5ae38"></path> <path d="M12.1208 15.87C12.0408 15.86 11.9508 15.86 11.8608 15.87C10.0208 15.81 8.55078 14.3 8.55078 12.44C8.55078 10.54 10.0808 9 11.9908 9C13.8908 9 15.4308 10.54 15.4308 12.44C15.4308 14.3 13.9708 15.81 12.1208 15.87Z" fill="#e5ae38"></path> <path d="M8.87078 17.9399C7.36078 18.9499 7.36078 20.6099 8.87078 21.6099C10.5908 22.7599 13.4108 22.7599 15.1308 21.6099C16.6408 20.5999 16.6408 18.9399 15.1308 17.9399C13.4208 16.7899 10.6008 16.7899 8.87078 17.9399Z" fill="#e5ae38"></path> </g></svg>
            <div class="flex flex-col relative z-10 w-full">
                <div class="input-form flex flex-col mt-1 w-[90%] ">
                    <label for="">Nama pengguna</label>
                    <input type="text" class="border-b-2 border-slate-700 focus:right-0 focus:outline-none bg-transparent">
                </div>
                <div class="input-form flex flex-col mt-1 w-[90%]">
                    <label for="">Username</label>
                    <input type="text" class="border-b-2 border-slate-700 focus:right-0 focus:outline-none bg-transparent">
                </div>
                <div class="input-form flex flex-col mt-1 w-[90%]">
                    <label for="">Password</label>
                    <input type="password" class="border-b-2 border-slate-700 focus:right-0 focus:outline-none bg-transparent">
                </div>
                <div class="input-form flex flex-col mt-1 w-[90%]">
                    <label for="">Password</label>
                    <select name="" id="" class="border-b-2 border-slate-700 focus:right-0 focus:outline-none bg-transparent">
                        <option value="kasir">kasir</option>
                        <option value="petugas">petugas</option>
                        <option value="administrator">administrator</option>
                    </select>
                </div>
                <div class=" flex justify-around items-center w-full mt-4">
                    <button type="button" class="btn bg-red-500 rounded-md shadow-md shadow-red-300/20 w-20 text-white font-semibold py-1 px-2">Go back!</button>
                    <button class="btn bg-emerald-500 rounded-md shadow-md shadow-emerald-300/20 w-20 text-white font-semibold py-1 px-2">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include '../partials/_footer.php' ?>