
$('#message_form').on('submit', function (event) {
    console.log('Click button ' + event.target.name)
    $(this).find('input[type="submit"]').attr('disabled', true);
});
