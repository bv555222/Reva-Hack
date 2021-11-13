<?php
$connection = mysqli_connect('localhost','root','','file upload');
$query = "SELECT * FROM file";
$result = mysqli_query($connection,$query);
?>



<?php

if (isset($_POST['save'])) { // if save button on the form is clicked
    
    // name of the uploaded file
    $file_name = $_FILES['myfile']['name'];
    
    $file_type = $_FILES['myfile']['type'];
    
    

    // get the file extension
    $extension = pathinfo($file_name, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
   $file_temp_loc = $_FILES['myfile']['tmp_name'];
    $file_size = $_FILES['myfile']['size'];
    
    // destination of the file on the server
    $destination = 'uploads/' . $file_name;
    
    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .jpg, .pdf or .docx";
    }elseif ($_FILES['myfile']['size'] > 10000000) { // file shouldn't be larger than 1Megabyte
        echo "<p style='background-color:red;color:white;text-align:center'>" ."File too large!" . "</p>";
    } 
        // move the uploaded (temporary) file to the specified destination
    if (move_uploaded_file($file_temp_loc,$destination)) {
    $query = "INSERT INTO file(File_name,File_size,File_type,filepath)";
    $query .= "VALUES('$file_name', '$file_size','$extension','$file_temp_loc')";
            if (mysqli_query($connection,$query)) {
                echo "<p style='background-color:green;color:white;text-align:center'>" . "File uploaded successfully". "</p>";  
                
                
            }
         else {
            echo "<p style='background-color:red;color:white;text-align:center'>" . "Failed to upload file.". "</p>";
             
        }
    }
}
?>

<?php
$connection = mysqli_connect('localhost','root','','convertedfile');
 if(isset($_POST['convert']))
   conversion();

?>


<?php
function conversion(){
$connection = mysqli_connect('localhost','root','','convertedfile');
require_once __DIR__ . '/vendor/autoload.php';
//$destination = 'uploads/' . $file_name;
    // Create new pdf 
$mpdf = new \Mpdf\Mpdf();
$mpdf->showImageErrors = true;

$mypdf =  '<img src="uploads/logo.jpg" width="100%"/>';
//$mpdf->Image('uploads/logo.jpg', 0,0, 500, 500, 'jpg', 'REVA LOGO', true, false);    
$mpdf->WriteHTML($mypdf);
$mpdf->Output('Convertedfile.pdf','D');
}
?>


<?php include "header.php"; ?>
 <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>SL.NO</th>
                        <th>File Name</th>
                        <th>File size</th>
                        <th>File type</th>
                        <th>Download</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                while($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['File_name']; ?></td>
                    <td><?php echo $row['File_size']; ?></td>
                    <td><?php echo $row['File_type']; ?></td>

                    <td><a href="uploads/<?php echo $row['File_name']; ?>" view>View</td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
                </div>
<?php include "footer.php"; ?>