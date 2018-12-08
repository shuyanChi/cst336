$('document').ready(function(){
    $('.dino-link').click(function(){
        $.ajax({
            type: "GET",
            url: "api/getDinoInfo.php",
            dataType:"json",
            data: {"dino_id": $(this).attr('Id')},
            success: function(data, status) {
                $("#name").html(data.Name);
                $("#dis").html(data.description);
                $("#d-img").attr('src', data.Image);
            },
            
        });//ajax closing
        //alert($(this).attr('Id'))
    })//link
});//document

