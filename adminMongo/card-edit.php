<?php
 $active ='rec';
include('header.php');
include('conn.php');
require 'vendor/autoload.php';
include('confiq.php');
$id=$_GET['id'];
$db = $client->test;
$collection = $db->Cards;
$cursor = $collection->find(array('email' =>$id));


if(isset($_POST['submit'])) { 
  $cname = $_POST['cname'];
  $cemail = $_POST['cemail'];
  $subject = $_POST['subject'];
  $duration = $_POST['duration'];
  $sdate = $_POST['sdate'];
  $amount = $_POST['amount']; 
  $desc = $_POST['desc']; 
  $state = $_POST['state']; 
  $pdate = $_POST['pdate'];
  $status = $_POST['status'];  

      


$collection->updateOne(["email"=>$id], 
      ['$set'=>["email"=>$cemail,"name"=>$cname,"subject"=>$subject,"duration"=>$duration,"date"=>$sdate,"amount"=>$amount,"description"=>$desc,"state"=>$state,"posted_date"=>$pdate,"status"=>$status]]);

echo '<script>alert("Card Detail Updated Successfully");
   window.location="view-e.php";

</script>';
            }
  $getState = $db->state;
  $fetchState = $getState->find(); 

  $getCity = $db->city;
  $fetchCity = $getCity->find();

 $getSub = $db->subjects;
   $fetchSub = $getSub->find(); 
