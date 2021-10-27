<?php
error_reporting(E_ERROR | E_PARSE); // to stop reporting errors not advisable to be using this// 
session_start();
include("connection.php");
if(!isset($_SESSION["first_name"]))
{
    header("location:index.php");
};

/*show branch number */
$branchcount ="select count(*) from branches";
$bcountquery = mysqli_query($conn,$branchcount);
/*show the number of employee details */
$selectcount = "select count(*) from employee_details";
$countquery = mysqli_query($conn,$selectcount);
/*show employee salary and tax list */
$posi = $_POST["posi"]; // set value for position in the select bellow //
$selectsalary ="select employee_details.employee_first_name, employee_details.employee_last_name, 
employee_details.employee_position,
salary.salary_amount,salary.tax_amount 
from employee_details,salary where employee_details.salary_id = salary.salary_id 
and employee_details.employee_position='$posi'";
$quesalary = mysqli_query($conn,$selectsalary);

/* show employee list*/
$sqljoins = "select employee_id,  employee_first_name,employee_last_name,
employee_email, employee_position,employee_branch  from employee_details";
$result = mysqli_query($conn,$sqljoins);

/*show holiday list */
$selectholiday = "select * from holiday_list";
$holidayquery = mysqli_query($conn,$selectholiday);

/* show branch  list*/
$sqlselect ="select * from branches";
$query = mysqli_query($conn,$sqlselect);

/*show  working days list */
$ql= "select * from working_days";
$queworking = mysqli_query($conn,$ql);

/*show leave category list */
$leave = "select * from leave_category";
$queleave = mysqli_query($conn,$leave);
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Unique garments inc Admin  Dashboard</title>
  <link rel="stylesheet" href="csss/animate.css">
<link rel="stylesheet" href="indexcss.css">
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="dashboard.php">HOME</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
     
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" a href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <!--GENERAL SETTING SIDBAR DROPDOWN MENU-->
  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-folder"></i>
          <span>GENERAL SETTING</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown" style="background-color:#f2a104;">
        <a href="#working_days" class="dropdown-item"  onclick="working()">SET WORKING DAYS</a>
          <a href="#holiday_list" class="dropdown-item" onclick="showholiday()">HOLIDAY LIST</a>
          <a href="#leavecategory" class="dropdown-item" onclick="showleave()">LEAVE CATEGORY</a>
         </div>
        </li>

  <!--BRANCHES SIDBAR DROPDOWN MENU-->
  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-folder"></i>
          <span>BRANCHES</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown" style="background-color:#f2a104;">
        <a href="#branch_list" class="dropdown-item" onclick=" showbrach()" >BRANCH LIST</a>
          <a href="#addbranches" class="dropdown-item" onclick="addb()">ADD BRANCH</a>
         </div>
        </li>

 <!--EMPLOYEES SIDBAR DROPDOWN MENU-->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-folder"></i>
          <span>EMPLOYEES</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown" style="background-color:#f2a104;">
        <a class="dropdown-item " href="#addemployee" onclick="addemployee()" >ADD EMPLOYEE</a>
        <a href="#employee_list" class="dropdown-item" onclick="myFunction()">EMPLOYEE LIST</a>
         </div>
      </li>

 
 <!--payroll-->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-folder"></i>
          <span>PAYROLL</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown" style="background-color:#f2a104;">
        <a class="dropdown-item" href="#pay" onclick=" showpayroll()">MANAGE PAYMENT</a>
         </div>
      </li>
 
     <!--CHAT BAR-->
      <li class="nav-item">
        <a class="nav-link" href="#chat">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li>

    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Icon Cards-->
       
          <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">TOTAL EMPLOYEES 
                <?php
                while($showcount = mysqli_fetch_assoc($countquery))
                {
                  echo $showcount["count(*)"];
                }
                ?>
                </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">Currently</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-shopping-cart"></i>
                </div>
                <div class="mr-5">TOTAL BRANCH 
                <?php
                while($showb=mysqli_fetch_assoc($bcountquery))
                {
                  echo $showb["count(*)"];
                }
                ?>
                </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">Currently</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
         
          </div>

    

     

<!--add employee -->
        <div class="card mb-3" id="addemployee" style="width:100%;display:none; background-color:#011a27; height:150px;">
            <div class="card-header" style="height:40px;">
           <center>
          <p class="ani animated bounceIN" style="color:white;font-size:20px;"><i class="fas fa-table"></i> ADD EMPLOYEE </p>
              <center>
              </div>
            <div class="card-body" style="height:30px;">
              <div class="table-responsive">
                <table  class="table table-bordered animated bounceInRight" id="dataTable" width="100%" cellspacing="0">
      <tr style="background-color:grey">
      <td><input style="color:white;" type="text" id="addfirstname" placeholder="FIRST NAME" size="7" required/></td>
      <td><input style="color:white;" type="text" id="addlastname" placeholder="LAST NAME"  size="7" required /></td>
      <td><input style="color:white;" type="email" id="addemail" placeholder="EMAIL"  size="7" required /> </td>
      <td>
      <select id="addposition" >
      <option value="position">!--position--!</option>
