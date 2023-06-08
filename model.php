<?php
    class Produit{

        private $libelle;
        private $description;
        private $qte;
        private $prix;
        private $statut;

        public function __construct($libelle, $description, $qte, $prix, $statut) {
            $this->libelle = $libelle;
            $this->description = $description;
            $this->qte = $qte;
            $this->prix = $prix;
            $this->statut = $statut;
        }

        public function libelle() {
            return $this->libelle;
        }
        public function description() {
            return $this->description;
        }
        public function qte() {
            return $this->qte;
        }
        public function prix() {
            return $this->prix;
        }
        public function statut() {
            return $this->statut;
        }

    }