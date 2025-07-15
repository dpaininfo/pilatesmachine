<?php
    namespace App\Models;

    use CodeIgniter\Model;

    class ModeleAdherent extends Model
    {
        protected $table = 'adherent';
        protected $primaryKey = 'NOADHERENT';
        protected $useAutoIncrement = true;
        protected $returnType = 'object';
        protected $allowedFields = ['EMAILADHERENT', 'MDPADHERENT', 'NOM', 'PRENOM', 'DATENAISSANCE', 'ADRESSE', 'CODEPOSTAL', 'VILLE', 'TEL', 'MDPMODIFIE'];

        public function GetIdParNom($adherent = null)
        {
            $info = explode(" ", $adherent);

            if (count($info) <= 1)
            {
                return null;
            }

            $condition = ['PRENOM' => $info[0]];

            return $this
            ->select('NOADHERENT')
            ->where($condition)
            ->like('NOM', $info[1])
            ->first();

            // SELECT ('NOADHERENT')
            // WHERE 'PRENOM' = $info n°1 and 'NOM' = $info n°2
            // LIMIT 1
        }
    }
?>