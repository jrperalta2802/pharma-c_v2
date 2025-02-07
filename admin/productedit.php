<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classess/Product.php';?>
<?php include '../classess/Category.php';?>
<?php include '../classess/Brand.php';?>
<style>
	/* Table Container */
.table-container {
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    margin-top: 30px;
    overflow-x: auto; /* Enables horizontal scrolling */
}

/* Table Styles */
.data {
    width: 100%;
    border-collapse: collapse;
    margin: 0 auto;
    font-size: 14px;
}

/* Table Header */
.data thead th {
    background-color: #007bff;
    color: white;
    text-align: left;
    padding: 12px;
    font-weight: bold;
}

/* Table Row */
.data tbody tr {
    background-color: #fff;
    border-bottom: 1px solid #ddd;
}

.data tbody tr:hover {
    background-color: #f1f1f1;
}

/* Table Cells */
.data td {
    padding: 12px;
    text-align: left;
    color: #555;
}

/* Image Cell */
.data td img {
    border-radius: 5px;
    max-width: 100%;
}

/* Action Links */
.data td a {
    color: #007bff;
    text-decoration: none;
}

.data td a:hover {
    text-decoration: underline;
}

/* Pagination (for DataTables) */
.paginate_button {
    background-color: #007bff;
    color: white;
    padding: 8px 16px;
    border-radius: 5px;
    margin: 0 5px;
}

.paginate_button:hover {
    background-color: #0056b3;
}

/* Hide the pagination numbers on mobile */
@media (max-width: 768px) {
    .data thead th {
        font-size: 12px;
        padding: 8px;
    }

    .data td {
        font-size: 12px;
        padding: 8px;
    }

    .data td img {
        width: 30px;
        height: 30px;
    }

    .data td:last-child {
        white-space: nowrap;
    }

    .data td a {
        font-size: 12px;
    }
}

</style>

<?php

if (!isset($_GET['proid']) || $_GET['proid'] == NULL) {
   
   echo "<script>window.location='productlist.php';</script>";
   
} else {

    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['proid']);
}
$pd = new Product();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $updateProduct = $pd->productUpdate($_POST,$_FILES,$id);
}

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Product</h2>
        <div class="block"> 

        <?php
        if (isset($updateProduct)) {
            echo $updateProduct;
        }

        ?> 

        <?php 
        $getPro = $pd->getProById($id);
        if ($getPro) {
           while ($value = $getPro->fetch_assoc()) {
               
    
         ?>             
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="productName" value="<?php echo $value['productName'];?>" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="catId">
                            <option>Select Category</option>
                            <?php 
                            $cat = new Category();
                            $getCat = $cat->getAllCat();
                            if ($getCat) {
                                while ($result = $getCat->fetch_assoc()) {
                                   ?>
                             
                            <option 

                            <?php 

                            if ($value['catId'] == $result['catId']) { ?>
                               
                               selected = "selected"
                          <?php } ?>
                            value="<?php echo $result['catId'];?>"><?php echo $result['catName'];?>
                                
                            </option>
                        <?php } } ?>
                            
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="brandId">
                            <option>Select Brand</option>
                             <?php 
                            $brand = new Brand();
                            $getBrand = $brand->getAllBrand();
                            if ($getBrand) {
                                while ($result = $getBrand->fetch_assoc()) {
                                   ?>
                             
                             <option 

                            <?php 

                            if ($value['brandId'] == $result['brandId']) { ?>
                               
                               selected = "selected"
                          <?php } ?>
                            value="<?php echo $result['brandId'];?>"><?php echo $result['brandName'];?>
                                
                            </option>
                        <?php } } ?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="body">
                            
                            <?php echo $value['body'];?>

                        </textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" name="price" value="<?php echo $value['price'];?>" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img src="<?php echo $value['image'] ;?>" height="80px" width="200px" > <br/>
                        <input type="file" name="image" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Select Type</option>
                            <?php 
                            if ($value['type'] == 0) { ?>
                            <option selected = "selected" value="0">Featured</option>
                            <option value="1">General</option>
                         <?php } else { ?>

                            <option selected = "selected" value="1">General</option>
                            <option value="0">Featured</option>
                      <?php  } ?>
                            
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>

        <?php } } ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


