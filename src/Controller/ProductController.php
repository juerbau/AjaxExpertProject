<?php

namespace App\Controller;

use App\Model\ProductRepository;

class ProductController{
    public function __construct(protected ProductRepository $productRepository){}

    public function showAllProducts(): void {
        $products = $this->productRepository->allProducts();
        $this->render('body', ['products' => $products]);
    }

    public function render(string $path, array $data): void {
        //ob_start();
        extract($data);
        //require __DIR__ . '/../../views/' . $path . '.view.php';
        // $content = ob_get_contents();
        //ob_end_clean();
        require __DIR__ . '/../../views/main.view.php';


    }

}