import $ from 'jquery';

$(document).ready(function(){
    $('#likeSpan').on('click', function(e){
        e.preventDefault();
        const id = $('#likeSpan').data('id');
        alert(id)
        if(id===null) return;
        $.ajax({
            type: 'POST',
            url: `/like`,
            data: {
                id: id
            },
            success: function(resp){
                alert(JSON.stringify(resp));
            },
            error: function(err){
                alert(err);
            }
        })
    });
});