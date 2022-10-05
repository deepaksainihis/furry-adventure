

/* =============================== form script  =============================== */



jQuery(document).ready(function() {
   jQuery("#RUSL_form").val({
      rules: {
       title: 'required',
       description: 'required',
       image: {
           required: true,
           extension: "jpg|jpeg|png",
           minImageSize: {
             width: 600,
             height: 400
           }
       }
      }
   });
 });
 
 
 
 $(function() {
 
   $("#title_error_message").hide();
   $("#description_error_message").hide();
   $("#image_error_message").hide();

   var error_title = false;
   var error_description = false;
   var error_image = false;


 
   $("#form_title").focusout(function() {
      check_title();
   });
   $("#form_description").focusout(function() {
      check_description();
   });
   $("#form_img").focusout(function() {
       check_image();
    });
 

   function check_title() {
       var pattern = /^[a-zA-Z\s]+$/;
       var title = $("#form_title").val();
       if (pattern.test(title) && title !== '') {
          $("#form_title").css("border-bottom","2px solid #34F458");
       } else {
          $("#form_title").css("border-bottom","2px solid #F90A0A");
          error_title = true;

       }
    }

    function check_description() {
       var pattern = /^[a-zA-Z\s]+$/;
       var description = $("#form_description").val();
       if (pattern.test(description) && description !== '') {
          $("#form_description").css("border-bottom","2px solid #34F458");
       } else {
          $("#form_description").css("border-bottom","2px solid #F90A0A");
          error_description = true;
       }
    }

    function check_image() {
       var file = $('#form_img').val(); 
       if ( file = $('#form_img')[0].files[0].size / 1024 / 1024) {
          $("#form_img").css("border-bottom","2px solid #34F458");
       } else {
          $("#form_img").css("border-bottom","2px solid #F90A0A");
          error_image = true;

       }
    }
   
 
   $("#RUSL_form").submit(function(e) {
      e.stopPropagation();
      e.preventDefault();
       error_title = false;
       error_description = false;
       error_image= false;


 
      check_title();
      check_description();
     
      if (error_title === false && error_description === false ) 
      {
         $.ajax({
         type: "post",
         dataType: "json",
         url: frontend_ajax_object.ajaxurl,
         processData: false,
         contentType: false,
         data:  new FormData(this),
          success: function(returnedData){ 
           if (returnedData){
           var status = returnedData.status;
           if (status == "success"){
               $('#wrong').hide();
               $('#status').show();
               // location.reload(true)

           }
           else
           {
               $('#status').hide();
               $('#wrong').show();
           }
           }
       },
    })
 }
 
   });
 });


/******START-> Of For Feature Table*********/


jQuery(document).ready(function() {
   jQuery("#FEATURE_form").val({
      rules: {
         title_feature : 'required',
         description_feature : 'required'
      }
   });
 });
 
 
 
 $(function() {
 
   var error_title_feature = false;
   var error_description_feature = false;


   $("#feature_title").focusout(function() {
      check_title_feature();
   });
   $("#feature_description").focusout(function() {
      check_description_feature();
   });
 

   function check_title_feature() {
       var patterns = /^[a-zA-Z\s]+$/;
       var titles = $("#feature_title").val();
       if (patterns.test(titles) && titles !== '') {
          $("#feature_title").css("border-bottom","2px solid #34F458");
       } else {
          $("#feature_title").css("border-bottom","2px solid #F90A0A");
          error_title_feature = true;

       }
      }
   function check_description_feature() {
       var pattern = /^[a-zA-Z\s]+$/;
       var descriptions = $("#feature_description").val();
       if (pattern.test(descriptions) && descriptions !== '') {
          $("#feature_description").css("border-bottom","2px solid #34F458");
       } else {
          $("#feature_description").css("border-bottom","2px solid #F90A0A");
          error_description_feature = true;
       }   
    }


   
 
   $(".insert_button").click(function() {
      error_title_feature = false;
       error_description_feature = false;



 
      check_title_feature();
      check_description_feature();
     
      if (error_title_feature === false && error_description_feature === false ) 
      {
          var data = $("#FEATURE_form").serialize();
          $.ajax({
          type: "post",
          url: frontend_ajax_object.ajaxurl,
          data: data,
          success: function(response){ 
           if (response){
           var returnedData = JSON.parse(response)
           var status = returnedData.status;
           if (status == "success"){
               $('#wrongs').hide();
               $('#statuss').show();
               location.reload(true)

           }
           else
           {
               $('#statuss').hide();
               $('#wrongs').show();
           }
           }
       },
    })
 }
 
   });
 });


/******END-> For Feature Table*********/





/* =============================== parts script  =============================== */



jQuery(document).ready(function() {
   jQuery("#parts_form").val({
      rules: {
      parts_title: 'required',
      parts_description: 'required',
       image: {
           required: true,
           extension: "jpg|jpeg|png",
           minImageSize: {
             width: 600,
             height: 400
           }
       }
      }
   });
 });
 
 
 
 $(function() {
 
   $("#title_parts_error_message").hide();
   $("#description_parts_error_message").hide();
   $("#image_parts_error_message").hide();

   var error_parts_title = false;
   var error_parts_description = false;
   var error_parts_image = false;


 
   $("#form_title").focusout(function() {
      check_parts_title();
   });
   $("#form_description").focusout(function() {
      check_parts_description();
   });
   // $("#form_img").focusout(function() {
   //     check_parts_image();
   //  });
 

   function check_parts_title() {
       var pattern = /^[a-zA-Z\s]+$/;
       var title = $("#parts_title").val();
       if (pattern.test(title) && title !== '') {
          $("#parts_title").css("border-bottom","2px solid #34F458");
       } else {
          $("#parts_title").css("border-bottom","2px solid #F90A0A");
          error_parts_title = true;

       }
    }

    function check_parts_description() {
       var pattern = /^[a-zA-Z\s]+$/;
       var description = $("#parts_description").val();
       if (pattern.test(description) && description !== '') {
          $("#parts_description").css("border-bottom","2px solid #34F458");
       } else {
          $("#parts_description").css("border-bottom","2px solid #F90A0A");
          error_parts_description = true;
       }
    }

   //  function check_parts_image() {
   //     var file = $('#parts_img').val(); 
   //     if ( file = $('#parts_img')[0].files[0].size / 1024 / 1024) {
   //        $("#parts_img").css("border-bottom","2px solid #34F458");
   //     } else {
   //        $("#parts_img").css("border-bottom","2px solid #F90A0A");
   //        error_parts_image = true;

   //     }
   //  }
   
 
   $(".click_button").click(function() {
      error_parts_title = false;
       error_parts_description = false;
       error_parts_image= false;


 
       check_parts_title();
       check_parts_description();
      //  check_parts_image();
     
      if (error_parts_title === false && error_parts_description === false ) 
      {
          var data = $("#parts_form").serialize();
          $.ajax({
          type: "post",
          url: frontend_ajax_object.ajaxurl,
          data: data,
          success: function(response){ 
           if (response){
           var returnedData = JSON.parse(response)
           var status = returnedData.status;
           if (status == "success"){
               $('#incorrect').hide();
               $('#correct').show();
               location.reload(true)

           }
           else
           {
               $('#correct').hide();
               $('#incorrect').show();
           }
           }
       },
    })
 }
 
   });
 });


/******End-> Of For parts Table*********/