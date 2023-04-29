$(function () {

    //URL BASE DO PROJETO
    getBase = $("link[rel='base']").attr("href");

    //Menu Mobile
    $(".icon_nav_bar").click(function(e){
        e.preventDefault();
        $(".main_header_departments").slideToggle();
    }); 

    $(".my_account").click(function (e) {
        e.preventDefault();
        $(".main_header_nav_menu_user:hover nav").toggle();
    });

    $(".mask-document").mask('000.000.000-00');
    $(".mask-date").mask('00/00/0000');
    $(".mask-code").mask('00000-000');

    //search code zip
    $(".label_group_search_code").click(function (e) {
        e.preventDefault();

        let cep = $("input[name=code]").val();
        let normalizeCep = cep.replace(/[^\d]+/g, '');

        $.ajax({
            url: 'https://api.postmon.com.br/v1/cep/' + normalizeCep,
            type: 'GET',
            dataType: 'json',
            success: function (json) {
                console.log(json)
                if (typeof json.cidade != 'undefined') {
                    $("input[name=street]").val(json.logradouro);
                    $("input[name=neighborhood]").val(json.bairro);
                    $("input[name=city]").val(json.cidade);
                    $("input[name=uf]").val(json.estado_info.nome);
                }
            }
        });

    });

    $(".j_btn_finalizar").click(function (e) {
        e.preventDefault();
        let vlrFrete = $(".cart_frete").val();
        let cep = $(".j_cep_frete").val();
        if (!cep && !vlrFrete) {
            alert("Preencha o campo CEP para calcular o Frete");
        } else {
            window.location.href = $(this).attr("href");
        }

    })

    //privacy
    $(".j_prosseguir").click(function(){
        localStorage.setItem("privacy", "true");
        $(".context_privacy").fadeOut(200);
    })

    $(document).ready(function(){
        let privacy = localStorage.getItem("privacy");

        if(privacy == "true"){
            $(".context_privacy").css("display", "none");
        } else {
            $(".context_privacy").fadeIn();
        }
    });

    //ajax form
    $("form:not('.ajax_off')").submit(function (e) {
        e.preventDefault();
        var form = $(this);
        var load = $(".ajax_load");
        var flashClass = "ajax_response";
        var flash = $("." + flashClass);

        form.ajaxSubmit({
            url: form.attr("action"),
            type: "POST",
            dataType: "json",
            beforeSend: function () {
                load.fadeIn(200).css("display", "flex");
            },
            success: function (response) {
                //redirect
                if (response.redirect) {
                    window.location.href = response.redirect;
                } else {
                    load.fadeOut(200);
                }

                //message
                if (response.message) {
                    if (flash.length) {
                        flash.html(response.message).fadeIn(100).effect("bounce", 300);
                    } else {
                        form.prepend("<div class='" + flashClass + "'>" + response.message + "</div>")
                            .find("." + flashClass).effect("bounce", 300);
                    }
                } else {
                    flash.fadeOut(100);
                }
            },
            complete: function () {
                if (form.data("reset") === true) {
                    form.trigger("reset");
                }
            }
        });
    });
});