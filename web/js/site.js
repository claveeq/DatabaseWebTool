

$( document ).ready(function() {
  $("#dropdown_hide").hide();
  $("#server-warning").hide();
  $("#database-warning").hide();
  $("#status").hide();
  $("#retrieving_database").hide();


});

// $(document).on('ready pjax:success', function() {
//    $.pjax.reload({container:'#history_gridview'});
// });

$("#toCreateView").click(function(){
   $('#modal').modal('show')
              .find('#modalContent')
              .load($(this).attr('value'));
}); 

$(".toRestoreView").click(function(){
 // $('#modal').modal('show')
 //              .find('#modalContent')
 //              .load($(this).attr('value'));
});

$("#servers").change(function(){
  $("#retrieving_database").show();
  $("#dropdown_hide").hide();
   var server = $("#servers option:selected").val();
   if(server==""){
      $("#dropdown_hide").hide();
      $("#retrieving_database").hide();
   }else{
     $.post("index.php?r=site/getdb",
      {
        db_id: server
      },function (data) {
         $("select#dbconnection-db_id").html(data);
         $("#retrieving_database").hide();
         $("#dropdown_hide").show();
      });
   }
});

$("#server_restore").change(function(){
  $("#retrieving_database").show();
  $("#dropdown_hide").hide();
  var server_restore = $("#server_restore option:selected").val();
  if(server_restore==""){
      $("#dropdown_hide").hide();
      $("#retrieving_database").hide();
   }else{
   $.post("index.php?r=site/getdb",
    {
      db_id: server_restore
    },function (data) {
       $("select#database_restore").html(data);
       $("#retrieving_database").hide();
       $("#dropdown_hide").show();    
    });
  }
});

$("#deleteServer").click(function() {
  var server = $("#servers option:selected").val();
    if (confirm("Are you sure you want to delete this Server?") == true) {
      $.post("index.php?r=dbdatabase/delete",
      {
        db_id: server
      });
    }

});

$("#submitUserPass").click(function() {    
   alert("The paragraph was clicked.");
});

$("#dump").click(function() {
 var server_val = $("#servers option:selected").val();
 var server_name = $("#servers option:selected").text();
 var database_val = $("#dbconnection-db_id option:selected").val();
 var database = $("#dbconnection-db_id option:selected").text();
 var dateToday = new Date().toISOString().slice(0,10); 
 //var dumpfileLoc = "C:/"+ database + Date("Y-m-d-H-i-s") + ".sql";
 if(server_val==""){
    $("#server-warning").show();
 }else {   
  $("#server-warning").hide();
    if (database_val == "") {
      $("#database-warning").show();   
    }else{ 
      $("#database-warning").hide();
      $("#status").show();
      $.post("index.php?r=site/dump",
        {
          db_id: server_val,
          history_server_name: server_name,
          history_db_name: database,
          history_date: dateToday,
        //  history_dumpfile_loc: dumpfileLoc
        },function(data){
          alert(data);      
          $.pjax.reload({container:'#history_gridview'});
         // $("#dump-complete").show();
        });
    }
  }
});

$("#restore").click(function() {
  var server_restore = $("#server_restore option:selected").val();
  var database_restore = $("#database_restore option:selected").text();
  var database_val = $("#database_restore option:selected").val();
  var history_id = $("#history_id").val();
  var server_restore_text = $("#server_restore option:selected").text();
  if(server_restore==""){
  $("#server-warning").show();
  }else {   
  $("#server-warning").hide();
    if (database_val == "") {
      $("#database-warning").show();   
    }else{ 
      $("#database-warning").hide();
      $("#status_restore").html("restoring...");
      $.post("index.php?r=site/import",
      {
        server_restore_text: server_restore_text,
        db_id: server_restore,
        db_database: database_restore,
        history_id: history_id,
      },function(data){
        $("#status_restore").html(null);
        $('#retrieving_database').hide();
        alert(data);
        window.location = "index.php?r=site/index";
      });
     }
   }
});
