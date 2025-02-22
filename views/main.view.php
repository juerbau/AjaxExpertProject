<!DOCTYPE html>

<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport"
            content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <link rel="stylesheet" href="./styles/main.css" type="text/css">

        <title>Document</title>
    </head>

    <body>



    <?php foreach ($dogs as $dog): ?>

        <p>ID: <?= e($dog["id"]); ?> Name:<b> <?= e($dog["name"]); ?></b></p>

    <?php endforeach; ?>

    <?php var_dump(__DIR__); ?>

<!-- Beispiel für eine Tabelle
        <table>
            <caption>
                Council budget (in £) 2018
            </caption>
            <thead>
                <tr>
                    <th>Bild</th>
                    <th>Titel</th>
                    <th>Aktionen</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>image</td>
                    <td>Bild vom Berg</td>
                    <td>Löschen oder Speichern?</td>
                </tr>
            </tbody>
        </table> -->

        <script src="js/app.js"></script>
    </body>
</html>