<option value="cleaner">cleaner </option>
<option value="accountant">accountant </option>
<option value="marketer">marketer</option>
<option value="secretary">secretary</option>
      </select>
      </td>
      <td><input style="color:white;" type="text" id="addbranch" placeholder="BRANCH"  size="7" required /></td>
      <td style="width:4px"><input type="submit" class="btn btn-primary btn-sm" onclick="add()"value="ADD"></td>
      
      </tr>
                   
                </table>
              </div>
            </div>
            </div>

                   <!-- add branch section-->
       <div class="card mb-3" id="addbranches" style="display:none; background-color:#011a27; height:150px;">
            <div class="card-header" style="height:40px;">
           <center>
          <p class="ani animated bounceIN" style="color:white;font-size:20px;font-family:  Georgia, 'Times New Roman', Times, serif; "><i class="fas fa-table "></i > ADD BRANCH </p>
              <center>
              </div>
            <div class="card-body" style="height:30px;">
              <div class="table-responsive">
                <table  class="table table-bordered animated flash" id="dataTable" width="100%" cellspacing="0">
      <tr style="background-color:grey">
      <td><input style="color:white;" type="text" id="branches" placeholder="BRANCH NAME" required /></td>
      <td style="width:4px"><input type="submit" class="btn btn-primary btn-sm" onclick="addbranch()"value="ADD"></td>
       </tr>
                   
                </table>
              </div>
            </div>
            </div>

                        <!--PAYROLL MANAGEMENT-->
                        <center>
            <div id="pay">
<div style="background-color:#f2f2f2;">
<P style="background-color:#011a27;color:white; height:30px;font-family:  Georgia, 'Times New Roman', Times, serif;  font-size:20px; text-align: center;">Manage Employee Payroll By Posititon</p>
Select employee position 
<form method="post">
<select  id="salaryposition" name="posi"> 
<option value="cleaner" >cleaner</option>
<option value="marketer" >marketer</option>
<option value="accountant">accountant</option>
<option value="secretary">secretary</option>
</select>
<input onclick="showpayroll()" type="submit" class="btn btn-primary btn-xs" value="Salary">
</form>
</div>
<BR/>

<!-- employee payroll  list -->

              <div class="table-responsive">
              <span style="background-color:#cccccc;width:100%;display:block; height:30px;font-family:  Georgia, 'Times New Roman', Times, serif;  font-size:20px; text-align: center;">SALARY AND TAX</span>
                <table  class="table table-bordered animated bounceInRight" id="dataTable" width="100%" cellspacing="0">
                           <thead>
                    <tr style="background-color:#f2f2f2;">
                      <th>FIRST NAME</th>
                      <th>LAST NAME</th>
                      <th>POSITION</th>
                      <th>SALARY</th>
                      <th>TAX</th>
                      <th>ACTION</th>
                    </tr>
                  </thead>
                                  <tbody>
                      <?php
while($showsalary = mysqli_fetch_assoc($quesalary)){
?>
        <tr>          
<td><input type="text" size="6" id="employeef_name" value="<?php echo $showsalary["employee_first_name"];?>" /></td>
<td><input type="text" id="employeel_name" value="<?php echo $showsalary["employee_last_name"];?>" /></td>
<td><input type="text" id="employee_p" value="<?php echo $showsalary["employee_position"];?>" /></td>
<td><input type="text" size="9" id="employee_salary_amount" value="<?php echo $showsalary["salary_amount"];?>" /></td>
<td><input type="text" size="4" id="employee_tax_amount" value="<?php echo $showsalary["tax_amount"];?>" /></td>
<td> <button class="btn btn-primary btn-xs" onclick=" payoll()">edit</button> </td>
 </tr>
<?php
}
?>
                    </tbody>
                </table>
              </div>
              </div>
            
              </center>

            
         <!-- working days list -->
         <div class="card mb-3" id="working_days" style="display:none">
            <div class="card-header" style="height:42px">
            <center>
            <div style="background-color:#011a27;color:white; font-family:  Georgia, 'Times New Roman', Times, serif;  font-size:25px; text-align: center;"> SET WORKING DAYS</div>
              <center>
           </div>
            <div class="card-body">
              <div class="table-responsive">
                <table  class="table table-bordered animated bounceInRight" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>MONDAY</th>
                      <th>TUESDAY</th>
                      <th>WEDNESSDAY</th>
                      <th>THURSDAY</th>
                      <th>FRIDAY</th>
                      <th>SATURDAY</th>
                      <th>SUNDAY</th>
                      <th>ACTION</th>
              
                     </tr>
                  </thead>
                         <tbody>
                      <?php
