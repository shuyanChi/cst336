$('document').ready(function() {
	          $('.carousel-inner').load(function() {
	              $.ajax({
                        type: "GET",
                        url: "api/getPetInfo.php",
                        dataType: "json",
                        data: { "petid": $(this).attr('id') },
                        success: function(data, status) {
                            $("#carousel-item active").attr('src', "img/" + data.pictureURL);
                            //alert(data); 
                           
                         },
	                }); // ajax closing
	          
	           //   alert($(this).attr('id'));
	          }); // petlink click
	          
}); // doc end