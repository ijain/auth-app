<?php include('layout/header.php'); ?>
<?php include('layout/menu.php'); ?>

    <div class="main-content">
        <div class="container-fluid col-lg-3" style="float: left">
            <div class="line-break"></div>
            <h4>Registration</h4>

            <div id="success-message" class="success-message"></div>
            <div id="error-message" class="error-message"></div>

            <form action="/post-register" class="container-fluid requires-validation" role="form" name="register" id="register" method="post" novalidate>
                <div class="input-group">
                    <span class="input-group-text" id="add-user">@</span>
                    <input type="text" class="form-control"
                           id="username" name="username"
                           placeholder="Login" aria-label="Login"
                           aria-describedby="basic-addon1"
                           pattern="[a-z0-9]{2,20}$"
                           required value="">
                    <div class="invalid-feedback">
                        Login must be between 2 and 20 characters, must contain letters and digits
                    </div>
                </div>

                <div class="line-break"></div>

                <div class="input-group">
                    <span class="input-group-text" id="add-password">#</span>
                    <input type="password" class="form-control"
                           id="password" name="password"
                           placeholder="Password" aria-label="Password"
                           aria-describedby="basic-addon1"
                           pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{5,}$"
                           data-bv-identical="true"
                           data-bv-identical-field="confirmPassword"
                           data-bv-identical-message="The password and its confirm are not the same"
                           required value="">
                    <div class="invalid-feedback">
                        Password:
                        <ul>
                            <li>minimum 5 characters</li>
                            <li>contains letters and digits (at least 1 upper case, at least one lower case, at least 1 number)</li>
                            <li>contains at least one symbol !@#$%^&*_=+-</li>
                        </ul>
                    </div>
                </div>

                <div class="line-break"></div>

                <div class="input-group">
                    <span class="input-group-text" id="add-password-confirm">#</span>
                    <input type="password" class="form-control"
                           id="password-confirm" name="password-confirm"
                           placeholder="Confirm Password" aria-label="Confirm Password"
                           aria-describedby="basic-addon1"
                           pattern=".{5,}"
                           data-bv-identical="true"
                           data-bv-identical-field="password"
                           data-bv-identical-message="The password and its confirm are not the same"
                           required value="">
                    <div class="invalid-feedback">
                        Passwords must be identical
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