<?php
    namespace App\Models;

    use CodeIgniter\Model;
    use \Datetime;

    class ModeleS_Inscrire extends Model
    {
        protected $table = 's_inscrire icp';
        protected $primaryKey = ['NOABONNEMENT', 'NOJOUR', 'HEUREDEBUTSEANCE', 'DATESEANCE'];
        protected $returnType = 'object';
        protected $allowedFields = ['NOABONNEMENT', 'NOJOUR', 'HEUREDEBUTSEANCE', 'DATESEANCE', 'DATEHEUREDESINSCRIPTION'];

        // nb d'inscriptions pour une séance donnée
        public function GetNombreInscription($date = null, $heure = null)
        {
            if ($heure == null)
            {
                return $this
                ->select('DATESEANCE, HEUREDEBUTSEANCE, COUNT(NOABONNEMENT) AS NBINSCRIPTION')
                ->like('DATESEANCE', $date)
                ->groupBy('DATESEANCE, HEUREDEBUTSEANCE')
                ->orderBy('DATESEANCE asc, HEUREDEBUTSEANCE asc')
                ->get()
                ->getResult();
            }
            else
            {
                return $this
                ->select('DATESEANCE, HEUREDEBUTSEANCE, COUNT(NOABONNEMENT) AS NBINSCRIPTION')
                ->like('DATESEANCE', $date)
                ->like('HEUREDEBUTSEANCE', $heure)
                ->groupBy('DATESEANCE, HEUREDEBUTSEANCE')
                ->orderBy('DATESEANCE asc, HEUREDEBUTSEANCE asc')
                ->first();
            }
            
            // SELECT (DATESEANCE, HEUREDEBUTSEANCE, COUNT(NOABONNEMENT) AS NOMBREINSCRIPTION)
            // WHERE DATESEANCE Like $date->format('Y-m').'%'
            // GROUP BY (DATESEANCE, HEUREDEBUTSEANCE)
            // ORDER BY (DATESEANCE, HEUREDEBUTSEANCE)
            // LIMIT 1;
        }

        // la personne est-elle inscrite à la séance ?
        public function EstInscrit($date = null, $heure = null)
        {
            $session = session();
            $condition = ['NOADHERENT'=>$session->get('numero'), 'DATESEANCE'=>$date];

            return $this
            ->join('abonnement abn', 'icp.NOABONNEMENT = abn.NOABONNEMENT',  'inner')
            ->select('HEUREDEBUTSEANCE, DATESEANCE, DATEHEUREDESINSCRIPTION')
            ->where($condition)
            ->like('HEUREDEBUTSEANCE', $heure)
            ->first();

            // SELECT ('HEUREDEBUTSEANCE')
            // INNER JOIN abonnement on (icp.NOABONNEMENT = abn.NOABONNEMENT)
            // WHERE 'NOADHERENT' = noadherent and 'DATESEANCE' = $date and WHERE 'HEUREDEBUTSEANCE' LIKE $heure
            // LIMIT 1
        }

        // récupère toutes les séances auxquelles s'est inscrit l'adhérent
        public function GetInscriptions($noadherent = null)
        {
            $session = session();
            $condition = ['abn.NOADHERENT'=>$noadherent, 'DATEHEUREDESINSCRIPTION'=>NULL];
            $ajd = date('y-m-d');

            return $this
            ->join('abonnement abn', 'icp.NOABONNEMENT = abn.NOABONNEMENT',  'inner')
            ->select('NOJOUR, DATESEANCE, HEUREDEBUTSEANCE')
            ->where($condition)
            ->where('DATESEANCE > ' . $ajd)
            ->orderby('DATESEANCE', 'asc')
            ->get()
            ->getResult();

            // SELECT ('HEUREDEBUTSEANCE')
            // INNER JOIN abonnement on (icp.NOABONNEMENT = abn.NOABONNEMENT)
            // WHERE 'abn.NOADHERENT' = noadherent
        }

        // public function SeDesinscrire($noadherent = null)
        // {
        //     $session = session();
        //     $condition = ['abn.NOADHERENT'=>$noadherent, 'DATEHEUREDESINSCRIPTION'=>NULL];
        //     $ajd = date('y-m-d');

        //     return $this
        //     ->join('abonnement abn', 'icp.NOABONNEMENT = abn.NOABONNEMENT',  'inner')
        //     ->select('NOJOUR, DATESEANCE, HEUREDEBUTSEANCE')
        //     ->where($condition)
        //     ->where('DATESEANCE > ' . $ajd)
        //     ->orderby('DATESEANCE', 'asc')
        //     ->get()
        //     ->getResult();

        //     // SELECT ('HEUREDEBUTSEANCE')
        //     // INNER JOIN abonnement on (icp.NOABONNEMENT = abn.NOABONNEMENT)
        //     // WHERE 'abn.NOADHERENT' = noadherent
        // }
    }
?>