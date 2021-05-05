/* Variaveis Globais */
var base_url = window.location.origin;

/* FUNÇÃO DO FORM */
$("form:not('.ajax-off')").submit(function (e) {
    e.preventDefault();
    /* Define o Formulário */
    var form = $(this),
        formData = new FormData(this);
    /* Faz a Requisição */
    $.ajax({
        url: form.attr("action"),
        data: formData, //form.serialize()
        dataType: 'json',
        type: 'post',
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function (x, o) {
            console.log('Enviando Dados...');
            overlayOpen(true);
        },
        success: function (response) {
            console.log(response);

            /* Verifica Mensagem */
            if(response.message){msgToast(response.message);}

            /* Verifica Ação */
            if(response.action){action(response.action, form);}

            overlayOpen(false);
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log(errorThrown);
            overlayOpen(false);
        }
    });

});

$('.ajaxLink').click(function(e){
    e.preventDefault();
    var $url = $(this).attr('href');

    $.ajax({
        url: $url,
        dataType: 'json',
        type: 'post',
        async: true,
        beforeSend: function () {
            console.log('Enviando Dados...');
            overlayOpen(true);
        },
        success: function (response) {
            console.log(response);

            /* Verifica Mensagem */
            if(response.message){msgToast(response.message);}

            /* Verifica Ação */
            if(response.action){action(response.action, form);}

            overlayOpen(false);
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log(errorThrown);
            overlayOpen(false);
        }
    });

});

/* Ajax Actions */
function action(action,obj){
    console.log('Ação Requirida');
    $.each(action, function (k,a){
        switch (a.rule) {

            /* Carregar Dados no DataTable */
            case 'loadDataTable':
                $('#'+a.data.tableId).DataTable().ajax.reload();
                break;

            /* Limpa Formulário */
            case 'clearForm':
                $(':input',obj)
                    .not(':button, :submit, :reset')
                    .val('')
                    .removeAttr('checked')
                    .removeAttr('selected');
                break;

            /* Carrega Formulário */
            case 'loadForm':
                $.each(a.data, function (k,v){
                    $(obj).each(function(){
                        $(this).find('#'+k).val(v);
                    });
                });
                break;

            case 'redirectUri':
                window.location = base_url+'/'+a.data;
                break;

            case 'reload':
                location.reload();
                break;

            /* Padrão */
            default:
                console.log('Ação não reconhecida');
        }
    });
}

/* Função de Mensagem */
function msgToast(message){
    $.toast({
        heading:    message.title,
        text:       message.text,
        icon:       message.icon,
        hideAfter:  message.duration,
        position:   'top-right',
        stack:      false
    });
}

/* Monitora AjaxLink */
$(document).on('click', '.ajaxlink', function(e){
    e.preventDefault();
    /* Inicializa Variáveis */
    var url = $(this).data('link');
    var obj = $(this).data('obj');
    /* Get Items */
    $.getJSON(url, function (response) {
        console.log('Sucesso!');
        /* Mensagem */
        if(response.message){msgToast(response.message);}
        /* Ação */
        if(response.action){action(response.action,$('#'+obj));}
    }).fail(function(response) {
        console.log ('Oops', response);
    });
});

function overlayOpen(type) {
    if(type){
        $('.sidenav-overlay').addClass('active');
    }else{
        $('.sidenav-overlay').removeClass('active');
    }

    return;
}
