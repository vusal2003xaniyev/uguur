<?php
class crud{
    public function insert($table,$col,$arr){
        global $DB;
        $ins=$DB->prepare("INSERT INTO $table SET $col");
        return $ins->execute($arr) ?? null;
    }
    public function select($table,$multi=false,$col="*",$arr=null,$con=null){
        global $DB;
        $slc=$DB->prepare("SELECT $col FROM $table $con");
        $slc->execute($arr);
        return $multi ? $slc->fetchAll(PDO::FETCH_ASSOC) :$slc->fetch(PDO::FETCH_ASSOC);
    }
    public function delete($table,$id){
        global $DB;
        $del=$DB->prepare("DELETE FROM $table WHERE id=$id");
        return $del->execute();

    }
    public function update($table,$col,$arr,$con=null){
        global $DB;
        $upd=$DB->prepare("UPDATE $table SET $col $con");
        return $upd->execute($arr) ?? null;
    }
}