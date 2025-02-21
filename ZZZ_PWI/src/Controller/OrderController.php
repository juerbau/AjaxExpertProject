<?php

namespace App\Controller;

use App\Orders\OrderRepository;

class OrderController
{
    public function __construct(protected OrderRepository $orderRepository){}

    public function showAllOrders(){

            $allOrders = $this->orderRepository->allOrders();

            /*if (empty($page)){
                return $this->showError404();
            }*/

            $this->render('pages/show.allOrders', ['allOrders' => $allOrders]);
    }

    public function showOrderByID($id){
        if ($id != 0){
            $orderByID = $this->orderRepository->orderByID($id);
        }
        else{
            $orderByID = 0;
        }
        $edl = $this->orderRepository->allEDL();
        $this->render('pages/show.orderByID', ['orderByID' => $orderByID], ['edl' => $edl]);
    }


    protected function render(string $path, array $data, array $extend =[]) {
        ob_start();
        extract($extend);
        extract($data);
        require __DIR__ . '/../../views/frontend/' . $path . '.view.php';
        $content = ob_get_contents();
        ob_end_clean();

        //$navigation = $this->pagesRepository->getNavigation();
        // var_dump($navigation);
        // die();
        //$arr = ['Katz', 'Hund'];

        require __DIR__ . '/../../views/frontend/layouts/main.view.php';
    }
}