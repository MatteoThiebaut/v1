<?php   

class BDD{
    private $dbh;

    public function __construct() {
        try{
            $this->dbh = new PDO('mysql:dbname=serie;host=127.0.0.1;',"root","ROOT");
        } catch (PDOException $e) {
             print "Connexion échoué : " . $e->getMessage();
        }
            }

    public function getThemes() {
        $res = $this->dbh->query('SELECT * from theme', PDO::FETCH_ASSOC);
        return $res->fetchAll();
    }
    
    public function insertSerie($nom, $nbepisode, $Synopsis,$theme) {
        $sql = "INSERT INTO serie(nom, nbEpisode,  synopsis, FK_ID_Theme ) VALUES (:nom, :nbepisode, :Synopsis, :theme)";
        $req = $this->dbh->prepare($sql);
        // si Erreur print_r($req->errorInfo());
        $req->execute(array(":nom" => $nom, ":nbepisode" => $nbepisode, ":Synopsis" => $Synopsis, ":theme" => $theme));
    }

    public function getSeries() {
        $res = $this->dbh->query('SELECT s.nom as nomSerie, s.nbEpisode as nbrEpisode, s.synopsis as synopsis, th.nomT as nomTheme from serie s left join theme th on s.FK_ID_Theme = th.id' , PDO::FETCH_ASSOC);
        return $res->fetchAll();
    }
    public function Insert($theme) {
        $sql = "INSERT INTO theme(nomT) VALUES (:theme)";
        $req = $this->dbh->prepare($sql);
        $req->execute(array(":theme" => $theme));
    }
    public function Update($theme,$new) {
        $sql = "UPDATE theme SET nomT = :new where nomT = :theme";
        $req = $this->dbh->prepare($sql);
        $req->execute(array(":theme" => $theme , ":new" => $new));
    }
    public function Delete($theme) {
        $sql = "DELETE FROM theme WHERE nomT = :theme";
        $req = $this->dbh->prepare($sql);
        $req->execute(array(":theme" => $theme));
        
    }
}

    

?>