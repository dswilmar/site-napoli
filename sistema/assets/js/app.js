$(document).ready(function() {

    $('.del').click(function() {
        return confirm('Deseja mesmo excluir este registro?');
    });

    $('.grid').DataTable({
    	'language': {
    		'url': 'assets/js/Portuguese-Brasil.json'
    	}
    });    

    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#txtEndereco").val("");
        $("#txtBairro").val("");
        $("#txtCidade").val("");
        $("#txtUf").val("");
    }

    $("#txtCep").mask('00000-000');
    $('#txtCpfCnpj').mask('000.000.000-00');
    $('.val').mask("#.##0,00", {reverse: true});

    $('#selTipoCliente').change(function(){
        var tipo = $(this).val();
        if (tipo == 'F') {
            $('#txtCpfCnpj').mask('000.000.000-00');
            $('#txtCpfCnpj').val("");
            $('#txtCpfCnpj').focus();
        } else {
            $('#txtCpfCnpj').mask('00.000.000/0000-00');
            $('#txtCpfCnpj').val("");
            $('#txtCpfCnpj').focus();
        }
    });

    $('input[type=tel]').focusout(function(){
		var phone, element;
		element = $(this);
		element.unmask();
		phone = element.val().replace(/\D/g, '');
		if(phone.length > 10) {
			element.mask("(99) 99999-9999");
		} else {
			element.mask("(99) 9999-99999");
		}
	}).trigger('focusout');

    $("#txtCep").blur(function() {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#txtEndereco").val(dados.logradouro);
                        $("#txtBairro").val(dados.bairro);
                        $("#txtCidade").val(dados.localidade);
                        $("#txtUf").val(dados.uf);
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        alert("CEP não encontrado.");
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    });    

    $('#txtTime').focus(function() {
        let escola = $('#txtEscola option:selected').text();
        let categoria = $('#txtCategoria option:selected').text();
        let time = escola + ' - ' + categoria;
        $(this).val(time);
    });

    $('.listAlunos').autoComplete({
        resolverSettings: {
            url: 'ajax/list-alunos.php'
        }
    });

    $('.listTimes').autoComplete({
        resolverSettings: {
            url: 'ajax/list-times.php'
        }
    });

    $('#selectCampeonato2').change(function(){
        let cod_campeonato = $(this).val();
        if (cod_campeonato > 0) {
            $.ajax({
                type: 'GET',
                url: 'ajax/list-rodadas.php',
                data: 'cod_campeonato=' + cod_campeonato,
                dataType: 'json',
                success: dados => {
                    var option;
                    if (dados.length > 0){
                      $.each(dados, function(i, obj){
                        option += `<option value =${obj.value}>${obj.text}</option>`;
                      })
                    }
                    $('#selectRodada').html(option).show();
                }
            });
        } else {
            var option;
            option = '<option></option>';
            $('#selectRodada').html(option).show();
        }
    });

    $('#selectCampeonato2').change(function(){        
                
        let cod_campeonato = $('#selectCampeonato2 option:selected').val();
        
        if (cod_campeonato > 0) {
            $('#selectTimes').empty();
            var option;
            option = '<option></option>';
            $.ajax({
                type: 'GET',
                url: 'ajax/list-times-campeonato.php',
                data: 'cod_campeonato=' + cod_campeonato,
                dataType: 'json',
                success: dados => {                    
                    if (dados.length > 0){
                      $.each(dados, function(i, obj){
                        option += `<option value =${obj.value}>${obj.text}</option>`;
                      })
                    }
                    $('#selectTimes').append(option);
                }
            });
        } else {
            var option;
            option = '<option></option>';
            $('#selectTimes').html(option).show();
        }
    });

    $('#selectTimes').change(function(){        
                
        let cod_time = $('#selectTimes option:selected').val();
        
        if (cod_time > 0) {
            $('#selectAlunos').empty();
            var option;
            option = '<option></option>';
            $.ajax({
                type: 'GET',
                url: 'ajax/list-alunos-time.php',
                data: 'cod_time=' + cod_time,
                dataType: 'json',
                success: dados => {
                    if (dados.length > 0){
                      $.each(dados, function(i, obj){
                        option += `<option value =${obj.value}>${obj.text}</option>`;
                      })
                    }
                    $('#selectAlunos').append(option);
                }
            });
        } else {
            var option;
            option = '<option></option>';
            $('#selectAlunos').html(option).show();
        }
    });

});

function openKCFinder(field) {
    window.KCFinder = {
        callBack: function(url) {
            field.value = url;
            window.KCFinder = null;
        }
    };
    window.open('kcfinder/browse.php?type=files&dir=files/public&lang=pt-br', 'kcfinder_textbox',
        'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
        'resizable=1, scrollbars=0, width=800, height=600'
    );
}