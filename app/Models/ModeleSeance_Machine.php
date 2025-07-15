<?php
    namespace App\Models;

    use CodeIgniter\Model;
    use \Datetime;

    class ModeleSeance_Machine extends Model
    {
        protected $table = 'seance_machine scm';
        protected $useAutoIncrement = false;
        protected $returnType = 'object';
        protected $allowedFields = ['NOJOUR', 'HEUREDEBUTSEANCE']; 

        public function SeanceExistante($nojour = null, $heure = null)
        {
            $condition = ['NOJOUR'=>$nojour];

            return $this
            ->select('NOJOUR, HEUREDEBUTSEANCE')
            ->where($condition)
            ->like('HEUREDEBUTSEANCE', $heure)
            ->first();
        }
    }
?>