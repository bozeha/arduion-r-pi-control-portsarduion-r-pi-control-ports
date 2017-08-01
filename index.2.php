<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style/style.css">
   
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script  src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/scripts/loop2.js"></script>
    <meta charset="UTF-8">
    <title>Document</title>
<script type="text/javascript">
$( document ).ready(function(){ 

                    $.ajax({
                        url: "commands.php",
                        type: "POST",
                        data: { command:"refresh" },
                        success: function(data){
                            //alert(data);
                        },
                        error: function(){
                              console.log("yyyyyyy");
                        }
                    })
                    $.ajax({
            url: "get_info.php",
            type: "POST",
            success: function(data){
                console.log(data);
                buttons_info= data;
                fixButtonsStyle();

            },
            error: function(){
                    console.log("yyyyyyy");
            }
            })
    
    }) 
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
                              console.log("yyyyyyy");
                        }
                    }).then(function(){ get_info("111"); });
                   
                  }


        function get_info(str) {
        buttons_info=null;     

            $.ajax({
            url: "commands2.php",
            type: "POST",
            data: { command: "info" },
            success: function(data){
            },
            
            error: function(){
                    console.log("yyyyyyy");
            }
            }).then(function(){
                $.ajax({
            url: "get_info.php",
            type: "POST",
            success: function(data){
                console.log(data);
                buttons_info= data;
                fixButtonsStyle();

            },
            error: function(){
                    console.log("yyyyyyy");
            }
            })
            })


        }

        function fixButtonsStyle()
        {

        //buttons_info = buttons_info.replace("start", "");
        //buttons_info = buttons_info.replace("end1", "");
        buttons_info= buttons_info.substring(5, 11);
        for(var x=5;x!=-1;x--)
        {
          if(buttons_info[x]==0)
          {
            $("#all-buttons .buttons-big:eq("+x+") img").css('filter','blur(0px)');
          }
          else
          {
            $("#all-buttons .buttons-big:eq("+x+") img").css('filter','blur(3px)');
          }

        }
        }
</script>



</head>
<body>
<div class="header">
    <div class="container">
        <div class="row">
            <div id="logo" class="pull-left">
            </div>
            
            <div class="pull-right" id="top-buttons" onclick="runCommand('reboot')">
            </div>
    
        </div>
    </div>
</div>
<div id="main-con">
    <div class="container big-buttons">
        <div class="row">
            <div id="all-buttons">
                <!--<div class="buttons-big">    
                    <a href="javascript:void(0)" onclick="runCommand('info')" class="post"><img src='images/info.png'/></a>
                </div>-->
                <div class="buttons-big">    
                    <a href="javascript:void(0)" onclick="runCommand('light')" class="post"><img src='images/light.jpg'/></a>
                    </div>
                <div class="buttons-big">    
                    <a href="javascript:void(0)" onclick="runCommand('fan')" class="post"><img src='images/fan.jpg'/></a>
                </div>
                <div class="buttons-big">
                    <a href="javascript:void(0)" onclick="runCommand('skimmer')" class="post"><img src='images/skimmer.jpg'/></a>
                    </div>
                <div class="buttons-big">
                    <a href="javascript:void(0)" onclick="runCommand('wave')" class="post"><img src='images/wave.jpg'/></a>
                </div>
                <div class="buttons-big">
                    <a href="javascript:void(0)" onclick="runCommand('upload')" class="post"><img src='images/upload.jpg'/></a>
                    </div>
                <div class="buttons-big">
                    <a  href="javascript:void(0)" onclick="runCommand('last')" class="post"><img src='images/q.png'/></a>
                </div>
                <div class="buttons-big">
                    <a  href="javascript:void(0)" id="display-video" onclick="runCommand('video');$('#stop-video').css('display','block');$('#display-video').css('display','none');iframeOn()" class="post"><img src='images/video.jpg'/></a>
                    <a  href="javascript:void(0)" id="stop-video" style="display:none" onclick="runCommand('close-video');$('#stop-video').css('display','block');$('#display-video').css('display','none')" class="post"><img src='images/video.jpg'/></a>
                </div>
            </div>
        </div>
    </div>
     <div class="container">    
     <iframe src=""></iframe>
     </div>
</div>
</body>
</html>
