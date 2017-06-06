<?php
include("dbcheck.php");


$query = "select * from res where memberid='$id'";
$result = mysqli_query($db,$query);

  while ($row = mysqli_fetch_assoc($result)) {

    ?>
    <button  onclick="location.href='click_b.php?id=<?php echo $row["id"] ?>'" type="button" class="btn btn-primary btn-lg"><?php echo $row["resname"]; ?></button>
    <?php
  }//반복문 끝
?>

<?php
include("dbend.php");

?>

