<?php
/**
  * create a new entry in the job table.
  *
  */


if (isset($_POST['submit'])) {
  require "./config.php";
  require "./functions.php";

$date = convertDate($_POST['date']);
  
  try {
    $connection = new PDO($dsn, $username, $password, $options);

    $new_job = array(
      "date"         => $date,
	  "ponum"        => $_POST['ponum'],
	  "cav"          => $_POST['cav'],
	  "core"         => $_POST['core'],
	  "subins"       => $_POST['subins'],
	  "pin"          => $_POST['pin'],
	  "sleeve"       => $_POST['sleeve'],
	  "rblock"       => $_POST['rblock'],
	  "sblock"       => $_POST['sblock'],
	  "rndblock"     => $_POST['rndblock'],
	  "sbody"        => $_POST['sbody'],
	  "sface"        => $_POST['sface'],
	  "die"          => $_POST['die'],
	  "man"          => $_POST['man'],
	  "post"         => $_POST['post'],
	  "fixt"         => $_POST['fixt'],
	  "samp"         => $_POST['samp'],
	  "descr"        => $_POST['descr'],
	  "hprog"        => $_POST['hprog'],
	  "wprog"        => $_POST['wprog'],
	  "other"        => $_POST['other'],
	  "price"        => $_POST['price']
	  
    );

	$cust = array (
	  "company"   => $_POST['customer']
	);
	
    $sql = sprintf(
		"INSERT INTO %s (%s) values (%s)",
		"job",
		implode(", ", array_keys($new_job)),
		":" . implode(", :", array_keys($new_job))
    );
	
	
	$sql2 = sprintf(
		"INSERT IGNORE INTO %s (%s) values (%s)",
		"customer",
		implode(", ", array_keys($cust)),
		":" . implode(", :", array_keys($cust))
    );
    
	$stmt = $connection->prepare($sql);
	$stmt2 = $connection->prepare($sql2);
	
	$stmt2->execute($cust);
	$custno = (mysql_insert_id());
    $stmt->execute($new_job);
	$jobno = (mysql_insert_id());
	
	
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }

}
?>
<?php include "templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) { ?>
  <?php echo 'Job number' . $jobno . 'successfully created.'; ?>
<?php } ?>

<h2>Job Entry</h2>

	<form method="post">
    	<label for="customer">Customer</label>
		<input type="text" name="customer" id="customer">
    	<label for="date">Date</label>
		<input type="text" name="date" id="date">
    	<label for="ponum">PO Number</label>
		<input type="text" name="ponum" id="ponum">
    	<label for="cav">Cavities</label>
		<input type="text" name="cav" id="cav">
    	<label for="core">Cores</label>
		<input type="text" name="core" id="core">
		<label for="subins">Sub Inserts</label>
		<input type="text" name="subins" id="subins">
		<label for="pin">Pins</label>
		<input type="text" name="pin" id="pin">
		<label for="sleeve">Sleeves</label>
		<input type="text" name="sleeve" id="sleeve">
		<label for="rblock">Rectangle Blocks</label>
		<input type="text" name="rblock" id="rblock">
		<label for="sblock">Square Blocks</label>
		<input type="text" name="sblock" id="sblock">
		<label for="rndblock">Round Blocks</label>
		<input type="text" name="rndblock" id="rndblock">
		<label for="sbody">Slide Bodies</label>
		<input type="text" name="sbody" id="sbody">
		<label for="sface">Slide Faces</label>
		<input type="text" name="sface" id="sface">
		<label for="die">Dies</label>
		<input type="text" name="die" id="die">
		<label for="man">Mandrels</label>
		<input type="text" name="man" id="man">
		<label for="post">Posts</label>
		<input type="text" name="post" id="post">
		<label for="fixt">Fixtures</label>
		<input type="text" name="fixt" id="fixt">
		<label for="samp">Samples</label>
		<input type="text" name="samp" id="samp">
		<label for="descr"> Other / Work Description</label>
		<input type="text" name="descr" id="descr">
		<label for="hprog">Holepop Program</label>
		<input type="text" name="hprog" id="hprog">
		<label for="wprog">Wire Program</label>
		<input type="text" name="wprog" id="wprog">
		<label for="other">Other Process</label>
		<input type="text" name="other" id="other">
		<label for="price">Price</label>
		<input type="text" name="price" id="price">
		<input type="submit" name="submit" value="Submit">
    </form>

    <a href="index.php">Back to home</a>

<?php include "templates/footer.php"; ?>