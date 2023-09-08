<?php require "../includes/navbar.php"; ?>
<?php require "../config/config.php"; ?>

<?php 

    if(isset($_GET['post_id'])){
        $id = $_GET['post_id'];

        $select = $conn->query("SELECT * FROM posts WHERE id = '$id' ");
        $select->execute();
        $post = $select->fetch(PDO::FETCH_OBJ);

    }
    else{
        echo "404 ERROR";
    }

?>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('images/<?php echo $post->img; ?>')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading">
                            <h1><?php echo $post->title; ?></h1>
                            <h2 class="subheading"><?php echo $post->subtitle; ?></h2>
                            <span class="meta">
                                Posted by
                                <a href="#!"><?php echo $post->user_name; ?></a>
                                on <?php echo date('M', strtotime($post->created_at)) . ',' . date('d', strtotime($post->created_at)) . ',' . date('Y', strtotime($post->created_at)); ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Post Content-->
        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <p><?php echo $post->body; ?></p>
                        <!-- <p>As I stand out here in the wonders of the unknown at Hadley, I sort of realize there’s a fundamental truth to our nature, Man must explore, and this is exploration at its greatest.</p>
                        <p>
                            Placeholder text by
                            <a href="http://spaceipsum.com/">Space Ipsum</a>
                            &middot; Images by
                            <a href="https://www.flickr.com/photos/nasacommons/">NASA on The Commons</a>
                        </p> -->
                        <a href="http://localhost/CleanBlog/posts/delete.php?del_id=<?php echo $post->id; ?>" class="btn btn-danger text-center float-end">Delete</a>
                        <a href="update.php?upd_id=<?php echo $post->id; ?>" class="btn btn-warning text-center">Update</a>
                    </div>
                </div>
            </div>
        </article>
        <!-- Footer-->
<?php require "../includes/footer.php"; ?>