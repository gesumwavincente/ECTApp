<?php include_once 'header.php'; ?>
    <div class="body_wrapper" style="margin-left: 200px;">
    <div class="more_wrapper">
    <div class="list_wrapper more_user_wrapper">
            <h2>Events List:</h2>
            <i class="fas fa-search"></i>
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search" title="Type in a name">
            <table id="myTable">
              <tr class="header">
                <th>id</th>
                <th>name</th>
                <th>place</th>
                <th>dater</th>
                <th>end date</th>
                <th>about</th>
                <th></th>
              </tr>
              <tr>
                <td>Mark</td>
                <td>Spencer</td>
                <td>William</td>
                <td>Levy</td>
                <td>Mongo</td>
                <td>Mongo</td>
                <td><button onclick="openFormFilled()"><i class="fas fa-edit"></i></button></td>
              </tr>
            </table>
    </div>

    <div class="form-popup more_form_popup">
        <h2>Add Event:</h2>
            <form action="" method="POST" class="form-container">
                  <input type="text" name="name" placeholder="Event Name"><br>
                  <input type="text" name="place" placeholder="Place"><br>
                  <input type="date" name="duedate" placeholder="Due Date"><br>
                  <input type="date" name="enddate" placeholder="End Date"><br>
                  <textarea type="text" name="about" placeholder="About the event..." style="height:100px;"></textarea><br>
                  <button type="submit" name="submit" id="btn" class="btn">Add Event</button>
                  <button type="button" class="btn cancel" onclick="closeForm()">Clear</button>
              </form>
          
          </div>
          <div class="form-popup more_form_popup1" id="updateForm">
                <h2>Update Event:</h2>
                    <form action="" method="POST" class="form-container">
                            <input type="text" name="name" placeholder="Event Name"><br>
                            <input type="text" name="place" placeholder="Place"><br>
                            <input type="date" name="duedate" placeholder="Due Date"><br>
                            <input type="date" name="enddate" placeholder="End Date"><br>
                            <textarea type="text" name="about" placeholder="About the event..." style="height:100px;"></textarea><br>
                          <button type="submit" name="submit" id="btn" class="btn" onclick="closeForm()">Update Event</button>
                          <button type="button" class="btn cancel" onclick="closeForm()">Cancel & Close</button>
                      </form>
                  
                  </div>
        </div>
    </div>
<?php include_once 'footer.php'; ?>