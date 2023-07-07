<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link id="pagestyle" href="{{PUBLIC_DIR}}/css/app.css" rel="stylesheet"/>
</head>
<body class="bg-info-light">
<main class="main-content main-content-bg mt-0">
    <section class="min-vh-75">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-7 mx-auto">
                    <div class="card z-index-0 mt-sm-12 mt-9 mb-4">
                        <div class="card-header text-center pt-4 pb-1">
                            <h4 class="font-weight-bolder mb-1">
                                {{__('Reset password')}}
                            </h4>
                            <p class="mb-0">
                                {{__(' You will receive an e-mail in maximum 60 seconds')}}
                            </p>
                        </div>
                        <div class="card-body">
                            <form role="form " action="/save-reset-password" method="post">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="list-unstyled">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="mb-3">
                                    <input type="email" name="email" class="form-control" aria-label="Email">
                                </div>
                                @csrf
                                <div class="text-center">
                                    <button type="submit"
                                            class="btn btn-blue btn-lg w-100 my-4 mb-2">{{__('Send')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
</body>
</html>
