

<?php require __DIR__ . "\\view\\header.php"; ?>


    <head>
        <title>Convert JSON Data to HTML Table</title>
        <style>
            th, td, p, input {
                font:14px Verdana;
            }
            table, th, td 
            {
                border: solid 1px #DDD;
                border-collapse: collapse;
                padding: 20px 10px;
                text-align: center;
            }
            th {
                font-weight:bold;
            }
        </style>
    </head>
<body>
    <input type="button" onclick="jsonFetch()" value="fetch" />
    <p id="showData"></p>
</body>

<?php require __DIR__ . "\\view\\footer.php"; ?>

<script src="js/duck.js"></script>
<script src="js/fetch.js"></script>

</html>
