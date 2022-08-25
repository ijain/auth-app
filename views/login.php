<?php include('layout/header.php'); ?>
<?php include('layout/menu.php'); ?>

    <div class="main-content">
        <div class="container-fluid col-lg-3" style="float: left">
            <div class="line-break"></div>
            <h4>Login</h4>

            <?php if (isset($error)) { ?>
                <div class="error-message"><?php echo $error; ?></div>
            <?php } ?>

            <form action="/post-login" class="container-fluid requires-validation" role="form" name="login" id="login" method="post" novalidate>
                <div class="input-group">
                    <span class="input-group-text" id="add-user">@</span>
                    <input type="text" class="form-control"
                           id="username" name="username"
                           placeholder="Login" aria-label="Login"
                           aria-describedby="basic-addon1"
                           pattern="[a-z0-9]{2,20}$"
                           required value="">
                    <div class="invalid-feedback">
                        Invalid login
                    </div>
                </div>

                <div class="line-break"></div>

                <div class="input-group">
                    <span class="input-group-text" id="add-password">#</span>
                    <input type="password" class="form-control"
                           id="password" name="password"
                           placeholder="Password" aria-label="Password"
                           aria-describedby="basic-addon1"
                           pattern=".{5,}$"
                           data-bv-identical="true"
                           data-bv-identical-field="confirmPassword"
                           data-bv-identical-message="The password and its confirm are not the same"
                           required value="">
                    <div class="invalid-feedback">
                       Invalid password
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php include('layout/footer.php'); ?>
