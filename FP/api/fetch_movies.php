<?php
include "../inc/db.php";
include_once "../inc/functions.php";

echo "Fetching movies...<br>";

if (populateMovies($conn)) {
    echo "Done fetching movies via shared function!";
} else {
    echo "Failed to fetch movies or no data returned.";
}
?>
