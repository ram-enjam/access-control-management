
<?php require_once(APPPATH . 'views/includes/header.php'); ?>
<!-- 
/*if($_SESSION['id']==''){

  header("Location:index.php");
}
*/
$select = "SELECT * FROM users WHERE role_id = '2' ";
$res = mysqli_query($conn,$select);

?> -->
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
<link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css
" rel="stylesheet" type="text/css">
        <!-- Topbar -->
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4" style="background:lightskyblue;">
            <h1 class="h3 mb-0 text-gray-800">&nbsp;&nbsp;Users</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item">View Users</li>
              
            </ol>
          </div> -->
<br>  <p class="text-center m-0 font-weight-bold text-primary"> View List of Users </p>
<hr>
          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
           
                           <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                 <!--  <h6 class="m-0 font-weight-bold text-primary">DataTables with Hover</h6> -->
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover"  id="dataTableHover" style="font-size:13px;">
                    <thead class="thead-light">
                      <tr>
                        <th>S.No</th>
                        <th>Name&Email</th>
                        
                        <th>Mobile Number</th>
                        <th>Aadhar Number</th>
                        <th>Wallet Amount</th>
                       
                        <th>Status</th>
                        <th>RFID Number</th>
                        <th>Join Date</th>
                        <th>Edit</th>
                      </tr>
                    </thead>
                   <!--  <tfoot>
                      <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                      </tr>
                    </tfoot> -->
                    <tbody>
                      

            <?php 
                
                $i=1;
                while($row=mysqli_fetch_assoc($res)){  ?>

                      <tr>
                       <td><?php echo $i; ?></td>
                       <td><?php echo $row['name']; ?><br><?php echo $row['email']; ?></td>
                       
                       <td><?php echo $row['mobile_number']; ?></td>
                       <td><?php echo $row['adhar_number']; ?></td>
                       <td>Rs.<?php echo number_format($row['wallet'],2); ?></td>
                       
                        <td style="text-align:left !important;"><?php if($row['status'] == '0' && empty($row['card_number'])) { ?>

                          <div class="nav-item dropdown no-arrow" style="margin-left:-20px;">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="badge badge-success" style="color:black;font-size:12px">Activate</span>
              </a>



              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="navbar-search" style="width:200px;" action="activate_users.php" method="POST" autocomplete="off">
                  <h6 style="text-align:center;color:skyblue;">Activate User</h6>
                  <div class="input-group">
                    
                  
                    <input type="text" class="form-control bg-light border-1 small" placeholder="Enter RFID"
                      aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;" name="card"> 
                   
                  <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                 <!--   <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div> -->
                   
                   
                  </div><br>
                   <div class="input-group-append"> 
                      <button class="btn btn-primary btn-block" type="submit">
                        Submit
                      </button>
                    </div>
                </form>
              </div>
            </div>

<?php }else if($row['status'] == '0' && (!empty($row['card_number']))){ ?>

<a href="again_activate.php?id=<?php echo $row['id']; ?>"  onclick="return confirm('Are sure You Want To Activate')">

<span class="badge badge-warning" style="color:black;font-size:12px"><?php echo "Activate"; ?></span>
</a>


<?php }else { ?>

<a href="deactivate_user.php?id=<?php echo $row['id']; ?>"  onclick="return confirm('Are sure You Want To Deactivate')">

<span class="badge badge-warning" style="color:black;font-size:12px"><?php echo "Deactivate"; ?></span>
</a>



</td>

<?php } ?> <td><?php echo $row['card_number']; ?></td> 
<td><?php echo $row['card_date']; ?></td>
<td>                          


<?php if($row['status'] == '1') { ?>



         <div class="nav-item dropdown no-arrow" style="margin-left:-20px;">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="badge badge-red" style="color:black;font-size:12px">EDIT</span>
              </a>



              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="navbar-search" style="width:200px;" action="edit_rfid.php" method="POST" autocomplete="off">
                  <h6 style="text-align:center;color:skyblue;">Edit Form</h6>
                  <div class="input-group">
                    
                  
                    <input type="text" class="form-control bg-light border-1 small" placeholder="Enter RFID"
                      aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;" name="card" value="<?php echo $row['card_number']; ?>"> 
                   
                  <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                 <!--   <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div> -->
                   
                   
                  </div><br>
                   <div class="input-group-append"> 
                      <button class="btn btn-primary btn-block" type="submit">
                        Save
                      </button>
                    </div>
                </form>
              </div>
            </div>
<?php } ?>


          </td>
                      </tr>
              <?php $i++; 
                    } ?>

                     
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
      
         
      <?php include("include/footer.php"); ?>

  <!-- Page level custom scripts -->

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>



  <script>
    /*$(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });*/
$(document).ready(function() {
    $('#dataTableHover').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );
  </script>

</body>

</html>