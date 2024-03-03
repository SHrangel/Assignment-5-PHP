<?php

$movie = isset($_REQUEST["film"]) ? $_REQUEST["film"] : "";
$movie_directory = "./movies/" .$movie . "/";

$info_file = $movie_directory . "info.txt";
$overview_file = $movie_directory . "overview.txt";

if (file_exists($movie_directory) && is_readable($info_file) && is_readable($overview_file))  {
$info_lines = file($info_file, FILE_IGNORE_NEW_LINES);
$overview_lines = file($overview_file, FILE_IGNORE_NEW_LINES);


if (!empty($info_lines) && !empty($overview_lines)) {

?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $info_lines[0]; ?> Review</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1><?php echo $info_lines[0]; ?></h1>
</header>
    
<nav>
    <ul>
        <li><a href="LK.html">Home</a></li>
    </ul>
</nav>

<main>
    <article>
		<h2>General Overview</h2>
		<?php
		foreach ($overview_lines as $line) {
			$parts = explode(':', $line, 2);
			echo "<p><strong>{$parts[0]}:</strong> {$parts[1]}</p>";
		}
		?>
    </article>
</main>

<footer>
    <p>&copy; Stephanie Rangel</p>
	<h1><a href="overview.txt">View Overview</a></h1>
	<h1><a href="info.txt">View Info</a></h1>
</footer>


</body>
</html>
<?php
}else {
	echo "Error: Movie information is empty.";
}

}else {
	echo "Error: Movie not found or files are inaccessible.";
}
?>



