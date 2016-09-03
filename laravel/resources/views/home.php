<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo URL::to('ico/favicon.ico')?>">
    <title>Share it | Home</title>
    <!-- Bootstrap core CSS -->
    <?php echo URL::to('css/bootstrap.css')?>
    <link href="<?php echo URL::to('css/bootstrap.css')?>" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo URL::to('css/style.css')?>" rel="stylesheet">
    <link href="<?php echo URL::to('css/font-awesome.min.css')?>" rel="stylesheet">


    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- <script src="<?php //echo URL::to('js/modernizr.js') ?>"></script> -->
  </head>

  <body>

<?php $languages = App\Language::all(); ?>
    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo URL::to('/') ?>">SHARE IT</a>
        </div>
        <div class="navbar-collapse collapse navbar-right">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo URL::to('/') ?>">HOME</a></li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">LANGAGES <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <?php foreach($languages as $language):?>
                  <li><a href=""><?php echo $language->nom ?></a></li>
                <?php endforeach;?>
              </ul>
            </li>

            <!-- <li><a href="contact.html">CONTACT</a></li> -->

            <!-- <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">PAGES <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="blog.html">BLOG</a></li>
                <li><a href="single-post.html">SINGLE POST</a></li>
                <li><a href="portfolio.html">PORTFOLIO</a></li>
                <li><a href="single-project.html">SINGLE PROJECT</a></li>
              </ul>
            </li> -->

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

	<!-- *****************************************************************************************************************
	 HEADERWRAP
	 ***************************************************************************************************************** -->
	<div id="headerwrap">
	    <div class="container">
			     <div class="row">
				         <div class="col-lg-8 col-lg-offset-2">
                    <h3>Partagez vos idées</h3>
                    <h1>Share It</h1>
          					<h5>Grâce à Share It, vous pouvez partager vos méthodes, vos fonctions dans tous les langages de programmation</h5>
          					<h5>Aidez la communauté, la communauté vous aidera :)</h5>
				        </div>
	      <div class="col-lg-8 col-lg-offset-2 himg">
					<!-- <img src="<?php //echo URL::to('/img/code.jpg')?>" class="img-responsive">-->
          <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <img src="<?php echo URL::to('img/logo/php.png')?>" class="img-responsive">
            </div>

            <div class="item">
              <img src="<?php echo URL::to('img/logo/js.png')?>" class="img-responsive">
            </div>

            <div class="item">
              <img src="<?php echo URL::to('img/logo/java.png')?>" class="img-responsive">
            </div>

            <div class="item">
              <img src="<?php echo URL::to('img/logo/python.png')?>" class="img-responsive">
            </div>
          </div>
        </div>

				</div>
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /headerwrap -->
  <!-- *****************************************************************************************************************
   PORTFOLIO SECTION
   ***************************************************************************************************************** -->
<div id="portfoliowrap">
  <h3>DERNIERES FONCTIONS</h3>
  <div class="portfolio-centered">
    <div class="recentitems portfolio">
<?php
$found = DB::table('function')
                  ->leftJoin('function_code', 'function.idfunction','=','function_code.idfunction')
                  ->join('language', 'function.idlanguage','=','language.idlanguage')
                  ->leftjoin('customer', 'function_code.idcustomer','=', 'customer.idcustomer')
                  ->orderBy('date_code')
                  ->chunk(10, function($retrieved){
                    foreach($retrieved as $function){
                      //var_dump($function);
                      echo
                        '<div class="portfolio-item graphic-design">' .
                                '<div class="he-wrap tpl6">'.
                                '<img src="'. URL::to('img/logo/'.$function->logo) .'" alt="" >'.
                                  '<div class="he-view">'.
                                    '<div class="bg a0" data-animate="fadeIn">'.
                                        '<h3 class="a1" data-animate="fadeInDown">'.$function->title.'</h4></h3>'.
                                        '<h4> By '. $function->nickname.'</h1>';
if(isset($function->code_rating))  echo '<h5> Note : '.$function->code_rating.'</h5>';
                                   echo '<a href="" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-link"></i></a>'.
                            '</div><!-- he bg -->'.
                          '</div><!-- he view -->'.
                        '</div><!-- he wrap -->'.
                      '</div><!-- end col-12 -->';
                    }
                  });
