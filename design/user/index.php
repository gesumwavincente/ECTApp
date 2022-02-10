<?php
include_once 'header.php';
?>
	<div class="body_wrapper">
    <div class="inde">
		 <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
		 <!-- /.col-->
               <div class="col-sm-6  col-lg-3 dash_links">
                <a href="clientele.php">
                <div class="card text-white bg-danger">
                  <div class="card-body pb-0">
                    <button class="btn btn-transparent p-0 float-right" type="button">
                      <i class="icon-location-pin"></i>
                    </button>
                    <div class="text-value">
                      <?php 
                        if ($result=mysqli_query($mysqli,'SELECT * FROM clientele')) {
                                $rowcount=mysqli_num_rows($result);
                                echo $rowcount;
                              
                                mysqli_free_result($result);
                                }
                       ?>

                    </div>
                    <div>Clients</div>
                  </div>
                  <div class="chart-wrapper mt-3 mx-3" style="height:70px;">
                    <canvas class="chart" id="card-chart2" height="70"></canvas>
                  </div>
                </div>
                </a>
              </div>
              <!-- /.col-->
              <div class="col-sm-6 col-lg-3">
                <a href="training.php">
                <div class="card text-white" style="background-color: #2e3092">
                  <div class="card-body pb-0">
                    <div class="btn-group float-right">
                      <button class="btn btn-transparent  p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-settings"></i>
                      </button>
                      </div>
                    <div class="text-value">
                      <?php 
                        if ($result=mysqli_query($mysqli,'SELECT * FROM training')) {
                                $rowcount=mysqli_num_rows($result);
                                echo $rowcount;
                              
                                mysqli_free_result($result);
                                }
                       ?>
                    </div>
                    <div>Events</div>
                  </div>
                  
                  <div class="chart-wrapper mt-3" style="height:70px;">
                    <canvas class="chart" id="card-chart3" height="70"></canvas>
                  </div>
                </div>
              </a>
              </div>
              <!-- /.col-->
              <div class="col-sm-6 col-lg-3">
                <a href="referrers.php">
                <div class="card text-white bg-danger">
                  <div class="card-body pb-0" >
                    <div class="btn-group float-right">
                      <button class="btn btn-transparent p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-settings"></i>
                      </button>
                     
                    </div>
                    <div class="text-value">
                      <?php 
                        if ($result=mysqli_query($mysqli,'SELECT * FROM referrers')) {
                                $rowcount=mysqli_num_rows($result);
                                echo $rowcount;
                              
                                mysqli_free_result($result);
                                }
                       ?>
                    </div>
                    <div>Referrers</div>
                  </div>
                  <div class="chart-wrapper mt-3 mx-3" style="height:70px;">
                    <canvas class="chart" id="card-chart4" height="70"></canvas>
                  </div>
                </div>
              </a>
              </div>
              <!-- /.col-->
              <!-- /.col-->
              <div class="col-sm-6 col-lg-3">
                <a href="trainers.php">
                <div class="card text-white " style="background-color: #2e3092">
                  <div class="card-body pb-0">
                    <div class="btn-group float-right">
                      <button class="btn btn-transparent p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-settings"></i>
                      </button>
                     
                    </div>
                    <div class="text-value">
                       <?php 
                        if ($result=mysqli_query($mysqli,'SELECT * FROM trainer')) {
                                $rowcount=mysqli_num_rows($result);
                                echo $rowcount;
                              
                                mysqli_free_result($result);
                                }
                       ?>
                    </div>
                    <div>Trainers</div>
                  </div>
                  <div class="chart-wrapper mt-3 mx-3" style="height:70px;">
                    <canvas class="chart" id="card-chart4" height="70"></canvas>
                  </div>
                </div>
              </a>
              </div>
              <!-- /.col-->
              
            </div>
            
            <div class="row">
              <div class="col-sm-6 col-lg-3">
                <div class="brand-card">
                  <a target="_blank" style="text-decoration: none;" href="https://facebook.com/EmergencyCareTrainers/">
                  <div class="brand-card-header bg-facebook"  style="background-color:#ED3833">
                    <i class="fab fa-facebook-f"></i>
                    <div class="chart-wrapper">
                      <canvas id="social-box-chart-1" height="90"></canvas>
                    </div>
                  </div>
                  </a>
                  <div class="brand-card-body">
                    <div>
                      <!-- <div class="text-value">89k</div> -->
                      <div class="text-uppercase text-muted small">facebook</div>
                    </div>
                    <!-- <div>
                      <div class="text-value">459</div>
                      <div class="text-uppercase text-muted small">feeds</div>
                    </div> -->
                  </div>
                </div>
              </div>
              <!-- /.col-->
              <div class="col-sm-6 col-lg-3">
                <div class="brand-card">
                  <a target="_blank" style="text-decoration: none;" href="https://www.youtube.com/channel/UCUytTxqAYZQcIYCV_8sxW3Q">
                  <div class="brand-card-header bg-youtube" style="background-color: #c4302b">
                    <i class="fab fa-youtube"></i>
                    <div class="chart-wrapper">
                      <canvas id="social-box-chart-1" height="90"></canvas>
                    </div>
                  </div>
                  </a>
                  <div class="brand-card-body">
                    <div>
                      <!-- <div class="text-value">89k</div> -->
                      <div class="text-uppercase text-muted small">youtube</div>
                    </div>
                    <!-- <div>
                      <div class="text-value">459</div>
                      <div class="text-uppercase text-muted small">feeds</div>
                    </div> -->
                  </div>
                </div>
              </div>
              <!-- /.col-->
              <div class="col-sm-6 col-lg-3">
                
                <div class="brand-card">
                  <a target="_blank" style="text-decoration: none;" href="https://twitter.com/ECT_Limited?ref_src=twsrc%5Etfw%7Ctwcamp%5Eembeddedtimeline%7Ctwterm%5Eprofile%3AECT_Limited&ref_url=http%3A%2F%2Fect.co.ke%2F">
                  <div class="brand-card-header bg-twitter" style="background-color: #38A1F3;">
                    <i class="fab fa-twitter"></i>
                    <div class="chart-wrapper">
                      <canvas id="social-box-chart-2" height="90"></canvas>
                    </div>
                  </div>
                   </a>
                  <div class="brand-card-body">
                    <div>
                      <!-- <div class="text-value">973k</div> -->
                      <div class="text-uppercase text-muted small">twitter</div>
                    </div>
                    <!-- <div>
                      <div class="text-value">1.792</div>
                      <div class="text-uppercase text-muted small">referrals</div>
                    </div> -->
                  </div>
                </div>

              </div>
              <!-- /.col-->
              <div class="col-sm-6 col-lg-3">
              <a target="_blank" style="text-decoration: none;" href="">
                <div class="brand-card" >
                  <div class="brand-card-header bg-instagram" style="background-color: #9b6954;">
                  <i class="fab fa-instagram"></i>
                    <div class="chart-wrapper">
                      <canvas id="social-box-chart-3" height="90"></canvas>
                    </div>
                  </div>
                  </a>
                  <div class="brand-card-body">
                    <div>
                      <!-- <div class="text-value">500+</div> -->
                      <div class="text-uppercase text-muted small">instagram</div>
                    </div>
                    <!-- <div>
                      <div class="text-value">292</div>
                      <div class="text-uppercase text-muted small">referrals</div>
                    </div> -->
                  </div>
                </div>
              </div>
      
            </div>
<hr>


	</div>
<?php include_once 'footer.php'; ?>