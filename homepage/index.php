<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once('../Control/ControlSessionCheck.php');
include_once('../View/Common/header.php');
include_once('../Model/ModelGame.php');
include_once('../Model/ModelUser.php');

$game = new Game();
?>

<body>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-lg-3" id="sideBar">
                <h1 class="my-4">Rate Method</h1>
                <div class="list-group">
                    <?php
                    // changes navbox active color depending on which page is currently selected
                    if (isset($_GET["0"])) {
                        echo '<a href="index.php?0&sort=0" class="list-group-item active">Add New Reviews</a>
                              <a href="index.php?1&sort=0" class="list-group-item">View All Reviews</a>
                              <a href="index.php?2&sort=0" class="list-group-item">Vote On Games</a>';
                    } else if (isset($_GET["1"])) {
                        echo '<a href="index.php?0&sort=0" class="list-group-item">Add New Reviews</a>
                              <a href="index.php?1&sort=0" class="list-group-item active">View All Reviews</a>
                              <a href="index.php?2&sort=0" class="list-group-item">Vote On Games</a>';
                    } else if (isset($_GET["2"])) {
                        echo '<a href="index.php?0&sort=0" class="list-group-item">Add New Reviews</a>
                              <a href="index.php?1&sort=0" class="list-group-item">View All Reviews</a>
                              <a href="index.php?2&sort=0" class="list-group-item active">Vote On Games</a>';
                    }
                    ?>
                    <div id="newBtn">
                        <button type="button" id="addCard" class="btn btn-outline-dark disabled">New Review</button>
                    </div>
                </div>

            </div>
            <!-- /.col-lg-3 -->

            <div class="col-lg-9" id="test">

                <div id="sortMethod">

                    <?php
                    // $user = new User();
                    // $currentUser = $user->getUser($_SESSION["user_id"]);
                    // displays sort buttons on each page, switches colors when on different methods
                    if (isset($_GET["0"])) {
                        if ($_GET["sort"] == 0) {
                            echo '<a href="index.php?0&sort=0" class="list-group-item active" id="sortBtn">Rating</a>
                                  <a href="index.php?0&sort=1" class="list-group-item" id="sortBtn">Upvotes</a>
                                  <h4 id="sortLabel">Sort By</h3>
                                  <h3 id="currentUser">Your Games</h3>';
                        } else if ($_GET["sort"] == 1) {
                            echo '<a href="index.php?0&sort=0" class="list-group-item" id="sortBtn">Rating</a>
                                  <a href="index.php?0&sort=1" class="list-group-item active" id="sortBtn">Upvotes</a>
                                  <h3 id="sortLabel">Sort By</h3>
                                  <label id="sortLabel">Sort by</label>';
                        }
                    } else if (isset($_GET["1"])) {
                        if ($_GET["sort"] == 0) {
                            echo '<a href="index.php?1&sort=0" class="list-group-item active" id="sortBtn">Rating</a>
                                  <a href="index.php?1&sort=1" class="list-group-item" id="sortBtn">Upvotes</a>
                                  <h4 id="sortLabel">Sort By</h3>
                                  <h3 id="currentUser">All Games</h3>';
                        } else if ($_GET["sort"] == 1) {
                            echo '<a href="index.php?1&sort=0" class="list-group-item" id="sortBtn">Rating</a>
                                  <a href="index.php?1&sort=1" class="list-group-item active" id="sortBtn">Upvotes</a>
                                  <h4 id="sortLabel">Sort By</h3>
                                  <h3 id="currentUser">Your Games</h3>';
                        }
                    } else if (isset($_GET["2"])) {
                        echo '<h2 id="voteLbl">Which game is better?</h2>';
                    }
                    ?>

                </div>

                <!-- div for newly added games -->
                <div id="newCard"></div>


                <?php
                // inserts games for indiviual user
                if (isset($_GET["0"])) {
                    // displays games sorted by rating
                    if ($_GET["sort"] == 0) {
                        $games = $game->getMyGamesSorted($_SESSION["user_id"], 3, 1);
                        $arrLength = count($games);


                        for ($x = $arrLength - 1; $x >= 0; $x--) {
                            echo '<div class="card mt-4">
                                    <img class="card-img-top img-fluid" src="' . $games[$x]->getGamePicture() . '" alt="">
                                    <div class="card-body">
                                        <h5 id="upvotes">' . $games[$x]->getGameUpVotes() . '</h5>
                                        <img id="upvoteImg" src="upvote3.png" alt="">
                                        <h3 class="card-title">' . $games[$x]->getGameName() . '</h3>
                                        <h5>My Rating: ' . $games[$x]->getGameRating() . '/10</h5>
                                        <p class="card-text">' . $games[$x]->getGameDescription() . '</p>
                                        <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
                                        Will make the stars work later, maybe
                                        <a href="../Control/ControlGameDelete.php?gameId= ' . $games[$x]->getGameID() . '" id="deleteCard">Delete Game</a>
                                    </div>
                                </div>';
                        }
                        // displays games sorted by upvotes
                    } else if ($_GET["sort"] == 1) {
                        $games = $game->getMyGamesSorted($_SESSION["user_id"], 5, 1);
                        $arrLength = count($games);

                        for ($x = $arrLength - 1; $x >= 0; $x--) {
                            echo '<div class="card mt-4">
                                    <img class="card-img-top img-fluid" src="' . $games[$x]->getGamePicture() . '" alt="">
                                    <div class="card-body">
                                        <h5 id="upvotes">' . $games[$x]->getGameUpVotes() . '</h5>
                                        <img id="upvoteImg" src="upvote3.png" alt="">
                                        <h3 class="card-title">' . $games[$x]->getGameName() . '</h3>
                                        <h5>My Rating: ' . $games[$x]->getGameRating() . '/10</h5>
                                        <p class="card-text">' . $games[$x]->getGameDescription() . '</p>
                                        <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
                                        Will make the stars work later, maybe
                                        <a href="../Control/ControlGameDelete.php?gameId= ' . $games[$x]->getGameID() . '" id="deleteCard">Delete Game</a>
                                    </div>
                                </div>';
                        }
                    }
                }
                // inserts complete list of games
                else if (isset($_GET["1"])) {
                    $game2 = new Game();

                    // sort by game rating 
                    if ($_GET["sort"] == 0) {
                        $games2 = $game2->getAllGamesSorted(3, 1);
                        $arrLength = count($games2);

                        for ($x = $arrLength - 1; $x >= 0; $x--) {
                            echo '<div class="card mt-4">
                                    <img class="card-img-top img-fluid" src="' . $games2[$x]->getGamePicture() . '" alt="">
                                    <div class="card-body">
                                        <h5 id="upvotes">' . $games2[$x]->getGameUpVotes() . '</h5>
                                        <img id="upvoteImg" src="upvote3.png" alt="">
                                        <h3 class="card-title">' . $games2[$x]->getGameName() . '</h3>
                                        <h5>User Rating: ' . $games2[$x]->getGameRating() . '/10</h5>
                                        <p class="card-text">' . $games2[$x]->getGameDescription() . '</p>
                                        <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
                                        Will make the stars work later, maybe
                                    </div>
                                </div>';
                        }
                        // sort by game upvotes
                    } else if ($_GET["sort"] == 1) {
                        $games2 = $game2->getAllGamesSorted(5, 1);
                        $arrLength = count($games2);

                        for ($x = $arrLength - 1; $x >= 0; $x--) {
                            echo '<div class="card mt-4">
                                    <img class="card-img-top img-fluid" src="' . $games2[$x]->getGamePicture() . '" alt="">
                                    <div class="card-body">
                                        <h5 id="upvotes">' . $games2[$x]->getGameUpVotes() . '</h5>
                                        <img id="upvoteImg" src="upvote3.png" alt="">
                                        <h3 class="card-title">' . $games2[$x]->getGameName() . '</h3>
                                        <h5>User Rating: ' . $games2[$x]->getGameRating() . '/10</h5>
                                        <p class="card-text">' . $games2[$x]->getGameDescription() . '</p>
                                        <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
                                        Will make the stars work later, maybe
                                    </div>
                                </div>';
                        }
                    }
                }
                // inserts two game side by side for comparison
                if (isset($_GET["2"])) :
                    $game2 = new Game();
                    $allGames = $game2->getAllGames();

                    $arrLength = count($allGames);

                    $r = rand(0, $arrLength - 1);
                    $r2 = rand(0, $arrLength - 1);

                    echo '<div class="float-container">
                            <div class="float-child">
                                <div class="green" id="comp1">
                                    <div class="card mt-4">
                                        <img class="card-img-top img-fluid" src="' . $allGames[$r]->getGamePicture() . '" alt="">
                                            <div class="card-body">
                                                <h5 id="upvotes">' . $allGames[$r]->getGameUpVotes() . '</h5>
                                                <img id="upvoteImg" src="upvote3.png" alt="">
                                                <h3 class="card-title">' . $allGames[$r]->getGameName() . '</h3>
                                                <a href="addUpvote.php?id=' . $allGames[$r]->getGameID() . '&n=' . $r . '" class="btn btn-outline-dark" id="voteBtn">Vote</a>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="float-child">
                                <div class="blue" id="comp2">
                                    <div class="card mt-4">
                                        <img class="card-img-top img-fluid" src="' . $allGames[$r2]->getGamePicture() . '" alt="">
                                            <div class="card-body">
                                                <h5 id="upvotes">' . $allGames[$r2]->getGameUpVotes() . '</h5>
                                                <img id="upvoteImg" src="upvote3.png" alt="">
                                                <h3 class="card-title">' . $allGames[$r2]->getGameName() . '</h3>
                                                <a href="addUpvote.php?id=' . $allGames[$r2]->getGameID() . '&n=' . $r2 . '" class="btn btn-outline-dark" id="voteBtn">Vote</a>
                                            </div>
                                    </div>
                                </div>
                            </div>
                         </div>';

                ?>
                    <script>
                        //document.getElementById("sortMethod").innerHTML = '<h3 id="sortLabel">Which game is better?</h3>';

                        var voteButton = document.getElementsByClassName("btn btn-outline-dark");
                        voteButton.onclick = function() {
                            location.reload();
                        }
                    </script>

                <?php
                endif;
                ?>

            </div>
            <!-- /.col-lg-9 -->
        </div>
    </div>

    <?php

    //when on the individual user page, adds the ability to add a new game review
    if (isset($_GET["0"])) :
    ?>
        <script>
            // inserts the add game card
            document.getElementById("newBtn").innerHTML = '<button type="button" id="addCard" class="btn btn-outline-dark">New Review</button>'

            var cardButton = document.getElementById("addCard");
            cardButton.onclick = function() {
                document.getElementById("newCard").innerHTML = '<div class="card mt-4"><img class="card-img-top img-fluid" src="https://alphasys.com.au/wp-content/themes/corporate-theme/images/placeholder.png" alt=""><div class="card-body"><form id="newGame" action="../Control/ControlGameInsert.php" method="POST"><textarea class="form-control" name="description" placeholder="Description" id="descBox"></textarea><br /><input type="text" class="form-control" name="title" placeholder="Title"><br /><input type="text" class="form-control" name="rating" placeholder="Rating"><br /><input type="text" class="form-control" name="picture" placeholder="Image Link"><button type="submit" class="btn btn-outline-primary" id="formSubmit">Submit</button><button type="button" class="btn btn-secondary" id="cancelSubmit">Cancel</button></form></div></div>';

                var cancelButton = document.getElementById("cancelSubmit");
                cancelButton.onclick = function() {
                    document.getElementById("newCard").innerHTML = "";
                }
            }
        </script>
    <?php
    endif;

    if (!isset($_GET["0"])) :
    ?>
        <script>
            // displays a message if new review button is pressed on the wrong page
            var cardButton = document.getElementById("addCard");
            cardButton.onclick = function() {
                alert("Must be on the 'Add New Reviews' page to create reviews.");
            }
        </script>
    <?php
    endif;

    ?>
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

    div {
        /* outline-style: solid;
        outline-color: red; */
    }


    #upvotes {
        float: right;
        margin-top: 15px;
        margin-right: 3px;
    }

    #upvoteImg {
        height: 22px;
        width: auto;
        float: right;
        margin-top: 15px;
        margin-right: 8px;
    }

    .float-container {
        /* border: 3px solid #fff; */
        padding: 20px;
    }

    .float-child {
        width: 50%;
        float: left;
        padding: 20px;
        /* border: 2px solid red; */
    }

    #sortLabel {
        float: right;
        margin-top: 35px;
        margin-right: 15px;
        color: #292b2c;
        /* font-size: larger; */
    }

    #voteBtn {
        margin-left: 78px;
        width: 150px;
    }

    #voteLbl {
        margin-left: 250px;
        margin-top: 45px;

    }

    div#sortMethod {
        overflow: auto;
    }

    div#sortMethod>#sortBtn {
        float: right;
        width: 120px;
        margin-left: 10px;
        margin-top: 25px;
    }

    #currentUser {
        float: left;
        margin-top: 35px;
        color: #0275d8;
    }

    div.float-child {
        min-height: 400px;
    }

    div.card-body {
        min-height: 150px;
    }
</style>