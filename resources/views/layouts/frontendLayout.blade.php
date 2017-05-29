<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="DarDoepyi">
	
	{{-- <meta property="og:url"           content="http://www.dardoepyi.com/" /> --}}
	<meta property="og:type"          content="website" />
	{{-- <meta property="og:title"         content="Dardoepyi" /> --}}
	<meta property="og:description"   content="Souveniur of Myanmar" />

	@yield('header_meta')

	<link rel="icon" type="image/ico" href="images/favicon.png">

	<title>Dar DoePyi</title>

	<!-- Custom styles for this template -->
	<link rel="stylesheet" href="{{asset('css/ed5eec95.main.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/main.css')}}"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    @yield('header_style')
    <!-- Google fonts -->
    <script type="text/javascript">
    	WebFontConfig = {
    		google: { families: [ 'Arvo:700:latin', 'Open+Sans:400,600,700:latin' ] }
    	};
    	(function() {
    		var wf = document.createElement('script');
    		wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
    		'://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
    		wf.type = 'text/javascript';
    		wf.async = 'true';
    		var s = document.getElementsByTagName('script')[0];
    		s.parentNode.insertBefore(wf, s);
    	})();
    </script>

    <style>
    	.navbar-collapse ul{
    		margin-left: 60px;
    	}
    </style>

