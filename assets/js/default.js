
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


  $( "#search_user" ).autocomplete({
     source: function(request,response) {
        $.ajax ( {
          url: "../competidor/get_competidor",
          data: {term: request.term, id_categoria:$('#id_carrera').val() },
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
        window.location = '../competidor/show?id_competidor='+ui.item._id;      
     }
  });


  
  $('.select_category').change(function() {
    window.location = '../competidor/get_competidor_categoria?id_categoria=' + $('.select_category').val();
/*
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
      })         */
  });
  
});