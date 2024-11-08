$(document).ready(function() {
    // Função para buscar o preço do produto
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

    // Função para cadastrar o novo produto
    $('#formCadastroProduto').on('submit', function(e) {
        e.preventDefault();
        var nomeProduto = $('#nomeProduto').val();
        var precoProduto = $('#precoProduto').val();

        $.ajax({
            url: '/public/index.php', // A URL para processar a requisição POST
            method: 'POST',
            data: {
                nomeProduto: nomeProduto,
                precoProduto: precoProduto
            },
            success: function(response) {
                var data = JSON.parse(response);
                if (data.sucesso) {
                    alert(data.sucesso);
                } else if (data.erro) {
                    alert(data.erro);
                }
            },
            error: function() {
                alert('Erro ao cadastrar o produto.');
            }
        });
    });
});
