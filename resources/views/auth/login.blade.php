@include('header.header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<!-- Pills navs -->
<div class="container mt-5">
    <ul class="nav nav-pills nav-justified mb-3 w-50 d-flex mx-auto mt-4" id="ex1" role="tablist">
        <li class="nav-item bg-yellow-300" role="presentation">
            <a class="nav-link active" id="tab-login" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="tab-register" href="#pills-register" role="tab" aria-controls="pills-register" aria-selected="false">Register</a>
        </li>
    </ul>
    <!-- Pills navs -->

    <!-- Pills content -->
    <div class="tab-content mt-5 w-50 mx-auto">
        <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
            <form>
                <div class="form-outline mb-4">
                    <label class="form-label" for="loginName">Email or username</label>
                    <input type="email" id="loginName" class="form-control" />
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="loginPassword">Password</label>
                    <input type="password" id="loginPassword" class="form-control" />
                </div>
                <div class="row mb-4">
                    <div class="col-md-6 d-flex justify-content-center">
                        <div class="form-check mb-3 mb-md-0">
                            <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
                            <label class="form-check-label" for="loginCheck"> Remember me </label>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-center">
                        <a href="#!">Forgot password?</a>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
                <div class="text-center">
                    <p>Not a member? <a href="#!">Register</a></p>
                </div>
            </form>
        </div>
        <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
            <form action="{{ route('auth.signup') }}" method="POST">
                @csrf

                <div class="form-outline mb-4">
                    <label class="form-label" for="registerName">Name</label>
                    <input type="text" name="name" id="registerName" class="form-control @error('name') is-invalid @enderror" />
                    @error('name')
                    <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="registerEmail">Email</label>
                    <input type="email" name="email" id="registerEmail" class="form-control @error('email') is-invalid @enderror" />
                    @error('email')
                    <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="registerPassword">Password</label>
                    <input type="password" name='password' id="registerPassword" class="form-control @error('password') is-invalid @enderror" />
                    @error('password')
                    <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
                <div class="form-check d-flex justify-content-center mb-4">

                    <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" checked />
                    <label class="form-check-label" for="registerCheck">
                        I have read and agree to the terms
                    </label>

                </div>
                <button type="submit" class="btn btn-primary btn-block mb-3">Sign up</button>
            </form>
        </div>
    </div>
</div>
<!-- Pills content -->

<script>
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            // Remove active classes from all links and hide all tab contents
            document.querySelectorAll('.nav-link').forEach(nav => nav.classList.remove('active'));
            document.querySelectorAll('.tab-pane').forEach(pane => pane.classList.remove('show', 'active'));

            // Add active class to the clicked link
            this.classList.add('active');

            // Show the corresponding tab content
            const targetId = this.getAttribute('href');
            document.querySelector(targetId).classList.add('show', 'active');
        });
    });
</script>

</body>
</html>
