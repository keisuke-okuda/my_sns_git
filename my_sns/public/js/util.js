//AjaxRequest
var ajaxRequest = function ajaxRequest (url, method, data, dataType) 
{
    $.ajax({
        url     : url,
        type    : method,
        headers : {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data    : data,
        dataType: dataType,
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

//postがされたらサーバーに処理を投げてデータを登録
$('#form').keypress( function ( e ) {
    if ( e.which == 13 ) { 
        
        var url      = 'post/';
        var method   = 'POST';
        var postVal  = $('#post').val(); 
        var data     = { 'post' : postVal}        
        var dataType = 'json';
        
        console.log(postVal);

        ajaxRequest(url, method, data, dataType);    
    }
});

//postがされたらサーバーに処理を投げてデータを登録
$('.btn').click( function ( e ) {
    
        
        var url      = 'follow/store';
        var method   = 'POST';
        var Val      = $(this).val(); 
        var data     = { 'follow' : Val}        
        var dataType = 'json';
        
        console.log(Val);

        ajaxRequest(url, method, data, dataType);    
    
});

