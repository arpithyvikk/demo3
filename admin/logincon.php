<?php 

session_start();
if(isset($_SESSION['admin_id'])){
    echo "<script>
            alert('You are already login..')
            window.location.href = 'index.php'
            </script>";
}
else{
    include ('../dbconfig.php');

    if (isset($_POST['email']) && isset($_POST['password'])) {

        function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }

        $email = validate($_POST['email']);
        $password = validate($_POST['password']);

        if (empty($email)) {
            echo "<script>
                alert('Email is required please try again')
                window.location.href = 'login.php'
                </script>";
        }else if(empty($password)){
            echo "<script>
                alert('Password is required please try again')
                window.location.href = 'login.php'
                </script>";
        }else{
            // set cokkies
            
            $sql = "SELECT * FROM admins WHERE email='$email' AND password='$password'";

            $result = mysqli_query($con, $sql);

            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                if ($row['email'] === $email && $row['password'] === $password) {
                    $_SESSION['admin_name'] = $row['name'];
                    $_SESSION['admin_id'] = $row['id'];
                    if(!empty($_POST["remember"])) {
                        setcookie ("admin_email",$_POST["email"],time()+ (10 * 365 * 24 * 60 * 60));
                        setcookie ("admin_password",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60));
                    } 
                    else {
                        if(isset($_COOKIE["admin_email"]) && isset($_COOKIE['admin_password'])) {
                            setcookie ("admin_email",time()-3600);
                            setcookie ("admin_password",time()-3600);
                        }
                    }
                    header("Location: index.php");
                    exit();
                }else{
                    echo "<script>
                alert('Incorect email or password')
                window.location.href = 'login.php'
                </script>";
                }
            }else{
                echo "<script>
                alert('Incorect email or password')
                window.location.href = 'login.php'
                </script>";
            }
        }
        
    }else{
        header("Location: login.php");
        exit();
    }
}
?>