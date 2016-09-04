<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo URL::to('ico/favicon.ico')?>">

    <title>Share It | Langage</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo URL::to('css/bootstrap.css')?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo URL::to('css/style.css')?>" rel="stylesheet">
    <link href="<?php echo URL::to('css/font-awesome.min.css')?>" rel="stylesheet">


    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="<?php echo URL::to('js/modernizr.js')?>"></script>
</head>

<body>

<?php
    $currentLang =  Request::input('lang');
    $currentWords = Request::input('words');
?>
<!-- *****************************************************************************************************************
NAVBAR
***************************************************************************************************************** -->

<?php include 'navbar.php' ?>
<!-- *****************************************************************************************************************
 BLUE WRAP
 ***************************************************************************************************************** -->
<div id="blue">
    <div class="container">
        <div class="row">
            <?php
            $trouve = false;
            foreach(App\Language::all() as $lang){
                if(strcmp(strtolower($lang->nom),strtolower($currentLang)) == 0){
                    $trouve = true;
                    break;
                }
            }
            if($trouve){
                echo '<h3>Fonctions ' . $currentLang . ' pour : ' . $currentWords . '</h3>';
            }else{
                echo '<h3> Toutes fonctions pour : ' . $currentWords . '</h3>';
            }
            ?>
        </div><!-- /row -->
    </div> <!-- /container -->
</div><!-- /blue -->
<!-- *****************************************************************************************************************
 BLOG CONTENT
 ***************************************************************************************************************** -->

<div class="container mtb">
    <div class="row">
        <div class="col-lg-8">
            <! -- BLOG POSTS LIST -->

            <?php

            if($trouve){
                $functions = DB::table('function')->select('function.idfunction', 'function.title', 'function.date_creation', 'customer.nickname', 'function.description')->
                join('language','function.idlanguage','=','language.idlanguage')->
                join('customer','function.idcustomer','=','customer.idcustomer')->
                where('language.nom',$currentLang)->
                where('function.title','LIKE','%'.$currentWords.'%')->
                get();
            }else{
                $functions = DB::table('function')->select('function.idfunction', 'function.title', 'function.date_creation', 'customer.nickname', 'function.description')->
                join('language','function.idlanguage','=','language.idlanguage')->
                join('customer','function.idcustomer','=','customer.idcustomer')->
                where('function.title','LIKE','%'.$currentWords.'%')->
                get();
            }


            if(empty($functions)){
                echo 'Désolé, il n\'y a pas encore de fonctions correspondantes :(';
            }else{
                foreach($functions as $function){
                    echo
                        '<a href="'.URL::to('/function').'?post='.$function->idfunction.'"><h3 class="ctitle">'.$function->title.'</h3></a>'.
                        '<p><csmall>Posté : '.$function->date_creation.'</csmall> | <csmall2>By:'. $function->nickname.'</csmall2></p>'.
                        '<p>'.$function->description.'</p>'.
                        '<div class="hline"></div>'.

                        '<div class="spacing"></div>';
                }
            } ?>
        </div>
        <! -- SIDEBAR -->
        <div class="col-lg-4">
            <h4>Search</h4>
            <div class="hline"></div>
            <p>
                <br/>
                <input type="text" class="form-control" placeholder="Search something">
            </p>

            <div class="spacing"></div>
            <h4>Categories</h4>
            <div class="hline"></div>
            <?php
            foreach(App\Language::all() as $language){
                echo
                    '<p><a href="'.URL::to('language') . '?lang='. $language->nom.'"><i class="fa fa-angle-right"></i>'.$language->nom.'</a></p>';

            }
            ?>
            <div class="spacing"></div>


            <h4>Ajouts récents</h4>
            <div class="hline"></div>
            <ul class="popular-posts">
                <?php
                $functions = DB::table('function')->select('idfunction','logo','title','nickname','function.date_creation')->
                join('language','function.idlanguage','=','language.idlanguage')->
                join('customer','function.idcustomer','=','customer.idcustomer')->
                orderby('function.idfunction')->
                take(4)->
                get();

                foreach($functions as $function){
                    echo
                        '<li>'.
                        '<a href="'.URL::to('/function').'?post='.$function->idfunction.'"><img src="'.URL::to('img/logo/'.$function->logo).'" alt="Popular Post"></a>'.
                        '<p><a href="'.URL::to('/function').'?post='.$function->idfunction.'">'.$function->title.'</a></p>'.
                        '<em>Ajouté le :'.$function->date_creation.'</em>'.
                        '</li>';
                }

                ?>
            </ul>
            <div class="spacing"></div>

            <!--		 		<h4>Popular Tags</h4>
                             <div class="hline"></div>
                                 <p>
                                    <a class="btn btn-theme" href="#" role="button">Design</a>
                                    <a class="btn btn-theme" href="#" role="button">Wordpress</a>
                                    <a class="btn btn-theme" href="#" role="button">Flat</a>
                                    <a class="btn btn-theme" href="#" role="button">Modern</a>
                                    <a class="btn btn-theme" href="#" role="button">Wallpaper</a>
                                    <a class="btn btn-theme" href="#" role="button">HTML5</a>
                                    <a class="btn btn-theme" href="#" role="button">Pre-processor</a>
                                    <a class="btn btn-theme" href="#" role="button">Developer</a>
                                    <a class="btn btn-theme" href="#" role="button">Windows</a>
                                    <a class="btn btn-theme" href="#" role="button">Phothosop</a>
                                    <a class="btn btn-theme" href="#" role="button">UX</a>
                                    <a class="btn btn-theme" href="#" role="button">Interface</a>
                                    <a class="btn btn-theme" href="#" role="button">UI</a>
                                    <a class="btn btn-theme" href="#" role="button">Blog</a>
                                 </p>
                         </div><!-->
        </div><! --/row -->
    </div><! --/container -->


    <!-- *****************************************************************************************************************
     FOOTER
     ***************************************************************************************************************** -->
    <div id="footerwrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h4><?php echo trans('hometrans.apropos') ?></h4>
                    <div class="hline-w"></div>
                    <p><?php echo trans('hometrans.contenuapropos') ?></p>
                </div>
                <div class="col-lg-6">
                    <h4><?php echo trans('hometrans.reseaux') ?></h4>
                    <div class="hline-w"></div>
                    <p>
                        <!--<a href="#"><i class="fa fa-dribbble"></i></a>-->
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <!--<a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-tumblr"></i></a>-->
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


</body>
</html>
