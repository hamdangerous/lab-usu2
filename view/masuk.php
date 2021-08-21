<div class="authentication">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <form class="card auth_form" id="login-form" method="POST">
                    <div class="header">
                        <img class="logo" src="images/laboratory.png" alt="">
                        <h4>Login Admin</h4>
                    </div>
                    <div class="body">
                        <div class="input-group mb-3">
                            <input type="text" name="username" class="form-control" placeholder="Username" required>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">Login</button>
                        <p>
                            <center>&#169; 2021 <a href="../index.php">Lab. USU</a></center>
                        </p>
                    </div>
                </form>
            </div>
            <div class="col-lg-8 col-sm-12">
                <div class="card">
                    <img src="images/background.jpg" alt="Sign In" />
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(() => {
        $('#login-form').submit((e) => {
            e.preventDefault()
            var d = new FormData(e.target);
            $.ajax({
                url: "modul/masuk.php",
                method: "post",
                data: d,
                processData: false,
                contentType: false,
                success: (d) => {
                    window.location.href = 'index.php'
                }
            })
        })
    })
</script>