<?php
 include_once 'header.php'; 

$id = 0;
$update = false;
$fname = '';
$phone_no =  '';
$email = '';
$inst =  '';
$prof = '';
$tevent = '';


    if(isset($_POST['submit'])){

      $fname = $_POST['fname'];
      $phone_no = $_POST['phone_no'];
      $email = $_POST['email'];
      $inst = $_POST['inst'];
      $prof = $_POST['prof'];       
      $tevent = $_POST['tevent']; 

      $mysqli->query("INSERT INTO clientele( fname, phone_no, email, institution, proffesion, training_id) VALUES('$fname','$phone_no','$email','$inst','$prof','$tevent')") or die($mysqli->error());
      echo "<script>alert('Record added succcessful!')</script>";
    
    }

    if(isset($_GET['delete'])){

      $id = $_GET['delete'];
      $mysqli->query("DELETE FROM clientele WHERE id=$id") or die($mysqli->error());
      
      //echo "<script>alert('Deleted succcessful!')</script>";

    }

    if(isset($_GET['edit'])){
      $id = $_GET['edit'];
      $update = true;
      $result = $mysqli->query("SELECT * FROM clientele WHERE id=$id") or die($mysqli->error());
      if(count($result) == 1){
        $row = $result->fetch_array();
        $fname = $row['fname'];
        $phone_no = $row['phone_no'];
        $email = $row['email'];
        $inst = $row['institution'];
        $prof = $row['proffesion'];
        $tevent = $row['training_id'];
      }
    }

    if(isset($_POST['update'])){
      $id = $_POST['id'];
      $fname = $_POST['fname'];
      $phone_no = $_POST['phone_no'];
      $email = $_POST['email'];
      $inst = $_POST['inst'];
      $prof = $_POST['prof'];       
      $tevent = $_POST['tevent']; 

      $mysqli->query("UPDATE clientele SET fname='$fname', phone_no='$phone_no', email='$email', institution='$inst', proffesion='$prof', training_id='$tevent' WHERE id=$id;") or die($mysqli->error());
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
            <h2>Clientele List:</h2>
            <i class="fas fa-search"></i>
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search" title="Type in a name">

            <?php if($update == true): ?>
            <button class="open_form_button" style="width:auto; background-color: #e68a00;" onclick="document.getElementById('id01').style.display='block'"><i class="fas fa-plus"></i> Update Clientele</button>
            <?php else: ?>
            <button class="open_form_button" style="width:auto; background-color: #0b7dda;" onclick="document.getElementById('id01').style.display='block'"><i class="fas fa-plus"></i> Add Clientele</button>
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
                <th>name</th>
                <th>phone number</th>
                <th>email</th>
                <th>institution</th>
                <th>profession</th>
                <th>training id</th>
                <th>Action</th>
              </tr>
</thead>      
              <?php
                  $result = $mysqli->query("SELECT * FROM clientele") or die($mysqli->error);
                  while ($row=$result->fetch_assoc()):
                ?>
                <tr>
                    <td><?php echo $row['fname'] ?></td>
                    <td><?php echo $row['phone_no'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['institution'] ?></td>
                    <td><?php echo $row['proffesion'] ?></td>
                    <td><a href="roster.php?<?php echo $row['training_id']; ?>"><?php echo $row['training_id']; ?></a>
                    </td>
                    <td>
                          <span style="font-size: 20px; margin-left:10px"><a href="clientele.php?edit=<?php echo $row['id']; ?>"><i style=" color: #009688;" class="fas fa-edit"></i></a></span>
                          
       <!--    <button onclick="document.getElementById('id09').style.display='block'; openFormFilled(<?php echo $row['id']; ?>);" type="button" class="btn btn-info btn-lg" style="padding: 2px 4px;" id="<?php echo $row['id']; ?>" value="<?php echo $row['id']; ?>"> <i class="fa fa-edit"></i></button> -->

                           <span style="font-size: 20px; margin-left:10px"><a href="clientele.php?edit=<?php echo $row['id']; ?>"><i style=" color: #009688;" class="fas fa-edit"></i></a></span>
                    </td>
                </tr> 
                <?php endwhile; ?> 
            </table>
    </div>

  <div id="id01" class="modal">
  
  <form class="modal-content animate" method="post" action="clientele.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
                  <input type="hidden" name="id" value="<?php echo $id; ?>">
                  <label>Clientele Name: <span style="color: red; font-weight: bold; font-size: 20px;" >*</span></label>
                  <input type="text" value="<?php echo $fname; ?>" name="fname" placeholder="Full Name" required><br>
                  <label>Phone Number: <span style="color: red; font-weight: bold; font-size: 20px;" >*</span></label>
                  <input type="number" value="<?php echo $phone_no; ?>" name="phone_no" placeholder="Phone Number" required><br>
                  <label>Email: <span style="color: red; font-weight: bold; font-size: 20px;" >*</span></label>
                  <input type="email" value="<?php echo $email; ?>" name="email" placeholder="Email" required><br>
                  <label>Institution: <span style="color: red; font-weight: bold; font-size: 20px;" >*</span></label>
                  <input type="text" value="<?php echo $inst; ?>" name="inst" placeholder="Institution" required><br>
                  <label>Profession: <span style="color: red; font-weight: bold; font-size: 20px;" >*</span></label>
                  <input type="text" value="<?php echo $prof; ?>" name="prof" placeholder="Profession" required><br><br>
                  <label>Training Event: <span style="color: red; font-weight: bold; font-size: 20px;" >*</span></label>
                  <select type="text" value="<?php echo $tevent; ?>" name="tevent" required>
                    <option value="">--</option>
                    <?php
                      $resulta = $mysqli->query("SELECT * FROM training") or die($mysqli->error);
                      while ($rowa = $resulta->fetch_array()):
                    ?>
                    <option value="<?php echo $rowa['id'] ?>"><?php echo $rowa['event_name'] ?></option>
                    <?php endwhile; ?> 
                  </select> <br>
                  <?php if($update == true): ?>
                  <button type="submit" name="update" id="btn" style="background-color: orange; color: #fff">Update Clientele</button>
                  <?php else: ?>
                  <button type="submit" name="submit" id="btn" style="background-color: dodgerblue; color: #fff">Add Clientele</button>
                  <?php endif; ?>
    </div>

  </form>
</div>
 <script type="text/javascript">
              function openFormFilled(elem) {
                  var x = document.getElementById(elem).getAttribute('value');
                  document.getElementById("txt").value=x;
                }
            </script>

  <div id="id09" class="modal">
  
  <form class="modal-content animate" method="post" action="clientele.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id09').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
      
                  <input type="text" name="id" id="txt" value="">
                  <label>Clientele Name: <span style="color: red; font-weight: bold; font-size: 20px;" >*</span></label>
                  <input type="text" value="<?php echo $fname; ?>" name="fname" placeholder="Full Name" required><br>
                  <label>Add Training Event: <span style="color: red; font-weight: bold; font-size: 20px;" >*</span></label>
                  <select type="text" value="<?php echo $tevent; ?>" name="tevent" required>
                    <option value="">--</option>
                    <?php
                      $resulta = $mysqli->query("SELECT * FROM training") or die($mysqli->error);
                      while ($rowa = $resulta->fetch_array()):
                    ?>
                    <option value="<?php echo $rowa['id'] ?>"><?php echo $rowa['event_name'] ?></option>
                    <?php endwhile; ?> 
                  </select> <br>
                  
                  <button type="submit" name="addevent" id="btn" style="background-color: orange; color: #fff">Add Event</button>
                 
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