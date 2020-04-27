
<header id="navbar-spy" class="header header-1">
		<div class="top-bar">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-5">
						<ul class="list-inline top-contact">
							<li><span>Phone :</span> +2348062352450</li>
						</ul>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-7">
						<ul class="list-inline pull-right top-links">
							
							<li>
								<a href="cart.php">Checkout</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- .row end -->
			</div>
			<!-- .container end -->
		</div>
		<!-- .top-bar end -->
		<nav id="primary-menu" class="navbar navbar-fixed-top">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="logo" href="index.php">
					<img src="assets/images/logo/New logo.png" alt="Woodshop" width="140px" height="60px">
					</a>
				</div>
				
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse pull-right" id="header-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-left">
						<li class="<?php if($pagetitle == 'Home'){echo 'active';} ?>">
							<a href="index.php">Home</a>
						</li>
						<li class="<?php if($pagetitle == 'Shop'){echo 'active';} ?>">
							<a href="shop.php">Shop</a>
						</li>
						<li class="<?php if($pagetitle == 'About Us'){echo 'active';} ?>">
							<a href="about_us.php">about</a>
						</li>
						<li class="<?php if($pagetitle == 'Contact'){echo 'active';} ?>">
							<a href="contact.php">Contact</a>
						</li>
						
				
					<!-- Mod-->
					<div class="module module-search pull-left">
						
						<div class="search-box">
							<form class="search-form">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Type Your Search Words">
									<span class="input-group-btn">
									<button class="btn" type="button"><i class="fa fa-search"></i></button>
									</span>
								</div>
								<!-- /input-group -->
							</form>
						</div>
					</div>
					<!-- .module-search-->
					<!-- .module-cart -->
					<div class="module module-cart pull-left">

					<div id="cart_view"></div>
					<!-- .module-cart end -->
					</div>
				</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-fluid -->
		</nav>
	</header>