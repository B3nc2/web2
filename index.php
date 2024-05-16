<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/classified.jpg">
    <link rel="stylesheet" href="style.css">
    <title>🐺 Welcome to the Alpha Den 🏋️‍♂️</title>
</head>
<body>
    <div>
    <div id="everything">
    <div id="response-container" class="container">
    <h1>🐺 Welcome back, alpha wolf ! 🏋️‍♂️</h1>
            
        </div>
        <div id="login-container" class="container">
            <form action="index.php" method="post">
           <p>Only the alpha can enter. Prove your dominance.</p>
            <input type="text" name="username" placeholder="Enter your email"><br>
            <input type="password" name="password" placeholder="Enter your password"><br>
            <input type="submit" name="login" value="Login" class="login"><br>
        </form>
        </div>
        <div id="footer">
            <p style="font-weight: bold; font-size: 1.2em;">🏆 Created by: 🐺</p>
            <p style="font-size: 1.1em;">Alpha Creator Csehely Bence 💪</p>
            <p style="font-size: 1em;">Pack Leader ID: SZ5B55 🐾</p>
        </div>
    </div>
    <?php
        include("database.php");
        include("decode.php");
        include("colors.php");
        
        echo "<div class='scrpt'>";
        if (isset($_POST["login"])) {
            
            if (!empty($_POST["username"]) && !empty($_POST["password"])) {
                $username = $_POST["username"];
                $password = $_POST["password"];
                
                if (array_key_exists($username, $passwords)) {
                    
                    if ($passwords[$username] == $password) {
                        echo "Login successful. <br>";
                        $sql = "SELECT * FROM tabla WHERE username = '{$username}'";
                        $result = mysqli_query($conn, $sql);
                        $secret = mysqli_fetch_assoc($result)["titkos"];
                        $color = getSecretColor($secret);
                    } else {
                        echo "Error: Incorrect password.";
                        
                        echo("<script>setTimeout(function(){location.href='https://www.police.hu/'} , 3000);</script>");
                    }
                } else {
                    echo "Error: No such username {$username}.";
                }
            } else {
                echo "Error: Missing username or password. <br>";
            }
        }
        echo "</div>";

        mysqli_close($conn);
    ?>
    <style>
        body {
            background-color: <?php echo $color; ?>;
        }
    </style>
</body>
</html>