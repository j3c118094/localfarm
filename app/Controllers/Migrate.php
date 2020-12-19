<?php namespace App\Controllers;

class Migrate extends \CodeIgniter\Controller
{

        public function index()
        {
                $migrate = \Config\Services::migrations();

                try
                {
                        $migrate->latest();
                        echo "Migrasi database sukses";
                }
                catch (\Throwable $e)
                {
                        echo "Migrasi database gagal";
                }
        }

}