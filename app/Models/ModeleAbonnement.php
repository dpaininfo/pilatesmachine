<?php
    namespace App\Models;

    use CodeIgniter\Model;
    use \Datetime;

    class ModeleAbonnement extends Model
    {
        protected $table = 'abonnement abn';
        protected $primaryKey = 'NOABONNEMENT';
        protected $useAutoIncrement = true;
        protected $returnType = 'object';
        protected $allowedFields = ['DATEDEBUT', 'NBSEANCESRESTANTES', 'NOFORFAIT', 'NOADHERENT', 'JOURSADDITIONNELS'];

        public function GetInfoAbonnement()
        {
            $session = session();
            $condition = ['NOADHERENT'=>$session->get('numero')];

            return $this
            ->join('forfait frf', 'abn.NOFORFAIT = frf.NOFORFAIT',  'inner')
            ->select('NOABONNEMENT, frf.LIBELLEFORFAIT as LIBELLE, DATEDEBUT, frf.DUREE as DUREE, NBSEANCESRESTANTES, JOURSADDITIONNELS')
            ->where($condition)
            ->limit(3)
            ->get()
            ->getResult();

            // SELECT (DATEDEBUT, NBSEANCESRESTANTES, frf.DUREE as DUREE, NOADHERENT)
            // INNER JOIN forfait frf on (abn.NOFORFAIT = frf.NOFORFAIT)
            // WHERE 'NOADHERENT' = session('numero') AND 'DATEDEBUT' > date
        }

        public function GetAbonnementMachine()
        {
            $session = session();
            $condition = ['NOADHERENT'=>$session->get('numero')];

            return $this
            ->join('forfait frf', 'abn.NOFORFAIT = frf.NOFORFAIT',  'inner')
            ->select('NOABONNEMENT, frf.LIBELLEFORFAIT as LIBELLE, DATEDEBUT, frf.DUREE as DUREE, NBSEANCESRESTANTES, NOADHERENT')
            ->where($condition)
            ->like('LIBELLEFORFAIT', 'Machines')
            ->orderby('DATEDEBUT', 'asc')
            ->first();

            // SELECT (DATEDEBUT, NBSEANCESRESTANTES, frf.DUREE as DUREE, NOADHERENT)
            // INNER JOIN forfait frf on (abn.NOFORFAIT = frf.NOFORFAIT)
            // WHERE 'NOADHERENT' = session('numero') AND 'LIBELLEFORAFAIT' LIKE '%Machines%'
            // ORDER BY 'DATEDEBUT' asc
            // LIMIT 1
        }

        public function GetAbonnementValide($noadherent = null)
        {
            $condition = ['NOADHERENT'=>$noadherent];


            return $this
            ->join('forfait frf', 'abn.NOFORFAIT = frf.NOFORFAIT',  'inner')
            ->select('NOABONNEMENT, frf.LIBELLEFORFAIT as LIBELLE, DATEDEBUT, frf.DUREE as DUREE, NBSEANCESRESTANTES, NOADHERENT, JOURSADDITIONNELS')
            ->where($condition)
            ->get()
            ->getResult();

            // SELECT (NOABONNEMENT, frf.LIBELLEFORFAIT as LIBELLE, DATEDEBUT, NBSEANCESRESTANTES, frf.DUREE as DUREE, NOADHERENT)
            // INNER JOIN forfait frf on (abn.NOFORFAIT = frf.NOFORFAIT)
            // WHERE 'NOADHERENT' = $noadherent AND 'DATEDEBUT' > date
        }
    }
?>