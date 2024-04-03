<!-- all this php code does is for stroring credentials only everytime register acc. button is clicked -->
<?php
    // code for sending account credentials to the table named user_accounts
    if($_SERVER['HTTP_REFERER'] == "http://localhost/LiDom-check-source-code/index.php" && isset($_POST['register'])){

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $pdo = new PDO("mysql:host=localhost;dbname=database", 'root', '');

        // you can just do change the table "user_accounts" here with the table youre using with 
        // at least similar attributes of name, email, and password in string data type
        // right here sa query
        $query = "INSERT INTO user_accounts (name, email, password) VALUES (:uname, :email, :upassword);";

        $stmt = $pdo->prepare($query); 

        $stmt->bindParam(":uname", $name, PDO::PARAM_STR);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":upassword", $password, PDO::PARAM_STR);

        $stmt->execute();

    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Database Login || IM</title>
</head>
<body>
    
    <div class="container" id="container">
        <div class="form-container sign-up">
            <!-- action will be refer to same page for registering credentials-->
            <form action="index.php" method="post">
                <h1>Create Account</h1>
                <div class="social icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i>
                    </a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i>
                    </a>
                    <a href="#" class="icon"><i class="fa-solid fa-phone"></i>
                    </a>
                </div>
                <span>or use your email to register</span>
                <input type="text" placeholder="Name" name="name">
                <input type="text" placeholder="email" name="email">
                <input type="password" placeholder="password" name="password">
                <button class="outside" name="register">Register Account</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <!-- i will redirect this to the other page(search book etc.)
                and didto ko na lang include and authentication -->
            <form action="samplepage.booksearch.php">
                <h1>Sign In</h1>
                <div class="social icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i>
                    </a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i>
                    </a>
                    <a href="#" class="icon"><i class="fa-solid fa-phone"></i>
                    </a>
                </div>
                <span>or use your email and password to sign in</span>
                <input type="text" placeholder="email" name="name">
                <input type="password" placeholder="password" name="password">
                <a href="#">Forgot Your Password?</a>
                <button class="outside" type="submit">Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome to LiDom</h1>
                    <p>Encode your personal details to use all of the site features</p>
                    <button class="hidden" id="login"> Login</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>New Here?</h1>
                    <p>Register Account to use all of the site features</p>
                    <button class="hidden" id="register"> Create Account</button>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>