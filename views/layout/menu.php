<div class="container-fluid-menu">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">

            <a class="navbar-brand" href="/">Auth App</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav"
                    aria-expanded="false" aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?php if (isset($_COOKIE['remember_user'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/logout">Logout</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/register" tabindex="-1">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/login" tabindex="-1">Login</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>

</div>