<?php
    
?>
<h3>CART</h3>
<div class="container">
    <table class="table table-hover text-center table-striped">
        <thead class="table-dark">
            <tr>
                <th scope="col">
                    Id
                </th>
                <th scope="col">
                    Pet Name
                </th>
                <th scope="col">
                    Img
                </th>
                <th scope="col">Numerical</th>
                <th scope="col">Price</th>
                <th scope="col">Total Amount</th>
                <th scope="col">Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if(isset($_SESSION['cart'])){
                    $i = 0;
                    $total = 0;
                    foreach($_SESSION['cart'] as $cart_item){
                        $sum = $cart_item['numerical']*$cart_item['price'];
                        $total += $sum;
                        $i++;
            ?>
            <tr style="text-align: center; vertical-align: middle;">
                <td>
                    <?php echo $i;?>
                </td>
                <td>
                    <?php echo $cart_item['petname'];?>
                </td>
                <td>
                    <img src="admincp/modules/managepet/uploads/<?php echo $cart_item['img']; ?>" width="100px" height="100px" style="object-fit: cover; object-position: center;">
                </td>
                <td>
                    <a href="pages/main/addtocart.php?up=<?php echo $cart_item['id']?>"><i class="bi bi-bag-plus"></i></i></a>
                    <?php echo $cart_item['numerical'];?>
                    <a href="pages/main/addtocart.php?down=<?php echo $cart_item['id']?>"><i class="bi bi-bag-dash"></i></a>
                </td>
                <td>
                    <?php echo number_format($cart_item['price'],0,',','.').'$';?>
                </td>
                <td>
                    <?php echo number_format($sum,0,',','.').'$';?>
                </td>
                <td>
                    <a href="pages/main/addtocart.php?delete=<?php echo $cart_item['id']?>" class="btn btn-outline-danger">Delete</a> | <a href="pages/main/addtocart.php?reset=1" class="btn btn-outline-warning">Reset</a>
                </td>
                
            
            </tr>
            <?php 
                }
            ?>
            <tr>
                <td colspan="8">Total: <?php echo number_format($total,0,',','.').'$';?></td>
            </tr>
            <div style="clear: both;"></div>
                <?php
                    if(isset($_SESSION['dangky'])){
                        ?>
                        
                        <a href="pages/main/pay.php" class="btn btn-outline-warning">Pay</a>
                <?php
                    }else{
                ?>
                    <p><a href="index.php?tocontrol=dangky" class="btn btn-outline-primary">Đăng Ký Để Đặt Hàng</a></p>
                <?php
                    }
                ?>  
            <?php
            }else{ 
            ?>

            <tr>
                <td colspan="8">There is empty here</td>
            </tr>
            <?php 
            } ?>
        </tbody>         
    </table>
</div>