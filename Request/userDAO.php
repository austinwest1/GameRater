<?php
class UserDAO
{
  function getUser($user)
  {
    $path1 = $_SERVER['DOCUMENT_ROOT'];
    require_once($path1 . "/Request/utilities/connection.php");
    $sql = "SELECT first_name, last_name, username1, user_id FROM user WHERE user_id =" . $user->getUserId();
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
        $user->setFirstName($row["first_name"]);
        $user->setLastName($row["last_name"]);
        $user->setUsername($row["username1"]);
      }
    } else {
      //echo "0 results";
    }
    $conn->close();
  }

  function checkLogin($passedinusername, $passedinpassword)
  {
    $path1 = $_SERVER['DOCUMENT_ROOT'];
    require_once($path1 . "/Request/utilities/connection.php");
    $user_id = 0;
    $sql = "SELECT user_id FROM user WHERE username1 = '" . $passedinusername . "' AND password1 = '" . hash("sha256", trim($passedinpassword)) . "'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $user_id = $row["user_id"];
      }
    }
    $conn->close();
    return $user_id;
  }

  function createUser($user)
  {
    $path1 = $_SERVER['DOCUMENT_ROOT'];
    require_once($path1 . "/Request/utilities/connection.php");
    //prepare and bind
    $stmt = $conn->prepare(
      "INSERT INTO gamerater.user
    (
    username1,
    password1,
    first_name,
    last_name)
    VALUES
    (?, ?, ?, ?)"
    );
    $un = $user->getUsername();
    $pw = $user->getPassword();
    $fn = $user->getFirstName();
    $ln = $user->getLastName();

    $stmt->bind_param("ssss", $un, $pw, $fn, $ln);
    if (!$stmt->execute()) {
      $stmt->close();
      $conn->close();
      session_start();
      $_SESSION['errorMessage'] = "User already exists";
      header("Location: " . $path1 . "/register.php");
    }

    $stmt->close();
    $conn->close();
  }

  function deleteUser($un)
  {
    $path1 = $_SERVER['DOCUMENT_ROOT'];
    require_once($path1 . "/Request/utilities/connection.php");
    $sql = "DELETE FROM gamerater.user WHERE username = '" . $un . "';";

    if ($conn->query($sql) === TRUE) {
      echo "user deleted";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
  }
}
