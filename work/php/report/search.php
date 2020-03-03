<?php require __DIR__ . "\\view\\header.php"; 

require "db/connect.php";
require "db/functions.php";

// Get incoming values
$search = $_GET["search"] ?? null;
$like = "%$search%";
//var_dump($_GET);

if ($search) {
    // Connect to the database
    $db = connectDatabase($dsn);

    // Prepare and execute the SQL statement
    $sql = <<<EOD
SELECT * FROM tech
WHERE
    idtech = ?
    OR manufacturer LIKE ?
    OR name LIKE ?
    OR serialnumber LIKE ?
;
EOD;
    $stmt = $db->prepare($sql);
    $stmt->execute([$search, $like, $like, $like]);

    // Get the results as an array with column names as array keys
    $res = $stmt->fetchAll();
    
}




?><h1>Search the database</h1>

<form>
    <p>
        <label>Search: 
            <input type="text" name="search" value="<?= $search ?>">
        </label>
        <label>
            <input type="submit" value="Submit"/>
        </label>
    </p>
</form>

<?php if ($search) : ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Manufacturer</th>
            <th>Name</th>
            <th>Serialnumber</th>
        </tr>

    <?php foreach ($res as $row) : ?>
        <tr>
            <td><?= $row["idtech"] ?></td>
            <td><?= $row["manufacturer"] ?></td>
            <td><?= $row["name"] ?></td>
            <td><?= $row["serialnumber"] ?></td>
        </tr>
    <?php endforeach; ?>

    </table>
<?php endif; ?>

<?php require __DIR__ . "\\view\\footer.php"; ?>