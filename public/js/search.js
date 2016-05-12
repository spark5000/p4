$('form').submit(function(event) {
    event.preventDefault();
});


$('#searchTerm').keyup(function() {
    $.ajax({
        url: '/task/search',
        method: 'POST',
        dataType : 'html',
        data: {
            '_token': $('input[name=_token]').val(),
            'searchTerm': $('#searchTerm').val()
        },
        beforeSend: function() {
            $('#loading').show();
            $('#results').removeClass('error');
        },
        success: function(data) {
            $('#loading').hide();
            $('#results').html(data);
        },
        error: function() {
            $('#results').html('Sorry, there was an error; your request could not be completed.');
            $('#results').addClass('error');
        }
    });
});
