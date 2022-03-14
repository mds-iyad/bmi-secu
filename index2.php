<?php
    include 'db_connection.php';

    $conn = OpenCon();
    
    echo "Connected Successfully";
    
    CloseCon($conn);

?>
<?php include 'bmi.php'; ?>