<?php
class Model {

	// Un appel au constructeur sans id créées une instance et une ligne dans la db sinon recupere depuis la base
	public function __construct($id=null) {
		$class = get_class($this);
		$table = strtolower($class);
		$table_id = substr(strtolower($class),0,3)."_id";
		if ($id == null) {
			echo "ok";
			$st = db()->prepare("insert into $table values()");
			$st->execute();
			$this->$table_id = db()->lastInsertId();
		} else {
			$st = db()->prepare("select * from $table where $table_id=:id");
			$st->bindValue(":id", $id);
			$st->execute();
			if ($st->rowCount() != 1) {
				throw new Exception("Not in table: ".$table." id: ".$id );
			} else {
				$row = $st->fetch(PDO::FETCH_ASSOC);
				foreach($row as $field=>$value) {
						$this->$field = $value;
				}
			}
		}

	}

	/*Retourne tout les objet de la base*/
	public static function findAll() {
		$class = get_called_class();
		$table = strtolower($class);
		$table_id = substr(strtolower($class),0,3)."_id";
		$st = db()->prepare("select $table_id from $table");
		$st->execute();
		$list = array();
		while($row = $st->fetch(PDO::FETCH_ASSOC)) {
			$list[] = new $class($row[$table_id]);
		}
		return $list;
	}
	
	/*recupere un objet dans la base par foreign key*/
	public static function findByFKey ($fTable,$id) {
		$class = get_called_class();
		$table = strtolower($class);
		$table_id = substr(strtolower($class),0,3)."_id";
		$fkname= substr(strtolower($fTable),0,3)."_id";
		$st = db()->prepare("select $table_id from $table where $fkname =:id");
		$st->bindValue(":id", $id);
		$st->execute();
		$list = array();
		while($row = $st->fetch(PDO::FETCH_ASSOC)) {
			$list[] = new $class($row[$table_id]);
		}
		return $list;
	}
	
	/*get sécurisé*/
	public function __get($fieldName) {
		if (property_exists(get_class($this), $fieldName))
			return $this->$fieldName;
		else
			throw new Exception("Unknown variable: ".$fieldName);
	}
	
	/*update la base*/
	public function __set($fieldName, $value) {
		if ($value != null) {
			if (property_exists(get_class($this), $fieldName)) {
				$this->$fieldName = $value;
				$class = get_class($this);
				$table = strtolower($class);
				$table_id = substr(strtolower($table),0,3)."_id";
				$st = db()->prepare("update $table set $fieldName=:val where $table_id=:id");
				$st->bindValue(":val", $value);
				$st->bindValue(":id", $this->$table_id);
				$st->execute();
			} else
				throw new Exception("Unknown variable: ".$fieldName);
		}
	}

	// à surcharger
	public function __toString() {
		return get_class($this).": ".$this->name;
	}

}
?>