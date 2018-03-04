<?php
class Model {

	// Un appel au constructeur sans id créées une instance et une ligne dans la db sinon recupere depuis la base
	public function __construct($id=null) {
		$class = get_called_class();
		$table = strtolower($class);
		$firstLetters = substr(strtolower($class),0,3);
		$table_id = $firstLetters."_id";
		if ($id == null) {
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
				foreach ($this as $field => $value) {
					list($prefix,$lc_fClass) = explode("_", $field);
					if(strlen($prefix) == 3){
						$this->$field = $row[$field];
					}else{
						$fClass = ucfirst($lc_fClass);
						$fKey = substr(strtolower($fClass),0,3)."_id";
						if($prefix == "u"){
							$this->$field = new $fClass($row[$fKey]);
						}elseif ($prefix == "l") {
							$values = $fClass::findByFKey($class,$id);
							$this->$field = $values;
						}

					}

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
	public static function findByFKey ($fClass,$id) {
		$class = get_called_class();
		$table = strtolower($class);
		$table_id = substr(strtolower($class),0,3)."_id";
		$fkname = substr(strtolower($fClass),0,3)."_id";
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
			throw new Exception($fieldName." field do not exist in ".get_class($this));
	}
	
	/*update la base*/
	public function __set($fieldName, $value) {
		if ($value != null) {
			if (property_exists(get_class($this), $fieldName)) {
				$this->$fieldName = $value;
				$class = get_class($this);
				$table = strtolower($class);
				$firstLetters = substr(strtolower($table),0,3);
				$table_id = $firstLetters."_id";
				$field = $fieldName;
				list($prefix,$suffix) = explode("_", $fieldName);
				if(strlen($prefix) != 3){
					$field = substr(strtolower($suffix),0,3)."_id";
				}
				$st = db()->prepare("update $table set $field=:val where $table_id=:id");
				$st->bindValue(":val", $value);
				$st->bindValue(":id", $this->$table_id);
				$st->execute();
			} else
				throw new Exception("Unknown variable: ".$fieldName);
		}
	}



	//remove from the database, use it carefully
	public function delete(){
		$class = get_class($this);
		$table = strtolower($class);
		$firstLetters = substr(strtolower($table),0,3);
		$table_id = $firstLetters."_id";
		$st = db()->prepare("delete from $table where $table_id=:id");
		echo "delete $table where $table_id=:id";
		$st->bindValue(":id", $this->$table_id);
		$st->execute();
	}

	// à surcharger
	public function __toString() {
		return get_class($this);
	}

}
?>