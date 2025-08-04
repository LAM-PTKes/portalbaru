

<head>
  <title>Thank You</title>

  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('web/logo-lam-214.png') }}">
  <style type="text/css" media="screen">
  	body {
	    font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif;
	    font-size: 1rem;
	    line-height: 1.5;
	    color: #373a3c;
	    background-color: #fff;
	}

	.jumbotron {
	    padding: 2rem 1rem;
	    margin-bottom: 2rem;
	    background-color: #eceeef;
	    border-radius: .3rem;
	}

	.text-xs-center {
	    text-align: center!important;
	}

	.lead {
	    font-size: 1rem;
	    font-weight: 300;
	}

	p {
	    margin-top: 0;
	    margin-bottom: 1rem;
	}
  	.myButton {
		box-shadow:inset 0px 1px 0px 0px #97c4fe;
		background:linear-gradient(to bottom, #3d94f6 5%, #1e62d0 100%);
		background-color:#3d94f6;
		border-radius:6px;
		border:1px solid #337fed;
		display:inline-block;
		cursor:pointer;
		color:#ffffff;
		font-family:Arial;
		font-size:15px;
		font-weight:bold;
		padding:6px 24px;
		text-decoration:none;
		text-shadow:0px 1px 0px #1570cd;
	}
	.myButton:hover {
		background:linear-gradient(to bottom, #1e62d0 5%, #3d94f6 100%);
		background-color:#1e62d0;
	}
	.myButton:active {
		position:relative;
		top:1px;
	}
  </style>


</head>

<body>

  <div class="jumbotron text-xs-center">
  <h3 class="display-3">{{ $subject }}</h3>
  <br><br>
  <p class="lead"><strong>Hi! Sekretriat LAM-PTKes</strong>
  
  
  	{{ $nama }} Mengirim Saran Di Web Portal LAM-PTKes Mohon Cek Di <a href="https://lamptkes.org/admin/saran" title=""><strong>https://lamptkes.org/admin/saran</strong></a> <br>
  	Terima Kasih <br> 
  </p>
  	<a href="{{ route('saran') }}" class="myButton" style="color: white;">Klik Disini</a>
	<br>
  <hr>
  <p>
   No-Reply Notifications WebApp Portal LAM-PTKes<br>admin@lamptkes.org<br>
  </p>
</div>

</body>

</html>
