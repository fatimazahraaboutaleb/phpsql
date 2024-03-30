
<?php
$conn = new PDO("mysql:host=localhost; dbname=something1", "root", "");

if (isset($_GET["modify"]) && $_GET["modify"] == "modify-employee" && isset($_GET["id"])) {
    $lastname = $_GET["lastname"];
    $firstname = $_GET["firstname"];
    $email = $_GET["eml"];
    $query = $conn -> prepare("UPDATE employees SET lastName=? , firstName=?, email=? WHERE employeeNumber=?");
    $query -> execute([ $lastname, $firstname, $email, $_GET["id"]]);
}
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