<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>submit-data-drive</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="main">
<a href="index.html" target="_blank" rel="noopener noreferrer">test with enter more information</a>
    <?php
// 1hdRjUrqpyZ2RdsTDb1BEAfcjldcQleYqdruzSBeLL5A this is thw sheet id
// spreadsheets.google.com/feeds/worksheets/id/public/basic    this is the url 

// spreadsheets.google.com/feeds/worksheets/1hdRjUrqpyZ2RdsTDb1BEAfcjldcQleYqdruzSBeLL5A/public/basic 
   
 
 // spreadsheets.google.com/feeds/worksheets/1hdRjUrqpyZ2RdsTDb1BEAfcjldcQleYqdruzSBeLL5A/public/basic?alt=json 

//    this is the final linl we have need-------->

// https://spreadsheets.google.com/feeds/list/1hdRjUrqpyZ2RdsTDb1BEAfcjldcQleYqdruzSBeLL5A/od6/public/basic?alt=json

$url="https://spreadsheets.google.com/feeds/list/1hdRjUrqpyZ2RdsTDb1BEAfcjldcQleYqdruzSBeLL5A/od6/public/basic?alt=json";
$json=file_get_contents($url) or die("sheet url not working");
$arr=json_decode($json,true);
$result=($arr['feed']['entry']) or die("this sheet hava no data please enter data into sheet");
?>
<table border="1" cellspacing="0" width="100%">
    <tr>
        <td>Serial number</td>
        <td>User_name</td>
        <td>email</td>
        <td>mobile</td>
    </tr>
    <?php 
    $i=1;
    foreach($result as $row  ){
        $main=$row['title']['$t'];
        $explode=$row['content']['$t'];
        $info=explode(",",$explode);
        $email=explode(":",$info[0]);
        $mobile=explode(":",$info[1]);
        
        echo'<tr><td>'.$i.'</td><td>'.$row['title']['$t'].'</td> <td>'.$email[1].'</td> <td>'.$mobile[1].'</td></tr>';
if($i>=10)
die();
$i++;

    }

 

    ?>
</table>

    </div>
</body>
</html>
