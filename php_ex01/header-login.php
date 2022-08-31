<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/9005a12b78.js" crossorigin="anonymous"></script>
    <style>
        body{
            position: relative;
        }
        @media (max-width: 767px){
            .text{
                text-align: center;
            }
            
        }
        /* body::before {
            display: block;
            content: '';
            height: 100px;
        } */
        .scroll-area{
            width: 100%;
            height: 100vh;
            -webkit-scroll-behavior: smooth;
            scroll-behavior: smooth;
            -webkit-scroll-snap-type: mandatory;
            scroll-snap-type: mandatory;
            -webkit-scroll-snap-points-y: repeat(100%);
            scroll-snap-points-y: repeat(100%);
        }
        .box{
            width: 100%;
            height: 100vh;
            color: #45404062;
            font-size: 100px;
            display: flex;
            align-items: center; /* 縦方向中央揃え */
            justify-content: center; /* 横方向中央揃え */
            flex-direction: column;
        }
        .welcome {
            text-align: center;
        }
        .section {
            width: 100%;
            height: auto;
        }
        .arrow {
            text-align: center;
        }
        .font{
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", "Noto Sans", "Liberation Sans", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";;
            font-style: normal;
            font-weight: 300;
            font-size: 15px;
            line-height: 23px;
            color: #212529;
        }
        .textarea{
            width: 100%;
            border-color: #CED4DA;
            border-radius: 5px;
        }
        .textarea::placeholder {
            vertical-align: middle;
            padding-left: 8px;
            padding-top: 8px;
        }
        .submit{
            width: 100%;
            border: 1px solid #CED4DA;
            border-radius: 5px;
            color: #9e9e9e;
            background-color: #ebebeb;
        }
        #cover{
            background-image: url(img/beige.jpg);
        }
        #about{
            /* background-color: bisque; */
            
        }
        #experience{
            /* background-color: rgb(161, 208, 248); */
           
        }
        #contact{
            /* background-color: rgb(250, 225, 239); */
            
        }
        #gallery{
            /* background-color: rgb(78, 30, 108); */
            margin-bottom: 50px;
        }
    </style>
    <script>
        window.addEventListener('load', function(){
            alert("Welcome Back");
        });
    </script>
</head>
<body>

    <!-- navbar -->

    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 fixed-top">
        <div class="container">
            <a href="#" class="navbar-brand">Yutaro Okuda</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            

            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    
                    <li class="nav-item">
                        <a href="#logout" class="nav-link">Log Out</a>
                    </li>
                    <li class="nav-item">
                        <a href="#about" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="#experience" class="nav-link">Experience</a>
                    </li>
                    <li class="nav-item">
                        <a href="#contact" class="nav-link">Contact</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a href="#gallery" class="nav-link">Gallery</a>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>
