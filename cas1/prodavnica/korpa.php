<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Korpa</title>
    <style>
        table{
            border-collapse:collapse;

        }
        td,th {
            border: 1 px solid black;
        }
    </style>
</head>
<body>
    
    <table border="1">
        <thead>
            <tr>
                <th>Naziv proizvoda</th>
                <th>Cena proizvoda</th>
                <th>Kolicina</th>
            </tr>
        </thead>
        <tbody>

            <?php 
                foreach($korpa as $krp):
            ?>

            <tr>
                <td><?php echo $krp['naziv'];?></td>
                <td><?php echo $krp['cena']; ?></td>
                <td><?php echo $krp['broj']; ?></td>
                </td>
            </tr>
                <?php
                    endforeach; 
                ?>
        </tbody>
        <tfoot>
            <td>Ukupna cena</td>
            <td colspan="2" align="center"><?php echo $ukupno; ?></td>
        </tfoot>
    </table>
    
    <form action="">
        <p>
            <a href="?">Nastavi sa kupovinom</a>
            <input type="submit" name="submit" value="Isprazni">
        </p>
    </form>

</body>
</html>