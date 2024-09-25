<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="loginstyle.css">
    <link rel="icon" href="logo6.png">
  <title>Celestial cuisine</title>
</head>
<body>
 

    <?php
    // Database connection
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webproject";

    $con = mysqli_connect($server, $username, $password, $dbname);

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Handle form submissions
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['id']) && isset($_POST['new_user_name']) && isset($_POST['new_email']) && isset($_POST['new_password'])) {
            // Sign-up logic
            $id = $_POST['id'];
            $name = $_POST['new_user_name'];
            $email = $_POST['new_email'];
            $password = $_POST['new_password'];

            $signup_query = "INSERT INTO log_in (id, New_user_name, New_email, New_password) 
                            VALUES ('$id', '$name', '$email', '$password')";

            if (mysqli_query($con, $signup_query)) {
                echo "<p>New account created successfully!</p>";
            } else {
                echo "<p>Error: " . $signup_query . "<br>" . mysqli_error($con) . "</p>";
            }
        }

        if (isset($_POST['idd']) && isset($_POST['user_name']) && isset($_POST['email']) && isset($_POST['password'])) {
            // Sign-in logic
            $id = $_POST['idd'];
            $user_name = $_POST['user_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $signin_query = "INSERT INTO signin (id, user_name, email, password) 
                            VALUES ('$id', '$user_name', '$email', '$password')";

            if (mysqli_query($con, $signin_query)) {
                echo "<p>Sign-in successful!</p>";
            } else {
                echo "<p>Error: " . $signin_query . "<br>" . mysqli_error($con) . "</p>";
            }
        }
    }

    // Close connection
    mysqli_close($con);
    ?>



    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="index1.php" method="post">
                <h1>Create Account</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registration</span>
                <input type="number" placeholder="Id" name="id">
                <input type="text" placeholder="Name" name="new_user_name">
                <input type="email" placeholder="Email" name="new_email">
                <input type="password" placeholder="Password" name="new_password">
                <input type="submit" name="sub" value="Sign Up">
            </form>
        </div>

        <div class="form-container sign-in">
            <form action="index1.php" method="post">
                <h1>Sign In</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>or use your email password</span>
                <input type="text" placeholder="Id" name="idd">
                <input type="text" placeholder="Name" name="user_name">
                <input type="email" placeholder="Email" name="email">
                <input type="password" placeholder="Password" name="password">
                <a href="#">Forget Your Password?</a>
                <input type="submit" name="sub" value="Sign In">
            </form>
        </div>

        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of the site's features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details to use all of the site's features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const container = document.getElementById('container');
        const registerBtn = document.getElementById('register');
        const loginBtn = document.getElementById('login');

        registerBtn.addEventListener('click', () => {
            container.classList.add("active");
        });

        loginBtn.addEventListener('click', () => {
            container.classList.remove("active");
        });
    </script>

</body>

</html>
