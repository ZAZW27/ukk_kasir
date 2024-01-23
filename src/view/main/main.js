
$(document).ready(function() {

    $(document).off('click', '#add-quantity').on('click', '#add-quantity', addQuantity);
    $(document).off('click', '#sub-quantity').on('click', '#sub-quantity', subQuantity);
    $(document).off('click', '#delete-item').on('click', '#delete-item', deleteItem);
    $(document).off('change', '#item-quantity').on('change', '#item-quantity', InvalidQuantity);

    console.log('jquery ready')
    var chartBool = false
    $('#look-cart').click(function () {
        chartBool = !chartBool
        if (chartBool) {
            $('#cart-modal').removeClass('left-[100vw]').addClass('left-0');
        }else{
            $('#cart-modal').addClass('left-[100vw]').removeClass('left-0');
        }
    })

    $(document).off('click', '#item-shop').on('click', '#item-shop', function() {
        var id = $(this).attr('idProduk');
        var nama = $(this).attr('namaProduk');
        var harga = parseInt($(this).attr('harga'));
        var image = $(this).attr('image');

        var isItemAdded = false

        $('.nama_barang').each(function() {
            if ($(this).text() === nama) {
                isItemAdded = true;
                return false;
            }
        });

        if (isItemAdded) {
            alert("Item already added to the cart");
            // addQuantity.call(this);
            return
        }

        var formattedHarga = harga.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });

        $(this).removeClass('hover:scale-105').addClass('hover:scale-80')

        $('#items-section').append(`
            <section id="item" class="item">
                <div class="w-full flex justify-between my-2">
                    <div id="menu-cart">
                        <div class="w-[4.5rem] h-[4.5rem] bg-contain bg-center flex justify-start items-start overflow-clip bg-slate-200 rounded-md" style="background-image: url('../../../public/img/${image}')">
                            <button type="button" id="delete-item" class="w-5 h-5 bg-red-500 text-white font-bold text-center text-xs">x</button>
                        </div>
                        <input type="text" value="${id}" name="id_produk[]" hidden>
                        <input type="text" value="${image}" name="image[]" hidden>
                        <input type="text" value="${nama}" name="nama_produk[]" hidden>
                        <input type="text" value="${formattedHarga}" name="harga_asli[]" hidden>
                        <h1 class="nama_barang">${nama}</h1>
                    </div>
                    <div id="actions" class="flex flex-col items-end justify-between pr-2">
                        <div id="subtotal-harga" class="flex flex-col items-end justify-start">
                            <span id="total-kali" class="total-kali">${formattedHarga}</span>
                            <input type="text" id="subtotal-input" value="${formattedHarga}" name="subtotal_asli[]" hidden>
                            <span id="harga-asli" class="text-[0.7rem] text-slate-500" >${formattedHarga}</span>
                        </div>
                        <div id="subtiture-btn" class="flex gap-2 font-bold items-center">
                            <button type="button" id="sub-quantity" class="border-2 border-red-600 w-6 h-6 text-center rounded-md">-</button>
                            <input name="quantitas[]" value="1" id="item-quantity" class="border border-slate-800 rounded-md w-8 bg-transparent text-center font-medium" type="text" >
                            <button type="button" id="add-quantity" class="border-2 border-green-600 w-6 h-6 text-center rounded-md">+</button>
                        </div>
                    </div>
                </div>
                <hr class="border border-slate-400 my-2">
            </section>
        `)
        updateTotalHarga()
        // console.log($('.item').length)
        setTimeout(() => {
            $(this).addClass('hover:scale-105').removeClass('hover:scale-80');
        }, 200);
    });

    function InvalidQuantity() {
        var quantityInput = $(this).parent().parent().find('#item-quantity');
        if (quantityInput.val() <= 0) {
            quantityInput.val(1);
        }
        updateSubtotal.call(this);
    }

    function addQuantity() {
        var quantityInput = $(this).parent().parent().find('#item-quantity');
        var currentQuantity = parseInt(quantityInput.val(), 10);
    
        // Check if the current value is a valid number
        if (!isNaN(currentQuantity) && currentQuantity > 0) {
            var newQuantity = currentQuantity + 1;
            if (newQuantity < 1) {
                quantityInput.val(1)
            }else{
                quantityInput.val(newQuantity);
                
            }
        }else{
            console.log('its a nan')
        }
        updateSubtotal.call(this);
    }

    function subQuantity() {
        var quantityInput = $(this).parent().parent().find('#item-quantity');
        var currentQuantity = parseInt(quantityInput.val(), 10);
    
        // Check if the current value is a valid number
        if (!isNaN(currentQuantity) && currentQuantity > 0) {
            var newQuantity = currentQuantity - 1;
            if (newQuantity < 1) {
                quantityInput.val(1)
            }else{
                quantityInput.val(newQuantity);
            }
        }else{
            console.log('its a nan')
        }
        updateSubtotal.call(this);
    }

    function updateSubtotal() {
        var subTotal = $(this).parent().parent().parent().find('#total-kali');
        var subTotalInput = $(this).parent().parent().parent().find('#subtotal-input');
        var hargaAsli = $(this).parent().parent().parent().find('#harga-asli');

        var clearHargaAsli = parseInt(hargaAsli.text().replace(/Rp/g, '').replace(/\./g, '').replace(/\,00/g, '').replace(/\ /g, ''));
        // var clearSubTotal = parseInt(subTotal.text().replace(/Rp/g, '').replace(/\./g, '').replace(/\,00/g, '').replace(/\ /g, ''));
        var quantity = parseInt($(this).parent().parent().find('#item-quantity').val());

        var totalKali = clearHargaAsli * quantity;
        var formattedHarga = totalKali.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });

        subTotal.text(formattedHarga)
        subTotalInput.val(formattedHarga)
        updateTotalHarga()
    }

    function deleteItem() {
        var deleteBarang = $(this).parent().parent().parent().parent().remove();
        console.log(deleteBarang)
        updateTotalHarga()
    }

    function updateTotalHarga() {
        var totalSum = 0;
        
        $('.total-kali').each(function() {
            // Get the text content of each element
            var textContent = $(this).text();
            // Remove non-numeric characters and convert to an integer
            var value = parseInt(textContent.replace(/Rp/g, '').replace(/\./g, '').replace(/\,00/g, '').replace(/\ /g, ''));
            // console.log(value)
        
            // Check if the conversion was successful and add to the totalSum
            if (!isNaN(value)) {
                totalSum += value;
            }
        });
        
        var formattedHarga = totalSum.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
        $('#total-items').text(formattedHarga);
    }
});