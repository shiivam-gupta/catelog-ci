<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <?php
        require_once('assets/headlinks.php');
        ?>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php 
  require_once('assets/top_menu.php');
  ?>
  <!-- Left side column. contains the logo and sidebar -->
  

  <?php
  require_once('assets/l_sidemenu.php');
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
<?php
      if(isset($rowdata))
      {
        $request_id = $rowdata['id'];
        $name = $rowdata['name'];
        $category = $rowdata['category'];
        $ktav = $rowdata['ktav'];
        $product_type = $rowdata['product_type'];
        $ktav_size = $rowdata['ktav_size'];
        $plines = $rowdata['plines'];
        $line_size = $rowdata['line_size'];
        $product_photo = $rowdata['product_photo'];
        $priceindollar = $rowdata['priceindollar'];
        $priceinshekel = $rowdata['priceinshekel'];
        $klaf_included = $rowdata['klaf_included'];
        $tag_included = $rowdata['tag_included'];        
      }
      else
      {
        $request_id = '';
        $name = '';
        $category = '';
        $ktav = '';
        $product_type = '';
        $ktav_size = '';
        $plines = '';
        $line_size = '';
        $product_photo = '';
        $priceindollar = '';
        $priceinshekel = '';
        $klaf_included = '';
        $tag_included = '';        



      }
   ?>

         
<div class="box box-primary">
            <div class="box-header with-border">
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo site_url('ProductController/saveproducts') ?>" method="POST" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <input type="hidden" value="<?= $request_id ?>" name="request_id">
                  <label for="firstname">Product Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter product name" value="<?= $name ?>" required>
                </div>
                <div class="form-group">
                  <label for="category">Category</label>
                  <select name="category" id="category" class="form-control">
                    <option value="0">--Select--</option>
                    <option value="Mezuza">Mezuza</option>
                    <option value="Tefilin">Tefilin</option>
                    <option value="Torah">Torah</option>
                    <option value="Megila">Megila</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="ktav">Ktav</label>
                  <select name="ktav" id="ktav" class="form-control">
                    <option value="0">--Select--</option>
                    <option value="Sfaradi">Sfaradi</option>
                    <option value="Ari">Ari</option>
                    <option value="BeitYosef">BeitYosef</option>
                    <option value="Chabad">Chabad</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="type">Type</label>
                  
                  <select name="type" id="type" class="form-control">
                    <option value="0">--Select--</option>
                    <option value="Rashi">Rashi</option>
                    <option value="Rtam">Rtam</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="ktav_size">Mobile</label>
                  <select name="ktav_size" id="ktav_size" class="form-control">
                    <option value="0">--Select--</option>
                    <option value="10">10</option>
                    <option value="12">12</option>
                    <option value="15">15</option>
                    <option value="24">24</option>
                    <option value="30">30</option>
                    <option value="36">36</option>
                    <option value="42">42</option>
                    <option value="48">48</option>
                    <option value="56">56</option>
                    <option value="Chabad">Chabad</option>
                    <option value="Czonish">Czonish</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="plines">Lines</label>
                  <select name="plines" id="plines" class="form-control">
                    <option value="0">--Select--</option>
                    <option value="11">11</option>
                    <option value="21">21</option>
                    <option value="28">28</option>
                    <option value="42">42</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="line_size">Line_size</label>
                  <select name="line_size" id="line_size" class="form-control">
                    <option value="0">--Select--</option>
                    <option value="5">5</option>
                    <option value="8">8</option>
                    <option value="10">10</option>
                  </select>
                </div>
              
              
                
                <div class="form-group">
                  <label >Product Photo</label>
                  <input type='file' id="imgInp" name='productphoto' />
                  <img id="blah" height="100" width="100" src="<?php echo base_url('/uploads/product.jpg'); ?>" alt="your image" />
                </div>
                
               <div class="form-group">
                  <label for="priceinisl">Price in $</label>
                  <input type="text" class="form-control" id="priceinisl" name="priceinshekel" placeholder="$price" value="<?= $priceinshekel ?>" required>
                </div>
                <div class="form-group">
                  <label for="priceinusd">Price in ISL</label>
                  <input type="text" class="form-control" id="priceinusd" name="priceindollar" placeholder="ISL price" value="<?= $priceindollar ?>" required>
                </div>
<div class="form-group">
                  <label for="klaf_included">Klaf Included</label>
                  <select name="klaf_included" id="klaf_included" class="form-control">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="tag_included">Tag Included</label>
                  <select name="tag_included" id="tag_included" class="form-control">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                  </select>
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="submit" value="Submit" class="btn btn-primary">

              </div>
            </form>
          </div>
 
<div class="row">
        <div class="col-xs-12">
<div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Category</th>
                  <th>Ktav</th>
                  <th>Product type</th>
                  <th>Ktav size</th>
                  <th>Lines</th>
                  <th>Line Size</th>
                  <th>price in $</th>
                  <th>Action</th>


                </tr>
                </thead>
                <tbody> 
                
                <?php foreach($productlist as $sl) { 
                  ?>
                <tr>
                  <td><?= $sl->name; ?></td>
                  <td><?= $sl->category ?></td>
                  <td><?= $sl->ktav ?></td>
                  <td><?= $sl->product_type ?></td>
                  <td><?= $sl->ktav_size ?></td>
                  <td><?= $sl->plines ?></td>
                  <td><?= $sl->line_size ?></td>
                  <td><?= $sl->priceindollar ?></td>
                  <td>
                    <a href="<?php echo site_url('ProductController/editproduct/'.$sl->id); ?>">Edit</a> 
                      | 
                    <a href="<?php echo site_url('ProductController/deleteproduct/'.$sl->id); ?>">Delete</a>
                </td>
                </tr>
                <?php } ?>
               </tbody> 
               
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
</div>
</div>




















 
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php
  require_once('assets/footer.php');
 ?>

  <!-- Control Sidebar -->
 <?php
  require_once('assets/r_sidemenu.php');
 ?>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php
require_once('assets/jquerylinks.php');
?>
</body>
</html>
<script>
  function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function() {
  readURL(this);
});
</script>