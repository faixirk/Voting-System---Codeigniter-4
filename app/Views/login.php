<?php
include 'includes/head.php';
include 'includes/header.php';
?>

<section class="login-section">
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-lg-6 p-0">
                <div class="text-box h-100">
                    <div class="overlay h-100">
                        <div class="text">
                            <h2>Sign in to your account</h2>
                            <a href="https://script.bugfinder.net/prophecy">back to home</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-wrapper d-flex align-items-center h-100">
                    <form action="https://script.bugfinder.net/prophecy/login" method="post">
                        <input type="hidden" name="_token" value="FGTjCAXsL4YpaaSt6nAMNhsrl75tDOALaOXwN2KG">
                        <div class="row g-4">
                            <div class="col-12">
                                <h4>Login here</h4>
                            </div>
                            <div class="input-box col-12">
                                <input type="text" class="form-control" name="username" placeholder="Email Or Username" />
                            </div>
                            <div class="input-box col-12">
                                <input type="password" class="form-control" name="password" placeholder="Password" />
                            </div>
                            <div class="col-12">
                                <div class="links">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="flexCheckDefault" />
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Remember Me </label>
                                    </div>
                                    <a href="https://script.bugfinder.net/prophecy/password/reset">Forgot password?</a>
                                </div>
                            </div>
                        </div>

                        <button class="btn-custom w-100">sign in</button>
                        <div class="bottom">
                            Don't have an account?
                            <a href="https://script.bugfinder.net/prophecy/register">Create account</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include 'includes/footer.php';
?>
