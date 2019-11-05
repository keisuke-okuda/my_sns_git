$('#form').keypress( function ( e ) {
    if ( e.which == 13 ) {                  
        console.log($('#post').val());
        $.ajax({
            url     : 'post/',
            type    : 'POST',
            headers : {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data    : {'post':$('#post').val()},
            dataType: 'json',
        })
        .done(function(data) {
        // 通信成功時の処理
        })
        .fail(function(XMLHttpRequest, textStatus, errorThrown) {
        // 通信失敗時の処理
        console.log("ajax通信に失敗しました")
            console.log(XMLHttpRequest.status);
            console.log(textStatus);
            console.log(errorThrown.message);
        });
        
      
    }
});