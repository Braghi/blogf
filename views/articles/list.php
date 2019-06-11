<?php
// include database and object files
include_once '../../config/database/database.php';
include_once '../../models/article.php';
 
// instantiate database and objects
$database = new Database();
$db = $database->getConnection();
 
$article = new Article($db);
 
// query products
$stmt = $article->getList();
$num = $stmt->rowCount();

// page given in URL parameter, default page is one
$page = isset($_GET['page']) ? $_GET['page'] : 1;
 
// set number of records per page
$records_per_page = 5;
 
// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;

// set page header
$page_title = "Elenco Articoli";
include_once "../layout/layout_header.php";

echo "<div class='right-button-margin'>";
    echo "<a href='create.php' class='btn btn-default pull-right'>Nuovo Articolo</a>";
echo "</div>";

// display the products if there are any
if($num>0){
    echo "<div class='table-responsive'>";
        echo "<table class='table table-hover table-bordered'>";
            echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Titolo</th>";
                echo "<th>Sottotitolo</th>";
                echo "<th>Testo</th>";
                echo "<th>Azioni</th>";
            echo "</tr>";

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

                extract($row);

                echo "<tr>";
                    echo "<td>{$id}</td>";
                    echo "<td>{$title}</td>";
                    echo "<td>{$subtitle}</td>";
                    echo "<td>{$description}</td>";
                    echo "<td>";
                        // read one, edit and delete button will be here
                    echo "</td>";
                echo "</tr>";

            }

        echo "</table>";
    echo "</div>";
 
    // paging buttons will be here
}
 
// tell the user there are no products
else{
    echo "<div class='alert alert-info'>No products found.</div>";
}
 
// contents will be here
 
// set page footer
include_once "../layout/layout_footer.php";
