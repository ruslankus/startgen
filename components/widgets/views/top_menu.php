<div class="top-nav">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">

                <?php foreach ($menu_with_links as $item):

                    $trl = array_shift($item['trl']);
                    $trl_content = !empty($trl['menu_text']) ? $trl['menu_text'] : "!_" . $item['label'];
                ?>

                    <li class="home">
                        <a href="<?= $item['href']?>">
                            <?= $trl_content ?>
                        </a>
                    </li>

                <?php endforeach;?>
            </ul>
        </div>
    </div>
</div>