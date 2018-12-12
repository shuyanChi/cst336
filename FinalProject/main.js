//modal
$('document').ready(function() {
  $('#btn').click(function() {
      ("#container").html("<img src='img/loading.gif' />");
      $('#petModal').modal("show");
      $.ajax({
        type: "GET",
        url: "api/getDatabase.php",
        dataType: "json",
        data: { "petid": $(this).attr('Id') },
        success: function(data, status) {
            alert(data);
           /* $("#name").html(data.Breed);
            $("#description").html(data.History);
            $("#image").attr('src', data.Image);
            $("#container").html("");*/
        },
     }); // ajax closing
  }); // btnclick
  
}); // doc end