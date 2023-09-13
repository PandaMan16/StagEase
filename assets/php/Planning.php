<?php

class Planning extends Bdd{
    
    private $plannings;
    private $user_id;

    public function __construct(int $id){
        $this->user_id;
        $request = $this->Connect()->prepare("SELECT * FROM calendar WHERE id_user = ?");
        $request->execute([$this->user_id]);
        if($request->rowCount() > 0){
            $this->plannings = $request->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function getPlanning(){
        return $this->plannings;
    }

    private function getDay(string $date){
        $request = $this->Connect()->prepare("SELECT * FROM calendar WHERE date = ? AND id_user = ? ORDER BY date ASC");
        $request->execute([$date,$this->user_id]);
        if($request->rowCount() > 0){
            return $request->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
    }

    public function addPlanning(string $date, string $start, string $end, string $stagiaire, string $entreprise, string $adresse, string $c_postal, string $ville, string $tel){
        // var_dump($id,$date,$start,$end,$stagiaire,$entreprise,$adresse,$c_postal,$ville,$tel);
        // var_dump($this->getDay($id,$date));
        if($this->getDay(null,$date) === false){
            $request = $this->Connect()->prepare("INSERT INTO calendar (id_user,date,d_start,d_end,name,entreprise,adresse,c_postal,ville,telephone) VALUES (?,?,?,?,?,?,?,?,?,?)");
            $request->bindValue(1, $this->user_id, PDO::PARAM_INT);
            $request->bindValue(2, $date, PDO::PARAM_STR);
            $request->bindValue(3, $start, PDO::PARAM_STR);
            $request->bindValue(4, $end, PDO::PARAM_STR);
            $request->bindValue(5, $stagiaire, PDO::PARAM_STR);
            $request->bindValue(6, $entreprise, PDO::PARAM_STR);
            $request->bindValue(7, $adresse, PDO::PARAM_STR);
            $request->bindValue(8, $c_postal, PDO::PARAM_STR);
            $request->bindValue(9, $ville, PDO::PARAM_STR);
            $request->bindValue(10, $tel, PDO::PARAM_STR);
            // $request->debugDumpParams();
            $request->execute();
            return true;
        }else{
            return false;
        }
    }
}