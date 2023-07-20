function logar(){
    
    let email = $('#email_lg').val();
    let senha = $('#senha_lg').val();

        if(email == ''){
            alert_page('Erro', 'verifique seu email', 'warning');
            return false;
        }
        if(senha == ''){
            alert_page('Erro', 'verifique sua senha', 'warning');
            return false;
        }
        
    $.ajax({
        type: "POST",
        url: 'rotinas/login.php',
        dataType:"json",
        data:{
            email   : email,
            senha   : btoa (senha),    
            acao    : btoa ('logar')        
        },
        success: function(response){
            
            if(response.status == true){
                alert_page('Sucesso!', response.msg, 'success');
                window.location.href = "http://iisoul-formulario.local/";
            }else{
                alert_page('Erro!', response.msg, 'warning');
            }
        },
        error: function(e){
            alert_page('Erro!', e, 'warning');

        }
    });
}