while($working = mysqli_fetch_assoc($queworking)){
?>
   <tr>               
<td ><input class="monday<?php echo $working["days_id"];?>"  size="13" type="text" value="<?php echo $working["monday"]; ?>"></td>
<td ><input class="tuesday<?php echo $working["days_id"];?>" size="13"  type="text"  value="<?php echo $working["tuesday"]; ?>"></td>
<td><input class="wednessday<?php echo $working["days_id"];?>" type="text"  size="3" value="<?php echo $working["wednessday"]; ?>"></td>
<td><input class="thursday<?php echo $working["days_id"];?>" size="13"  type="text"  value="<?php echo $working["thursday"];?>"></td>
<td><input class="friday<?php echo $working["days_id"];?>" size="13"  type="text"  value="<?php echo $working["friday"];?>"></td>
<td><input class="saturday<?php echo $working["days_id"];?>" size="5"  type="text"  value="<?php echo $working["saturday"];?>"></td>
<td><input class="sunday<?php echo $working["days_id"];?>" size="5"  type="text"  value="<?php echo $working["sunday"];?>"></td>
<td> <button class="btn btn-primary btn-xs"  onclick="editworkingdays(<?php echo $working['days_id'];?>)">edit</button> </td>
</tr>
<?php 
}
?>
                    </tbody>
                </table>
              </div>
            </div>
            </div>


         <!-- employee list -->
         <div class="card mb-3" id="employee_list" style="display:none;">
            <div class="card-header" style="height:42px">
            <center>
            <div style="background-color:#011a27;color:white; font-family:  Georgia, 'Times New Roman', Times, serif;  font-size:25px; text-align: center;"> EMPLOYEE LIST</div>
              <center>
           </div>
            <div class="card-body">
              <div class="table-responsive">
                <table  class="table table-bordered animated bounceInRight" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>first name</th>
                      <th>last name</th>
                      <th>email</th>
                      <th>posittion</th>
                      <th>branch</th>
                      <th>action</th>
                      <th>action</th>
                   </tr>
                  </thead>
              <tbody>
                      <?php
while($show = mysqli_fetch_assoc($result)){
?>
   <tr>               
<td><?php echo $show["employee_id"];?></td>
<td ><input class="fname<?php echo $show["employee_id"];?>" size="5"  type="text" value="<?php echo $show["employee_first_name"]; ?>"></td>
<td ><input class="lname<?php echo $show["employee_id"];?>" size="5"  type="text"  value="<?php echo $show["employee_last_name"]; ?>"></td>
<td><input class="email<?php echo $show["employee_id"];?>" type="text"  value="<?php echo $show["employee_email"]; ?>"></td>
<td><input class="position<?php echo $show["employee_id"];?>" size="3"  type="text"  value="<?php echo $show["employee_position"];?>"></td>
<td><input class="bname<?php echo $show["employee_id"];?>" size="3"  type="text"  value="<?php echo $show["employee_branch"];?>"></td>
<td> <button class="btn btn-primary btn-xs"  onclick="edit(<?php echo $show['employee_id'];?>)">edit</button> </td>
<td> <button  class="btn btn-danger btn-sm delete" onclick="deleteajax(<?php echo $show['employee_id'];?>)"> delete</button> </td>

</tr>
<?php
}
?>
                    </tbody>
                </table>
              </div>
            </div>
            </div>
         


                     
         <!-- holiday list -->
         <div class="card mb-3" id="holiday_list" style="display:none;">
            <div class="card-header" style="height:42px">
            <center>
            <div style="background-color:#011a27;color:white; font-family:  Georgia, 'Times New Roman', Times, serif;  font-size:25px; text-align: center;"> HOLIDAY LIST</div>
            
              <center>
           </div>
           <center><button class="btn btn-primary btn-sm" onclick="addholiday()"> + ADD HOLIDAY </button></center>
            <div class="card-body">
              <div class="table-responsive">
                <table  class="table table-bordered animated bounceInRight" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>EVENT NAME</th>
                      <th>START DATE</th>
                      <th>END DATE</th>
                      <th>ACTION</th>
                      <th>ACTION</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
