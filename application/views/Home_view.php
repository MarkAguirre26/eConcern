<!DOCTYPE html>
<html lang="en">


<head>
  <title>eConcern</title>
  <?php include_once 'mycss.php'?>

  <link rel="stylesheet" href="https:/  /formden.com/static/cdn/bootstrap-iso.css" /> 
  <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
  <style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>

</head>
<body>

  <div id="wrapper">      
    <?php include_once 'navbar.php'; ?>
    <?php include_once 'sidebar.php'; ?>

  </nav>

  <div id="page-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Records</h1>
      </div>
    </div>

    <div class="bootstrap-iso">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">

           <form class="form-horizontal" method="post">
             <div class="col-sm-1">
               <label>Filter:</label>
             </div>
             <div class="col-sm-1" style="margin-left: 5px">
              <div class="form-group">
                <select class="form-control" style="width: 100%" id="filterType" name="filterType" onchange="userType_Change()">
<option value="null">-</option>                
 <option value="%">All</option>
                 <option value="Solved">Solved</option>
                 <option value="Pending">Pending</option>
                 <option value="Denied">Denied</option>                 
               </select>
             </div> 
           </div>
           <div class="col-sm-1">
             <label >From</label>
           </div>
           <div class="col-sm-2">
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-calendar">
                </i>
              </div>
              <input class="form-control" style="width: 100%" id="datefrom" name="datefrom" placeholder="MM/DD/YYYY" type="text" />
            </div>
          </div>
          <div class="col-sm-1">
            <label>
              To
            </label>
          </div>
          <div class="col-sm-2">
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-calendar">
                </i>
              </div>
              <input class="form-control" style="width: 100%" id="dateto" name="dateto" placeholder="MM/DD/YYYY" type="text" />
            </div>
          </div>
          <div class="col-sm-1">
            <label style="color: #ffffff">
             -
           </label>
         </div>
         <div class="col-sm-1">
          <a class="btn btn-primary" style="width: 100%;margin-top: 2px" onclick="getDate_Clicked()">Ok</a>
        </div>
        <div class="col-sm-1">
          <a class="btn btn-primary" style="width: 100%;margin-top: 2px" onclick="printData()">Print</a>
        </div>    
      </form>
    </div>
  </div>
</div>
</div>




<div class="row">
  <div class="col>
    <div class="panel panel-default">
      <!-- Default panel contents -->
      <!--  <div class="panel-heading"></div> -->
      <div class="table-responsive">
        <table class="table table-striped table-hover" id="printTable">
          <thead>
            <tr>
              <th>#</th>
              <th>Sender</th>
              <th>Subject</th>
              <th>Description</th>
              <th>Message</th>
              <th>Date</th>
              <th>Status</th>



            </tr>
          </thead>
          <tbody>
            <?php for ($i = 0; $i < count($data); ++$i) { ?>
            <tr onclick="onclickSample(this)" data-toggle="modal" data-cn="<?php echo $data[$i]->cn; ?>" data-subject="<?php echo $data[$i]->subject_name ." -->
              ".$data[$i]->category_name;  ?>"  data-message="<?php echo $data[$i]->Message; ?>"
              data-sender="<?php echo $data[$i]->Fullname; ?>" data-image="<?php echo base_url('photos/'). $data[$i]->File_path;?>" data-target="#myModal">
              <td><?php echo ($i+1); ?></td>
              <td><?php echo $data[$i]->Fullname; ?></td>
              <td><?php echo $data[$i]->subject_name ." --> ".$data[$i]->category_name;  ?></td>
              <td><?php echo $data[$i]->Subject_description; ?></td>
              <td><?php echo $data[$i]->Message; ?></td>
              <td><?php echo $data[$i]->Date_created; ?></td>
              <td><?php echo $data[$i]->Statuss;?></td>

              
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</div>
</div>
<!-- /#page-wrapper -->
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Complain Details</h4>
      </div>
      <div class="modal-body">


        <div class="tabbable">
          <!-- Only required for left/right tabs -->
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab1" data-toggle="tab">Details</a></li>
            <li><a href="#tab2" data-toggle="tab">Image</a></li>
          </ul>

        <form method="post" action="<?php echo base_url("index.php/home/update");?>">
          <div class="tab-content">

            <div class="tab-pane active" id="tab1">

              <label for="inputdefault">Complain No.</label>
              <input class="form-control" type="hidden" name="txt_setStatus" id="txt_setStatus">
              <input class="form-control" name="cn" id="txt_cn" type="text">
              <label for="inputdefault">Sender</label>
              <input class="form-control" id="txt_sender" type="text">
              <label for="inputdefault">Subject</label>
              <input class="form-control" id="txt_subject" type="text">
              <label for="inputdefault">Message</label>
              <textarea rows="4" cols="50" class="form-control" id="txt_message"></textarea>
              <label for="inputdefault">Status</label>
              <label class="radio-inline">
                <input type="radio" name="r" value="Solved" id="rb1" onclick="handler()">Solved
              </label>
              <label class="radio-inline">
                <input type="radio" name="r" value="Pending" id="rb2" onclick="handler()">Pending
              </label>
              <label class="radio-inline">
                <input type="radio" name="r" value="Denied" id="rb3" onclick="handler()">Denied
              </label>
              <div class="modal-footer">
                <input type="submit" id="submit" name="dsubmit" value="Save" class="btn btn-primary">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
            <div class="tab-pane" id="tab2">
              <div class="row">
                <div class="col col-lg-12" style="margin-top: 20px; ">
                  <img src="" id="img" width="100%" height="100%" style="margin-left: auto; margin-right: auto; display: block;">
                </div>
              </div>
              <div class="modal-footer">
                <input type="submit" id="submit" name="dsubmit" value="Save" class="btn btn-primary">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>


<script type="text/javascript">



function printData()
{
 var divToPrint=document.getElementById("printTable");
 newWin= window.open("");
 newWin.document.write(divToPrint.outerHTML);
 newWin.print();
 newWin.close();
}

function userType_Change(){
  var x = $("#filterType").val()
  window.location = "http://localhost/econcern/index.php/Home/getbyStatus?stat="+x+"&usertype=<?php echo $_SESSION['logged_in'] ?> "

}


function onclickSample(crl){
  $('#txt_sender').val($(crl).attr('data-sender'));
  $('#txt_subject').val($(crl).attr('data-subject'));
  $('#txt_message').val($(crl).attr('data-message'));
  $('#txt_cn').val($(crl).attr('data-cn'));      
  $('#img').attr('src',$(crl).attr('data-image'));
}

function getDate_Clicked(){
  var from = $("#datefrom").val()
  var to = $("#dateto").val()
  var filter = $("#filterType").val();

  window.location = "http://localhost/econcern/index.php/home/getbydate?datefrom="+from+"&dateto="+to+"&filterType="+filter;
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
  <script src="<?php echo base_url("assets/vendor/jquery/jquery.min.js");?>"></script>


  <?php include_once 'myjs.php'?>
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

  <script>
    $(document).ready(function(){
    var date_input=$('input[name="datefrom"]'); //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
      format: 'yyyy-mm-dd',
      container: container,
      todayHighlight: true,
      autoclose: true,
    })
  })
    $(document).ready(function(){
    var date_input=$('input[name="dateto"]'); //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
      format: 'yyyy-mm-dd',
      container: container,
      todayHighlight: true,
      autoclose: true,
    })
  })
  </script> 





</body>

</html>

