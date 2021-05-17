<?php 

    // HTML for login page
?>
<HTML>
    <head>
        <title> Personal Trainer Booking </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    </head>
    <body>
          <div class="container">
            <div class="row">
              <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                  <div class="card-body">
                    <h5 class="card-title text-center">Sign In</h5>
                    <form class="form-signin" action="api/login.php" method="post">
                      <div class="form-label-group">
                        <input type="text" placeholder="Enter Username" name="user" class="form-control" required autofocus>
                        <label for="inputEmail">Email address</label>
                      </div>
        
                      <div class="form-label-group">
                        <input type="password" name="pass" id="inputPassword" class="form-control" placeholder="Password" required>
                        <label for="inputPassword">Password</label>
                      </div>

                      <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
                        
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center">Don't have an account? <a href="index.php?page=register">Register</a></div>
          </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    </body>
</H>
