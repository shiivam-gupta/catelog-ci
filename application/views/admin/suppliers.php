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
        $firstname = $rowdata['firstname'];
        $lastname = $rowdata['lastname'];
        $email = $rowdata['email'];
        $phone = $rowdata['phone'];
        $mobile = $rowdata['mobile'];
        $address = $rowdata['address'];
        $city = $rowdata['city'];
        $country = $rowdata['country'];
        $scope = $rowdata['scope'];
        $remark = $rowdata['remark'];
        $certificate = $rowdata['certificate'];
        $valid = $rowdata['valid'];        
      }
      else
      {
        $request_id = '';
        $firstname = '';
        $lastname = '';
        $email = '';
        $phone = '';
        $mobile = '';
        $address = '';
        $city = '';
        $country = '';
        $scope = '';
        $remark = '';
        $certificate = '';
        $valid = '';



      }
   ?>

         
<div class="box box-primary">
            <div class="box-header with-border">
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?= site_url('MainController/savesupplierdetails'); ?>" method="POST" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <input type="hidden" value="<?= $request_id ?>" name="request_id">
                  <label for="firstname">First Name</label>
                  <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter name" value="<?= $firstname ?>" required>
                </div>
                <div class="form-group">
                  <label for="lastname">Last Name</label>
                  <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Last Name" value="<?= $lastname ?>" required>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="email" value="<?= $email ?>" required>
                </div>
                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="phone" value="<?= $phone ?>" required>
                </div>
                <div class="form-group">
                  <label for="mobile">Mobile</label>
                  <input type="text" class="form-control" id="mobile" name="mobile" placeholder="mobile" value="<?= $mobile ?>" required>
                </div>
                <div class="form-group">
                  <label for="address">Address</label>
                  <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter Address ..."><?= $address ?>
                    
                  </textarea>
                </div>
                <div class="form-group">
                  <label for="city">City</label>
                  <input type="text" class="form-control" id="city" name="city" value="<?= $city ?>" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="country">Country</label>
                  <select class="form-control" id="country" name="country"> 
                  	<option>--Select--</option>
                  	<?php foreach($countrylist as $row){ 
                       if($row->countryname == $country){ 
                        ?>
                     <option value='<?= $row->countryname ?>' selected><?= $row->countryname ?></option>
                     <?php
                       }else{
                      ?>

                  	<option value='<?= $row->countryname ?>'><?= $row->countryname ?></option>
                  	<?php } 
                     }
                  	?>
                  </select>
                  
                </div>
                <div class="form-group">
                  <label for="country">Scope</label>
                  <select class="form-control" id="scope" name="scope"> 
                  	<option>--Select--</option>
                  	<?php 
                          if($scope == 'Customer'){
                       ?>
                       <option value='Customer' selected>Customer</option>

                        <?php  } else{ ?>
                          <option value='Customer'>Customer</option>
                       <?php }
                        if($scope == 'Supplier'){
                       ?>
                       <option value='Supplier' selected>Supplier</option>

                        <?php  } else{ ?>
                          <option value='Supplier'>Supplier</option>
                       <?php }
                        if($scope == 'Admin'){
                       ?>
                       <option value='Admin' selected>Admin</option>

                        <?php  } else{ ?>
                          <option value='Admin'>Admin</option>
                       <?php }
                       
                    ?>
                  </select>
                  
                </div>
                <div class="form-group">
                  <label for="remark">Remark</label>
                  <input type="text" class="form-control" id="remark" name="remark" value="<?= $remark ?>" placeholder="Password">
                </div>
                <div class="form-group">
                  <label >Certificate</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="certificateradio"  value="Yes" checked>
                       Yes
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="certificateradio"  value="No" checked>
                       No
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label >Valid</label>
                  
                  <div class="radio">
                    <label>
                      <input type="radio" name="validradio"  value="yes" checked>
                       Yes
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="validradio"  value="no" checked>
                       No
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label >User Photo</label>
                  <input type="file"  name="userphoto">

                  <p class="help-block">Example block-level help text here.</p>
                </div>
                <div class="form-group">
                  <label >Certificate Photo</label>
                  <input type="file" name="certificatephoto">
                                         
                  <p class="help-block">Example block-level help text here.</p>
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
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Mobile</th>
                  <th>Address</th>
                  <th>City</th>
                  <th>Country</th>
                  <th>Scope</th>
                  <th>Action</th>


                </tr>
                </thead>
                <tbody> 
                
                <?php foreach($supplierlist as $sl) { ?>
                <tr>
                  <td><?= $sl->firstname.' '.$sl->lastname ?></td>
                  <td><?= $sl->email ?></td>
                  <td><?= $sl->phone ?></td>
                  <td><?= $sl->mobile ?></td>
                  <td><?= $sl->address ?></td>
                  <td><?= $sl->city ?></td>
                  <td><?= $sl->country ?></td>
                  <td><?= $sl->scope ?></td>
                  <td>
                    <a href="<?php echo site_url('MainController/editsupplier/'.$sl->id); ?>">Edit</a> 
                      | 
                    <a href="<?php echo site_url('MainController/deletesupplier/'.$sl->id); ?>">Delete</a>
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
