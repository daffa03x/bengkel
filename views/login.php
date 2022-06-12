<div class="container-xxl py-5">
<div class="container">
<a href="index.php?hal=home"><img src="img/back.png" alt="" width="5%"></a>
<div class="row justify-content-center">    
    <div class="col-lg-6">
<main class="form-signin w-100 m-auto">
  <form action="controller/userController.php" method="post">
    <h1 class="h3 mb-3 fw-normal text-center">Login</h1>
    <div class="form-floating">
      <input type="username" class="form-control" id="username" name="username" placeholder="username" required>
      <label for="username">Username</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
      <label for="password">Password</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Login</button>
  </form>
</main>
</div>
</div>
</div>
</div>