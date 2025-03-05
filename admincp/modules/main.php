




<div class="clear">
</div>
<div class="main">
  <?php

  if (isset($_GET['action']) && $_GET['query']) {
    $tam = $_GET['action'];
    $query = $_GET['query'];
  } else {
    $tam = '';
    $query = '';
  }
    if($tam == 'managepetlist' && $query == 'add') {
    include("modules/managepetlist/listed.php");
  } elseif ($tam == 'managepetlist' && $query == 'edit') {
    include("modules/managepetlist/edit.php");
  } elseif ($tam == 'managepet' && $query == 'add') {
    include("modules/managepet/listed.php");
  } elseif ($tam == 'managepet' && $query == 'edit') {
    include("modules/managepet/edit.php");
  } elseif ($tam == 'ordermanagerment' && $query == 'list') {
    include("modules/ordermanagerment/list.php");
  } elseif ($tam == 'orderdetails' && $query == 'details') {
    include("modules/ordermanagerment/detail.php");
  }
  else {
    include("modules/dashboard.php");
  }
  ?>
</div>