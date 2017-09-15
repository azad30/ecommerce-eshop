<?php
require_once 'config.php';
class search extends Database
{
    /* For product search */
    public function product_filter($productName)
    {
        $sql = $this->link->query("SELECT * FROM product_tbl WHERE product_name LIKE '%$productName%'");
        $numrows = mysqli_num_rows($sql);
        if ($numrows == 0) {
            echo "<div class='alert alert-danger container'>
           <strong>Danger!</strong>No Data Found.
           </div>";
        }
        elseif(empty($productName)){
            echo "";
        }
        else {
            while ($row = mysqli_fetch_assoc($sql)) {
                echo "<table class='table text-center'>";
                echo "<tr>";
                echo "<td>";
                echo $row['product_name'];
                echo "</td>";
                echo "</tr>";
                echo "</table>";
            }

        }
    }
}
?>


