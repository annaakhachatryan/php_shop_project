$(document).ready(function(){
    $('#btn_add').click(function(){
        let name = $('#inp').val();
        $.ajax({
            url: '../Controller/add_cat.php',
            method: 'post',
            dataType: "html",
            data: {
                name,
                action: 'add',
            },
            success: function(x){
                if(x =='error'){
                    $('#p_mess').html('Empty field!');

                }else{
                    location.reload();
                }
            }
        });
    });



    $('.btn_upd').click(function(){
        let id = $(this).parents('tr').attr('id');
        let name = $(this).parent().prev().text();
        $.ajax({
            url: '../Controller/add_cat.php',
            method: 'post',
            data: {
                name,
                id,
                action: 'update',
            },
            success: function(){
                location.reload();
                console.log('update')
            },
        })
    });

    $('.btn_del').click(function(){
        let id = $(this).parents('tr').attr('id');
        $.ajax({
            url: '../Controller/add_cat.php',
            method: 'post',
            data: {
                id,
                action: 'delete',
            },
            success: function(){
                location.reload();
            },

        });
    });

});