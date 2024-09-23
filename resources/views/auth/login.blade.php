<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/orange-boosted-bootstrap@5.3.0/dist/css/orange-boosted.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/boosted@5.3.3/dist/css/boosted.min.css" rel="stylesheet" integrity="sha384-laZ3JUZ5Ln2YqhfBvadDpNyBo7w5qmWaRnnXuRwNhJeTEFuSdGbzl4ZGHAEnTozR" crossorigin="anonymous">
        <link rel="canonical" href="https://boosted.orange.com/docs/4.3/examples/dashboard/">
        <title>Connexion</title>
        <style>

        </style>
    </head>
    <body style="background-color: #d3d3d3;">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-md-6">
            <div class="card border border-primary shadow-lg rounded-4">
                <div class="card-header bg-primary text-white text-center py-3 rounded-top">
                    <h4 class="mb-0">{{ __('App Directory') }}</h4>
                </div>
                <div class="card-body p-7">
                <img src="../../orange-logo.svg" width="50" height="50" alt="Boosted - Back to Home" loading="lazy" class="mx-auto d-block">
                <br>
                <h6 class="d-block mx-auto text-center">Veuillez entrer vos identifiants</h6>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group mb-4">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-block py-2">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/boosted.bundle.min.js" crossorigin="anonymous"></script>
        <script src="/docs/4.3/dist/js/boosted.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="dashboard.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/orange-boosted-bootstrap@5.3.0/dist/js/orange-boosted.bundle.min.js"></script>
    </body>
</html>














