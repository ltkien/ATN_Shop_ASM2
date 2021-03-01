<?php
$con = pg_connect("host=ec2-54-220-35-19.eu-west-1.compute.amazonaws.com
dbname=d3d86pg4upllsh
port=5432
user=zmvsrcbksqwkdt
password=9c571947fb86d6d6fbde944f4bd9d3dfd522e56b3652b3731394cd32983ef33e
sslmode=require");

$query = "select product_id, product_name, product_price, product_category, atn_store, product_quantity, product_description from product ;";
$result = pg_query($con, $query);
$resultCheck = pg_num_rows($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ATN Shop - Mofidy Product</title>

  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="/css/style.css">
</head>

<body id="bd-view-page">
  <div class="form-title">
    <h1 style="font-weight: 700;">ATN SHOP - MODIFY PRODUCT</h1>
  </div>
  <div class="container">
    <div class="col" style="padding-top:50px;">
      <table id="view-data" class="table" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Product</th>
            <th>Price</th>
            <th>Category</th>
            <th>Store</th>
            <th>Quantity</th>
            <th>Description</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($resultCheck > 0) {
            while ($row = pg_fetch_assoc($result)) {
          ?>
              <tr>
                <td>
                  <?php echo $row['product_id']; ?>
                </td>
                <td>
                  <?php echo $row['product_name']; ?>
                </td>
                <td>
                  <?php echo $row['product_price']; ?>
                </td>
                <td>
                  <?php echo $row['product_category']; ?>
                </td>
                <td>
                  <?php echo $row['atn_store']; ?>
                </td>
                <td>
                  <?php echo $row['product_quantity']; ?>
                </td>
                <td>
                  <?php echo $row['product_description']; ?>
                </td>
                <td>
                  <div class="delete" data-toggle="buttons"><a href="toydelete.php?id=<?php echo $row["id"]; ?>">DELETE</a></div>
                </td>
              </tr>
          <?php
            }
          } else {
            echo "<script>alert('Connect fail!');</script>" . pg_errormessage($query);
          }
          ?>
        </tbody>
      </table>
        <div class="btn-group_bottom">
        <button class="btn btn-logout" type"logout" onclick="location.href='/logout.php';">LOGOUT</button>
        </div>
    </div>
</body>

</html>
