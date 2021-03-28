$(function(){
    $('#formLogin').submit(function(e){
        e.preventDefault();
        $.ajax({
            url: "/login",
            type: "POST",
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response){
                if(response.success === true ){
                    window.location.href = "/admin"
                } else{
                    $('.messageBox').removeClass('d-none').html(response.message)
                }
                console.log(response)
            }
        })
    })
})
