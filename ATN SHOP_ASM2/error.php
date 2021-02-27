<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Error 404</title>
</head>

<body>
  <?php
  if (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) {
    $refuri = parse_url($_SERVER['HTTP_REFERER']);
    if ($refuri['host'] == "cutlery-in-the-toaster.com") {
      echo "a dead link on this site.";
    }
  } else {
    echo "ERROR 404! WWEBSITE IS DEAD ";
  }
  ?>
</body>

</html>