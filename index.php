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

step0();
//step1();
//step2();
/*
                    $.ajax({
                        url: "commands2.php",
                        type: "POST",
                        data: { command:"refresh" },
                        success: function(data){
                      //        get_info();
                            console.log('tt');
                        },
                        error: function(){
                              console.log("yyyyyyy");
                        }
                    })
                      */
    
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
                        
                        },
                        error: function(){
                              console.log("yyyyyyy");
                        }
                    }).then(function(){step0()})//.then(function(){step1()})
                    
                   
                  }


        
        function step0()
        {

              $.ajax({
            url: "commands2.php",
            type: "POST",
            data: { command: "info" },
            success: function(data){
                console.log("v1");
                step2();
            },
            
            error: function(){
                    console.log("yyyyyyy");
            }
            })
        }




        
                function step1()
        {

              $.ajax({
            url: "commands2.php",
            type: "POST",
            data: { command: "refresh" },
            success: function(data){
                step0();
                console.log("v0");
            },
            
            error: function(){
                    console.log("yyyyyyy");
            }
            })
        }
        

        function step2()
        {
         $.ajax({
            url: "get_info.php",
            type: "POST",
            success: function(data){
                console.log(data);
                current_temp =data;
                buttons_info= data;
                if(buttons_info==""||buttons_info.substring(11,14)!="end")step0();
                else 
                    {
                        fixButtonsStyle();
                        getTemp(current_temp);
                    }
                

            },
            error: function(){
                    console.log("yyyyyyy");
            }
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
        function getTemp(current_temp)
        {

            $("#water_temp").text(current_temp.substring(25,30)+"°C");
            if(current_temp.substring(25,30)>30)$("#water_temp").css("color","red")
            $("#home_humidity").text(current_temp.substring(44,49)+"%");
            if(current_temp.substring(44,49)>80)$("#home_humidity").css("color","red")
            $("#home_temp").text(current_temp.substring(66,71)+"°C");
            if(current_temp.substring(66,71)>40)$("#home_temp").css("color","red")
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
            <div class="pull-right"  style="bakcground-color:white;border:2px solid red;font-size:20px" onclick="step0()">
           step0
            </div>
            <div class="pull-right"   style="bakcground-color:white;border:2px solid red;font-size:20px"  onclick="step1()">
            step1
            </div>
            <div class="pull-right"   style="bakcground-color:white;border:2px solid red;font-size:20px"  onclick="step2()">
            step2
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
        <div class="row">
            <div class="col-md-2" id="temp_info">
                <h1>information:</h1>
                <div>
                    <p>טמפרטורת הבית</p>
                    <span id="home_temp"></span>
                    <p>לחות</p>
                    <span id="home_humidity"></span>
                    <p>טמפרטורת המים באקוריום</p>
                    <span id="water_temp"></span>
                    
                </div>
            </div>
            <div class="col-md-8">
                <iframe src=""></iframe>
            </div>
            <div class="col-md-2"></div>
        </div>
     </div>
</div>
</body>
</html>
