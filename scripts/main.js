


$( document ).ready(function(){ 

step0();
    
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
                if(buttons_info==""||buttons_info.substring(11,14)!="end"){step0();}
                else 
                    {
                        fixButtonsStyle();
                        getTemp(current_temp);
                        buttons_info="";
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
