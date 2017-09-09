
<script>
  $('document').ready(function(){
    getOptionsFromDb();
    console.log(options_from_db);
  })
  options_from_db="";
  function getOptionsFromDb() {

    $.post("content/schedule/schedule-data.php", function(data, status){
        options_from_db  =JSON.parse(data);
        console.log(options_from_db);
        updatePopupOptions();
    });

}
function updatePopupOptions()
{
var loop = 0;
var num_of_elements= options_from_db['id'].length;
for(;loop!=num_of_elements;loop++)
{
  $("#myModal2 ."+options_from_db['element'][loop]+" select.start-time").val(options_from_db['hour_start'][loop]);
  console.log(options_from_db['element'][loop]);
  console.log(options_from_db['active'][loop]);
  $("#myModal2 ."+options_from_db['element'][loop]+" select.end-time").val(options_from_db['hour_end'][loop]);
  options_from_db['active'][loop]==1?$("#myModal2 ."+options_from_db['element'][loop]+" .form-check-input").attr('checked', true):$("#myModal2 ."+options_from_db['element'][loop]+" .form-check-input").attr('checked', false);
  //$('#myModal2 .light .form-check-input').attr('checked', true);
  //if ($('#myModal2 .light .form-check-input').is(":checked")){console.log('on')}
}
}

  function openOptions() {
    $('#myModal2').modal();

  }

  function loopHour() {
    for (loop0 = 0; loop0 != 24; loop0++) {
        document.write("<option>");  
      if (loop0 < 10) {
        document.write("0" + loop0);
      }
      else document.write(loop0);
        document.write("</option>");  
    }
  }

  function sendOptionsToDb()
  {
     var loop = 0;
     var current_length=options_from_db["id"].length;
     for (;loop!= current_length;loop++)
     {

        {
 if ( $("#myModal2 ."+options_from_db['element'][loop]+" .form-check-input").is(':checked') )
        {
          console.log('g');
          options_from_db['active'][loop]=1;
        }
        else
        {
          console.log('s');
          options_from_db['active'][loop]=0;
        }
          options_from_db['hour_start'][loop]  = $("#myModal2 ."+options_from_db['element'][loop]+" select.start-time").val()
          options_from_db['hour_end'][loop] = $("#myModal2 ."+options_from_db['element'][loop]+" select.end-time").val();
        }
     }
      console.log(options_from_db);



/* 
    $.post("content/schedule/schedule-data-send.php", options_from_db, function(data, status){
        //options_from_db  =JSON.parse(data);
        console.log(data);
        
    }); */



 
$.post("content/schedule/schedule-data-send.php", options_from_db)
  .done(function( data ) {
    console.log("dataaa:"+data+"end data");
  }); 

  }
</script>
<div class="container" id="popup_box_options">
  <div class="row">

    <div id="myModal2" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->


        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close pull-left" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">הגדרות</h4>
          </div>


          <form>
            <div class="container">
              <div class="row light">
                <div class="title-settings col-md-2">
                  <h2>Light</h2>
                </div>
                <div class="image-settings col-md-2">
                  <img src="images/light.jpg" />
                </div>
                <div class="form-group col-md-3">
                  <label for="sel1">start time</label>
                  <select class="form-control start-time">
                        <script> loopHour();</script>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="sel1">end time</label>
                  <select class="form-control end-time">
                    <script> loopHour();</script>
                  </select>
                </div>
                <div class="active-option col-md-2">
                    <label class="form-check-label">הפעל</label><input type="checkbox" class="form-check-input active">
                </div>
              </div><div class="row empty">
                <div class="title-settings col-md-2">
                  <h2>Empty</h2>
                </div>
                <div class="image-settings col-md-2">
                  <img src="images/q.png" />
                </div>
                <div class="form-group col-md-3">
                  <label for="sel1">start time</label>
                  <select class="form-control start-time">
                        <script> loopHour();</script>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="sel1">end time</label>
                  <select class="form-control end-time">
                    <script> loopHour();</script>
                  </select>
                </div>
                <div class="active-option col-md-2">
<label class="form-check-label">הפעל</label><input type="checkbox" class="form-check-input active">
                </div>
              </div>
              <div class="row skimmer">
                <div class="title-settings col-md-2">
                  <h2>Skimmer</h2>
                </div>
                <div class="image-settings col-md-2">
                  <img src="images/skimmer.jpg" />
                </div>
                <div class="form-group col-md-3">
                  <label for="sel1">start time</label>
                  <select class="form-control start-time">
                        <script> loopHour();</script>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="sel1">end time</label>
                  <select class="form-control end-time">
                    <script> loopHour();</script>
                  </select>
                </div>
                <div class="active-option col-md-2">
<label class="form-check-label">הפעל</label><input type="checkbox" class="form-check-input active">
                </div>
              </div>
              <div class="row wave">
                <div class="title-settings col-md-2">
                  <h2>Wave</h2>
                </div>
                <div class="image-settings col-md-2">
                  <img src="images/wave.jpg" />
                </div>
                <div class="form-group col-md-3">
                  <label for="sel1">start time</label>
                  <select class="form-control start-time">
                        <script> loopHour();</script>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="sel1">end time</label>
                  <select class="form-control end-time">
                    <script> loopHour();</script>
                  </select>
                </div>
                <div class="active-option col-md-2">
                    <label class="form-check-label">הפעל</label><input type="checkbox" class="form-check-input active">
                </div>
              </div>
              <div class="row upload">
                <div class="title-settings col-md-2">
                  <h2>Uploder</h2>
                </div>
                <div class="image-settings col-md-2">
                  <img src="images/upload.jpg" />
                </div>
                <div class="form-group col-md-3">
                  <label for="sel1">start time</label>
                  <select class="form-control start-time">
                        <script> loopHour();</script>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="sel1">end time</label>
                  <select class="form-control end-time">
                    <script> loopHour();</script>
                  </select>
                </div>
                <div class="active-option col-md-2">
                  <label class="form-check-label">הפעל</label><input type="checkbox" class="form-check-input active">
                </div>
              </div>
              <div class="row fan">
                <div class="title-settings col-md-2">
                  <h2>Fan</h2>
                </div>
                <div class="image-settings col-md-2">
                  <img src="images/fan.jpg" />
                </div>
                <div class="form-group col-md-3">
                  <label for="sel1">start time</label>
                  <select class="form-control start-time">
                        <script> loopHour();</script>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="sel1">end time</label>
                  <select class="form-control end-time">
                    <script> loopHour();</script>
                  </select>
                </div>
                <div class="active-option col-md-2">
                  <label class="form-check-label">הפעל</label><input type="checkbox" class="form-check-input active">
                </div>
                <span onclick= "sendOptionsToDb()">xxxxx</span>
              </div>

            </div>
        </div>
        </form>
      </div>

    </div>
  </div>
</div>
</div>


