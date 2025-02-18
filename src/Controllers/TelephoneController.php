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

    // halaman utama
    public function index() {
        echo $this->templates->render('telephone/index', ['items' => $this->telephone->getAll()]);
    }

    // simpan data
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

    // hapus data
    public function editPhone(mixed $request, callable $redirectTo): void {
        if ($request->method === "POST") {
            $id = $_POST['id'];
            $nama = $_POST['nama'];
            $telepon = $_POST['telepon'];
            $this->telephone->edit($id, $nama, $telepon);
            $redirectTo();
        }
    }
    
    // hapus data
    public function deletePhone(mixed $request, callable $redirectTo): void {
        if ($request->method === "POST") {
            $id = $_POST['id'];
            $this->telephone->delete($id);
            $redirectTo();
        }
    }
    
}
