(function ($) {

    $.fn.fdata = function (options) {

        var settings = $.extend({
            'calendario': false
        }, options);


        function fdata(data) {

            if (data == "")
                return data;

            if (data == undefined)
                return "";

            if (isdate(data) == false) {

                data = strtodate(data);
            }

            if (data == undefined || data == "")
                return "";

            dia = data.getDate();
            mes = data.getMonth() + 1;
            ano = data.getFullYear();

            if (dia < 10)
                dia = "0" + dia
            if (mes < 10)
                mes = "0" + mes
            if (ano < 2000)
                ano = "19" + ano
            var data_final = dia + "/" + mes + "/" + ano;

            if (valida_data(data_final) == false) {
                return "";
            }
            else {
                return data_final;
            }
        }

        this.focusin(function () {
            $(this).select();
        });
        this.blur(function () {

            var s = $(this).val();

            if (valida_data(s)) {
                return;
            }

            if (s.length > 0) {
                var data = new Date();

                if (s[0] == "H") {
                    if (s.length > 2 && s.substr(1, 1) == "+") {
                        var dias = s.substr(2, s.length - 2);
                        dias = parseInt(dias);
                        data.setDate(data.getDate() + dias);
                        $(this).val(fdata(data));
                        return;
                    }
                    else if (s.length > 2 && s.substr(1, 1) == "-") {
                        var dias = s.substr(2, s.length - 2);
                        dias = parseInt(dias);
                        data.setDate(data.getDate() - dias);
                        $(this).val(fdata(data));
                        return;
                    }
                }
                else if (s[0] == "A") {
                    data.setDate(data.getDate() + 1);
                    $(this).val(fdata(data));
                    return;
                }
                else if (s[0] == "O") {
                    data.setDate(data.getDate() - 1);
                    $(this).val(fdata(data));
                    return;
                }
                else if (s.length <= 10) { //se informar apenas o dia
                    dia = parseInt(s.substr(0, 2));
                    mes = data.getMonth() + 1;
                    ano = data.getFullYear();

                    //corrige o dia se foi digitado maior que o mes aceita
                    if (dia > 31) {
                        switch (mes) {
                            case 1: //janeiro
                            case 3: //marco
                            case 5: //maio
                            case 7: //julho
                            case 8: //agosto
                            case 10: //outubro
                            case 12: //dezembro
                            default:
                                dia = 31;
                            case 2: //fevereiro
                                dia = 28;
                            case 4: //abril
                            case 6: //junho
                            case 9: //setembro
                            case 11: //novembro
                                dia = 30;
                        }
                    }

                    if (s.length >= 4) {
                        mes = parseFloat(s.substr(2, 2)) - 1;
                    }

                    if (s.length == 6) {
                        ano = parseFloat(String(ano).substr(0, 2) + s.substr(4, 2));
                    }

                    if (s.length == 8) {
                        ano = parseFloat(s.substr(4, 4));
                    }

                    data = new Date(ano, mes, dia);
                    $(this).val(fdata(data));
                    return;
                }
                else if (s.length == 4) { //se informar apenas o dia e mes
                    dia = parseInt(s);
                    mes = data.getMonth() + 1;
                    ano = data.getFullYear();

                    //corrige o dia se foi digitado maior que o mes aceita
                    if (dia > 31) {
                        switch (mes) {
                            case 1: //janeiro
                            case 3: //marco
                            case 5: //maio
                            case 7: //julho
                            case 8: //agosto
                            case 10: //outubro
                            case 12: //dezembro
                            default:
                                dia = 31;
                            case 2: //fevereiro
                                dia = 28;
                            case 4: //abril
                            case 6: //junho
                            case 9: //setembro
                            case 11: //novembro
                                dia = 30;
                        }
                    }

                    data = new Date(ano, mes, dia);
                    $(this).val(fdata(data));
                    return;
                }

                $(this).val(fdata(data));
            }

        });

        ////pega o componente em que o txt esta
        //var parent = $(this).parent()

        ////cria o botao para pesquisar no calendario
        //var id_img = "img_" + this.id;
        //var img = $('<img>', { id: id_img, title: 'Clique para abrir o calendário', src: '/img/calendario16.png' }).appendTo(parent);

        ////var child = parent.children(':last')
        //parent.append(html_img);

        if (settings.calendario == true) {
            $(this).datepicker({
                showOn: "button",
                buttonImage: "/img/calendario16.png",
                buttonImageOnly: true
            });
        }

        this.val(fdata(this.val()));
    }

    $.fn.f1dec = function () {

        //funcoes
        function fvalor(num) {

            if (num == "" || num == undefined) {
                return "0,0";
            }

            num = String(num).replace('.', ',');

            var tem_virgula = num.indexOf(",", 0);

            var inteiro = 0;
            var decimais = "0";

            if (tem_virgula > 0) {
                inteiro = num.substr(0, tem_virgula);
                decimais = num.substr(tem_virgula + 1, 1);
            }
            else {
                inteiro = num.substr(0, num.length);
            }

            if (decimais.length < 1) {
                decimais = decimais + "0";
            }

            var final = inteiro + "," + decimais;

            return final;
        }

        //estilo
        this.css({ "text-align": "right" });

        //aplica a formatacao ao iniciaro campo
        var valor = fvalor(this.val());
        this.val(valor);

        //eventos
        this.focusin(function () {
            $(this).select();
        });

        this.blur(function () {

            var num = $(this).val();

            var final = fvalor(num);

            $(this).val(final);

        });


    }

    $.fn.f2dec = function () {

        //funcoes
        function fvalor(num) {

            if (num == "" || num == undefined) {
                //return "0,00";
                return "";
            }

            num = String(num).replace('.', ',');

            var tem_virgula = num.indexOf(",", 0);

            var inteiro = 0;
            var decimais = "0";

            if (tem_virgula > 0) {
                inteiro = num.substr(0, tem_virgula);
                decimais = num.substr(tem_virgula + 1, 2);
            }
            else {
                inteiro = num.substr(0, num.length);
            }

            if (decimais.length < 2) {
                decimais = decimais + "0";
            }

            var final = inteiro + "," + decimais;

            return final;
        }

        //estilo
        this.css({ "text-align": "right" });

        //aplica a formatacao ao iniciaro campo
        var valor = fvalor(this.val());
        this.val(valor);

        //eventos
        this.focusin(function () {
            $(this).select();
        });

        this.blur(function () {

            var num = $(this).val();

            var final = fvalor(num);

            $(this).val(final);

        });


    }

    $.fn.f3dec = function () {

        //funcoes
        function fvalor(num) {

            if (num == "" || num == undefined) {
                return "0,000";
            }

            num = String(num).replace('.', '');

            var tem_virgula = num.indexOf(",", 0);

            var inteiro = 0;
            var decimais = "000";

            if (tem_virgula > 0) {
                inteiro = num.substr(0, tem_virgula);
                decimais = num.substr(tem_virgula + 1, 3);
            }
            else {
                inteiro = num.substr(0, num.length);
            }

            if (decimais.length == 1) {
                decimais = decimais + "00";
            }
            else if (decimais.length == 2) {
                decimais = decimais + "0";
            }

            var final = inteiro + "," + decimais;

            return final;
        }

        //estilo
        this.css({ "text-align": "right" });

        //aplica a formatacao ao iniciaro campo
        var valor = fvalor(this.val());
        this.val(valor);

        //eventos
        this.focusin(function () {
            $(this).select();
        });
        this.blur(function () {

            var num = $(this).val();

            var final = fvalor(num);

            $(this).val(final);

        });

    }

    $.fn.f4dec = function () {

        //funcoes
        function fvalor(num) {

            if (num == "" || num == undefined) {
                return "0,0000";
            }

            num = String(num).replace('.', '');

            var tem_virgula = num.indexOf(",", 0);

            var inteiro = 0;
            var decimais = "0000";

            if (tem_virgula > 0) {
                inteiro = num.substr(0, tem_virgula);
                decimais = num.substr(tem_virgula + 1, 4);
            }
            else {
                inteiro = num.substr(0, num.length);
            }

            if (decimais.length == 1) {
                decimais = decimais + "000";
            }
            else if (decimais.length == 2) {
                decimais = decimais + "00";
            }
            else if (decimais.length == 3) {
                decimais = decimais + "0";
            }

            var final = inteiro + "," + decimais;

            return final;
        }

        //estilo
        this.css({ "text-align": "right" });

        //aplica a formatacao ao iniciaro campo
        var valor = fvalor(this.val());
        this.val(valor);

        //eventos
        this.focusin(function () {
            $(this).select();
        });
        this.blur(function () {

            var num = $(this).val();

            var final = fvalor(num);

            $(this).val(final);

        });

    }

    $.fn.fcep = function (options) {

        var settings = $.extend({
            cep: undefined,
            logradouro: undefined,
            complemento: undefined,
            bairro: undefined,
            localidade: undefined,
            uf: undefined,
            unidade: undefined,
            ibge: undefined,
            gia: undefined
        }, options);

        //eventos
        this.focusin(function () {
            $(this).select();
        });

        this.blur(function () {

            /**
            * Resgatamos o valor do campo #cep
            * usamos o replace, pra remover tudo que não for numérico,
            * com uma expressão regular
            */
            var cep = $(this).val().replace(/[^0-9]/, '');

            //Verifica se não está vazio
            if (cep !== "") {
                //Cria variável com a URL da consulta, passando o CEP
                var url = 'https://viacep.com.br/ws/' + cep + '/json/';

                /**
				* Fazemos um requisição a URL, como vamos retornar json,
				* usamos o método $.getJSON;
				* Que é composta pela URL, e a função que vai retorna os dados
				* o qual passamos a variável json, para recuperar os valores
				*/
								
                $.getJSON(url, function (json) {
                    //Atribuimos o valor aos inputs
                    if (settings.cep != undefined) { $(settings.cep).val(json.cep); }
                    if (settings.logradouro != undefined) { $(settings.logradouro).val(json.logradouro); }
                    if (settings.complemento != undefined) { $(settings.complemento).val(json.complemento); }
                    if (settings.bairro != undefined) { $(settings.bairro).val(json.bairro); }
                    if (settings.localidade != undefined) { $(settings.localidade).val(json.localidade); }
                    if (settings.uf != undefined) { $(settings.uf).val(json.uf); }
                    if (settings.unidade != undefined) { $(settings.unidade).val(json.unidade); }
                    if (settings.ibge != undefined) { $(settings.ibge).val(json.ibge); }
                    if (settings.gia != undefined) { $(settings.gia).val(json.gia); }

                    //Usamos o método fail, caso não retorne nada
                }).fail(function () {
                    //Não retornando um valor válido, ele mostra a mensagem
                    //msgErro.removeClass('ocultar').html('CEP inexistente')
                    if (settings.cep != undefined) { $(settings.cep).val(''); }
                    if (settings.logradouro != undefined) { $(settings.logradouro).val(''); }
                    if (settings.complemento != undefined) { $(settings.complemento).val(''); }
                    if (settings.bairro != undefined) { $(settings.bairro).val(''); }
                    if (settings.localidade != undefined) { $(settings.localidade).val(''); }
                    if (settings.uf != undefined) { $(settings.uf).val(''); }
                    if (settings.unidade != undefined) { $(settings.unidade).val(''); }
                    if (settings.ibge != undefined) { $(settings.ibge).val(''); }
                    if (settings.gia != undefined) { $(settings.gia).val(''); }
                });
            }
        });

    }
	
}(jQuery));
