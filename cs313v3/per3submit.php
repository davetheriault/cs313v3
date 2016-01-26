<?php session_start(); ?>

<?php $_SESSION['voted'] = 'voted'; ?>

<?php 
    
//Load Form Data in String Variable
    $answers = "" . $_POST['genre'] . "\n"
             . "" . $_POST['least'] . "\n"
             . "" . $_POST['film'] . "\n"
             . "" . $_POST['amnt'] . "\n";
    
    //Filename
    $file = 'surveydata.txt';
    
    //Get previous data from file
    $data = file_get_contents($file);
            
    //Append Form data onto file data
    $data .= $answers;
    
    //Write all data to file
    file_put_contents($file, $data);
        
?>

<?php header('Location: http://localhost:5000/cs313v3/per3results.php '); ?>
<?php // header('Location: http://dave-geekowtlowd.rhcloud.com/cs313v3/per3results.php '); ?>