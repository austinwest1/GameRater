<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once('../Control/ControlSessionCheck.php');
// include_once('../View/Common/header.php');
include_once('../Model/ModelGame.php');
include_once('../Model/ModelUser.php');

$game = new Game();
?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial">
        <title>Glass Website</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/styles2.css" />
        <script src="scripts/scripts.js" defer></script>
    </head>

<header>
    <div class="head">
        <div class="title">
            <label for="">Game Rater</label>
            <a href="#">Home</a>
        </div>
        <div class="nav">
            <a href="../Control/ControlLogout.php">Logout</a>
            <a href="../register.php">Sign Up</a>
        </div>
    </div>

</header>

    <body>
        <main>
            <section class="glass">
                <div class="dashboard">
                    <h1 id="menu">Menu</h1>

                    <div class="links">

                        <?php
                            if (isset($_GET["0"])) {
                                echo '<div class="link-active">
                                        <a href="index2.php?0&sort=0" class="pages" title="My Reviews">My Reviews</a>
                                      </div>
                                      <div class="link">
                                      <a href="index2.php?1&sort=0" class="pages" title="Community Reviews">Community Reviews</a>
                                      </div>
                                      <div class="link">
                                        <a href="index2.php?2" class="pages" title="Vote on Games">Vote on Games</a>
                                     </div>';
                            }
                            else if (isset($_GET["1"])) {
                                echo '<div class="link">
                                        <a href="index2.php?0&sort=0" class="pages" title="My Reviews">My Reviews</a>
                                    </div>
                                    <div class="link-active">
                                    <a href="index2.php?1&sort=0" class="pages" title="Community Reviews">Community Reviews</a>
                                    </div>
                                    <div class="link">
                                        <a href="index2.php?2" class="pages" title="Community Reviews">Vote on Games</a>
                                    </div>';
                            }
                            else if (isset($_GET["2"])) {
                                echo '<div class="link">
                                        <a href="index2.php?0&sort=0" class="pages" title="My Reviews">My Reviews</a>
                                    </div>
                                    <div class="link">
                                    <a href="index2.php?1&sort=0" class="pages" title="Community Reviews">Community Reviews</a>
                                    </div>
                                    <div class="link-active">
                                        <a href="index2.php?2" class="pages" title="Community Reviews">Vote on Games</a>
                                    </div>';
                            }

                        ?>

                    </div>

                    <div id="newBtn"></div>

                </div>

                <div class="currentGames">
                    <div class="selected">
                        <?php
                            if (isset($_GET["0"])) {
                                echo '<h1 id="selectedGames">My Games</h1>';
                            }
                            else if (isset($_GET["1"])) {
                                echo '<h1 id="selectedGames">All Games</h1>';
                            }
                            else if (isset($_GET["2"])) {
                                echo '<h2 id="voteLabel">Vote! Which game is better?</h2>';
                            }
                        ?>
                        
                        <div class="sortControls">
                            <?php
                                if (isset($_GET["0"])) {
                                    if ($_GET["sort"] == 0) {
                            
                                        echo '<h2 id="sortBy">Sort By</h2>
                                              <a href="index2.php?0&sort=1" class="sortButtons" type="button" title="Upvotes">Upvotes</a>
                                              <a href="index2.php?0&sort=0"class="sortButtons-active" type="button" title="Rating">Rating</a>';
                                    }
                                    else if ($_GET["sort"] == 1) {
                                        echo '<h2 id="sortBy">Sort By</h2>
                                              <a href="index2.php?0&sort=1" class="sortButtons-active" type="button" title="Upvotes">Upvotes</a>
                                              <a href="index2.php?0&sort=0"class="sortButtons" type="button" title="Rating">Rating</a>';
                                    }

                                }
                                else if (isset($_GET["1"])) {
                                    if ($_GET["sort"] == 0) {
                                        echo '<h2 id="sortBy">Sort By</h2>
                                              <a href="index2.php?1&sort=1" class="sortButtons" type="button" title="Upvotes">Upvotes</a>
                                              <a href="index2.php?1&sort=0"class="sortButtons-active" type="button" title="Rating">Rating</a>';
                                    }
                                    else if ($_GET["sort"] == 1) {
                                        echo '<h2 id="sortBy">Sort By</h2>
                                              <a href="index2.php?1&sort=1" class="sortButtons-active" type="button" title="Upvotes">Upvotes</a>
                                              <a href="index2.php?1&sort=0"class="sortButtons" type="button" title="Rating">Rating</a>';
                                    }
                                }
                            ?>

                        </div>

                    </div>
                    <div class="games  wrapper fadeInDown">
                        <div class="status">

                            <div class="cards">
                                <div id="newCard"></div>

                                <?php
                                // inserts gamnes for individual user
                                    if (isset($_GET["0"])) {
                                        // sorts games by rating
                                        if ($_GET["sort"] == 0) {
                                            $games = $game->getMyGamesSorted($_SESSION["user_id"], 3, 1);
                                            $arrLength = count($games);
                                        }
                                        // sorts games by upvotes
                                        else if ($_GET["sort"] == 1) {
                                            $games = $game->getMyGamesSorted($_SESSION["user_id"], 5, 1);
                                            $arrLength = count($games);
                                        }
                                        // displays games by sorted order
                                        for ($x = $arrLength - 1; $x >= 0; $x--) {
                                            echo '<div class="card fadeIn" id="card' . $x . '">
                                                        <div class="picture">
                                                            <img class="card-img" id="img' . $x . '" src=" ' . $games[$x]->getGamePicture() . '" alt="">
                                                            <button class="collapsible">Delete Game</button>
                                                            <div class="content">
                                                                <a href="../Control/ControlGameDelete.php?gameId=' . $games[$x]->getGameID() . '" class="confirmDelete">Confirm</a>
                                                            </div>
                                                        </div>
                                                        <div class="gameInfo">
                                                            <div class="title">
                                                                <h3 class="card-title">' . $games[$x]->getGameName() . '</h3>
                                                                <h4 class="upvotes">Upvotes: ' . $games[$x]->getGameUpVotes() . '</h4>
                                                                <h4>My Rating: ' . $games[$x]->getGameRating() . '/10</h4>
                                                            </div>
                                                            <div class="desc">
                                                                <p>' . $games[$x]->getGameDescription() . '</p>
                                                                
                                                            </div>
                                                        </div>

                                                  </div>';
                                        }  
                                    }
                                    // displays all added games
                                    else if (isset($_GET["1"])) {
                                        // sort games by rating
                                        if ($_GET["sort"] == 0) {
                                            $games2 = $game->getAllGamesSorted(3, 1);
                                            $arrLength = count($games2);
                                        }
                                        // sort games by upvotes
                                        else if ($_GET["sort"] == 1) {
                                            $games2 = $game->getAllGamesSorted(5, 1);
                                            $arrLength = count($games2);
                                        }
                                        // displays games by sorted order
                                        for ($x = $arrLength - 1; $x >= 0; $x--) {
                                            echo '<div class="card fadeIn" id="">
                                            <div class="picture">
                                                <img class="card-img" src=" ' . $games2[$x]->getGamePicture() . '" alt="">
                                            </div>
                                            <div class="gameInfo">
                                                <div class="title">
                                                    <h3 class="card-title">' . $games2[$x]->getGameName() . '</h3>
                                                    <h4 class="upvotes">Upvotes: ' . $games2[$x]->getGameUpVotes() . '</h4>
                                                    <h4>User Rating: ' . $games2[$x]->getGameRating() . '/10</h4>
                                                </div>
                                            <div class="desc">
                                                <p>' . $games2[$x]->getGameDescription() . '</p>
                                            </div>
                                            </div>
                                                <div class="card-body">  
                                                </div>
                                        </div>';
                                        }  

                                    }
                                    // display vote on games page
                                    else if (isset($_GET["2"])) {
                                        // $game2 = new Game();
                                        $allGames = $game->getAllGames();
                    
                                        $arrLength = count($allGames);

                                       
                    
                                        $r = rand(0, $arrLength - 1);
                                        $r2 = rand(0, $arrLength - 1);

                                        // should prevent the same game from being displayed twice
                                        while ($r == $r2) {
                                            $r = rand(0, $arrLength - 1);
                                            $r2 = rand(0, $arrLength - 1);
                                        }

                                        echo '<div class="vote-container">
                                                    <div class="game1 fadeIn">
                                                        <div class="votePicture">
                                                            <img class="card-img" src="' . $allGames[$r]->getGamePicture() . '" alt="">
                                                        </div>
                                                        <div class="voteInfo">
                                                            <h3 class="card-title">' . $allGames[$r]->getGameName() . '</h3>
                                                            <h4 class="upvotes">Votes: ' . $allGames[$r]->getGameUpVotes() . '</h4>
                                                        </div>
                                                        <a href="addUpvote.php?id=' . $allGames[$r]->getGameID() . '&n=' . $r . '" class="voteButton">Vote</a>
                                                    </div>
                                                    
                                                    <div class="game1 fadeIn first">
                                                        <div class="votePicture">
                                                            <img class="card-img" src="' . $allGames[$r2]->getGamePicture() . '" alt="">
                                                        </div>
                                                        <div class="voteInfo">
                                                            <h3 class="card-title">' . $allGames[$r2]->getGameName() . '</h3>                           
                                                            <h4 class="upvotes">Votes: ' . $allGames[$r2]->getGameUpVotes() . '</h4>
                                                        </div>
                                                        <a href="addUpvote.php?id=' . $allGames[$r2]->getGameID() . '&n=' . $r2 . '" class="voteButton">Vote</a>
                                                </div>
                                                </div>';
                                    }

                                ?>
                    </div>

                </div>
                

            </section>
        </main>
        <div class="circle1"></div>
        <div class="circle2"></div>
        <div class="circle3"></div>
        <?php
            // adds add review button when on my reviews page
            if (isset($_GET["0"])) :
                ?>
                <script>
                
                    document.getElementById("newBtn").innerHTML = '<button type="button" id="newReview">Add Review</button>';
                </script>

                <?php                    
            endif;
        ?>
        <div class="footer">
            <footer class="foot">Game Rater - Austin West &bull; Giancarlo Gutierrez &bull; Austin Duran</footer>
        </div>

    </body>


</html>