<! -- SIDEBAR -->
<div class="col-lg-4">

  <h4>Categories</h4>
  <div class="hline"></div>
    <?php
      foreach(App\Language::all() as $language){
        echo
        '<p><a href="'.URL::to('search') . '?lang='. $language->nom.'&words="><i class="fa fa-angle-right"></i>'.$language->nom.'</a></p>';

      }
    ?>
  <div class="spacing"></div>


  <h4>Ajouts récents</h4>
  <div class="hline"></div>
    <ul class="popular-posts">
      <?php
      $functions = App\FunctionBase::getFunctions(4);
      foreach($functions as $function){
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
        '</div><!-- end col-12 -->';            }

      ?>
     </ul>
  <div class="spacing"></div>