foreach ($cursor as $doc) {


            ?>
 <div id="content" class="main-content">
            <div class="container">
                <div class="container">
 <div class="row" style="width:900px;">
                        <div id="flFormsGrid" class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h4>Card  Registration</h4>
                                        </div>                                                                        
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area" y>
                          <form role="form" action="#" method="POST" enctype="multipart/form-data">
           
                                        <div class="row">
                                        <div class="form-group col-md-6">
                                           
                    <label for="exampleInputEmail1">Name*</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="cname" placeholder="Enter  Name" required value="<?=$doc['name']?>">
                  </div>
                                            <div class="form-group col-md-6 input_fields_number">
                                                   <label for="exampleInputEmail1">Email*</label>
                    <input  class="form-control" onchange="return email(event)"  type="email" name="cemail"  placeholder="Enter  Email" required value="<?=$doc['email']?>">
                            </div>
                                        </div>

                                           <div class="row">
                          
                                            <div class="form-group col-md-6 input_fields_number">
                                                   <label for="exampleInputEmail1">Subject*</label>
               

                           <select class="form-control" name="subject">
                      <?php
                      foreach ($fetchSub as $cq) {
                   
                 
                      ?>
                      <option value="<?=$cq['name']?>" <?php
                      if($doc["subject"]==$cq['name']){ echo 'selected';}
                      ?>><?=$cq['name']?></option>
                      <?php
}
                      ?>
                    </select>
                            </div>
                                         <div class="form-group col-md-6 input_fields_number">
                                                   <label for="exampleInputEmail1">Duration*</label>
                    <input  class="form-control"  id="txtPhoneNo" type="text" name="duration"  placeholder="Enter Duration" required value="<?=$doc['duration']?>">
                            </div>
                                        </div>

                                                <div class="row">
                                                                   <div class="form-group col-md-6 input_fields_number">
                                                   <label for="exampleInputEmail1">Date*</label>
                    <input  class="form-control"  id="txtPhoneNo" type="date" name="sdate"   required value="<?=$doc['date']?>">
                            </div>
                                        <div class="form-group col-md-6 input_fields_number">
                                                   <label for="exampleInputEmail1">Amount*</label>
                    <input  class="form-control"  id="txtPhoneNo" type="number" name="amount" placeholder="Enter Amount"   required value="<?=$doc['amount']?>">
                            </div>
                               
                                        </div>


                          <div class="row">
                                        <div class="form-group col-md-6 input_fields_number">
                                                   <label for="exampleInputEmail1">Description*</label>
                    <input  class="form-control"  type="text" name="desc" placeholder="Enter Description"   required value="<?=$doc['description']?>">
                            </div>
                           
                                       <div class="form-group col-md-6 input_fields_number">
                                                   <label for="exampleInputEmail1">State*</label>
             

                     <select class="form-control" name="state">
                      <?php
                      foreach ($fetchState as $cq) {
                   
                 
                      ?>
                      <option value="<?=$cq['sname']?>" <?php
                      if($doc['state']==$cq['sname']){ echo 'selected';}
                      ?>><?=$cq['sname']?></option>
                      <?php
}
                      ?>
                    </select>
                            </div>
                                        </div>


                          <div class="row">
                                
                           
                               
                                        </div>

                                               <div class="row">
                                 
                                                       <div class="form-group col-md-6 input_fields_number">
                                                   <label for="exampleInputEmail1">Posted Date*</label>
                    <input  class="form-control"  type="date" name="pdate"   required value="<?=$doc['posted_date']?>">
                            </div>
                        
                                                        <div class="form-group col-md-6 input_fields_number">
                                                   <label for="exampleInputEmail1">Status*</label>
                 
                    <select class="form-control" name="status">
                      <option value="Active">Active</option>
                      <option value="Inactive">Inactive</option>
                    </select>
                            </div>
                        
                                        </div>

                                       
                                   
                                        <button type="submit" class="btn btn-primary" name="submit" onclick="ValidateNo();">Submit</button>
                </div>
          </form>

                                </div>
                            </div>
                        </div>
<?php
}
?>
   <?php
   include('script.php');
   ?>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script type="text/javascript">


          function isNumber() {

              var phoneNo = document.getElementById('txtPhoneNo');
 if (phoneNo.value == "" || phoneNo.value == null) {
    alert("Please enter your Mobile No.");
    return false;
  }
  if (phoneNo.value.length < 10 || phoneNo.value.length > 10) {
    alert("Mobile No. is not valid, Please Enter 10 Digit Mobile No.");
    return false;
  }

  return true;
}





          function pincode() {
   var pin = document.getElementById('txtPincode');
 
if (pin.value == "" || pin.value == null) {
    alert("Please enter your Pincode.");
    return false;
  }
  if (pin.value.length < 6 || pin.value.length > 6) {
    alert("Pincode. is not valid, Please Enter 6 Digit Pincode.");
    return false;
  }


  return true;
}


  function email() {
 var email = document.getElementById('txtEmail');

 var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

  
 if (!filter.test(email.value)) {
    alert('Please provide a valid email address');
    email.focus;
    return false;
}
  


  return true;
}




                 $(document).ready(function() {
  var max_fields      = 10; //maximum input boxes allowed
  var wrapper       = $(".input_fields_wrap"); //Fields wrapper
  var add_button      = $(".btn-info"); //Add button ID
  
  var x = 1; //initlal text box count
  $(add_button).click(function(e){ //on add input button click
    e.preventDefault();
    if(x < max_fields){ //max input box allowed
      x++; //text box increment
      $(wrapper).append('<br><div><input type="text" placeholder="Enter Portfolio Link" class="form-control" id="exampleInputEmail1" name="port[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
    }
  });
  
  $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('div').remove(); x--;
  })



    var max_fieldss      = 10; //maximum input boxes allowed
  var wrapperss      = $(".input_fields_number"); //Fields wrapper
  var add_buttons      = $(".s"); //Add button ID
  
  var xx = 1; //initlal text box count
  $(add_buttons).click(function(e){ //on add input button click
    e.preventDefault();
    if(xx < max_fieldss){ //max input box allowed
      x++; //text box increment
      $(wrapperss).append('<br><div><input  class="form-control" onchange="return isNumber(event)" id="txtPhoneNo" type="number" name="cnumber[]"  placeholder="Enter Candidate Contact Number" required><a href="#" class="remove_field">Remove</a></div>'); //add input box
    }
  });
  
  $(wrapperss).on("click",".remove_field", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('div').remove(); xx--;
  })



                 var max_fieldse      = 10; //maximum input boxes allowed
  var wrapperse      = $(".input_fields_email"); //Fields wrapper
  var add_buttone      = $(".e"); //Add button ID
  
  var xe = 1; //initlal text box count
  $(add_buttone).click(function(e){ //on add input button click
    e.preventDefault();
    if(xe < max_fieldse){ //max input box allowed
      x++; //text box increment
      $(wrapperse).append('<br><div>   <input type="text" class="form-control" onchange="return email(event)" id="txtEmail" name="cemail[]" placeholder="Enter Candidate Email Id" ><a href="#" class="remove_field">Remove</a></div>'); //add input box
    }
  });
  
  $(wrapperse).on("click",".remove_field", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('div').remove(); xe--;
  })
});
    </script>

</body>
</html>