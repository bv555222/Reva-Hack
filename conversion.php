
<?php
$connection = mysqli_connect('localhost','root','','convertedfile');
 if(isset($_POST['convert']))
   conversion();
?>


<?php
function conversion(){
$connection = mysqli_connect('localhost','root','','convertedfile');
require_once __DIR__ . '/vendor/autoload.php';
    // Create new pdf 
$mpdf = new \Mpdf\Mpdf();





$mpdf->WriteHTML($file_temp_loc);
$mpdf->Output('Convertedfile.pdf','D');
}
?>

