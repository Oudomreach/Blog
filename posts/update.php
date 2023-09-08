<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php 

    if(isset($_GET['upd_id'])){
        $id = $_GET['upd_id'];

        // first query
        $select = $conn->query("SELECT * FROM posts WHERE id = '$id' ");
        $select->execute();
        $rows = $select->fetch(PDO::FETCH_OBJ);

        // second query
        if(isset($_POST['submit'])){
            if ($_POST['title'] == '' OR $_POST['subtitle'] == '' OR $_POST['body'] == '') {
                echo '<script>alert("Please Input all the field.")</script>'; 
            }
            else{
                $title = $_POST['title'];
                $subtitle = $_POST['subtitle'];
                $body = $_POST['body'];

                $img = $_FILES['img']['name'];
                $dir = 'images/' . basename($img);


                $update = $conn->prepare("UPDATE posts SET title=:title, subtitle=:subtitle, body=:body, img=:img WHERE id ='$id' ");
                $update->execute([
                    ':title'=>$title,
                    ':subtitle'=>$subtitle,
                    ':body'=>$body,
                    ':img'=>$img
                ]);

                if (move_uploaded_file($_FILES['img']['tmp_name'], $dir)) {
                    header('location: http://localhost/CleanBlog/index.php');
                }

                // header("location: http://localhost/CleanBlog/index.php");
            }
        }
    }

?>

            <form method="POST" action="update.php?upd_id=<?php echo $id; ?>" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="text" name="title" value="<?php echo $rows->title; ?>" id="form2Example1" class="form-control" placeholder="title" />
                
                </div>

                <div class="form-outline mb-4">
                    <input type="text" name="subtitle" value="<?php echo $rows->subtitle; ?>" id="form2Example1" class="form-control" placeholder="subtitle" />
                </div>

                <div class="form-outline mb-4">
                    <input type="text" name="body" value="<?php echo $rows->body; ?>" id="form2Example1" class="form-control" placeholder="body" />
                </div>

                
                <div class="form-outline mb-4">
                    <input type="file" name="img" id="form2Example1" class="form-control" placeholder="image" />
                </div>
                <?php echo $rows->img; ?>

                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Update</button>
            </form>
<?php require "../includes/footer.php"; ?>

