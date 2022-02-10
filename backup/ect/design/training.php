<?php include_once 'header.php'; ?>
    <div class="body_wrapper" style="margin-left: 200px;">
    <div class="more_wrapper">
    <div class="list_wrapper more_user_wrapper">
            <h2>Training List:</h2>
            <i class="fas fa-search"></i>
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search" title="Type in a name">
            <table id="myTable">
              <tr class="header">
                <th>id</th>
                <th>Trainer</th>
                <th>course</th>
                <th>trainees</th>
                <th>place</th>
                <th>start date</th>
                <th>end date</th>
                <th></th>
              </tr>
             
            </table>
    </div>

    <div class="form-popup more_form_popup">
        <h2>Add Training:</h2>
            <form action="" method="POST" class="form-container">
                  <input type="text" name="trainer" placeholder="Trainer"><br>
                  <input type="text" name="course" placeholder="Course"><br>
                  <textarea type="text" name="trainees" placeholder="Trainees" style="height:100px;"></textarea><br>
                  <input type="text" name="place" placeholder="Place"><br>
                  <input type="date" name="startdate" placeholder="Start Date"><br>
                  <input type="date" name="enddate" placeholder="End Date"><br>
                  <button type="submit" name="submit" id="btn" class="btn">Add Training</button>
                  <button type="button" class="btn cancel" onclick="closeForm()">Clear</button>
              </form>
          
          </div>
          <div class="form-popup more_form_popup1" id="updateForm">
                <h2>Update Training:</h2>
                    <form action="" method="POST" class="form-container">
                            <input type="text" name="trainer" placeholder="Trainer"><br>
                  <input type="text" name="course" placeholder="Course"><br>
                  <textarea type="text" name="trainees" placeholder="Trainees" style="height:100px;"></textarea><br>
                  <input type="text" name="place" placeholder="Place"><br>
                  <input type="date" name="startdate" placeholder="Start Date"><br>
                  <input type="date" name="enddate" placeholder="End Date"><br>
                          <button type="submit" name="submit" id="btn" class="btn" onclick="closeForm()">Update Training</button>
                          <button type="button" class="btn cancel" onclick="closeForm()">Cancel & Close</button>
                      </form>
                  
                  </div>
        </div>
    </div>
<?php include_once 'footer.php'; ?>