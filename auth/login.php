<div class="container d-flex justify-content-center align-items-center"
     style="min-height: 80vh;">

    <div class="card shadow" style="width: 500px;">

        <div class="card-header">
            <h2>Login</h2>
        </div>

        <div class="card-body">

            <?php if(isset($_SESSION['error'])) : ?>
                <div class="alert alert-danger">
                        <?= $_SESSION['error']; ?>
                    </div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>

            <form action="<?= BASEURL; ?>/auth/loginProcess" method="POST">

                <div class="mb-3">

                    <label class="form-label">
                        Username
                    </label>

                    <input type="text"
                           name="username"
                           class="form-control"
                           required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Password
                    </label>

                    <input type="password"
                           name="password"
                           class="form-control"
                           required>

                </div>

                <button type="submit"
                        class="btn btn-primary w-100">

                    Login

                </button>

            </form>

        </div>

    </div>

</div>