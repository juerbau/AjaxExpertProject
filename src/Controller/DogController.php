<?php

namespace App\Controller;

use App\Model\DogRepository;

class DogController{
    public function __construct(protected DogRepository $dogRepository){}

    public function showAllDogs(): void {
        $dogs = $this->dogRepository->allDogs();
        $this->render('body', ['dogs' => $dogs]);
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