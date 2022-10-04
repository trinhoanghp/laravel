<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
                @import url("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");

                .login-block {
                        background: #DE6262;
                        /* fallback for old browsers */
                        background: -webkit-linear-gradient(to bottom, #FFB88C, #DE6262);
                        /* Chrome 10-25, Safari 5.1-6 */
                        background: linear-gradient(to bottom, #FFB88C, #DE6262);
                        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                        float: left;
                        width: 100%;
                        padding: 50px 0;
                }

             

                .container {
                        background: #fff;
                        border-radius: 10px;
                        box-shadow: 15px 20px 0px rgba(0, 0, 0, 0.1);
                }

                .carousel-inner {
                        border-radius: 0 10px 10px 0;
                }

                .login-sec {
                        padding: 50px 30px;
                        position: relative;
                }

                .login-sec .copy-text {
                        position: absolute;
                        width: 80%;
                        bottom: 20px;
                        font-size: 13px;
                        text-align: center;
                }

                .login-sec .copy-text i {
                        color: #FEB58A;
                }

                .login-sec .copy-text a {
                        color: #E36262;
                }

                .login-sec h2 {
                        margin-bottom: 30px;
                        font-weight: 800;
                        font-size: 30px;
                        color: #DE6262;
                }

                .login-sec h2:after {
                        content: " ";
                        width: 100px;
                        height: 5px;
                        background: #FEB58A;
                        display: block;
                        margin-top: 20px;
                        border-radius: 3px;
                        margin-left: auto;
                        margin-right: auto
                }

                .btn-login {
                        background: #DE6262;
                        color: #fff;
                        font-weight: 600;
                }

        
        </style>

</head>

<body>
        <section class="login-block">
                <div class="container-fluid">
                        <div class="row">
                                <div class="col-md-4 login-sec">
                                        <h2 class="text-center">Admin Login</h2>
                                        
                                        <form class="login-form" action="" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                        <label for="exampleInputEmail1"
                                                                class="text-uppercase">Username</label>
                                                        <input name="name" type="text" class="form-control" placeholder="">

                                                </div>
                                                <div class="form-group">
                                                        <label for="exampleInputPassword1"
                                                                class="text-uppercase">Password</label>
                                                        <input type="password" name="password" class="form-control" placeholder="">
                                                </div>


                                                <div class="form-check">
                                                        <label class="form-check-label">
                                                                <input type="checkbox" name="remember_me" class="form-check-input">
                                                                <small>Remember Me</small>
                                                        </label>
                                                        <button type="submit"
                                                                class="btn btn-login float-right">Submit</button>
                                                </div>
                                
                                                @if (Session::has('error'))
                                                <div class=" alert alert-dark">
                                                    <span type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</span>
                                                    {{Session::get('error')}}
                                                </div>
                                         @endif

                                        </form>
                                   
                                        <div class="copy-text">Created with <i class="fa fa-heart"></i> Administrator
                                        </div>
                                </div>
                                <div class="col-md-8 banner-sec">
                                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                                <ol class="carousel-indicators">
                                                        <li data-target="#carouselExampleIndicators" data-slide-to="0"
                                                                class="active"></li>
                                                        <li data-target="#carouselExampleIndicators" data-slide-to="1">
                                                        </li>
                                                       
                                                </ol>
                                                <div class="carousel-inner" role="listbox">
                                                        <div class="carousel-item active">
                                                                <img class="d-block img-fluid"
                                                                        src="https://static.pexels.com/photos/33972/pexels-photo.jpg"
                                                                        alt="First slide">
                                                            
                                                        </div>
                                                        <div class="carousel-item">
                                                                <img class="d-block img-fluid"
                                                                        src="https://images.pexels.com/photos/7097/people-coffee-tea-meeting.jpg"
                                                                        alt="First slide">
                                                     
                                                        </div>
                                                     
                                                </div>

                                        </div>
                                </div>
                                
                        </div>
        </section>

</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>