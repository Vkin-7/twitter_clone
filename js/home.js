$(() => {
    
    $('#btn_tweet').click(() => {
        
        if($('#texto_tweet').val().length > 0)
            $.ajax({
                url: 'inclui_tweet.php',
                method: 'post',
                //data: { texto_tweet: $('#texto_tweet').val() },
                data: $('#form_tweet').serialize(),
                success: (data) => {
                    $('#texto_tweet').val('');
                    atualizaTweet();
                    atualizaPainel();
                }
            });

    });

    function atualizaPainel(){
        $.ajax({
            url: 'logica_painel.php',
            success: (data) => {
                $('#dados_painel').html(data);
            },
        });
    }

    function atualizaTweet(){
        $.ajax({
            url: 'get_tweet.php',
            method: 'post',
            success: (data) => {
                $('#tweets').html(data);
                atualizaPainel();

                $('.excluir').click(function (){
                    var id_tweet = $(this).data("id_tweet");
                    
                    $.ajax({
                        url: 'remover_tweet.php',
                        method: 'post',
                        data: {
                            id_tweet: id_tweet, 
                        },
                        success: (data) => { 
                            atualizaTweet();
                            atualizaPainel();
                         },
                    });
                });
                
            },
        });
    }

    atualizaPainel();
    atualizaTweet();

});