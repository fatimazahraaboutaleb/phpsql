<?php
$conn = new PDO("mysql:host=localhost; dbname=something1", "root", "");

if (isset($_GET["action"]) && $_GET["action"] == "delete-employee" && isset($_GET["id"])) {
    $query = $conn -> prepare("DELETE FROM employees WHERE employeeNumber=?");
    $query -> execute([$_GET["id"]]);
}

if (isset($_GET["modify"]) && $_GET["modify"] == "modify-employee" && isset($_GET["id"])) {
    $lastname = $_GET["lastname"];
    $firstname = $_GET["firstname"];
    $email = $_GET["em"];
    $query = $conn -> prepare("UPDATE employees SET lastName=$lastname , firstName=$firstname email=$email WHERE employeeNumber=?");
    $query -> execute([ $lastname, $firstname, $email, $_GET["id"]]);
}


// $code ="1002";
// $query = $conn -> prepare ("SELECT * FROM employees WHERE employeeNumber= :id");
// $query -> bindParam(":id", $code);
// $query -> execute();
// $rows = $query -> fetchAll();


// $code = "1002";
// $query =$conn -> prepare("SELECT * FROM employees WHERE employeeNumber= ?");
// $query -> execute([$code]);
// $rows=$query -> fetchAll();


//  foreach($rows as $row){
//      echo $row["firstName"]. " ". $row["lastName"]." " . $row["email"]. "<br>";
//  }

?>

<table style=" text-align: center; width: 700px; margin: auto;">
    <thead>
        <tr>
            <th >FirstName</th>
            <th>LastName</th>
            <th>Email</th>
            <th ></th>
        </tr>
    </thead>
    <tbody>
        <?php
            $query = $conn -> query("SELECT * from employees LIMIT 20");
            $rows = $query -> fetchAll(); foreach($rows as $row): ?>
        <form action="" method="GET">
            <tr>
                <td><?= $row["firstName"]; ?></td>
                <td><?= $row["lastName"]; ?></td>
                <td><?= $row["email"]; ?></td>
                <td>
                    <form action="formul.php" method="GET">
                        <button value="modify-employee" name="modify">modifier</button>
                        <input type="hidden" name="lastname" value="<?= $_GET["lName"]?>">
                        <input type="hidden" name="firstname" value="<?= $_GET["fName"]?>">
                        <input type="hidden" name="em" value="<?= $_GET["eml"]?>">
                        <input type="hidden" name="id" value="<?= $row["employeeNumber"]?>">
                    </form>
                    <button type="submit" name="action" value="delete-employee">suprimer</button>
                    <input type="hidden" name="id" value="<?= $row["employeeNumber"]?>">
                </td>
            </tr>
        </form>
        <?php endforeach; ?>
    </tbody>
</table>

