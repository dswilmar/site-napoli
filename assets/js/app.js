$('body').on('click', '.modal-toggle', function (event) {
    event.preventDefault();
    $('.modal-content').empty();
    $('#modalCampeonato')
        .removeData('bs.modal')
        .modal({remote: $(this).attr('href') });
});