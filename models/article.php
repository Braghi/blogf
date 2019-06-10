<?php
class Article{
 
    // database connection and table name
    private $conn;
    private $table_name = "articles";
 
    // object properties
    public $id;
    public $title;
    public $subtitle;
    public $description;
    public $timestamp;
    public $published;
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    // create article
    function create(){
 
        //write query
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    title=:title, subtitle=:subtitle, description=:description, created=:created, published=:published";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->title=htmlspecialchars(strip_tags($this->title));
        $this->subtitle=htmlspecialchars(strip_tags($this->subtitle));
        $this->description=htmlspecialchars(strip_tags($this->description));
 
        // to get time-stamp for 'created' field
        $this->timestamp = date('Y-m-d H:i:s');
 
        // bind values 
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":subtitle", $this->subtitle);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":created", $this->timestamp);
        $stmt->bindParam(":published", $this->published);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
}
