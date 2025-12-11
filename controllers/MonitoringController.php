<?php
/**
 * Contrôleur de la partie admin monitoring
 */

class MonitoringController {

  public function showMonitoring()
  {
    Utils::checkIfUserIsConnected();

    // récupérer les paramètres de tri depuis l'URL

    if (isset($_GET['sort'])) {
      $sort = $_GET['sort'];  // Si le paramètre existe dans l'URL
    } else {
      $sort = 'date';         // Sinon, valeur par défaut
    }

    if (isset($_GET['order'])) {
      $order = $_GET['order'];
    } else {
      $order = 'desc';
    }

    $articleManager = new ArticleManager();
    $articles = $articleManager->getAllArticlesWithStats();

    // fonction usort du tableau d'articles
    // fonction anonyme pour comparer 2 articles
    // on appelle sort et order
    usort($articles, function($article1, $article2) use ($sort, $order) {
        $valueA = null;
        $valueB = null;

        // récupérer les valeurs à comparer selon la colonne
        switch($sort) {
            // if($sort == 'title')
            case 'title':
                $valueA = $article1->getTitle();
                $valueB = $article2->getTitle();
                break;
            // if($sort == 'views')
            case 'views':
                $valueA = $article1->getViews();
                $valueB = $article2->getViews();
                break;
            // if($sort == 'comments')
            case 'comments':
                $valueA = $article1->getCommentCount();
                $valueB = $article2->getCommentCount();
                break;
            // if($sort == 'date')
            case 'date':
            default:
                $valueA = $article1->getDateCreation()->getTimestamp();
                $valueB = $article2->getDateCreation()->getTimestamp();
                break;
        }

        // on compare les valeurs
        if ($valueA == $valueB) {
            return 0;
        }

        // ordre croissant ou décroissant
        if ($order == 'asc') {
            return ($valueA < $valueB) ? -1 : 1;
        } else {
            return ($valueA > $valueB) ? -1 : 1;
        }
    });

    $view = new View("adminMonitoring");
    $view->render("adminMonitoring", [
        "articles" => $articles,
        "sort" => $sort,
        "order" => $order
    ]);
  }
}
