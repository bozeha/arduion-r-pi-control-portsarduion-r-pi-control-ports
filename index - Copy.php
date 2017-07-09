<!DOCTYPE html>
<html lang="en">
<head>

<link rel="stylesheet" href="style.css">
   
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <meta charset="UTF-8">
    <title>Document</title>

<script type="text/javascript">

function iframeOn()
{

    current_url =window.location.href+":8081";
current_url = current_url.replace("http://", "");
current_url = current_url.replace("/", "");
current_url = current_url.replace("#", "");
$('iframe').attr('src',"http://"+current_url);
}
                  function runCommand(command)
                  {
                    $.ajax({
                        url: "commands.php",
                        type: "POST",
                        data: { command: command },
                        success: function(data){
                            //alert(data);
                        },
                        error: function(){
                              alert("yyyyyyy");
                        }
                    });
                  }
        </script>




<script>

global_json ={};

window.setInterval(function(){
$.getJSON( "https://api.ipify.org?format=json", function( json ) {
  console.log( "ip: " + json.ip );
  global_json['ip'] =json.ip;
 }).then(function(){
 var current_time =getTime();
$.ajax({
        url: "content/send-ip.php",
        type: "post",
        data: {'ip':global_json['ip'],'name':'boaz','date':current_time},
        success: function (result) {
            console.log(result);
           
      },
  error: function (request, status, error) {
        //alert(request.responseText);
    console.log(error);
    }   
});

})

}, 5000);

function getTime()
{
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();

if(dd<10) {
    dd = '0'+dd
} 

if(mm<10) {
    mm = '0'+mm
} 

today = mm + '/' + dd + '/' + yyyy;

var dt = new Date();
var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
today = today+" T"+time;

return today;

}
//var arr = { City: 'Moscow', Age: 25 };

</script>






</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-2">    
            <a href="#" onclick="runCommand('fan')" class="post"><img src='images/fan.jpg'/></a>
        </div>
        <div class="col-md-2">    
            <a href="#" onclick="runCommand('light')" class="post"><img src='images/light.jpg'/></a>
            </div>
        <div class="col-md-2">
            <a href="#" onclick="runCommand('skimmer')" class="post"><img src='images/skimmer.jpg'/></a>
            </div>
        <div class="col-md-2">
            <a href="#" onclick="runCommand('upload')" class="post"><img src='images/upload.jpg'/></a>
            </div>
        <div class="col-md-2">
            <a href="#" onclick="runCommand('wave')" class="post"><img src='images/wave.jpg'/></a>
        </div>
        <div class="col-md-2">
            <a href="#" onclick="runCommand('last')" class="post"><img src='images/q.png'/></a>
        </div>
        <div class="col-md-2">
            <a href="#" id="display-video" onclick="runCommand('video');$('#stop-video').css('display','block');$('#display-video').css('display','none');iframeOn()" class="post"><img src='images/video.jpg'/></a>
            <a href="#" id="stop-video" style="display:none" onclick="runCommand('close-video');$('#stop-video').css('display','block');$('#display-video').css('display','none')" class="post"><img src='images/video.jpg'/></a>
        </div>
    </div>
</div>
     <div class="container">
     <iframe src="http://192.168.1.2:8081"></iframe>
     </div>
</body>
</html>
