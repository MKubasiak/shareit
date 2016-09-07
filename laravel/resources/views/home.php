<!DOCTYPE html>
<html lang="fr">
  <head>
	  <?php include 'header.php' ?>;
	  <title>Share it | <?php echo trans('hometrans.pageaccueil') ?></title>
  </head>

  <body>

  <!-- *****************************************************************************************************************
	 NAVBAR
	 ***************************************************************************************************************** -->
  <?php include 'navbar.php' ?>

	<!-- *****************************************************************************************************************
	 HEADERWRAP
	 ***************************************************************************************************************** -->
  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	  <ol class="carousel-indicators">
		  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		  <li data-target="#carousel-example-generic" data-slide-to="1"></li>
		  <!-- <li data-target="#carousel-example-generic" data-slide-to="2"></li> -->
	  </ol>

	  <div class="carousel-inner" role="listbox">
		  <div class="item active">
			  <img src="img/carousel/wall1.png" alt="First slide">
			  <div class="container">
				  <div class="carousel-caption">
					  <h1>Share It</h1>
              <h3><?php echo trans('hometrans.slogan') ?></h3>
					  <br>
				  </div>
			  </div>
		  </div>
		  <div class="item">
			  <img src="img/carousel/wall2.png" alt="Second slide">
			  <div class="container">
				  <div class="carousel-caption">
					  <br>
            <h3><?php echo trans('hometrans.description2') ?></h3>
					  <h4><?php echo trans('hometrans.description1') ?></h4>
				  </div>
			  </div>
		  </div>
	  </div>

	  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		  <span class="icon-prev" aria-hidden="true"></span>
		  <span class="sr-only">Previous</span>
	  </a>

	  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		  <span class="icon-next" aria-hidden="true"></span>
		  <span class="sr-only">Next</span>
	  </a>
  </div>

  <!-- *****************************************************************************************************************
   PORTFOLIO SECTION
   ***************************************************************************************************************** -->
<div id="portfoliowrap">
  <h3><?php echo trans('hometrans.titrederfunc') ?></h3>
		<div class="portfolio-centered">
		<div class="recentitems portfolio">
<?php

$functions = App\FunctionBase::getFunctions(10);
foreach($functions as $function){
  //var_dump($function);
  echo
    '<div class="portfolio-item graphic-design">' .
            '<div class="he-wrap tpl6">'.
            '<img src="'. URL::to('img/logo/'.$function->logo) .'" alt="" >'.
              '<div class="he-view">'.
                '<div class="bg a0" data-animate="fadeIn">'.
                    '<h3 class="a1" data-animate="fadeInDown">'.$function->title.'</h3>'.
                    '<h4>'. trans('hometrans.creerpar') . $function->nickname.'</h1>';
               echo '<a href="'.URL::to('/function').'?post='.$function->idfunction.'" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-link"></i></a>'.
        '</div><!-- he bg -->'.
      '</div><!-- he view -->'.
    '</div><!-- he wrap -->'.
  '</div><!-- end col-12 -->';
}


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
 					<h4><?php echo trans('hometrans.titrepara1') ?></h4>
 					<p><?php echo trans('hometrans.contenupara1') ?></p>
 				</div>
        <div class="col-md-4">
 					<i class="fa fa-heart-o"></i>
 					<h4><?php echo trans('hometrans.titrepara2') ?></h4>
 					<p><?php echo trans('hometrans.contenupara2') ?></p>
 				</div>
 				<div class="col-md-4">
   			       <i class="fa fa-trophy"></i>
       			   <h4><?php echo trans('hometrans.titrepara3') ?></h4>
					<p><?php echo trans('hometrans.contenupara3') ?></p>
 				</div>
	 		</div>
	 	</div><! --/container -->
	 </div><! --/service -->

<?php include 'footer.php' ?>
<?php include 'scripts.php' ?>

  </body>
</html>
