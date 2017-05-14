<!DOCTYPE html>
<html lang="en">



<head>
  <title>eConcern</title>
  <?php include_once 'mycss.php'?>
<link rel="stylesheet" href="https:/  /formden.com/static/cdn/bootstrap-iso.css" /> 
  <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
</head>
<body>
  <div id="wrapper">     

    <?php include_once 'navbar.php'; ?>
    <?php include_once 'sidebar.php'; ?>
    <!-- /.navbar-static-side -->
  </nav>

  <div id="page-wrapper">
   <div class="row">
     <div class="col-lg-12">
       <h1 class="page-header">Users</h1>
     </div>    <!-- /.col-lg-12 -->
   </div> 


   <div class="row">
    <div class="col-lg-1">
      Filter by:
    </div>  

    <div class="col-lg-6">
      <div class="form-group">
        <select class="form-control" id="usertype" name="usertype" onchange="userType_Change()">
         <option value="0">-</option>
         <option value="1">Admin</option>
         <option value="2">Student</option>
         <option value="3">Teacher/Professor</option>
         <option value="4">Employee/staff</option>
         <option value="5">Prefect of Discipline</option>
         <option value="6">Hr</option>
         <option value="7">Program Chair</option>
      
       </select>
     </div> 
   </div>

   <div class="col-lg-5">
    <button id="cmd_new_user" onclick="onNew_clicked()" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal" >New</button>
  </div>  


</div>

<div class="row">  
 <div class="col" style="margin-top: 10px;">       

   <div class="panel panel-default">
     <!-- Default panel contents -->
     <div class="panel-heading"></div>
     <div class="table-responsive">
       <table class="table table-striped table-hover">
        <thead>
         <tr>
          <th>#</th>
          <th>ID Numner</th>
          <th>Name</th>
          <th>Email</th>
           <!--     <th>Level</th>                  
           <th>Approve</th> -->
           
           <th></th>

         </tr>
       </thead>
       <tbody>
         <?php for ($i = 0; $i < count($data); ++$i) { ?><tr>
         <td><?php echo ($i+1); ?></td>
         <td><?php echo $data[$i]->IDNumber; ?></td>     
         <td><?php echo $data[$i]->Fullname; ?></td>
         <td><?php echo $data[$i]->Email; ?></td>
      <!--   <td><?php echo $data[$i]->UserType; ?></td>
      <td><?php echo $data[$i]->isApproved;?></td> -->

      <td><button onclick="onclickSample(this)" type="button"  class="btn btn-info btn-sm" data-toggle="modal" data-idnumber="<?php echo $data[$i]->IDNumber; ?>" 
       data-fullname="<?php echo $data[$i]->Fullname; ?>"
       data-email="<?php echo $data[$i]->Email; ?>" 
       data-password="<?php echo $data[$i]->Pwd; ?>" 
       data-cn="<?php echo $data[$i]->cn; ?>"
       data-action="edit" data-target="#myModal">View</button></td>
     </tr>
     <?php } ?>
   </tbody>
 </table>
 <div>
 </div>

</div>
</div>

</div>
<!-- /#page-wrapper -->
</div>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">User Details</h4>
      </div>
      <div class="modal-body">        

        <form method="post" action="<?php echo base_url("index.php/Users/insertuser");?>">
          <label for="inputdefault">ID No.</label>      

          <input  class="form-control" name="txt_cn" id="txt_cn" type="hidden"> 
          <input  class="form-control" name="txt_action" id="txt_action" type="hidden">
          <input  class="form-control" name="txt_IDnumber" id="txt_IDnumber" type="text">
          <label for="inputdefault">Fullname</label>
          <input class="form-control" name="txt_fullname" id="txt_fullname" type="text">
          <label for="inputdefault">Email</label>
          <input class="form-control" name="txt_email" id="txt_email" type="text">
          <label for="inputdefault">Password</label>
          <input class="form-control" name="txt_password" id="txt_password" type="Password">
          <label for="inputdefault">Usertype</label>
          <div class="row">
            <div class="col-lg-12">
              <label class="radio-inline">
                <input type="radio" name="r"  value="1" id="rb1"  onclick="handler()">Admin
              </label>
              <label class="radio-inline">
                <input type="radio" name="r" value="2" id="rb2" onclick="handler()">Student
              </label>
              <label class="radio-inline">
                <input type="radio" name="r" value="3" id="rb2" onclick="handler()">Teacher/Professor
              </label>
              <label class="radio-inline">
                <input type="radio" name="r" value="4" id="rb2" onclick="handler()">Employee/staff 
              </label>
              <label class="radio-inline">
                <input type="radio" name="r" value="5" id="rb2" onclick="handler()">Prefect of Discipline
              </label>
              <label class="radio-inline">
                <input type="radio" name="r" value="6" id="rb2" onclick="handler()">HR
              </label>
              <label class="radio-inline">
                <input type="radio" name="r" value="7" id="rb2" onclick="handler()">Program Chair
              </label>
       
            </div>
          </div>
          <div class="row">
            <div class="col col-md-12">
              <label for="inputdefault">Active</label>
              <div class="row">
                <div class="col-lg-12">


                  <label class="radio-inline">
                    <input type="radio" name="rr" value="0" id="rb1"  onclick="handler()">Yes
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="rr" value="1" id="rb2" onclick="handler()">No
                  </label>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <input type="submit" id="submit" name="dsubmit" value="Save" class="btn btn-primary">     
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>

  <script type="text/javascript">
    function onclickSample(crl){
      $('#txt_IDnumber').val($(crl).attr('data-idnumber'));
      $('#txt_fullname').val($(crl).attr('data-fullname'));
      $('#txt_email').val($(crl).attr('data-email'));    
      $('#txt_password').val($(crl).attr('data-password'));
      $('#txt_action').val($(crl).attr('data-action')); 
      $('#txt_cn').val($(crl).attr('data-cn'));      

    }

    function onNew_clicked(){
     $('#txt_IDnumber').val('');
     $('#txt_fullname').val('');
     $('#txt_email').val('');
     $('#txt_password').val('');
     $('#txt_action').val('');
     $('#txt_cn').val('');
   }
   
/*
$('#usertype').change(function(){
    alert($(this).val());
   // window.location = "http://localhost:8080/bantay/register.php?cn="+$(this).val();
 })*/
 function userType_Change(){
  var x = $("#usertype").val()
  window.location = "http://kennethabenojar.com/econcern/index.php/users/getby?usertype="+x;

}


function handler() {     
  if (document.getElementById('rb1').checked) {
   rate_value = document.getElementById('rb1').value;
 }else  if (document.getElementById('rb2').checked) {
   rate_value = document.getElementById('rb2').value;
 }else  if (document.getElementById('rb3').checked) {
   rate_value = document.getElementById('rb3').value;
 }
 document.getElementById("txt_setStatus").value=rate_value;
      //alert(rate_value)
    }

  </script>



  <?php include_once 'myjs.php'?>

</body>

</html>
