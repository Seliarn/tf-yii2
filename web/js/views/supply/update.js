$('#new-supply-item-btn-add').click(function () {
    debugger;
    var newSupplyItem = $('.new-supply-item-fields').clone().appendTo('.supply-item-list');
    newSupplyItem.removeClass('hide new-supply-item-fields').addClass('supply-item-fields');
    $('supply-item-input', newSupplyItem).each(function (el) {
        
    });

});
