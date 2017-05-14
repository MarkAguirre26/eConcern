<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="<?php echo base_url("index.php/home/index?usertype=".$_SESSION['logged_in']);?>"><i class="fa fa-table fa-fw"></i> Records</a>
            </li>
            <li>
                <a id="side_user"  href="<?php echo base_url("index.php/users/index"); ?>"><i class="fa fa-user fa-fw"></i> Users</a>
            </li> 
            <li>
                <a  id="side_category" href="<?php echo base_url("index.php/category/index");?>"><i class="fa fa-table fa-fw"></i> Category</a>
            </li>  
             <li>
                <a  id="side_subject" href="<?php echo base_url("index.php/subject/subjectListByID");?>"><i class="fa fa-table fa-fw"></i> Subject</a>
            </li>                                              

        </ul>
    </div>              
</div>
<script type="text/javascript">

  var a = "<?php echo $_SESSION['logged_in'];?>"
  if(a != "%"){
     // alert("here "+a);
      document.getElementById("side_user").style.display = "none";
      document.getElementById("side_category").style.display = "none";
      document.getElementById("side_subject").style.display = "none";
    
  }



</script>