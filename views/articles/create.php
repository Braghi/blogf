<?php
// include database and object files
include_once '../../config/database/database.php';
include_once '../../models/article.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// pass connection to objects
$article = new Article($db);

$page_title = "Crea Articolo";
include_once "../layout/layout_header.php";

// se il form è stato inviato
if($_POST){
 
    // sistemo l'oggetto articolo
    $article->title = $_POST['title'];
    $article->subtitle = $_POST['subtitle'];
    $article->description = $_POST['description'];
    $article->published = true;
 
    // create the article
    if($article->create()){
        echo "<div class='alert alert-success'>Articolo creato!</div>";
    }
    // if unable to create the product, tell the user
    else{
        echo "<div class='alert alert-danger'>Errore, non è stato possibile creare l'articolo.</div>";
    }
}
?>

<!-- Form creazione articolo-->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <div class="table-responsive">
        <table class='table table-hover table-bordered'>

            <tr>
                <td>Titolo</td>
                <td><input type='text' name='title' class='form-control' /></td>
            </tr>

            <tr>
                <td>Sottotitolo</td>
                <td><input type='text' name='subtitle' class='form-control' /></td>
            </tr>

            <tr>
                <td>Testo</td>
                <td><textarea name='description' class='form-control'></textarea></td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-primary">Crea un nuovo articolo</button>
                </td>
            </tr>

        </table>
    </div>
</form>
 
<?php
// footer
include_once "../layout/layout_footer.php";
?>
