<?php
require 'config.php';
$sql = "SELECT * FROM inventory";
$output = mysqli_query($connection, $sql);
?>
 <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th><div align="center">ID</div></th>
        <th><div align="center">Image</div></th>
        <th><div align="center">Title</div></div></th>
        <th><div align="center">Author</div></th>
        <th><div align="center">Total</div></th>
        <th><div align="center">Available</div></th>
      </tr>
    </thead>
    <?php
    if ($output = mysqli_query($connection, $sql)) {
       while ($row = mysqli_fetch_assoc($output)) {
    ?>
      <tbody>
        <tr>
          <td><div align="center"><?php echo $row['bookid']; ?></div></td>
          <td><div align="center"><img src="<?php echo $row['img']; ?>"></div></td>
          <td><div align="center"><?php echo $row['title']; ?></div></td>
          <td><div align="center"><?php echo $row['author']; ?></div></td>
          <td><div align="center"><?php echo $row['total']; ?></div></td>
          <td><div align="center"><?php echo $row['total']-$row['reserve_amt']; ?></div></td>
        </tr>
    <?php } ?>
      </tbody>
  </table>
 </div>
<?php } ?>
