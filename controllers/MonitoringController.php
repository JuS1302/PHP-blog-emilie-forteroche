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

            $view = new View("admin_monitoring");
            $view->render("admin_monitoring", [
                "articles" => $articles
            ]);
    }
}
