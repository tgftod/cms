<?php
/**
  * edit an entry in the job table.
  *
  */
  
  
require "./config.php";
require "./functions.php";

if (isset($_POST['submit'])) {
	
$date = convertDate($_POST['date']);
$shipdate = convertDate($_POST['shipdate']);

  try {
    $connection = new PDO($dsn, $username, $password, $options);
    $job =[
	  "id"           => $_POST['id'],
      "date"         => $date,
	  "customer"     => $_POST['customer_id'],
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
	  "price"        => $_POST['price'],
	  "shipdate"     => $shipdate,
	  "qtyshipped"   => $_POST['qtyshipped'],
	  "invnum"       => $_POST['invnum'],
	  "paid"         => $_POST['paid']
    ];

	
    $sql = "UPDATE job
            SET date = :date,
			  customer = :customer_id,
              ponum = :ponum,
              cav = :cav,
              core = :core,
              subins = :subins,
              pin = :pin,
			  sleeve = :sleeve,
			  rblock = :rblock,
			  sblock = :sblock,
			  rndblock = :rndblock,
			  sbody = :sbody,
			  sface = :sface,
			  die = :die,
			  man = :man,
			  post = :post,
			  fixt = :fixt,
			  samp = :samp,
			  descr = :descr,
			  hprog = :hprog,
			  wprog = :wprog,
			  other = :other,
			  price = :price,
			  shipdate = :shipdate,
			  qtyshipped = :qtyshipped,
			  invnum = :invnum,
			  paid = :paid
            WHERE id = :id";

  $statement = $connection->prepare($sql);
  $statement->execute($job);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
}

if (isset($_GET['id'])) {
  try {
    $connection = new PDO($dsn, $username, $password, $options);
    $id = $_GET['id'];
    $sql = "SELECT * FROM job WHERE id = :id";
    $statement = $connection->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();

    $job = $statement->fetch(PDO::FETCH_ASSOC);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
} else {
    echo "Something went wrong!";
    exit;
}
?>

<?php require "templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) : ?>
  <?php echo escape($_POST['id']); ?> successfully updated.
<?php endif; ?>

<h2>Edit Job</h2>

<form method="post">
    <?php foreach ($job as $key => $value) : ?>
      <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
      <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" value="<?php echo escape($value); ?>" <?php echo ($key === 'id' ? 'readonly' : null); ?>>
    <?php endforeach; ?>
    <input type="submit" name="submit" value="Submit">
</form>

<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>