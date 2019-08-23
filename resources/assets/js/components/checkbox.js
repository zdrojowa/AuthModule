$('.checkbox').click(function () {
    const checkbox = $(this);
    const hiddenInput = $(checkbox.data('checkbox-for'));

    if($(this).hasClass('active')) {
        hiddenInput.val(null);
        $(this).removeClass('active');
    }
    else {
        hiddenInput.val('on');
        $(this).addClass('active');
    }
});
