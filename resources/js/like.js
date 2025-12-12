import $ from 'jquery';

$(document).ready(function(){
    $('#likeForm').on('submit', function(e){
        e.preventDefault();
        const data = new FormData(this);
        const id = $('#likeForm').data('id');
        if(id===null) return;
        $.ajax({
            type: 'POST',
            url: `/like/${id}`,
            data: data,
        })
    });
});