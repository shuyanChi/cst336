<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <!-- Include JS File Here -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="js/disable_radio.js"></script>
<script>
$(document).ready(function() {
// By Default Disable radio button
$(".starValue").attr('disabled', true);
// $(".wrap").css('opacity', '.2'); // This line is used to lightly hide label for disable radio buttons.
// Disable radio buttons function on Check Disable radio button.
$("star input:radio").change(function() {
if ($(this).val() == "One" || $(this).val() == "Two" || $(this).val() == "Three" || $(this).val() == "Four") {
$(".starValue").attr('checked', false);
$(".starValue").attr('disabled', true);
// $(".wrap").css('opacity', '.2');
}
// Else Enable radio buttons.
else {
$(".starValue").attr('disabled', false);
// $(".wrap").css('opacity', '1');
}
});
});
</script>
        <script>
        $('document').ready(function(){
            $('star').change(function(){
                $('input[name=rat]').prop('disabled', true);
                $('input[name=rat]:checked').each(function() {
                   $('input[name=rat][value=' + $(this).val() + ']').prop('disabled', false);
                });
                // $('#petModal').modal("show");
                $.ajax({
                    type: "GET",
                    url: "api/getStar.php",
                    dataType: "json",
                    data: {"petid": $(this).attr('id')},
                    success: function(data, status) {
                        $("#petname").html(data.name);
                        $("description").html(data.description);
                        $("#petImage").attr('src', "img/" + data.picutreURL);
                        //alert(data);
                    },
                }); //ajax closing
            }); //petlink click
        });//doc end
        </script>
    </head>
    <body>
        <iframe width="420" height="345" src="https://www.youtube.com/embed/tgbNymZ7vqY">
        </iframe>
        <form id="star">
            <input type="radio" class = "starValue" name="rat" value="One"> One
            <input type="radio" class = "starValue" name="rat" value="Two"> Two
            <input type="radio" class = "starValue" name="rat" value="Three">Three  
            <input type="radio" class = "starValue" name="rat" value="Four">Four<br>
        </form>
    </body>
</html>