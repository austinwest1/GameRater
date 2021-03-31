<main class="col-7 col-m-12">
  <h1> My Game Ratings </h1>
  <?php
  $path = (isset($_SESSION["SQLUSER"]) ? $_SERVER['DOCUMENT_ROOT'] . "/GameRater" : $_SERVER['DOCUMENT_ROOT']);
  include($path . '/Model/ModelGame.php');
  $game = new Game();
  $games = $game->getMyGames($_SESSION["user_id"]);
  if ($games) {
    $arrlength = count($games);

    for ($x = 0; $x < $arrlength; $x++) {
      echo '<Section>
                    <h4>' . $games[$x]->getGameName() . '</h4>
                    <br/> <h4>Rating: ' . $games[$x]->getGameRating() . ' star </h4>
                    <br/>' . $games[$x]->getGameDescription() . '
                    <a href ="Control/ControlGameDelete.php?gameId=' . $games[$x]->getGameID() . '" title="Delete ' . $games[$x]->getGameName() . '"> <h4>Delete</h4></a>
                  </section>';
    }
  }

  if (isset($_GET["gameDeleted"])) {
    if ($_GET["gameDeleted"] == "true") {
      echo ("<script>window.onload = function(){alert('Game Deleted');}</script>");
    } else {
      echo ("<script>window.onload = function(){alert('No Game Deleted');}</script>");
    }
  }
  ?>
</main>