</head>
<body>
	<div class="top  js--fixed-header-offset">
		<div class="container">
			<div class="row" style="height:5px;">
				
			</div>
		</div>
	</div>

	<!-- Modal register-->
	<div class="modal  fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content  center">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
					<h3><span class="light">Register</span> to Organique</h3>
					<hr class="divider">
				</div>
				<div class="modal-body">
					<form action="#" class="push-down-15">
						<div class="form-group">
							<input type="text" id="name" class="form-control  form-control--contact" placeholder="Username">
						</div>
						<div class="form-group">
							<input type="text" id="email" class="form-control  form-control--contact" placeholder="Email">
						</div>
						<div class="form-group">
							<input type="text" id="subject" class="form-control  form-control--contact" placeholder="Password">
						</div>
						<button type="submit" class="btn  btn-primary">REGISTER</button>
					</form>
					<a data-toggle="modal" role="button" href="#loginModal" data-dismiss="modal">Already Registered?</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal login-->
	<div class="modal  fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content  center">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
					<h3><span class="light">Login</span> to Organique</h3>
					<hr class="divider">
				</div>
				<div class="modal-body">
					<form action="#" class="push-down-15">
						<div class="form-group">
							<input type="text" id="name" class="form-control  form-control--contact" placeholder="Username">
						</div>
						<div class="form-group">
							<input type="text" id="subject" class="form-control  form-control--contact" placeholder="Password">
						</div>
						<button type="submit" class="btn  btn-primary">SIGN IN</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col-xs-10  col-md-3">

					<div class="header-logo">
						<a href="index.html"><img alt="Logo" src="{{asset('dist/img/image.png')	}}" style="width:70px;height:70px;margin-top:10px;"></a>
					</div>
				</div>
				<div class="col-xs-2  visible-sm  visible-xs">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle  collapsed" data-toggle="collapse" data-target="#collapsible-navbar">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
				</div>
				<div class="col-xs-12  col-md-7">
					<nav class="navbar  navbar-default" role="navigation">
						<!-- Collect the nav links, forms, and other content for toggling -->
						
						<div class="collapse  navbar-collapse" id="collapsible-navbar">

							
							<ul class="nav  navbar-nav">
								<li class="dropdown">
									<a href="{{ url('/') }}" class="dropdown-toggle">HOME<b class="caret"></b></a>
								</li>
								<li class="dropdown">
									<a href="{{ url('/shop') }}" class="dropdown-toggle">SHOP<b class="caret"></b></a>									
								</li>
								<li class="dropdown">
									<a href="{{ url('/delivery') }}" class="dropdown-toggle">DELIVERY<b class="caret"></b></a>
								</li>
								<li class="dropdown">
									<a href="{{ url('/about') }}" class="dropdown-toggle">ABOUT<b class="caret"></b></a>
								</li>
								<li class="dropdown">
									<a href="{{ url('/contact') }}" class="dropdown-toggle">CONTACT<b class="caret"></b></a>
								</li>								
							</ul>
							
							<!-- search for mobile devices -->

						</div><!-- /.navbar-collapse -->
						
					</nav>
				</div>				
			</div>
		</div>

		<!--Search open pannel-->
		<div class="search-panel">
			<div class="container">
				<div class="row">
					<div class="col-sm-11">
						<form class="search-panel__form" action="search-results.html">
							<button type="submit"><span class="glyphicon  glyphicon-search"></span></button>
							<input type="text" name="s" class="form-control" placeholder="Enter your search keyword">
						</form>
					</div>
					<div class="col-sm-1">
						<div class="search-panel__close  pull-right">
							<a href="#" class="js--toggle-search-mode"><span class="glyphicon  glyphicon-circle  glyphicon-remove"></span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	@yield('content')

	<footer class="js--page-footer">
		<div class="footer-widgets">
			<div class="container">
				<div class="row">
					<div class="col-xs-12  col-sm-4">
						<div class="footer-widgets__navigation">
							<div class="footer-wdgets__heading--line">
								<h4 class="footer-widgets__heading">Follow us</h4>
							</div>
							<p class="push-down-15"> Adipiscing elit. Ut ullamcorper consectetur, non lacinia turpis suscipit non. Estibulum nu nc lacus, tincidunt non odio eu, scelerisque tristique quam.</p>
							<center>
								<a class="social-container" href="https://www.facebook.com/ProteusNet"><span class="zocial-facebook"></span></a>
								<a class="social-container" href="https://twitter.com/ProteusNetCom"><span class="zocial-twitter"></span></a>
							</center>
						</div>
					</div>
					<div class="col-xs-12  col-sm-4">
						<nav class="footer-widgets__navigation">
							<div class="footer-wdgets__heading--line">
								<h4 class="footer-widgets__heading">Navigation</h4>
							</div>

							<div class="col-sm-6">
								<ul class="nav nav-footer">
									<li><a href="{{ url('/') }}">Home</a></li>
									<li><a href="{{ url('/shop') }}">Shop</a></li>
									<li><a href="{{ url('/delivery') }}">Delivery</a></li>									
								</ul>
							</div>

							<div class="col-sm-4">
								<ul class="nav nav-footer">
									<li><a href="{{ url('/about') }}">About</a></li>
									<li><a href="{{ url('/contact') }}">Contact</a></li>									
								</ul>
							</div>
							
						</nav>
					</div>
					
					<div class="col-xs-12  col-sm-4">
						<div class="footer-widgets__navigation">
							<div class="footer-wdgets__heading--line">
								<h4 class="footer-widgets__heading">Contact Us</h4>
							</div>
							<a class="footer__link" href="#">Dar Doepyi</a><br>
							အမွတ္ ၆/၁၊ သံသုမာလမ္းမၾကီး၊<br>
							၂၄ရပ္ကြက္၊ သု၀ဏ<br>
							<a class="footer__link--small" href="{{ url('/contact') }}">View Google map <span class="glyphicon glyphicon-chevron-right glyphicon--footer-small"></span></a><br><br>
							<a class="footer__link" href="#"><span class="glyphicon glyphicon-earphone glyphicon--footer"></span> 09 44 800 8000</a><br>
							<a class="footer__link" href="#"><span class="glyphicon glyphicon-envelope glyphicon--footer"></span> info@dardoepyi.com</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer">
			<div class="container">
				<div class="row">
					<div class="col-xs-12  col-sm-6">
						<div class="footer__text--link">
							<a class="footer__link" href="#">© Copyright</a> "Dar Doepyi" 2017. All rights reserved. 
						</div>
					</div>
					<div class="col-xs-12  col-sm-6">
						<div class="footer__text">
							Created by <a class="footer__link" href="www.dardeopyi.com" target="_blank">Dar Doepyi</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<div class="search-mode__overlay"></div>


	<script type="text/javascript">
		function downloadJSAtOnload() {
			var element = document.createElement("script");
			element.src = "{{asset('js/main.js')}}";
			document.body.appendChild(element);
		}
		if (window.addEventListener)
			window.addEventListener("load", downloadJSAtOnload, false);
		else if (window.attachEvent)
			window.attachEvent("onload", downloadJSAtOnload);
		else window.onload = downloadJSAtOnload;
	</script>


	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-33538073-8', 'proteusthemes.com');
		ga('send', 'pageview');

	</script>

	@yield('footer-script')
</body>
</html>