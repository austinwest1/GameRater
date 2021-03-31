Team
Austin W
Austin D
Giancarlo

(side note names are written as intended)
Database Needed:
new database with name => cs3620

remember gitignore=>
need an .env file for local db connection

also need to set the env variables
for the project configuration
so the connection will function on site


tables in cs3620=>
      games=>
         gameId            int(11)
         gameName          varchar(100)
         gameDescription   varchar(256)
         gameRating        int(11)
         gameUser          int(11)
      user=>
         user_id           int(11)
         first_name        varchar(20)
         last_name         varchar(20)
         username1         varchar(80)
         password1         varchar(256)



To let common Pathing work must name file Game Rater and that file must be in the htdocs folder,
use this folder as the git repo

To link up with the Repo probably:
 git init
 git branch -M main
 git remote add origin https://github.com/GiancarloGutierrez/GameRater.git
 git push -u origin main
 

Side Note:
For common pathing:
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/common/header.php";
   include_once($path);
?>
