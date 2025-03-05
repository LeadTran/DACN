<?php
  $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Trang hiện tại
  $itemsPerPage = 6; // Số mục trên mỗi trang

  if ($currentPage == 1 || $currentPage == '') {
    $begin = 0;
  } else {
    $begin = ($currentPage * $itemsPerPage) - $itemsPerPage;
  }

  $sql_pro = "SELECT * FROM tbl_pet, tbl_petlist WHERE tbl_pet.id_petlist = tbl_petlist.id ORDER BY tbl_pet.stt DESC LIMIT $begin, $itemsPerPage";
  $query_pro = mysqli_query($mysqli, $sql_pro);
?>

<!-- Các mục hiển thị sản phẩm -->
<h3>NEW PET</h3>
<ul class="product_list">
  <?php while ($row = mysqli_fetch_array($query_pro)) { ?>
    <li>
      <a href="index.php?tocontrol=pet&id=<?php echo $row['stt'] ?>" class="no-default">
        <img src="admincp/modules/managepet/uploads/<?php echo $row['img'] ?>">
        <p class="pet_name">PetName: <?php echo $row['petname'] ?></p>
        <p class="price">Price: <?php echo number_format($row['price'], 0, ',', '.') . '$' ?></p>
        <p style="text-align: center; color:#9A7151">Petlist: <?php echo $row['namepetlist'] ?></p>
      </a>
    </li>
  <?php } ?>
</ul>
<div style="clear:both;"></div>

<!-- CSS cho danh sách trang -->
<style type="text/css">
  ul.list_page {
    padding: 0;
    margin: 0;
    list-style: none;
  }

  ul.list_page li {
    float: left;
    padding: 5px 13px;
    margin: 5px;

    background: #FAE8E0;
    display: block;
  }

  ul.list_page li a {
    color: #000;
    text-align: center;
    text-decoration: none;
  }
</style>

<?php
  $sql_page = mysqli_query($mysqli, "SELECT * FROM tbl_pet");
  $row_count = mysqli_num_rows($sql_page);
  $totalPages = ceil($row_count / $itemsPerPage);

  $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
?>

<!-- Danh sách các trang -->
<ul class="list_page">
  <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
    <li <?php if ($i == $currentPage) echo 'style="background-color: #9A7151; color: white;"'; ?>>
      <a href="index.php?page=<?php echo $i ?>"><?php echo $i ?></a>
    </li>
  <?php } ?>
</ul>

