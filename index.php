<?php include("db.php") ?>
<?php include("includes/header.php") ?>

<?php if (isset($_SESSION['message'])) { ?>
            <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php session_unset();
        } ?>
<div class="col-md-12">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Descripcion</th>
                <th>Editorial</th>
                <th>Gènero</th>
                <th>Idioma</th>
                <th>ISBN</th>
                <th>Stock</th>
                <th>Ingreso</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $query = "SELECT * FROM books";
            $result_books = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_array($result_books)) { ?>
                <tr>
                    <td>
                        <?php echo $row['title'] ?>
                    </td>
                    <td>
                        <?php echo $row['description'] ?>
                    </td>
                    <td>
                        <?php echo $row['editorial'] ?>
                    </td>
                    <td>
                        <?php echo $row['gender'] ?>
                    </td>
                    <td>
                        <?php echo $row['language'] ?>
                    </td>
                    <td>
                        <?php echo $row['isbn'] ?>
                    </td>
                    <td>
                        <?php echo $row['stock'] ?>
                    </td>
                    <td>
                        <?php echo $row['date'] ?>
                    </td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-info navbar-brand">
                            <i class="fa-solid fa-file-pen"></i>
                        </a>
                        <a href="delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger navbar-brand">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>

            <?php } ?>
        </tbody>

    </table>
</div>

</div>
</div>

<?php include("includes/footer.php") ?>