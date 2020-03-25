$(function(){
    $('#btn_login').click(() => {
        
        var campo_vazio = false;

        if($('#campo_usuario').val() == ''){
            $('#campo_usuario').css({
                'border-color': '#a94442',
                'background-color': '#ffb3b3',
            });

            campo_vazio = true;

        }else 
            $('#campo_usuario').css({
                'border-color': '#ccc',
                'background-color': '#fff',
            }); 



        if($('#campo_senha').val() == ''){
            $('#campo_senha').css({
                'border-color': '#a94442',
                'background-color': '#ffb3b3',
            });

            campo_vazio = true;

        }else 
            $('#campo_senha').css({
                'border-color': '#ccc',
                'background-color': '#fff',
            }); 

        if(campo_vazio) return false;

    });
});