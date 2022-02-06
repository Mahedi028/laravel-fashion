<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>SignUp</title>
</head>
<body>
    <div class="container">
        <div class="row position-relative d-flex justify-content-center align-items-center">
            <div class="row">
            <img alt="" src="https://images.pexels.com/photos/1144834/pexels-photo-1144834.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" height="800">
        </div>
            <div class="col-8 bg-primary position-absolute p-5 rounded shadow p-3 mb-5 bg-body rounded top-20">
                <h3 class="text-center mt-3">Register Your Account</h3>
                <div class="row">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session()->has('message'))
                        <div class="alert alert-{{session('type')}}">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>{{session('message')}}</strong>
                        </div>


                    @endif
                </div>
                <form action="{{route('Registration.submit')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="username" class="mb-2">Username</label>
                        <input type="text" class="form-control" name="username" value="{{old('username')}}" placeholder="Enter your name" id="username">
                    </div>
                    <div class="form-group">
                        <label for="email" class="mb-2">Email</label>
                        <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Enter your email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="password" class="mb-2">Password</label>
                        <input type="password" class="form-control" name="password" value="" placeholder="Enter your password" id="password">
                    </div>
                    <div class="form-group mb-3">
                        <label for="Confirm-password" class="mb-2">Confirm Password</label>
                        <input type="password" class="form-control" name="confirm_password" value="" placeholder="Enter your Confirm password" id="password">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-info" name="submit" value="submit" placeholder="Enter your Confirm password" id="password">
                    </div>
                </form>
                <a href="{{route('login')}}"><button class="btn btn-outline-success mt-3">Already you have an Account?</button></a>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
