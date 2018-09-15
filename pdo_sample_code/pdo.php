<?php
try{
   $handler = new PDO('mysql:host=127.0.0.1;dbname=app','root','');
   $handler=setAttribute(PDO::AFTER_ERRMODE,PDO::ERRMODE_EXCEPTION);

}
  catch(PDOException $e){

    echo $e->getMessage();
    die();
  }


$querry = $handler->query("select * from Books");
// Fetching data,accessing properties as  associative and numeric ARRAY
while($r = $querry->fetch()){
  echo $r['book_name'];
  }
//or
while($r = $querry->fetch(PDO::FETCH_BOTH)){

echo $r['book_name'];
}
// Fetching data,accessing properties as numeric arrays
while($r = $querry->fetch(PDO::FETCH_NUM)){

echo $r['book_name'];
}
// Fetching data,accessing properties as associative arrays
while($r = $querry->fetch(PDO::FETCH_ASOC)){

echo $r['book_name'];
}
//fetching data as objects,accessing properties as objects
while($r = $querry->fetch(PDO::FECTCH_OBJ)){

echo $r->book_name;
}

///**
 *
 */
 ///class
class Books
{
  public $book_id,$name,$author;
  public function __construct()
  {
    $this->entry = "{$this->name} written by: {$this->author}";
  }
}
$query =$handler->query("select * from books");
$query->setFechMode(PDO::FETCH_CLASS,"books");
while($r=$query->fetch())
{
  echo $r->entry;
}

///
//fetchall
$query =$handler->query('SELECT * FROM books LIMIT 0');
$results =$query->fetchALL(PDO::FETCH_ASSOC);
if(count($results)){ // or  $query->rowCount()

  echo 'there are results;'
} else {

  echo "No result";
}

//prepared statements
$name="God of small things";
$author="Roy";
$price="234";

$sql="INSERT INTO books(name,author,prize) VALUES (:name,:author,:prize)";
$query=$handler->prepare($sql);
$query->execute(array(
':name' => $name
':author'=> $author

));

//last insertid




 ?>
