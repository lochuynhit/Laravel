<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Minh Sang Sofa</title>

<!-- Bootstrap -->
<link href="{{ asset('public/css') }}/bootstrap.min.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div class="container">            
    <header>
        <h1>logo MinhSang Sofa</h1>
        @include('login.formLogin')
    </header>
    
    @include('nav')

    @include('carousel')
    
    <div class="row">
        @include('aside')
        <section class="col-lg-3">
            noi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang webnoi dung trang web
        </section><!-- end section -->
    </div><!-- end row -->
    @include('footer')
</div><!-- end .container -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('public/js') }}/bootstrap.min.js"></script>
</body>
</html>