<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.php' ?>;
    <title>Share It | Langage</title>
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
