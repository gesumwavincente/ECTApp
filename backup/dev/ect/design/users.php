<?php include_once 'header.php'; ?>
    <div class="body_wrapper" style="margin-left: 200px;">
    <div class="more_wrapper">
    <div class="list_wrapper more_user_wrapper">
            <h2>Users List:</h2>
            <i class="fas fa-search"></i>
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search" title="Type in a name">
            <table id="myTable">
              <tr class="header">
                <th>id</th>
                <th>name</th>
                <th>email</th>
                <th>phone number</th>
                <th>other phone</th>
                <th></th>
              </tr>
              
            </table>
    </div>

    <div class="form-popup more_form_popup">
        <h2>Add User:</h2>
            <form action="" method="POST" class="form-container">
                  <input type="text" name="fname" placeholder="Full Name"><br>
                  <input type="text" name="phone_no" placeholder="Phone Number"><br>
                  <input type="text" name="phone_no2" placeholder="Phone Number 2"><br>
                  <input type="email" name="email" placeholder="Email"><br>
                  <button type="submit" name="submit" id="btn" class="btn">Add Client</button>
                  <button type="button" class="btn cancel" onclick="closeForm()">Clear</button>
              </form>
          
          </div>
          <div class="form-popup more_form_popup1" id="updateForm">
                <h2>Update Form:</h2>
                    <form action="" method="POST" class="form-container">
                          <input type="text" name="fname" placeholder="Full Name"><br>
                          <input type="text" name="phone_no" placeholder="Phone Number"><br>
                          <input type="text" name="phone_no2" placeholder="Phone Number 2"><br>
                          <input type="email" name="email" placeholder="Email"><br>
                          <button type="submit" name="submit" id="btn" class="btn" onclick="closeForm()">Update Client</button>
                          <button type="button" class="btn cancel" onclick="closeForm()">Cancel & Close</button>
                      </form>
                  
                  </div>
        </div>
    </div>
<?php include_once 'footer.php'; ?>