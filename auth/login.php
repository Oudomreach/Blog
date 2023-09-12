<?php require "../includes/header.php";?>
<?php require "../config/config.php";?>

<?php 

    //check for submit action #done
    //take data from the input #done
    //write query #done
    //execute then fetch #done
    //do rowCount #done
    //do password verify function + redirect to home page #done

    if (isset($_SESSION['username'])) {
        header('location: http://localhost/CleanBlog/index.php');
    }else{

    }

    if (isset($_POST['submit'])) {
        if ($_POST['email'] == '' OR $_POST['password'] == '')  {
            echo "<div class='alert alert-danger text-center text-white role='alert'>
                    Please Input Email & Password.
                  </div>";
        }
        else{
            $email = $_POST['email'];
            $password = $_POST['password'];

            $login = $conn->query("SELECT * FROM users WHERE email='$email'");
            $login->execute();

            $row = $login->FETCH(PDO::FETCH_ASSOC);

            if($login->rowCount() > 0){
                if (password_verify($password, $row['password'])){

                    $_SESSION['username'] = $row['username'];
                    $_SESSION['user_id'] = $row['id'];

                    header("location: ../index.php");
                }
                else{
                  echo "<div class='alert alert-danger text-center text-white role='alert'>
                          Incorrect Password
                        </div>";
                }
            }
            else{
              echo "<div class='alert alert-danger text-center text-white role='alert'>
                      Wrong Email
                    </div>";
            }
        }
    }

?>

               <form method="POST" action="login.php">
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
                   
                  </div>

                  
                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />
                    
                  </div>



                  <!-- Submit button -->
                  <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Login</button>

                  <!-- Register buttons -->
                  <div class="text-center">
                    <p>a new member? Create an acount<a href="register.php"> Register</a></p>
                    

                   
                  </div>
                </form>

           
<?php require "../includes/footer.php";?>