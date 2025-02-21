<?php

namespace App\Controller;

use Grundlagen\cms\src\Controller\AbstractController;
use Grundlagen\cms\src\Pages\PagesRepository;

class NotFoundController extends AbstractController {

    public function __construct(PagesRepository $pagesRepository) {
        parent::__construct($pagesRepository);
    }

    public function error404() {
        return $this->showError404();
    }
}