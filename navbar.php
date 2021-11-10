<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <div class="container-fluid">

        <a class="navbar-brand" href="#">

            <img src="jong_logo.png" alt="">

        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle Navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php">Daftar Barang</a>
                </li>
                <?php if ($sessionStatus == false) : ?>

                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="login.php">Login</a>
                </li>

                <?php else : ?>

                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="logout.php">Logout</a>
                </li>

                <?php endif; ?>
            </ul>
        </div>

    </div>

</nav>