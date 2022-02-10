<?php include_once 'header.php'; 

?>
    <div class="body_wrapper">
    <div class="list_wrapper">
        <div class="roster_tbl1">
        <table class="table_roster">
        
        
<?php 
$parameter = $_SERVER['QUERY_STRING'];
$resulta = $mysqli->query("SELECT * FROM training WHERE id = $parameter ") or die($mysqli->error);
while ($rowa = $resulta->fetch_array()):

    ?>
        <tr><td style="font-weight: bold;">Roster ID:</td><td><?php echo 'R'.$parameter; ?></td></tr>
        <tr><td style="font-weight: bold;">Training ID:</td><td><?php echo $rowa['id'] ?></td></tr>
        <tr><td style="font-weight: bold;">Training Event Name:</td><td><?php echo $rowa['event_name'] ?></td></tr>
        <tr><td style="font-weight: bold;">Course:</td><td><?php echo $rowa['course_id'] ?></td></tr>
        <tr><td style="font-weight: bold;">Place:</td><td><?php echo $rowa['place'] ?></td></tr>
        <tr><td style="font-weight: bold;">Start Date:</td><td><?php echo $rowa['startdate'] ?></td></tr>
        <tr><td style="font-weight: bold;">End Date:</td><td><?php echo $rowa['enddate'] ?></td></tr>
        <tr><td style="font-weight: bold;">Next Possible Training:</td><td><?php echo substr($rowa['startdate'],0,7) ?></td></tr>
        <tr><td style="font-weight: bold;">Trainers:</td><td><?php 
          $resultb = $mysqli->query("SELECT * FROM trainer WHERE tevent = $parameter ") or die($mysqli->error);
          while ($rowb = $resultb->fetch_array()){
              echo $rowb['trainer'].'; ';
          }
        ?></td></tr>
       <?php endwhile; ?> 

           </table> 
       </div>
       <div>
       <table id="myTable">
              <tr class="header">
                <th> Referral Name</th>
                <th>Referral Phone No.</th>
                <th>Referral Email</th>
                <th>Referrer Name</th>
                <th>Referrer Phone No.</th>
                <th>Referrer Email</th>
                <th>remarks</th>
              </tr>   
              <?php
                  $resultc = $mysqli->query("SELECT * FROM referrers WHERE tevent=$parameter") or die($mysqli->error);
                  while ($rowc=$resultc->fetch_assoc()):
                ?>
                <tr>
                  <td><a href="referrers.php"><?php echo $rowc['referred'] ?></a></td>
                    <td><?php echo $rowc['phone'] ?></td>
                    <td><?php echo $rowc['email'] ?></td>
                    <?php
                    $result = $mysqli->query("SELECT * FROM clientele WHERE training_id = $parameter") or die($mysqli->error);
                    while ($row=$result->fetch_assoc()){
                  
                      echo '<td> '.$row['fname'].'</td>
                    <td>'. $row['phone_no'].'</td>
                    <td>'.$row['email'].'</td>
                    ';
                    }?>
                    <td><?php echo $rowc['remarks'] ?></td>
                </tr>
                <?php endwhile;?> 
            </table>
       </div>
          
    </div>
    </div>
<?php include_once 'footer.php'; ?>

