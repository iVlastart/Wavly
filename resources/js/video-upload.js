import $ from 'jquery';

$(document).ready(function(){
    $('#uploadForm').on('submit', function(e){
        e.preventDefault();

        var data = new FormData(this);

        $.ajax({
            type: 'POST',
            url: '/video/store',
            data: data,
        })
    });
});