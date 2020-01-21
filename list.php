<?php
/**
  * list all jobs with a link to edit
  *
  */


try {
  require "./config.php";
  require "./functions.php";

  $connection = new PDO($dsn, $username, $password, $options);

  $sql = "SELECT * FROM job";

  $statement = $connection->prepare($sql);
  $statement->execute();

  $result = $statement->fetchAll();

} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}

?>
<?php require "templates/header.php"; ?>

<h2>List Jobs</h2>

<table>
  <thead>
    <tr>
      <th>Job #</th>
      <th>Date</th>
	  <th>Customer</th>
      <th>PO Number</th>
      <th>Cavities</th>
      <th>Core</th>
      <th>Sub Inserts</th>
      <th>Pins</th>
	  <th>Sleeves</th>
	  <th>Rectangle Blocks</th>
	  <th>Square Blocks</th>
	  <th>Round Blocks</th>
	  <th>Slide Body</th>
	  <th>Slide Face</th>
	  <th>Dies</th>
	  <th>Mandrels</th>
	  <th>Posts</th>
	  <th>Fixtures</th>
	  <th>Samples</th>
	  <th>Other/ Work Description</th>
	  <th>Holepop Programs</th>
	  <th>Wire Programs</th>
	  <th>Other Process</th>
	  <th>Price</th>
	  <th>Ship Date</th>
	  <th>Quantity Shipped</th>
	  <th>Invoice Number</th>
	  <th>Paid</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($result as $row) : ?>
    <tr>
      <td><?php echo escape($row["id"]); ?></td>
      <td><?php echo escape($row["date"]); ?></td>
	  <td><?php echo escape($row["customer_id"]); ?></td>
      <td><?php echo escape($row["cav"]); ?></td>
      <td><?php echo escape($row["core"]); ?></td>
      <td><?php echo escape($row["subins"]); ?></td>
      <td><?php echo escape($row["pin"]); ?></td>
      <td><?php echo escape($row["sleeve"]); ?> </td>
	  <td><?php echo escape($row["rblock"]); ?> </td>
	  <td><?php echo escape($row["sblock"]); ?> </td>
	  <td><?php echo escape($row["rndblock"]); ?> </td>
	  <td><?php echo escape($row["sbody"]); ?> </td>
	  <td><?php echo escape($row["sface"]); ?> </td>
	  <td><?php echo escape($row["die"]); ?> </td>
	  <td><?php echo escape($row["man"]); ?> </td>
	  <td><?php echo escape($row["post"]); ?> </td>
	  <td><?php echo escape($row["fixt"]); ?> </td>
	  <td><?php echo escape($row["samp"]); ?> </td>
	  <td><?php echo escape($row["descr"]); ?> </td>
	  <td><?php echo escape($row["hprog"]); ?> </td>
	  <td><?php echo escape($row["wprog"]); ?> </td>
	  <td><?php echo escape($row["other"]); ?> </td>
	  <td><?php echo escape($row["price"]); ?> </td>
	  <td><?php echo escape($row["shipdate"]); ?> </td>
	  <td><?php echo escape($row["qtyshipped"]); ?> </td>
	  <td><?php echo escape($row["invnum"]); ?> </td>
	  <td><?php echo escape($row["paid"]); ?> </td>
	  <td><a href="update.php?id=<?php echo escape($row["id"]); ?>">Edit</a></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>