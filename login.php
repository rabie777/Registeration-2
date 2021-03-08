<?php   include_once 'includes/header.php'; 
include_once 'crud.php';
 //var_dump($_SERVER);
?>
 

<main role="main">
  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card text-center">

           <strong>Login</strong>

          </div>
        <div class="card">
          <div class="card-body">
            <form action="handle.php" method="post">
            	 
              	<div class="form-group">
                	<label for="exampleInputEmail1">Email address:</label>
                	<input type="text" class="form-control" name="email"  placeholder="email">
              	</div>
              	<div class="form-group">
                	<label for="exampleInputPassword1">Password:</label>
                	<input type="password" class="form-control" name="password"  placeholder="password">
              	</div>
              	
              <button type="submit" class="btn btn-primary" name="login">login</button>
            </form>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php
if (isset($_SESSION['users'])) {
        print_r($_SESSION);
 }
?>







<?php include_once 'includes/footer.php';?>