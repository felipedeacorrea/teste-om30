/**
*   API DE CONSULTA NO VIACEP V1.0 - Janeiro/2020
*   @author Felipe Correa - felipedeacorrea@gmail.com
*/

$(document).ready(function (){

    /* Tabela de Equiparação */
    var camposViaCep = {
        cep         :"cep",
        logradouro  :"logradouro",
        complemento :"complemento",
        bairro      :"bairro",
        localidade  :"cidade",
        uf          :"uf",
        ibge        :"id_cidade",
        gia         :"",
        ddd         :"",
        siafi       :"",
    };

    /* Gatilho Busca Cep */
    $('.buscacep').click(function () {
        buscaCep();
    });

    /* Busca o Cep */
    function buscaCep(){

        /* Expressão regular do CEP */
        var validacep = /^[0-9]{8}$/;

        /* Cria variavel cep limpa */
        var cep = $("#"+camposViaCep.cep).val().replace(/\D/g, '');

        /* Verifica se o cep esta preenchido */
        if(!cep) { alert('Por favor digite um cep'); return; }

        /* Verifica Formato do Cep */
        if (!validacep.test(cep)){ alert('Cep Inválido'); return; }

        /* Mensagem de Carregando */
        $('#'+camposViaCep.logradouro).val('Carregando...');

        /* Busca o cep */
        $.getJSON("//viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {
            if (!("erro" in dados)) {

                /* Sucesso */
                $.each(dados, function (k,v) {
                    $("#"+camposViaCep[k]).val(v);
                });

            } else {

                /* Erro */
                $.each(camposViaCep, function () {
                    $('#'+this).val('');
                });

                alert("Cep Não Encontrado.");

            }
        });


    }

});