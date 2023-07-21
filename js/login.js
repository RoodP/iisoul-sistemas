function login(){
    
    let email = $('#email_login').val();
    let senha = $('#email_senha').val();

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
            senha   : senha,    
            acao    : btoa ('login')        
        },
        success: function(data){
            
            if(data.status == true){ 
                window.location.href = "http://iisoul-formulario.local/index.php";
                alert_page('Ok!', data.msg, 'sucsess');
            }else{
                alert_page('Erro!', data.msg, 'warning');
            }
        },
    });
}
