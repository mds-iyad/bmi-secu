<?php include 'bmi_header.php'; ?>
<?php 
    $errh = $errw = $errg = $erru =  "";
    $height = $weight = $username = "";
    $bmipass = "";
    
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (empty($_POST['height'])) {
            $errh = "<span style='color:#ed4337; font-size:17px; display:block'>Height is requried</span>";
        } else {
            $height = validate($_POST['height']);
        }
    
        if (empty($_POST['weight'])) {
            $errw = "<span style='color:#ed4337; font-size:17px; display:block'>Weight is requried</span>";
        } else {
            $weight = validate($_POST['weight']);
        }
        if (empty($_POST['username'])) {
            $erru = "<span style='color:#ed4337; font-size:17px; display:block'>Username is requried</span>";
        } else {
            $username = validate($_POST['username']);
        }

        if (empty($_POST['height'] && $_POST['weight'])) {
            echo "";
        } else {
            $bmi = ($weight / ($height * $height));
            $bmipass = $bmi;
        }
    }
    
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

<h2>Check Your BMI</h2>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    
    <div class="section1">
        <span>Enter Your Height : </span>
        <input type="text" name="height" autocomplete="off" placeholder="Miter"><?php echo $errh; ?>
    </div>
    
    <div class="section2">
        <span>Enter Your weight : </span>
        <input type="text" name="weight" autocomplete="off" placeholder="kilogram"><?php echo $errw; ?>
    </div>

    <div class="section3">
        <span>Enter username : </span>
        <input type="text" name="username" autocomplete="off" placeholder="username"><?php echo $erru; ?>
    </div>
    
    <div class="submit">
        <input type="submit" name="submit" value="Check and save BMI">
        <input type="reset" value="Clear">
    </div>
    
</form>


<?php
    error_reporting(0);
        echo "<span class='pass'>Your BMI is : ". number_format($bmipass , 2) ."</span>";
    if (isset($_POST['submit'])){
        if ($bmipass >= 13.6 && $bmipass <= 18.5) {
            echo "<span style='color:#00203FFF; display:block; margin-top:5px ;margin-right:50px'> Low body weight. You need to gain weight by eating moderately.</span>";?>
            <?php
        } elseif ($bmipass > 18.5 && $bmipass < 24.9) {
            echo "<span style='color:#00203FFF; display:block; margin-top:5px;margin-right:50px'> The standard of good health.</span>";?>
            <?php
        } elseif ($bmipass > 25 && $bmipass < 29.9) {
            echo "<span style='color:#00203FFF; display:block; margin-top:5px;margin-right:50px'> Excess body weight. Exercises needed to reduce excess weight.</span>";?>
            <?php
        } elseif ($bmipass > 30 && $bmipass < 34.9) {
            echo "<span style='color:#00203FFF; display:block; margin-top:5px;margin-right:50px'> The first stage of obesity. It is necessary to choose food and exercise.</span>";?>
            <?php
        } elseif ($bmipass > 35 && $bmipass < 39.9) {
            echo "<span style='color:#00203FFF; display:block; margin-top:5px;margin-right:50px'> The second stage of obesity. Moderate diet and exercise are required.</span>";?>
            <?php
        } elseif ($bmipass >= 40) {
            echo "<span style='color:#00203FFF; display:block; margin-top:5px;margin-right:50px'> Excess fat.<b style='color:#ed4337'> Fear of death</b>. Need a doctor advice.</span>";?>
            <?php
        }

        // $conn = OpenCon();
        // if(!$conn)
        // {
        //     echo 'Connection error: ' . mysqli_connect_error();
        // }

        // $stmt = mysqli_query($conn, "SELECT * FROM users WHERE (username='$username')");
        // $count = mysql_fetch_array($stmt);

        // // $stmt = $conn->prepare("SELECT * FROM users WHERE (username='$username')");
        // // $stmt->bindParam(':username', $username);
        // // $stmt->execute();
        // // $count = $stmt->rowCount();

        // if($count > 0)
        // {
        //     //update
        // }
        // else
        // {
        //     //insert
        // }


    } else {
        echo "";
    }
?>



<?php include 'bmi_footer.php'; ?>