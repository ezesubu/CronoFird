
$(document).ready(function() {

  if ( URL==undefined ) {
    URL = Front_URL + "articulos/Buscar";
  } 
  $("#ingresar").on('click', function(){
    console.log('<?php echo site_url() ?>');
    var arrData = Form2Array("form_ingresar");    
    $.post("index.php/app/test", function(data) {
      alert(data);
    });
  })
  

  $( "#button_search" ).autocomplete({
     source: function(request,response) {
        $.ajax ( {
          url: "index.php/carrera/get_race",
          data: {term: request.term},
          dataType: "json",
          success: function(data) {
             response( $.map( data.myData, function( item ) {                
                return {                    
                    value: item.title,
                    _id: item.turninId
                }
              }));
          },
        
      })
     },
     select: function (event, ui) {           
      $('#id_carrera').val(ui.item._id);
     }
  });

  
  $('.select_category').change(function() {

     $.ajax ( {
          url: "../competidor/get_competidor_categoria",
          data: {id_categoria:$('.select_category').val()},
          dataType: "json",
          success: function(data) {
             response( $.map( data.myData, function( item ) {                
                return {                    
                    value: item.title,
                    _id: item.turninId
                }
              }));
          },       
      })         
  });

});