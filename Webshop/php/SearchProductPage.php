<?php 
    //include './top-header.php';

    $servername = "studmysql01.fhict.local";
    $username = "dbi428501";
    $database = "dbi428501";
    $password = "1234";

    $connection = new mysqli($servername, $username, $password, $database);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css//all.min.css">
    <link rel="stylesheet" href="./pop-up-menu/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Product</title>
</head>
<body>

    <h1> Search product Page</h1>

    <!--  the design has to be made -->
    <div class="article-container">
        <?php 
            if(isset($_POST['submit-product']))
            {
                $search = mysqli_real_escape_string($connection, $_POST['search']);
                $sql = "SELECT * FROM product WHERE product_name LIKE '%$search%' 
                 OR Brand LIKE '%$search%'";
                $result = mysqli_query($connection, $sql);
                $queryResult = mysqli_num_rows($result);

                if($queryResult > 0)
                {
                    while($row = mysqli_fetch_assoc(($result)))
                    {
                        echo "<h3>" . $row['product_name'] . "</h3>
                            <p>" . $row['Category'] . " - " . $row['Brand'];
                    }
                }
                else
                {
                    echo "There are no results matching your search!";
                }
            }
        ?>
    </div>
</body>
</html>