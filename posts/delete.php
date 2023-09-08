<?php require "../config/config.php";?>

<?php

    if(isset($_GET['del_id'])){
        $id = $_GET['del_id'];

        $select = $conn->query("SELECT * FROM posts WHERE id = '$id'");
        $select->execute();
        $posts = $select->fetch(PDO::FETCH_OBJ);

        unlink("images/" . $posts->img . "");

        $delete = $conn->prepare(("DELETE FROM posts WHERE id = :id "));
        $delete->execute([
            ':id'=>$id,
        ]);

        // echo "<script>alert('Post has been Deleted')</script>";

        header("location: http://localhost/CLeanBlog/index.php");

    }
    else{

    }

?>