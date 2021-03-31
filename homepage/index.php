<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once('../Control/ControlSessionCheck.php');
include_once('../View/Common/header.php');
include_once('../Model/ModelGame.php');

$game = new Game();
$games = $game->getMyGames($_SESSION["user_id"]);

$arrLength = count($games);

?>

<body>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-lg-3">
                <h1 class="my-4">Rate Method</h1>
                <div class="list-group">
                    <a href="#" class="list-group-item active">Category 1</a>
                    <a href="#" class="list-group-item">Category 2</a>
                </div>
                <button type="button" id="addCard" class="btn btn-outline-dark">New Review</button>

            </div>
            <!-- /.col-lg-3 -->

            <div class="col-lg-9">

                <div id="newCard"></div>


                <?php
                for ($x = $arrLength - 1; $x >= 0; $x--) {
                    echo '<div class="card mt-4">
                            <img class="card-img-top img-fluid" src="' . $games[$x]->getGamePicture() . '" alt="">
                            <div class="card-body">
                                <h3 class="card-title">' . $games[$x]->getGameName() . '</h3>
                                <h4>' . $games[$x]->getGameRating() . '</h4>
                                <p class="card-text">' . $games[$x]->getGameDescription() . '</p>
                                <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
                                Will make the stars work later
                                <a href="../Control/ControlGameDelete.php?gameId= ' . $games[$x]->getGameID() . '" id="deleteCard">Delete Game</a>
                            </div>
                        </div>';
                }
                ?>

            </div>
            <!-- /.col-lg-9 -->

        </div>

    </div>


    <form method="POST" action="">

    </form>

    <script>
        var cardButton = document.getElementById("addCard");
        cardButton.onclick = function() {
            document.getElementById("newCard").innerHTML = '<div class="card mt-4"><img class="card-img-top img-fluid" src="https://alphasys.com.au/wp-content/themes/corporate-theme/images/placeholder.png" alt=""><div class="card-body"><form id="newGame" action="../Control/ControlGameInsert.php" method="POST"><textarea class="form-control" name="description" placeholder="Description" id="descBox"></textarea><br /><input type="text" class="form-control" name="title" placeholder="Title"><br /><input type="text" class="form-control" name="rating" placeholder="Rating"><br /><input type="text" class="form-control" name="picture" placeholder="Image Link"><button type="submit" class="btn btn-outline-primary" id="formSubmit">Submit</button><button type="button" class="btn btn-secondary" id="cancelSubmit">Cancel</button></form></div></div>';

            var cancelButton = document.getElementById("cancelSubmit");
            cancelButton.onclick = function() {
                document.getElementById("newCard").innerHTML = "";
            }
        }
    </script>
    <!-- /.container -->

    <div class="push"></div>

    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
        </div>
        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>

</html>

<style>
    html {
        height: 100%;
    }

    body {
        min-height: 100%;
        display: grid;
        grid-template-rows: 1fr auto;
    }

    .py-5 bg-dark {
        grid-row-start: 2;
        grid-row-end: 3;
    }
</style>