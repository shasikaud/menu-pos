<?php

include ('config/db_connect.php');

//delete PSOT request
if (isset($_POST['delete'])){
    //set when delete button is pressed
    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

    $sql = "DELETE FROM pizzas WHERE id = $id_to_delete";

    if(mysqli_query($conn, $sql)){
        //success
        header('Location: index.php');
    } {
        //failure
        echo 'error in deleting';
    }
}

//check GET request id param
if (isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    //make sql
    $sql = "SELECT * FROM pizzas WHERE id = $id";

    //get the query result
    $result = mysqli_query($conn, $sql);

    //fetch the result in array format
    //one row
    $pizza = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    mysqli_close($conn);

    //print_r($pizza);
}
?>

<!DOCTYPE html>
<html>

<?php include('templates/header.php'); ?>

<div class="container center grey-text">
<?php if($pizza):?>
    <h4> <?php echo htmlspecialchars($pizza['title']);  ?> </h4>
    <p> Created by: <?php htmlspecialchars($pizza['email']); ?> </p>
    <p> <?php echo date($pizza['created_at']); ?></p>
    <h5> Ingredients:</h5>
    <p> <?php  echo htmlspecialchars($pizza['ingredients']); ?></p>

    <!-- delete -->
    <form action="details.php" method="POST">
        <input type="hidden" name="id_to_delete" value="<?php echo $pizza['id']?>">
        <input type="submit" name="delete" value="Delete" class="btn brand">
    </form>

<?php else: ?>
    <h5> No pizza folks </h5>

<?php endif; ?>

</div>


<?php include('templates/footer.php'); ?>
</html>