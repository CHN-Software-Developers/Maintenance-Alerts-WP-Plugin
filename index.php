<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance Alerts Setup</title>
</head>
<body>
    <a href="index.php"><h1>Maintenance Alerts Setup</h1></a>
    <p style="color:blue;"><?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?></p>
    <?php
        if(isset($_GET["action"])){
            $action = $_GET["action"];
        }else{
            $action = "NONE";
        }
    ?>

    <div style="padding:10px; border:4px solid gray;">
        <h3>Install plugin</h3>
        <a href="index.php?action=install&once=true"><button>Install</button></a><br><br>
        <div style="background-color:#F7F0EE; padding:5px; border:3px solid #F0E3DF;">
            <pre><?php
                if($action == "install"){
                    $install = system("cmd /c chnsd-plugin-install.bat");
                    
                    if($install == false){
                        echo "Sorry...! An unexpected error occurred.";
                    }
                }else{
                    echo "Ready.";
                }
            ?><pre>
        </div>
    </div><br>

    <div style="padding:10px; border:4px solid gray;">
        <h3>Update plugin</h3>
        <a href="index.php?action=update&once=true"><button>Update</button></a><br><br>
        <div style="background-color:#F7F0EE; padding:5px; border:3px solid #F0E3DF;">
            <pre><?php
                if($action == "update"){
                    $install = system("cmd /c chnsd-plugin-update.bat");
                    
                    if($install == false){
                        echo "Sorry...! An unexpected error occurred.";
                    }
                }else{
                    echo "Ready.";
                }
            ?><pre>
        </div>
    </div><br>

    <div style="padding:10px; border:4px solid gray;">
        <h3>Uninstall plugin</h3>
        <a href="index.php?action=uninstall&once=true"><button>Uninstall</button></a><br><br>
        <div style="background-color:#F7F0EE; padding:5px; border:3px solid #F0E3DF;">
            <pre><?php
                if($action == "uninstall"){
                    $install = system("cmd /c chnsd-plugin-uninstall-auto.bat");
                    
                    if($install == false){
                        echo "Sorry...! An unexpected error occurred.";
                    }
                }else{
                    echo "Ready.";
                }
            ?><pre>
        </div>
    </div><br>

    <div style="padding:10px; border:4px solid gray;">
        <h3>Hash releases</h3>
        <form action="index.php" method="GET">
            <input type="text" name="action" value="hash_release" style="display:none;">
            https://downloads.wordpress.org/plugin/
            <input type="text" name="filename" value="maintenance-alerts.1.0.0.zip">
            <button>hash</button>  
        </form><br>
        <div style="background-color:#F7F0EE; padding:5px; border:3px solid #F0E3DF;">
            <pre><?php
                if($action == "hash_release" && isset($_GET["filename"])){
                    $fileURL = "https://downloads.wordpress.org/plugin/" . $_GET["filename"];

                    $hash = sha1_file($fileURL);
                    
                    if($hash == true){
                        echo "hashfile => " . $fileURL . "<br>";
                        echo "SHA! => " . $hash;
                    }else{
                        echo "hashfile => " . $fileURL . "<br>";
                        echo "SHA! => [NULL]";
                        echo "Sorry...! An unexpected error occurred.";
                    }
                }else{
                    echo "Ready.";
                }
            ?><pre>
        </div>
    </div><br>

</body>
</html>