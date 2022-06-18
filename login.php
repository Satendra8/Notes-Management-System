<?php require('includes/header.php') ?>
<div class="card bg-light" style="height: 100vh;">
    <article class="card-body mx-auto" style="display:flex; align-items:center; justify-content:center; flex-direction:column;">
        <h4 class="card-title text-center">Login Here</h4>

        <p>
        <a href="index.php" class="btn btn-primary btn-block">Back to home page</a>
        </p>
        <p class="divider-text">
            <span class="bg-light">OR</span>
        </p>
        <form action="notes/index.php" method="POST">

            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                    <input name="email" class="form-control" placeholder="Email address" type="email" required>
                </div>
            </div>

            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    <input class="form-control" placeholder="Enter password" type="password" name="password" valur="" required>
                </div>

            </div>

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
            </div>
            <p class="text-center">Have not an account?<a href="register.php">Create An Account</a></p>

        </form>
        <a style="text-decoration:none; text-align: right;" href="recover.php">Forgot Password</a>
    </article>
</div>

<?php require('includes/footer.php') ?>