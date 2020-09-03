<html>
<head></head>
<body>
    <form method="post" action="sql_injection.php">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome">
        <input type="submit" name="submit" value="EU ESCOLHO VOCE!">  
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $db = pg_connect("host = 127.0.0.1 port = 5432 dbname = sql_injection user = user password = password");
            $query = "INSERT INTO table_injection(nome) VALUES ('$_POST[nome]');";
            $result = pg_query($db, $query); 
            if(!$result) {
                echo pg_last_error($db);
            } else {
                echo "Records created successfully\n";
            }
            pg_close($db);
        }
    ?>
</body>
</html>