while($showholiday = mysqli_fetch_assoc($holidayquery)){
?>
    <tr>              
<td><?php echo $showholiday["holiday_id"];?></td>
<td><input class="event<?php echo $showholiday['holiday_id']; ?>"  type="text" size="30" value="<?php echo $showholiday["event_name"];?>"></td>
<td><input class="start<?php echo $showholiday['holiday_id']; ?>" type="text"  value="<?php echo $showholiday["start_date"];?>"></td>
<td><input class="end<?php echo $showholiday['holiday_id']; ?>" type="text"  value="<?php echo $showholiday["end_date"];?>"></td>
<td> <button class="btn btn-primary btn-xs" onclick="day(<?php echo $showholiday['holiday_id']; ?>)">edit</button> </td>
<td> <button  class="btn btn-danger btn-sm delete" onclick="deleteholiday(<?php echo  $showholiday['holiday_id'];  ?>)"> delete</button> </td>
</tr>

</tr>
<?php
}
?>

                    </tbody>
                </table>
              </div>
            </div>
            </div>
            <center>
            <div class="card mb-3" id="addholiday" style="display:none;background-color:white;border:blue dotted 3px">
            <div class="table-responsive">
 <table class="table table-bordered animated bounceInRight"  >
 
 <tr >
<td><input id="addevent" type="text" placeholder="enter event name" ></td>
<td><input id="addstart" type="text" placeholder="enter start date" ></td>
<td><input id="addend" type="text" placeholder="enter end date" ></td>
<td><button class="btn btn-primary btn-sm" onclick="dayadd()">ADD</button></td>
</tr>
</table>

            </div>
            </div>
      
     </center>



         <!-- branch list -->
         <div class="card mb-3" id="branch_list" style="display:none;">
            <div class="card-header" style="height:42px">
            <center>
            <div style="background-color:#011a27;color:white; font-family:  Georgia, 'Times New Roman', Times, serif;  font-size:25px; text-align: center;"> BRANCH LIST</div>
              <center>
           </div>
            <div class="card-body">
              <div class="table-responsive">
                <table  class="table table-bordered animated bounceInRight" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>BRANCH NAME</th>
                      <th>ACTION</th>
                    
                    </tr>
                  </thead>
                                  <tbody>
                      <?php
while($showselect = mysqli_fetch_assoc($query)){
?>
                  
<td><?php echo $showselect["branch_id"];?></td>
<td><input class="names<?php echo $showselect['branch_id']; ?>" id="branch_name" type="text"  value="<?php echo $showselect["branch_name"];?>"></td>
<td> <button class="btn btn-primary btn-xs" onclick="editbranch(<?php echo $showselect['branch_id']; ?>)">edit</button>  <button  class="btn btn-danger btn-sm delete" onclick="deletebranch(<?php echo $showselect['branch_id']; ?>)"> delete</button> </td>


</tr>
<?php
}
?>
                    </tbody>
                </table>
              </div>
            </div>
            </div>

            <!--LEAVE CATEGORY-->
            <center>
            <div style="display:none;" id="leavecategory">
<div style="background-color:#f2f2f2;">
<P style="background-color:#011a27;color:white; height:30px;font-family:  Georgia, 'Times New Roman', Times, serif;  font-size:20px; text-align: center;">Add Leave Category</p>
Leave Category <input style="background-color:white;"size="40" type="text" id="addleave" placeholder="Enter Your Leave Category Name" />
<button class="btn btn-primary btn-sm"onclick="addleave()"> Save </button>
<br/>
<br/>
</div>

<BR/>

<!-- leave list -->

              <div class="table-responsive">
              <span style="background-color:#cccccc;width:100%;display:block; height:30px;font-family:  Georgia, 'Times New Roman', Times, serif;  font-size:20px; text-align: center;">Leave Category List</span>
                <table  class="table table-bordered animated bounceInRight" id="dataTable" width="100%" cellspacing="0">
                           <thead>
                    <tr style="background-color:#f2f2f2;">
                      <th>ID</th>
                      <th>CATEGORY NAME</th>
                      <th>ACTION</th>
                    
                    </tr>
                  </thead>
                                  <tbody>
                      <?php
while($showleave = mysqli_fetch_assoc($queleave)){
?>
                  
<td><?php echo $showleave["leave_id"];?></td>
<td><input class="leave<?php echo $showleave['leave_id']; ?>" id="branch_name" type="text"  value="<?php echo $showleave["category_name"];?>"></td>
<td> <button class="btn btn-primary btn-xs" onclick="editleave(<?php echo $showleave['leave_id']; ?>)">edit</button> 
 <button  class="btn btn-danger btn-sm delete" onclick="deleteleave(<?php echo $showleave['leave_id']; ?>)"> delete</button> </td>


</tr>
<?php
}
?>
                    </tbody>
                </table>
              </div>
              </div>
          
              
              </center>

        <!-- Area Chart Example-->
        <div class="card mb-3" id="chat">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            page chart</div>
          <div class="card-body">
            <canvas id="myAreaChart" width="100%" height="30"></canvas>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

       
 

   

    <!-- /.content-wrapper -->

  </div>

  <!-- /#wrapper -->



  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
   <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
    </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>

<!--program script-->
<script src="indexscript.js"></script>

<!--json script-->


</body>

</html>
