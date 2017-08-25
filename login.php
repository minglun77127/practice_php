<?php include 'app/include/header.php'; ?>
    <div style="height: 30%"></div>
    <div class="container">
        <div class="col-md-4 col-md-offset-4">
            <section>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="text-center">Admin Login</h3>
                        <form action="app/login_proc.php" method="post">
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                            </div>
                            <br>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary btn-block">Log In</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
<?php include 'app/include/footer.php'; ?>