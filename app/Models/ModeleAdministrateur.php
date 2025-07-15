<?php
    namespace App\Models;

    use CodeIgniter\Model;

    class ModeleAdministrateur extends Model
    {
        protected $table = 'administrateur adm';
        protected $useAutoIncrement = false;
        protected $returnType = 'object';
        protected $allowedFields = ['EMAILADMIN', 'MDPADMIN'];
    }
?>