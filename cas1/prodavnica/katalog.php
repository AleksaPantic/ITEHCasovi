<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table{
            border-collapse:collapse;

        }
        td,th {
            border: 1 px solid black;
        }
    </style>
    <title>Katalog proizvoda</title>
</head>

<body>
    <p>
    Vasa korpa sadrzi:proizvoda
    </p>
    <a href="?vidi_korpu">
        Vidi korpu:
    </a>
    <br>

    <table border="1">
        <thead>
            <tr>
                <th>Naziv proizvoda</th>
                <th>Cena proizvoda</th>
            </tr>
        </thead>
        <tbody>

            <tr>

            <?php foreach($proizvodi as $pr): ?>
                <td><?php echo $pr['naziv']; ?></td>
                <td><?php echo $pr['cena']; ?> </td>
                
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $pr['id']; ?>">
                        <input type="submit" name="submit" value="Kupi">
                    </form>
                </td>
            </tr>

            <?php endforeach; ?>

        </tbody>
    </table>

</body>
</html>