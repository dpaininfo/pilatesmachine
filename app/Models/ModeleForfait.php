<?php
    namespace App\Models;

    use CodeIgniter\Model;

    class ModeleForfait extends Model
    {
        protected $table = 'forfait frf';
        protected $primaryKey = 'NOFORFAIT';
        protected $useAutoIncrement = true;
        protected $returnType = 'object';
        protected $allowedFields = ['NOFORFAIT', 'LIBELLEFORFAIT', 'PRIX', 'DUREE', 'NBSEANCES', 'MACHINE', 'VISIO', 'SALLE'];
    }
?>