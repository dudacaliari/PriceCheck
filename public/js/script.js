$(document).ready(function() {
    $('#buscar').on('click', function() {
        var produto = $('#produto').val();

        // Verificando se o campo do produto não está vazio
        if (!produto) {
            $('#resultado').html('<p>Por favor, insira o nome do produto.</p>');
            return;
        }

        // Fazendo a requisição para a API usando GET
        $.ajax({
            url: '/app/controllers/ConsultaController.php',
            method: 'GET',  // O método GET é utilizado aqui
            data: {
                nome: produto
            },
            success: function(response) {
                var data = JSON.parse(response);
                if (data.erro) {
                    $('#resultado').html('<p>' + data.erro + '</p>');
                } else {
                    $('#resultado').html('<p>Preço: ' + data.preco + '</p><p>Última alteração: ' + data.data_ultima_alteracao + '</p>');
                }
            },
            error: function(xhr, status, error) {
                $('#resultado').html('<p>Erro na requisição: ' + error + '</p>');
                console.log("Erro:", error);
            }
        });
    });
});
