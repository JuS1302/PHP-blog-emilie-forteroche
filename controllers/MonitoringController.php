<?php
/**
 * Contrôleur de la partie admin monitoring
 */

class MonitoringController {

  public function showMonitoring()
  {
    Utils::checkIfUserIsConnected();

    $articleManager = new ArticleManager();
    $articles = $articleManager->getAllArticlesWithStats();

    $sortBy = new SortArticles();
    $sortArticles = $sortBy->sortArticles($articles);

    $view = new View("adminMonitoring");
    $view->render("adminMonitoring", [
        "articles" =>  $sortArticles['articles'],
        "sort" => $sortArticles['sort'],
        "order" => $sortArticles['order']
    ]);
  }
}
