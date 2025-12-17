import $ from 'jquery';

$(document).ready(function(){
    $('#likeSpan').on('click', function(e){
        e.preventDefault();
        const likeSpan = $('#likeSpan')
        const id = likeSpan.data('id');
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
                const isLiked = resp.liked;
                const svg = likeSpan.find('svg path');
                svg.attr('fill', resp.liked ? 'currentColor' : 'white');
            },
            error: function(err){
                alert('Unable to like the video');
            }
        })
    });
});