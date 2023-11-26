<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    <div class="container">
    <h2 class="d-flex justify-content-center mt-5">Silahkan Login</h2>
        <div class="d-flex justify-content-center mt-5">
            <div class="form w-50 ">
                <form action="post" action="login">
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary w-100">
                            Login
                        </button>
                    </div>
                </form>
                <a href="auth/github/redirect" class="btn btn-dark w-100">Login With Github</a>
            </div>
        </div>
    </div>
</body>
</html>