
<?php
if (isset($_POST['command']))
{
    switch($_POST['command'])
    {
        case "fan":
        $command = escapeshellcmd("sudo python ".$_POST['command'].".py");
        $output = shell_exec($command);
        echo $output;
        break;
        
        case "light":
        $command = escapeshellcmd("sudo python ".$_POST['command'].".py");
        $output = shell_exec($command);
        echo $output;
        break;

        case "skimmer":
        $command = escapeshellcmd("sudo python ".$_POST['command'].".py");
        $output = shell_exec($command);
        echo $output;
        break;

        case "upload":
        $command = escapeshellcmd("sudo python ".$_POST['command'].".py");
        $output = shell_exec($command);
        echo $output;
        break;

        case "wave":
        $command = escapeshellcmd("sudo python ".$_POST['command'].".py");
        $output = shell_exec($command);
        echo $output;
        break;

        case "last":
        $command = escapeshellcmd("sudo python ".$_POST['command'].".py");
        $output = shell_exec($command);
        echo $output;
        break;


        case "info":
        $command = escapeshellcmd("sudo python ".$_POST['command'].".py");
        $output = shell_exec($command);
        echo $output;
        break;


        case "video":
        $command = escapeshellcmd("sudo motion");
        $output = shell_exec($command);
        echo $output;
        break;


        case "close-video":
        $command = escapeshellcmd("sudo service motion stop");
        $output = shell_exec($command);
        echo $output;
        break;
        
        case "reboot":
        $command = escapeshellcmd("sudo reboot");
        $output = shell_exec($command);
        echo "$output";
        break;

    }  
}


?>