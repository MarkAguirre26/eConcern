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
				<h1 class="page-header">Category</h1>
			</div>    <!-- /.col-lg-12 -->
		</div> 


		<div class="row">     

			<div class="col-lg-12">
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
									<th>Catgeory</th>  
									<th></th>
								</tr>
							</thead>
							<tbody>
								 <?php for ($i = 0; $i < count($data); ++$i) { ?><tr> 
								<td><?php echo ($i+1); ?></td>
								<td><?php echo $data[$i]->Name; ?></td>  
								<td><button onclick="onclickSample(this)" type="button"  class="btn btn-info btn-sm"
								    data-toggle="modal" data-name="<?php echo $data[$i]->Name; ?>"       
									data-cn="<?php echo $data[$i]->cn; ?>"
									data-action="edit" data-target="#myModal">View</button></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>

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
						<h4 class="modal-title">Category</h4>
					</div>
					<div class="modal-body">        

						<form method="post" action="<?php echo base_url("index.php/category/dataEntry");?>">
							<input  class="form-control" name="txt_cn" id="txt_cn" type="hidden"> 
							<input  class="form-control" name="txt_action" id="txt_action" type="hidden">
							<label for="inputdefault">Category</label>
							<input  class="form-control" name="txt_name" id="txt_name" type="text">


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
					$('#txt_name').val($(crl).attr('data-name'));				
					$('#txt_action').val($(crl).attr('data-action')); 
					$('#txt_cn').val($(crl).attr('data-cn'));      

				}

				function onNew_clicked(){
					$('#txt_name').val('');					
					$('#txt_action').val('');
					$('#txt_cn').val('');
				}

/*
$('#usertype').change(function(){
    alert($(this).val());
   // window.location = "http://localhost:8080/bantay/register.php?cn="+$(this).val();
})*/





</script>



<?php include_once 'myjs.php'?>

</body>

</html>
