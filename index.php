
<DOCKTYPE HTML>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="index.css"/>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form name="myform" method="post" action="index.php">
            <table>
                    <tr>
                        <td class="accountFormCol">
                            Enter The Word
                        </td>
                        <td>
                            <input class="accountFormCol2" type="text" name="Vname" placeholder="shyiramo ijambo mururimi ushaka" required="true">
                        </td>
                    </tr>
                    <tr>
                        <td class="accountFormCol">
                            Kinyarwanda
                        </td>
                        <td>
                            <input class="accountFormCol2" type="text" name="kin" placeholder="kinyarwanda version" required="true">
                        </td>
                    </tr>
                    <tr>
                        <td class="accountFormCol">
                            English
                        </td>
                        <td>
                            <input class="accountFormCol2" type="text" name="eng" placeholder="english version" required="true">
                        </td>
                    </tr>
                    <tr>
                        <td class="accountFormCol">
                            French
                        </td>
                        <td>
                            <input class="accountFormCol2" type="text" name="fren" placeholder="french version" required="true">
                        </td>
                    </tr>
                    <tr>
                        <td class="accountFormCol">
                            Kiswahili
                        </td>
                        <td>
                            <input class="accountFormCol2" type="text" name="kisw" placeholder="kiswahili version" required="true">
                        </td>
                    </tr>            
                </table>
            <input class="loginTbImg" type="submit" name="save" value="save"> 
            </form>       
    </body>
</html>
<?php
include 'PHPDbConnect.php';
if(isset($_POST['save'])){
    $noun = filter_input(INPUT_POST, 'Vname');
    $kin = filter_input(INPUT_POST, 'kin');
    $eng = filter_input(INPUT_POST, 'eng');
    $fren = filter_input(INPUT_POST, 'fren');
    $kisw = filter_input(INPUT_POST, 'kisw');
    $insert = mysqli_query($conn ,"INSERT INTO noun_translation(V_Name ,Kinyarwanda ,English ,French ,Kiswahili)"
            . " VALUES ('$noun' ,'$kin' ,'$eng' ,'$fren' ,'$kisw')");
    if($insert){
        echo"new record is inserted"."<br>";
    }
 else {
        die("Failed to connect".mysql_error());
        
    }
}
mysqli_close($conn);
?>

