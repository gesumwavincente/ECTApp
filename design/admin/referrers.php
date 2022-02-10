<?php include_once 'header.php'; 

$id = 0;
$update = false;
$referrerr = '';
$referred =  '';
$phone = '';
$email =  '';
$tevent = '';
$remarks = '';


    if(isset($_POST['submit'])){

      $referrerr = $_POST['referrerr'];
      $referred = $_POST['referred'];
      $phone = $_POST['phone'];
      $email = $_POST['email'];
      $tevent = $_POST['tevent'];       
      $remarks = $_POST['remarks']; 

      $mysqli->query("INSERT INTO referrers( referrerr, referred, phone, email, tevent, remarks) VALUES('$referrerr','$referred','$phone','$email','$tevent','$remarks')") or die($mysqli->error());
      echo "<script>alert('Added succcessful!')</script>";
    }

    if(isset($_GET['delete'])){

      $id = $_GET['delete'];
      $mysqli->query("DELETE FROM referrers WHERE id=$id") or die($mysqli->error());

      //echo "<script>alert('Deleted succcessful!')</script>";
    }

    if(isset($_GET['edit'])){
      $id = $_GET['edit'];
      $update = true;
      $result = $mysqli->query("SELECT * FROM referrers WHERE id=$id") or die($mysqli->error());
      if(count($result) == 1){
        $row = $result->fetch_array();
        $referrerr = $row['referrerr'];
        $referred = $row['referred'];
        $phone = $row['phone'];
        $email = $row['email'];
        $tevent = $row['tevent'];
        $remarks = $row['remarks'];
      }
    }

    if(isset($_POST['update'])){
      $id = $_POST['id'];
      $referrerr = $_POST['referrerr'];
      $referred = $_POST['referred'];
      $phone = $_POST['phone'];
      $email = $_POST['email'];
      $tevent = $_POST['tevent'];       
      $remarks = $_POST['remarks']; 

      $mysqli->query("UPDATE referrers SET referrerr='$referrerr', referred='$referred', phone='$phone', email='$email', tevent='$tevent', remarks='$remarks' WHERE id=$id") or 
      die($mysqli->error());

      echo "<script>alert('Updated succcessful!')</script>";
    }
?>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script> 
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

    <div class="body_wrapper">
    <div class="list_wrapper">
            <h2>Referral List:</h2>
            <i class="fas fa-search"></i>
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search" title="Type in a name">
             <?php if($update == true): ?>
            <button class="open_form_button" style="width:auto; background-color: #e68a00;" onclick="document.getElementById('id01').style.display='block'"><i class="fas fa-plus"></i> Update Referral</button>
            <?php else: ?>
            <button class="open_form_button" style="width:auto; background-color: #0b7dda;" onclick="document.getElementById('id01').style.display='block'"><i class="fas fa-plus"></i> Add Referral</button>
            <?php endif; ?>

<script type="text/javascript">
$(document).ready(function() {
    $('#myTable').DataTable( {
        dom: 'Brtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print' 
        ]
    } );
} );;
</script>            
            <table id="myTable">
 <thead>             
              <tr class="header">
                <th>Referral</th>
                <th>phone</th>
                <th>email</th>
                <th>remarks</th>
                <th>training</th>
                <th>referrer</th>
                <th>Action</th>
              </tr>  
</thead>              
                 <?php
                  $result = $mysqli->query("SELECT * FROM referrers") or die($mysqli->error);
                  while ($row=$result->fetch_assoc()):
                ?>
                <tr>
                    <td><?php echo $row['referred'] ?></td>
                    <td><?php echo $row['phone'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['remarks'] ?></td>
                    <td><a href="rosteref.php?<?php echo $row['tevent']; ?>"><?php echo $row['tevent'] ?></a></td>
                    <td><?php echo $row['referrerr'] ?></td>
                    <td>
                    	  
                    	  
                          <span title="Edit" style="font-size: 20px; margin-left:10px"><a href="referrers.php?edit=<?php echo $row['id'] ?>"><i style=" color: #009688;" class="fas fa-edit"></i></a></span>
                          <span title="Delete" style="font-size: 20px; margin-left:10px"><a onclick='dell()' href="referrers.php?delete=<?php echo $row['id'] ?>"><i style=" color: red;"  class="fas fa-trash-alt"></i></a></span>
                          <!-- <span title="Update to Clientele" style="font-size: 20px; margin-left:10px"><a href="referrers.php?update_ref=<?php echo $row['id'] ?>"><i style=" color: purple;" class="fas fa-university"></i></a></span> -->
                    </td>
                </tr>
                <?php endwhile; ?> 
            </table>
    </div>


    <div id="id01" class="modal">
  
     <form autocomplete="off" class="modal-content animate" method="post" action="referrers.php">
     <div class="imgcontainer">
    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
    				  <input type="hidden" name="id" value="<?php echo $id; ?>">
                      <label>Referrer: (Optional)</label><br>
                      <div class="autocomplete" style="width:650px;">
                      <input type="text" value="<?php echo $referrerr; ?>" name="referrerr" id="myClienteleInputName" placeholder="Referrer"><br>
                      </div><br>
                      <label>Referral: <span style="color: red; font-weight: bold; font-size: 20px;">*</span></label><br>
                      <input type="text" value="<?php echo $referred; ?>" name="referred" placeholder="Referree" required><br>
                      <label>Phone Number: <span style="color: red; font-weight: bold; font-size: 20px;">*</span></label><br>
                      <input type="number" value="<?php echo $phone; ?>" name="phone" placeholder="Phone Number" required><br>
                      <label>Email:</label><br>
                      <input type="email" value="<?php echo $email; ?>" name="email" placeholder="Email"><br>
                      <label>Training Event: <span style="color: red; font-weight: bold; font-size: 20px;">*</span></label>
                      <select type="text" value="<?php echo $tevent; ?>" name="tevent" required>
                        <option value="">--</option>
                        <?php
	                      $result = $mysqli->query("SELECT * FROM training") or die($mysqli->error);
	                      while ($row = $result->fetch_array()):
	                    ?>
	                    <option value="<?php echo $row['id'] ?>"><?php echo $row['event_name'] ?></option>
	                    <?php endwhile; ?>
                      </select><br>
                      <label>Remarks: <span style="color: red; font-weight: bold; font-size: 20px;">*</span></label><br>
                      <input type="text" value="<?php echo $remarks; ?>" name="remarks" placeholder="Remarks" style="height:100px;" required><br>
                      <?php if($update == true): ?>
	                  <button type="submit" name="update" id="btn" style="background-color: orange; color: #fff">Update Clientele</button>
	                  <?php else: ?>
	                  <button type="submit" name="submit" id="btn" style="background-color: dodgerblue; color: #fff">Add Clientele</button>
	                  <?php endif; ?>
                  </div>

</form>
</div>
    </div>
    <script>          function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}</script>
<?php include_once 'footer.php'; ?>