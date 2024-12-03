<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Home extends BaseController
{
    protected $db;

    
    public function prueba()
    {

        $this->db = \Config\Database::connect();
        
        $query_clientes = $this->db->query('SELECT nombre, apellido, email FROM clientes LIMIT 3');
        $clientes = $query_clientes->getResultArray();

       
        $query_pedidos = $this->db->query('SELECT id_pedido, fecha_pedido, total FROM pedidos LIMIT 3');
        $pedidos = $query_pedidos->getResultArray();

           
        // Devolver los datos en formato JSON
        $resultados = [
            'Clientes' => $clientes,
            'Pedidos' => $pedidos
        ];
        return $this->response->setJSON($resultados);        
    }
}
