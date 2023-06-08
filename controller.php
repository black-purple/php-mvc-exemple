<?php
    require './model.php';
    require './db.php';

    class Produits {
        public static function all() {
            $requete = "SELECT * FROM produits;";
            $produits = [];

            $reponse = DB::connect()->query($requete);
            while ($produit = $reponse->fetch()) {
                array_push($produits, $produit);
            }
            return $produits;
        }

        public static function one($id) {
            $requete = "SELECT * FROM produits WHERE identifiant=$id;";

            $reponse = DB::connect()->query($requete);

            if ($reponse->rowCount() > 0) {
                return $reponse->fetch();
            }
            return null;
        }

        public static function ajouter(Produit $p) {
            $requete = "INSERT INTO produits (libelle, description, prix, qte, statut) VALUES ('".$p->libelle()."','".$p->description()."',".$p->prix().",".$p->qte().",'".$p->statut()."');";

            return DB::connect()->exec($requete);
        }

        public static function modifier(Produit $p, $id) {
            $requete = "UPDATE produits SET libelle='".$p->libelle()."', description='".$p->description()."', prix=".$p->prix().", qte=".$p->qte().", statut='".$p->statut()."' WHERE identifiant=$id;";

            return DB::connect()->exec($requete);
        }
        
        public static function supprimer($id) {
            $requete = "DELETE FROM produits WHERE identifiant=$id;";

            return DB::connect()->exec($requete);
        }
    }
