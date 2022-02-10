<?php include_once 'header.php'; ?>
    <div class="body_wrapper" style="margin-left: 200px;";>
    <div class="list_wrapper">
            <h2>Clientele List:</h2>
            <i class="fas fa-search"></i>
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search" title="Type in a name">
            <button class="open_form_button" onclick="openForm()"><i class="fas fa-plus"></i> Add Client</button>
            <table id="myTable">
              <tr class="header">
                <th>id</th>
                <th>name</th>
                <th>phone number</th>
                <th>email</th>
                <th>institution</th>
                <th>profession</th>
                <th>date of entry</th>
                <th></th>
              </tr>
              
            </table>
    </div>

    <div class="form-popup" id="myForm">
            <form action="includes/addclientele.inc.php" method="POST" class="form-container">
                  <input type="text" name="fname" placeholder="Full Name" required><br>
                  <input type="text" name="phone_no" placeholder="Phone Number" required><br>
                  <input type="email" name="email" placeholder="Email" required><br>
                  <input type="text" name="inst" placeholder="Institution" required><br>
                  <input type="text" name="prof" placeholder="Profession" required><br>
                  <button type="submit" name="submit" id="btn" class="btn">Add Client</button>
                  <button type="button" class="btn cancel" onclick="closeForm()">Cancel & Close</button>
              </form>
          
          </div>
          <div class="form-popup" id="updateForm">
              <form action="" method="POST" class="form-container">
                    <input type="text" name="fname" placeholder="Full Name"><br>
                    <input type="text" name="phone_no" placeholder="Phone Number"><br>
                    <input type="email" name="email" placeholder="Email"><br>
                    <input type="text" name="inst" placeholder="Institution"><br>
                    <input type="text" name="profession" placeholder="Profession"><br>
                    <button type="submit" name="submit" id="btn" class="btn">Add Client</button>
                    <button type="button" class="btn cancel" onclick="closeForm()">Cancel & Close</button>
                </form>
            
            </div>
    </div>
<?php include_once 'footer.php'; ?>