<?php
namespace Apps\Controllers;


use Apps\Models\Telephone;
use League\Plates\Engine;

class TelephoneController {
    private $telephone;
    private $templates;

    public function __construct() {
        $this->telephone = new Telephone();
        $this->templates = new Engine(__DIR__ . '/../Views');
    }

    public function index() {
        echo $this->templates->render('telephone/index', ['items' => $this->telephone->getAll()]);
    }

    public function storePhone(mixed $request, callable $redirectTo): void {
        if ($request->method === "POST") {
            $nama = trim($_POST['nama'] ?? '');
            $telepon = trim($_POST['telepon'] ?? '');
    
            if ($nama === '' || $telepon === '') {
                echo $this->templates->render('Telephone/404');
            } else {
                $this->telephone->create($nama, $telepon);
            $redirectTo();
            }
        }
    }
    
    
    public function deletePhone(string $id): void {
        $this->telephone->delete($id);
        header("Location: index.php");
        exit;
    }
    
}
