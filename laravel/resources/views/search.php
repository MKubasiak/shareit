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
        <?php include 'sidebar.php' ?>
    </div><! --/container -->
</div>
       <?php include 'footer.php' ?>
       <?php include 'scripts.php' ?>

</body>
</html>
