<?php
    namespace App\Models;

    use CodeIgniter\Model;

    class ModeleParametres extends Model
    {
        protected $table = 'parametres';
        protected $returnType = 'object';
        protected $allowedFields = ['NBMACHINES', 'NBADHERENTSMACHINE'];
    }
?>