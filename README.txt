Team
Austin W
Austin D
Giancarlo


Notes:
Common Pathing switched to allowe the root to be htdocs rather than gameRater for
the local development=> may need to reposition files to make work again on local instance

Site index is under homepage/index.php?0&sort=0

tables in cs3620=>
      games=>
         gameId            int(11)
         gameName          varchar(100)
         gameDescription   varchar(256)
         gameRating        int(11)
         gameUser          int(11)
         gamePicture       varchar(300)
         GameUpvotes       int(11)
      user=>
         user_id           int(11)
         first_name        varchar(20)
         last_name         varchar(20)
         username1         varchar(80)
         password1         varchar(256)
