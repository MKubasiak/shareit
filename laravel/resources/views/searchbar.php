
<div class="input-group">
    <div class="input-group-btn search-panel">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            <span id="search_concept">Langage</span> <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" role="menu">
            <?php
            foreach(App\Language::all() as $language){
                echo '<li><a onclick="changer(\'' . $language->nom .'\')"> '.$language->nom .' </a></li>';
            }
            ?>
            <li class="divider"></li>
            <li><a href="">Tous</a></li>
        </ul>
    </div>
    <input type="hidden" name="search_param" value="all" id="search_param">
    <input id="searchbar" type="text" class="form-control" name="x" placeholder="Recherche...">
    <span class="input-group-btn">
        <button  class="btn btn-default" type="button" onclick="redirect('<?php echo URL::to('search')?>')">
            <span class="glyphicon glyphicon-search"></span>
        </button>
    </span>
</div>


<script type="text/javascript">

    var langactu = "null";

    function changer(text){
        langactu = text;
        document.getElementById('search_concept').innerHTML = text;
    }

    function redirect(url){
        var contenu = document.getElementById('searchbar').value;
        window.location.href = url + "?lang=" + langactu + "&words=" + contenu;
    }

</script>
