$(document).ready(function() {
    $('#buscar').on('click', function() {
        var produto = $('#produto').val();

        $.ajax({
            url: '/public/index.php',
            method: 'GET',
            data: {
                nome: produto,
                token: 'secreto'
            },
            success: function(response) {
                var data = JSON.parse(response);
                if (data.erro) {
                    $('#resultado').html('<p>' + data.erro + '</p>');
                } else {
                    $('#resultado').html('<p>Preço: ' + data.preco + '</p><p>Última alteração: ' + data.data_ultima_alteracao + '</p>');
                }
            },
            error: function() {
                $('#resultado').html('<p>Erro na requisição.</p>');
            }
        });
    });
});
