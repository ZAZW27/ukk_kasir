
$(document).ready(function() {

    $(document).off('click', '#add-quantity').on('click', '#add-quantity', addQuantity);
    $(document).off('click', '#sub-quantity').on('click', '#sub-quantity', subQuantity);

    function addQuantity() {
        var quantityInput = $(this).parent().parent().find('#item-quantity');
        var currentQuantity = parseInt(quantityInput.val(), 10);
    
        // Check if the current value is a valid number
        if (!isNaN(currentQuantity) && currentQuantity >= 0) {
            var newQuantity = currentQuantity + 1;
            if (newQuantity < 0) {
                quantityInput.val(0)
            }else{
                quantityInput.val(newQuantity);
                
            }
        }else{
            console.log('its a nan')
        }
    }

    function subQuantity() {
        var quantityInput = $(this).parent().parent().find('#item-quantity');
        var currentQuantity = parseInt(quantityInput.val(), 10);
    
        // Check if the current value is a valid number
        if (!isNaN(currentQuantity) && currentQuantity >= 0) {
            var newQuantity = currentQuantity - 1;
            if (newQuantity < 0) {
                quantityInput.val(0)
            }else{
                quantityInput.val(newQuantity);
            }
        }else{
            console.log('its a nan')
        }
    }
});