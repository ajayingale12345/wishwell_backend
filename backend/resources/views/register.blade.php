<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .logo {
            color: #a71818f4;
            text-decoration: none;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .required-label::after {
            content: "*";
            color: red;
            margin-left: 2px;
        }

        .custom-btn {
            padding: 15px 60px;
            font-size: 25px;
        }
    </style>
</head>

<body>
    <section class="vh-100" style="background-color:#1E90FF ;">         <!-- 2E8B5  1E90FF   4169E1          -->
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-10 col-lg-5 d-none d-md-flex justify-content-center align-items-center">
                                <img src="https://gijn.org/wp-content/uploads/2015/02/crowdfunding-featured5.jpg"
                                    alt="register form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; width: 100%; height: auto; object-fit: cover; height: 400px" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form action="{{ route('register')}}" method="post">
                                        @csrf
                                        <div class="d-flex align-items-center mb-1 pb-1">
                                            <div class="logo">
                                                <h3>WishWell</h3>
                                            </div>
                                        </div>

                                        <h2 class="fw-bold mb-3 pb-3" style="letter-spacing: 1px;">Admin Registration</h2>

                                        <div class="form-outline mb-4">
                                            <input type="text" id="username" name="username" class="form-control form-control-lg" required autocomplete="new text" />
                                            <label class="form-label required-label" for="username">UserName </label>

                                            <input type="password" id="password" name="password" class="form-control form-control-lg" required autocomplete="new password"/>
                                            <label class="form-label required-label" for="password">Password</label>
                                      
                                            <input type="password" id="security_token" name="security_token" class="form-control form-control-lg" required autocomplete="new password"/>
                                            <label class="form-label required-label" for="security_token">Security Token</label>
                                   
                                            <input type="password" id="confirmpassword" name="confirmpassword" class="form-control form-control-lg" required autocomplete="new password"/>
                                            <label class="form-label required-label" for="confirmpassword">Confirm Password </label>
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-success btn-block custom-btn" type="submit">Register</button>
                                        </div>
                                    </form>

                                    <a href="{{ route('login') }}" class="large text-primary" style="color:blue">Already have an account? Login here</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script> -->
</body>

</html>