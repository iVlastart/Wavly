import $ from 'jquery';

$(document).ready(function(){
    $('#likeSpan').on('click', function(e){
        e.preventDefault();
        const id = $('#likeSpan').data('id');
        if(id===null) return;
        $.ajax({
            type: 'POST',
            url: `/like`,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: id
            },
            success: function(resp){
                alert(JSON.stringify(resp));
            },
            error: function(err){
                alert(JSON.stringify(err));
                //alert('Unable to like the video')
            }
        })
    });
});