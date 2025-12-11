<div class="adminHeader">
    <h2>Monitoring des articles</h2>

    <a class="monitoringButton" href="index.php?action=admin">
        Retour
    </a>
</div>

<div class="adminArticle adminMonitoring">

    <!-- Ligne d'en-tête avec liens de tri -->
    <div class="articleLine headerLine">
        <div class="title">
          <!-- partie dynamique du lien : si sort = title et order = asc alors on inverse l'ordre  -->
            <a href="index.php?action=monitoring&sort=title&order=<?

              if($sort == 'title' && $order == 'asc'){
                echo 'desc';
              } else {
                echo 'asc';
              }

             ?>">
                Titre
                <?php if ($sort == 'title') { ?>
                    <?= $order == 'asc' ? '▲' : '▼' ?>
                <?php } else { ?>
                    ▲▼
                <?php } ?>
            </a>
        </div>
        <div class="content">
            <a href="index.php?action=monitoring&sort=views&order=<?

            ($sort == 'views' && $order == 'asc') ? 'desc' : 'asc'

            ?>">
                Vues
                <?php if ($sort == 'views') { ?>
                    <?= $order == 'asc' ? '▲' : '▼' ?>
                <?php } else { ?>
                    ▲▼
                <?php } ?>
            </a>
        </div>
        <div class="content">
            <a href="index.php?action=monitoring&sort=comments&order=<?= ($sort == 'comments' && $order == 'asc') ? 'desc' : 'asc' ?>">
                Commentaires
                <?php if ($sort == 'comments') { ?>
                    <?= $order == 'asc' ? '▲' : '▼' ?>
                <?php } else { ?>
                    ▲▼
                <?php } ?>
            </a>
        </div>
        <div class="content">
            <a href="index.php?action=monitoring&sort=date&order=<?= ($sort == 'date' && $order == 'asc') ? 'desc' : 'asc' ?>">
                Date
                <?php if ($sort == 'date') { ?>
                    <?= $order == 'asc' ? '▲' : '▼' ?>
                <?php } else { ?>
                    ▲▼
                <?php } ?>
            </a>
        </div>
    </div>

    <!-- Lignes du tableau -->
    <?php foreach ($articles as $article) { ?>
        <div class="articleLine">
            <div class="title"><?= htmlspecialchars($article->getTitle()) ?></div>
            <div class="content"><?= $article->getViews() ?></div>
            <div class="content"><?= $article->getCommentCount() ?></div>
            <div class="content"><?= $article->getDateCreation()?->format("d/m/Y") ?></div>
        </div>
    <?php } ?>

</div>
