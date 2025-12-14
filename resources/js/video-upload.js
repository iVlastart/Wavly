import $ from 'jquery';

$(document).ready(function(){
    alert('loaded');
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