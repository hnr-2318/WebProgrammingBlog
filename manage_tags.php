<?php
     require __DIR__ . './functions.php';
    $conn = connectToDatabase();
    $conn->select_db("blogs");

    // Perform Query
   $sql = "SELECT * FROM tags limit 10"; 
   $retval = performQuery($conn,$sql);

   $tags = $retval->fetch_all(MYSQLI_ASSOC); 
?>
<?php include("./common/header.php"); ?>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<h1>Manage Tags</h1>
<table>
    <tr>
        <td>Tag Name</td>
        <td></td>
    </tr>
    <?php foreach ($tags as $tag) : ?>
        <tr>
            <td><?php echo "{$tag['tag_name']}" ?></td>
            <td><a href="./manage_tags_delete_action.php?tagID=<?php echo $tag['t_ID'] ?>" class="btn btn-primary">Delete</a></td>
        </tr>
    <?php endforeach; ?>
</table>
<form action="manage_tags_create_action.php">
    <label for="tagName">Tag Name</label>
    <input name="tagName" type="text" />
    <input class="btn btn-primary" type="submit">
</form>
<?php include("./common/footer.html"); ?>