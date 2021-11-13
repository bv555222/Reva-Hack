


<?php  include "db.php"; ?>
<?php include "header.php"; ?>

<body>
    <div class="row">
        <div class="header">
            <h1> REVA HACK </h1>
        </div>
        <div class="logo"><img src="logo.jpg"></div>


        <h2> Automatic File compressor and converter </h2>
        <div class="main">
            <p>Problem:</p>
            <p>The file should be of type <b>.pdf</b> and size should be below <b>10MB</b></p>
            <form action="View.php" method="post" enctype="multipart/form-data" target="_top">
                <div class="upload">
                    <label for="document">Upload the Document </label>
                    <div class="upload"><input type="file" name="myfile" accept=".pdf"  id="file" value="UPLOAD" onchange="Filevalidation()" required /></div>
                    <div class="submit"><input type="submit" name="save" value="SUBMIT" required></div>
                </div>
            </form>
            
           
        <p class="main">Solution:</p>
                <!--    <p>The file should be of type <b>.pdf</b> and size should be below <b>10MB</b></p>-->
            <form action="uploadconvert.php" method="post" enctype="multipart/form-data" target="_top">
                <div class="upload">
                    <label for="document">Upload the Document </label>
                    <div class="upload"><input type="file" name="myfile" accept=".pdf"  id="file" value="UPLOAD" onchange="Filevalidation()" required /></div>
                    <div class="submit"><input type="submit" name="upload" value="UPLOAD" required></div>
                    </form>
                    <form action="View.php" method="post" enctype="multipart/form-data" target="_top">
                    <div class="submit"><input type="submit" name="convert" value="CONVERT" required></div>
                    </form>
                </div>
            
        </div>
    </div>
    
    <?php include "footer.php"; ?>
    
            <!--DELETE-->
<!--
            <form action="conversion.php" method="post">
            <div class="form-group">
            <select name="ID" ID="" >
                   <?php
                    
                    ?>
                 </select>
                </div>
             <input class="btn btn-primary" type="submit" name="delete" value="CONVERT">
            </form>
-->
            
            