?>
    </div><!-- portfolio -->
  </div><!-- portfolio container -->
</div><!--/Portfoliowrap -->




	<!-- *****************************************************************************************************************
	 SERVICE LOGOS
	 ***************************************************************************************************************** -->
	 <div id="service">
	 	<div class="container">
 			<div class="row centered">
 				<div class="col-md-4">
 					<i class="fa fa-flask"></i>
 					<h4>Brillante structure</h4>
 					<p>Nous avons choisi d'utiliser Laravel comme framework. Relativement simple d'utilisation, celui ci permet une architechture MVC aisée. Le tout couplé à une base de données PostgreSQL qui envoie de la patate</p>
 				</div>
        <div class="col-md-4">
 					<i class="fa fa-heart-o"></i>
 					<h4>Créé avec amour</h4>
 					<p>Notre site a été développé avec tout l'amour de Zwawou et Kubazou</p>
 				</div>
 				<div class="col-md-4">
          <i class="fa fa-trophy"></i>
          <h4>Un thème simple</h4>
 					<p>Grâce à un template bootstrap tweaké à volonté par nos soins, Share it dispose d'une interface sobre, claire et intuitive</p>
 				</div>
	 		</div>
	 	</div><! --/container -->
	 </div><! --/service -->


	<!-- *****************************************************************************************************************
	 MIDDLE CONTENT
	 ***************************************************************************************************************** -->

<!--	 <div class="container mtb">
	 	<div class="row">
	 		<div class="col-lg-4 col-lg-offset-1">
		 		<h4>More About Our Agency.</h4>
		 		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
 				<p><br/><a href="about.html" class="btn btn-theme">More Info</a></p>
	 		</div>

	 		<div class="col-lg-3">
	 			<h4>Frequently Asked</h4>
	 			<div class="hline"></div>
	 			<p><a href="#">How cool is this theme?</a></p>
	 			<p><a href="#">Need a nice good-looking site?</a></p>
	 			<p><a href="#">Is this theme retina ready?</a></p>
	 			<p><a href="#">Which version of Font Awesome uses?</a></p>
	 			<p><a href="#">Free support is integrated?</a></p>
	 		</div>

	 		<div class="col-lg-3">
	 			<h4>Latest Posts</h4>
	 			<div class="hline"></div>
	 			<p><a href="single-post.html">Our new site is live now.</a></p>
	 			<p><a href="single-post.html">Retina ready is not an option.</a></p>
	 			<p><a href="single-post.html">Bootstrap 3 framework is the best.</a></p>
	 			<p><a href="single-post.html">You need this theme, buy it now.</a></p>
	 			<p><a href="single-post.html">This theme is what you need.</a></p>
	 		</div>

	 	</div><! --/row -->
	<!-- </div><! --/container -->

	<!-- *****************************************************************************************************************
	 TESTIMONIALS
	 ***************************************************************************************************************** -->
	<!-- <div id="twrap">
	 	<div class="container centered">
	 		<div class="row">
	 			<div class="col-lg-8 col-lg-offset-2">
	 			<i class="fa fa-comment-o"></i>
	 			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
	 			<h4><br/>Marcel Newman</h4>
	 			<p>WEB DESIGNER - BLACKTIE.CO</p>
	 			</div>
	 		</div><! --/row -->
	 <!--	</div><! --/container -->
	<!-- </div><! --/twrap -->

	<!-- *****************************************************************************************************************
	 OUR CLIENTS
	 ***************************************************************************************************************** -->
	 <!--<div id="cwrap">
		 <div class="container">
		 	<div class="row centered">
			 	<h3>OUR CLIENTS</h3>
			 	<div class="col-lg-3 col-md-3 col-sm-3">
			 		<img src="<?php //echo URL::to('img/clients/client01.png')?>" class="img-responsive">
			 	</div>
			 	<div class="col-lg-3 col-md-3 col-sm-3">
			 		<img src="<?php //echo URL::to('img/clients/client02.png')?>" class="img-responsive">
			 	</div>
			 	<div class="col-lg-3 col-md-3 col-sm-3">
			 		<img src="<?php //echo URL::to('/img/clients/client03.png')?>" class="img-responsive">
			 	</div>
			 	<div class="col-lg-3 col-md-3 col-sm-3">
			 		<img src="<?php //echo URL::to('img/clients/client04.png')?>" class="img-responsive">
			 	</div>
		 	</div><! --/row -->
		<!-- </div><! --/container -->
	<!-- </div><! --/cwrap -->

	<!-- *****************************************************************************************************************
	 FOOTER
	 ***************************************************************************************************************** -->
	 <div id="footerwrap">
	 	<div class="container">
		 	<div class="row">
		 		<div class="col-lg-6">
		 			<h4>About</h4>
		 			<div class="hline-w"></div>
		 			<p>Nous sommes Louis Zwawiak et Maxime Kubasiak, deux étudiants en informatique de l'est de la France. Nous sommes actuellement dans un cursus MIAGE. Share It est notre premier site en collaboration :)</p>
		 		</div>
		 		<div class="col-lg-6">
		 			<h4>Social Links</h4>
		 			<div class="hline-w"></div>
		 			<p>
		 				<a href="#"><i class="fa fa-dribbble"></i></a>
		 				<a href="#"><i class="fa fa-facebook"></i></a>
		 				<a href="#"><i class="fa fa-twitter"></i></a>
		 				<a href="#"><i class="fa fa-instagram"></i></a>
		 				<a href="#"><i class="fa fa-tumblr"></i></a>
		 			</p>
		 		</div>
		 	</div><! --/row -->
	 	</div><! --/container -->
	 </div><! --/footerwrap -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="<?php echo URL::to('js/bootstrap.min.js')?>"></script>
