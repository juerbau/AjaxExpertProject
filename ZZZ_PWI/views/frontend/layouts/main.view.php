<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./styles/simple.css" />
    <link rel="stylesheet" href="./styles/custom.css" />
    <title>PWI Auftragsbearbeitung</title>
</head>
<body>
    <header>
        <h1>PWI Auftragsbearbeitung</h1>
        <p>Hier können Sie die Aufträge auswählen und bearbeiten</p>
    </header>

    <fieldset>
        <label for="finas-choose">Finas-ID eingeben:</label>
        <input id="finas-choose" class="finas-choose" type="text">

        <ul id="finas-result" class="finas-result">

        </ul>

    </fieldset>

    <main>
        <?php echo $content; ?>
    </main>
    <footer>
        <p>Projekt: PWI Auftragsdatenbank</p>
    </footer>
    <script type="text/javascript" src="./js/main.js"></script>
</body>
</html>