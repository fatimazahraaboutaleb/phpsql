
<?php
$conn = new PDO("mysql:host=localhost; dbname=something1", "root", "");

// $id=$_GET["id"];
// $query = $conn -> prepare("SELECT * FROM employees WHERE employeeNumber= :id");
// $query -> bindParam(":id" , $id);
// $query -> execute();
// $row = $query->fetch(PDO::FETCH_ASSOC);


// echo $row["firstName"] . " " . $row["lastName"] . " " . $row["email"];




if (isset($_GET["modify"]) && $_GET["modify"] == "modify-employee" && isset($_GET["id"])) {
    $id=$_GET["id"];
    $lastname = $_GET["lastname"];
    $firstname = $_GET["firstname"];
    $email = $_GET["eml"];
    $query = $conn -> prepare("UPDATE employees SET lastName= :lastname , firstName= :firstname, email= :email WHERE employeeNumber= :id");
    $query -> bindParam(":id" , $id);
    $query -> bindParam(":lastname" , $lastname);
    $query -> bindParam(":firstname" , $firstname);
    $query -> bindParam(":email" , $email);
    $query -> execute();
}

// if (isset($_GET["modify"]) && $_GET["modify"] == "modify-employee" && isset($_GET["id"])) {
//     $lastname = $_GET["lastname"];
//     $firstname = $_GET["firstname"];
//     $email = $_GET["eml"];
//     $query = $conn -> prepare("UPDATE employees SET lastName=? , firstName=?, email=? WHERE employeeNumber=?");
//     $query -> execute([ $lastname, $firstname, $email, $_GET["id"]]);
// }
?>
    <form action="" method="GET">
        <label for="fn">first name</label>
        <input type="text" id="fn" name="firstname"><br>
        <label for="ln">last name</label>
        <input type="text" id="ln" name="lastname">
        <label for="em">email</label>
        <input type="email" name="eml" id="em">
        <button type="submit" name="modify" value="modify-employee">submit</button>
    </form>