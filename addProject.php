<?php  

require_once 'vendor/autoload.php';

    use Illuminate\Database\Capsule\Manager as Capsule;
    use App\Models\Project;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'cursophp',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

//Obtenemos objetos  enviados por url
// var_dump($_GET);
// var_dump($_POST);

if (!empty($_POST)) {
    $project = new Project();
$project->title = $_POST['title'];
$project->description = $_POST['description'];
$project->save();
}

?>
<!DOCTYPE html>
<html>
<head>

    <title>Add Project</title>
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
    crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Add Project</h1>
    <form action="addProject.php" method="post">
    <label for="">Title</label>
    <input type="text" name="title"/><br> 
    <label for="">Description</label>
    <input type="text" name="description"/><br>
    <button type="submit">Save</button>
    </form>

</body>
</html>