<script src="<?php echo URL::to('js/retina-1.1.0.js')?>"></script>
<script src="<?php echo URL::to('js/jquery.hoverdir.js')?>"></script>
<script src="<?php echo URL::to('js/jquery.hoverex.min.js')?>"></script>
<script src="<?php echo URL::to('js/jquery.prettyPhoto.js')?>"></script>
<script src="<?php echo URL::to('js/jquery.isotope.min.js')?>"></script>
<script src="<?php echo URL::to('js/custom.js')?>"></script>


<script>
// Portfolio
(function($) {
	"use strict";
	var $container = $('.portfolio'),
		$items = $container.find('.portfolio-item'),
		portfolioLayout = 'fitRows';

		if( $container.hasClass('portfolio-centered') ) {
			portfolioLayout = 'masonry';
		}

		$container.isotope({
			filter: '*',
			animationEngine: 'best-available',
			layoutMode: portfolioLayout,
			animationOptions: {
			duration: 750,
			easing: 'linear',
			queue: false
		},
		masonry: {
		}
		}, refreshWaypoints());

		function refreshWaypoints() {
			setTimeout(function() {
			}, 1000);
		}

		$('nav.portfolio-filter ul a').on('click', function() {
				var selector = $(this).attr('data-filter');
				$container.isotope({ filter: selector }, refreshWaypoints());
				$('nav.portfolio-filter ul a').removeClass('active');
				$(this).addClass('active');
				return false;
		});

		function getColumnNumber() {
			var winWidth = $(window).width(),
			columnNumber = 1;

			if (winWidth > 1200) {
				columnNumber = 5;
			} else if (winWidth > 950) {
				columnNumber = 4;
			} else if (winWidth > 600) {
				columnNumber = 3;
			} else if (winWidth > 400) {
				columnNumber = 2;
			} else if (winWidth > 250) {
				columnNumber = 1;
			}
				return columnNumber;
			}

			function setColumns() {
				var winWidth = $(window).width(),
				columnNumber = getColumnNumber(),
				itemWidth = Math.floor(winWidth / columnNumber);

				$container.find('.portfolio-item').each(function() {
					$(this).css( {
					width : itemWidth + 'px'
				});
			});
		}

		function setPortfolio() {
			setColumns();
			$container.isotope('reLayout');
		}

		$container.imagesLoaded(function () {
			setPortfolio();
		});

		$(window).on('resize', function () {
		setPortfolio();
	});
})(jQuery);
</script>
<script type="text/javascript">
  jQuery(document).ready(function(){
    jQuery("#myCarousel").carousel ({
      interval : 4000
    });
  });
</script>

  </body>
</html>
