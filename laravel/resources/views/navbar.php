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
                <li class="active"><a href="<?php echo URL::to('/') ?>"><?php echo trans('hometrans.pageaccueil') ?></a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo trans('hometrans.langages') ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <?php foreach($languages as $language):?>
                            <li><a href="<?php echo URL::to('language') . '?lang='. $language->nom ?>"><?php echo $language->nom ?></a></li>
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