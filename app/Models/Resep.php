<?php 
 
namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\ProductModel;
 
class Resep extends Controller
{
 
    public function __construct() {
 
        // Mendeklarasikan class ProductModel menggunakan $this->product
        $this->product = new ResepModel();
        /* Catatan:
        Apa yang ada di dalam function construct ini nantinya bisa digunakan
        pada function di dalam class Product 
        */
    }
 
    public function index()
    {
        $data['resep'] = $this->resep->getResep();
        echo view('product/index', $data);
    } 
}
