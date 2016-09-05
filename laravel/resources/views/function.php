<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo URL::to('ico/favicon.ico')?>">

    <title>Share It | Post</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo URL::to('css/bootstrap.css')?>" rel="stylesheet">
    <!-- Custom styles for this template -->

    <link href="<?php echo URL::to('css/style.css')?>" rel="stylesheet">
    <link href="<?php echo URL::to('css/font-awesome.min.css')?>" rel="stylesheet">


    <!-- Just for debugging purposes. Don't actually copy this line! -->

    <!--[if lt IE 9]><script src="../../<?php ?>//echo URL::to('js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="<?php echo URL::to('js/modernizr.js')?>"></script>
  </head>

  <body>

    <?php include 'navbar.php' ?>

    <?php $id= Request::input('post') ?>

    <?php
    $function = DB::table('function')->select('*')->
                                        join('language','function.idlanguage','=','language.idlanguage')->
                                        join('customer','function.idcustomer','=','customer.idcustomer')->
                                        join('function_code', 'function.idfunction','=', 'function_code.idfunction')->
                                        where('function.idfunction',$id)->
                                        get();
     ?>
	<!-- *****************************************************************************************************************
	 BLUE WRAP
	 ***************************************************************************************************************** -->
	<div id="blue">
	    <div class="container">
			<div class="row">
				<h3>Fonction <?php echo $function[0]->nom ?></h3>
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /blue -->

	<!-- *****************************************************************************************************************
	 BLOG CONTENT
	 ***************************************************************************************************************** -->

	 <div class="container mtb">
	 	<div class="row">
      <?php var_dump($function)?>
	 		<! -- SINGLE POST -->
	 		<div class="col-lg-8">
	 			<! -- Blog Post 1 -->
		 		<p><img class="img-responsive" src="<?php echo URL::to('img/post01.jpg')?>"></p>
		 		<h3 class="ctitle"><?php echo $function[0]->title ?></h3>
		 		<p><csmall>Posted: April 25, 2014.</csmall> | <csmall2>By: Admin - 3 Comments</csmall2></p>
		 		<p><b>Lorem Ipsum</b> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
		 		<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
		 		<p>Contrary to popular belief, <b>Lorem Ipsum is not simply random text</b>. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at <a href="#">Hampden-Sydney College</a> in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>
		 		<p>Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
		 		<h4>Why do we use it?</h4>
		 		<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
		 		<blockquote>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</blockquote>
		 		<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
		 		<div class="spacing"></div>
		 		<h6>SHARE:</h6>
		 		<p class="share">
		 			<a href="#"><i class="fa fa-twitter"></i></a>
		 			<a href="#"><i class="fa fa-facebook"></i></a>
		 			<a href="#"><i class="fa fa-tumblr"></i></a>
		 			<a href="#"><i class="fa fa-google-plus"></i></a>
		 		</p>

			</div><! --/col-lg-8 -->


	 		<! -- SIDEBAR -->
	 		<?php include 'sidebar.php' ?>
   <?php include 'footer.php' ?>
   <?php include 'scripts.php' ?>

  </body>
</html>
