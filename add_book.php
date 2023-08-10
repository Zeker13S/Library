<?php

include('db.php');

if (isset($_POST['add_book'])) {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $editorial = $_POST['editorial'];
    $gender = $_POST['gender'];
    $language = $_POST['language'];
    $isbn = $_POST['isbn'];
    $stock = $_POST['stock'];
    $date = $_POST['date'];


    $query = "INSERT INTO books(title, description, editorial, gender, language, isbn, stock, date) VALUES ('$title', '$description','$editorial', '$gender','$language', '$isbn', '$stock', '$date')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query Failed");
    }

    $_SESSION['message'] = 'Book Saved Succefully';
    $_SESSION['message_type'] = 'success';

    header("location: index.php");

}

?>

<?php include('includes/header.php') ?>

<div class="container p-4 ">
    <div class="row">
        <div class="col-md-4 d-block mx-auto">
        <div class="card card-body ">
            <form action="add_book.php" method="POST">

                <div class="form-group">
                    <input type="text" name="title" class="form-control" placeholder="Book Title" autofocus->
                </div>

                <div class="form-group">
                    <textarea class="form-control" name="description" cols="1" rows="2"
                        placeholder="Book Description"></textarea>
                </div>

                <div class="form-group">
                    <input type="text" name="editorial" class="form-control" placeholder="Editorial" autofocus->
                </div>

                <div class="form-group">
                    <input type="text" name="gender" class="form-control" placeholder="Gender" autofocus->
                </div>

                <div class="form-group">
                    <input type="text" name="language" class="form-control" placeholder="Language" autofocus->
                </div>

                <div class="form-group">
                    <input type="text" name="isbn" class="form-control" placeholder="ISBN" autofocus->
                </div>

                <div class="form-group">
                    <input type="text" name="stock" class="form-control" placeholder="Stock" autofocus->
                </div>

                <div class="form-group">
                    <input type="date" name="date" class="form-control" autofocus->
                </div>

                <div class="d-grid gap-2 col-6 mx-auto">
                    <input class="btn btn-success btn-block" type="submit" name="add_book" value="Add Book">
                </div>

            </form>
        </div>
    </div>

<?php include('includes/footer.php') ?>