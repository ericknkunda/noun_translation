

<DOCKTYPE HTML>
    <!DOCTYPE html>
    <head>
        <LINK rel="stylesheet" type="text/css" href="index.css"/>
        <title>
            search for any word
        </title>
         </head>
    <body>
        <div class="divIndex">
		<p>
			<h1 class="parIndex1">
				Thank you to use our translation app. Click retrieve button to see a word to search.
                                Click this <a href="word.php" class="parIndex2"> link </a>to add your own words in the database.	
			</h1>
		</p>
        </DIV>
        <form name="getnoun" method="post" action="index.php">
    <table>
        <tr>
            <td class="accountFormCol">
                Word To Search
            </td>
            <td >
                <input class="accountFormCol2" type="text" name="var"  placeholder="enter the word to search">
            </td>
        </tr>
    </table>
     <INPUT type="submit" name="ran" value="retrieve" class="loginTbImg">
     <input type="submit" name="kin" value="Kiny" class="loginTbImg">
    <input type="submit" name="eng" value="Eng" class="loginTbImg">
    <input type="submit" name="fren" value="Fren" class="loginTbImg">
    <input type="submit" name="kisw" value="Kisw" class="loginTbImg">
       </form>
    </body>
  </html>

<?php
include 'PHPDbConnect.php';
$query ="SELECT Kinyarwanda FROM noun_translation ORDER BY RAND() LIMIT 1";
    $word = filter_input(INPUT_POST, 'var');
   
    //$query = "SELECT * FROM employees
   // WHERE first_name LIKE '%{$name}%' OR last_name LIKE '%{$name}%'";

    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
      ?>
<?php
    if (isset($_POST['ran'])) {
          $result = mysqli_query($conn,$query );
          ?>
<TABLE border ="2">
    <tr>
        <th bgcolor="blue"> Random Variable</th>
    </tr>
    <?php
          while ($row=  mysqli_fetch_array($result)) {
        print"<tr><td>";
echo $row['Kinyarwanda'];
echo "<br>";
print"</td></tr>";
    }
}
?>
    <?php
      if (isset($_POST['kin'])&& $word !=null){
          $result = mysqli_query($conn, "SELECT Kinyarwanda FROM noun_translation
                WHERE Kinyarwanda LIKE '%{$word}%' OR English LIKE '%{$word}%' OR French LIKE '%{$word}' OR Kiswahili LIKE '%{$word}'");    
?>
<TABLE border ="2">
    <tr>
        <th bgcolor="blue"> Kinyarwanda Version</th>
    </tr>
<?php
    while ($row=  mysqli_fetch_array($result)) {
             print"<tr><td>";
            echo $row['Kinyarwanda'];
            echo "<br>";
            print"</td></tr>";
            echo"Unknown word "."<br>";
        



        
    }
}

?>
    <?php
      if (isset ($_POST['eng']) && $word !=null) {
          $result = mysqli_query($conn, "SELECT English FROM noun_translation
    WHERE Kinyarwanda LIKE '%{$word}%' OR English LIKE '%{$word}%' OR French LIKE '%{$word}' OR Kiswahili LIKE '%{$word}'");
    ?>
    <TABLE border ="2">
    <tr>
        <th bgcolor="blue"> English Version</th>
    </tr>
    <?php
while ($row = mysqli_fetch_array($result))
{
    print"<tr><td>";
        echo $row['English'];
        echo "<br>";
        print"</td></tr>";
}
}
 
?>
    <?php
if (isset ($_POST['fren'])&& $word != NULL) {
    $result = mysqli_query($conn, "SELECT French FROM noun_translation
    WHERE Kinyarwanda LIKE '%{$word}%' OR English LIKE '%{$word}%' OR French LIKE '%{$word}' OR Kiswahili LIKE '%{$word}'");
    ?>
    <TABLE border ="2">
    <tr>
        <th bgcolor="blue"> French Version</th>
    </tr>
    <?php
while ($row = mysqli_fetch_array($result))
{
    print"<tr><td>";
echo $row['French'];
echo "<br>";
print"</td></tr>";
}
}
 
?>
    <?php
if (isset ($_POST['kisw']) && $word !=NULL) {
    $result = mysqli_query($conn, "SELECT Kiswahili FROM noun_translation
    WHERE Kinyarwanda LIKE '%{$word}%' OR English LIKE '%{$word}%' OR French LIKE '%{$word}' OR Kiswahili LIKE '%{$word}'");
?>
    <TABLE border ="2">
    <tr>
        <th bgcolor="blue"> Kiswahili Version</th>
    </tr>
    <?php
while ($row = mysqli_fetch_array($result))
{
    print"<tr><td>";
echo $row['Kiswahili'];
echo "<br>";
print"</td></tr>";
}
}
 
//mysqli_close($con);
?>
 
