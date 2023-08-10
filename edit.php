<?php

    include("db.php");
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM books WHERE id = $id ";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            $title = $row['title'];
            $description = $row['description'];
            $editorial = $row['editorial'];
            $gender = $row['gender'];
            $language = $row['language'];
            $isbn = $row['isbn'];
            $stock = $row['stock'];
            $date = $row['date'];
        }
    }

    if (isset($_POST['update'])) {
        $id = $_GET['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $editorial = $_POST['editorial'];
        $gender = $_POST['gender'];
        $language = $_POST['language'];
        $isbn = $_POST['isbn'];
        $stock = $_POST['stock'];
        $date = $_POST['date'];

        $query = "UPDATE books set title = '$title', description = '$description',editorial = '$editorial', gender = '$gender', language = '$language', isbn = '$isbn', stock = '$stock', date = '$date', WHERE id = $id ";
        mysqli_query($conn, $query);

        $_SESSION['message'] = 'Book Updated Successfully';
        $_SESSION['message_type'] = 'success';
        header("Location: index.php");

    }

?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div class="card card-body">

                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">

                    <div class="form-group">
                        <input type="text" name="title" value="<?php echo $title; ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" placeholder="Update Description" name="description" rows="2"><?php echo $description; ?></textarea>
                    </div>

                    <div class="form-group">
                        <input type="text" name="editorial" value="<?php echo $editorial; ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="text" name="gender" value="<?php echo $gender; ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="text" name="language" value="<?php echo $language; ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="text" name="isbn" value="<?php echo $isbn; ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="text" name="stock" value="<?php echo $stock; ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="date" name="date" value="<?php echo $date; ?>" class="form-control">
                    </div>

                    <button class="btn btn-success d-block mx-auto" name="update"> Update </button>

                </form>

            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>