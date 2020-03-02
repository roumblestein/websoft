<?php require __DIR__ . "\\view\\header.php"; 

require __DIR__ . "\\db\\connect.php";
   require __DIR__ . "\\db\\queries.php"; 

    $rowType = 1;

    $searchValue = $_GET["searchValue"] ?? null;

    if($searchValue){
        $db = connectToDatabase($dsn);
        $res = selectWildcard($db, $searchValue);
    }

?>




<form>
    <p>
        <label>Search for value:
            <input type="text"  value="<?= $searchValue ?>"/>
        </label>

        <label>
            <input type="submit" value="Submit"/>
        </label>
    </p>

</form>

<?php if ($searchValue) : ?>
    <table class="dataTable">
        <tr class="dataColumn">
            <th>ID</th>
            <th>manufacturer</th>
            <th>name</th>
            <th>serialnumber</th>
        </tr>

    <?php foreach ($res as $row) : ?>
        <tr class="dataRow<?= $rowType ?>">
            <td><?= $row["idtech"] ?></td>
            <td><?= $row["manufacturer"] ?></td>
            <td><?= $row["name"] ?></td>
            <td><?= $row["serialnumber"]?></td>
        </tr>
    <?php 
        if ($rowType == 1){
            $rowType = 0;
        }else {
            $rowType = 1;
        }
        endforeach;
    ?>
    </table>
<?php endif; ?>
<?php require __DIR__ . "\\view\\footer.php"; ?>