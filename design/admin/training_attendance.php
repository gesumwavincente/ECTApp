<?php include_once 'header.php'; 

 
$trainer_id=$_POST['trainer'];
$remarks=$_POST['remark'];


$number = count($_POST["name"]);
if($number > 0)
{
  for($i=0; $i<$number; $i++)
  {
    if(trim($_POST["name"][$i] != ''))
    {
      $sql = "INSERT INTO attendance_date(trainer_id,date_attended,remarks) VALUES('$trainer_id',' ".mysqli_real_escape_string($mysqli, $_POST["name"][$i])."','$remarks')";
      mysqli_query($mysqli, $sql);
    }
  }
    echo "Data Inserted";
    header('Location:training_attendance.php?msg=updated');
    
}
if(isset($_GET['delete'])){

  $id = $_GET['delete'];
  $mysqli->query("DELETE FROM attendance_date WHERE id=$id") or die($mysqli->error());

  header('Location:training_attendance.php?msg=Deleted');
  }
?>
<!-- scripts -->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- /end of scripts -->
    <div class="body_wrapper">
    <div class="list_wrapper">
            <h2>Trainers Attendance:</h2>
            <i class="fas fa-search"></i>
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search" title="Type in a name">
           
 
            <button class="open_form_button" style="width:auto; background-color: #0b7dda;" onclick="document.getElementById('id01').style.display='block'"><i class="fas fa-plus"></i> Add Trainer Attendance</button>

            <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script> 
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

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
                <th>training id</th>
                <th>Trainer</th>
                <th>Days Attended</th>
                <th>Remarks</th>
                <th>Action</th>
              </tr>
</thead>           
              <?php
                  $result = $mysqli->query("SELECT DISTINCT * FROM attendance_date") or die($mysqli->error);
                  while ($row=$result->fetch_assoc()):
                ?>
                <tr>
                    <td><?php 
                        $resultb = $mysqli->query('SELECT DISTINCT * FROM trainer WHERE id ='.$row['trainer_id'].';') or die($mysqli->error);
                        while ($rowb=$resultb->fetch_assoc()){
                            echo $rowb['tevent'];
                        }
                    ?></td>
                    <td><?php 
                        $resultb = $mysqli->query('SELECT DISTINCT * FROM trainer WHERE id='.$row['trainer_id'].';') or die($mysqli->error);
                        while ($rowb=$resultb->fetch_assoc()){
                            echo $rowb['trainer'];
                        }
                    ?></td>
                    <td><?php echo $row['date_attended'] ?></td>
                    <td><?php echo $row['remarks'] ?></td>
                    <td>
                       
                          <span title="Delete" style="font-size: 20px; margin-left:10px"><a onclick='dell()' href="training_attendance.php?delete=<?php echo $row['id'] ?>"><i style=" color: red"  class="fas fa-trash-alt"></i></a></span>
                    </td>
                </tr>
                <?php endwhile; ?> 
            </table>
    </div>
     
    <div id="id01" class="modal">
  
    <form autocomplete="off" class="modal-content animate"  name="add_name" id="add_name" >
    <div class="imgcontainer">
    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>
        <div class="container">
                      <input type="hidden" name="id" value="<?php echo $id; ?>">
                     
                      <label></label>
                      <input type="hidden" name="id" value="<?php echo $id; ?>">
                      <label>Trainer's name <span style="color: red; font-weight: bold; font-size: 20px;" >*</span></label>
                      <select type="text" name="trainer" required>
                        <option value="">--</option>
                        <?php
                          $resulta = $mysqli->query("SELECT * FROM trainer") or die($mysqli->error);
                          while ($rowa = $resulta->fetch_array()):
                        ?>
                        <option value="<?php echo $rowa['id'] ?>"><?php echo $rowa['trainer'] ?></option>
                        <?php endwhile; ?> 
                      </select> <br>
                      <label></label>
                      <!-- addremove days -->
                      <div class="table-responsive">
						<table class="table table-bordered" id="dynamic_field">
							<tr>
								<td><input type="date" name="name[]" class="form-control name_list" /></td>
								<td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
							</tr>
						</table>
					</div>
                      <!-- /endaddremovedates -->
                      <label>Remarks:  <span style="color: red; font-weight: bold; font-size: 20px;" >*</span></label>
                        <input style="height: 100px;" type="text" name="remark" required><br>
                    <button type="submit" name="submit" id="submit"style="background-color: dodgerblue; color: #fff">Add Trainer Attendance</button>
                    
        </div>
    </form>
    </div>
    </div>
    <!-- scripts -->
    
<script>
$(document).ready(function(){
	var i=1;
	$('#add').click(function(){
		i++;
		$('#dynamic_field').append('<tr id="row'+i+'"><td><input type="date" name="name[]"  class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">Delete</button></td></tr>');
	});
	
	$(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
	});
	
	$('#submit').click(function(){		
		$.ajax({
			url:"training_attendance.php",
			method:"POST",
			data:$('#add_name').serialize(),
			success:function(data)
			{
				alert(data);
				$('#add_name')[0].reset();
			}
		});
	});
	
});
</script>

    <!-- /end of script -->
<?php include_once 'footer.php'; ?>