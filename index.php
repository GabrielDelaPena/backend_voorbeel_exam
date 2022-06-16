<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>People Counter</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
        <a class="navbar-brand" href="#">People Counter</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="historiek.php">Log</a>
                </li>
            </ul>
        </div>
    </nav>


    <main role="main" class="container" id="mainContent">
        <div class="jumbotron">
            <h1>Er zijn momenteel <span>xx</span> mensen binnen aanwezig en <span>xx</span> buiten</h1> <!-- Zorg ervoor dat het huidige aantal bezoekers in de spans komen te staan -->

            <div class="row" style="margin-top: 50px;">
                <div class="col-6">

                    <!--   Deze error dient getoond te worden wanneer de validatie faalt, anders komt dit niet tevoorschijn
            <div id="formError" class="alert alert-danger" role="alert" >
                <strong>Aantal personen</strong> is verplicht en moet een positief getal zijn!
            </div> -->

                    <!--   Deze error dient getoond te worden wanneer het totaal aantal mensen te hoog is
            <div id="formError" class="alert alert-danger" role="alert" >
                <strong>Maximum aantal personen binnen aanwezig</strong> kan niet hoger dan 50 zijn!
            </div> -->

                    <!--   Deze error dient getoond te worden wanneer iemand voor 1 oktober zou willen dansen
            <div id="formError" class="alert alert-danger" role="alert" >
                Wegens richtlijnen van de regering is het niet mogelijk om je aan te melden om te dansen voor 1 oktober 2021.
            </div> -->
                    <?php
                    session_start();

                    if (isset($_SESSION['errors'])) {
                        foreach ($_SESSION['errors'] as $error) {
                            echo $error . "<br>";
                        }
                    }


                    ?>

                    <p class="lead">Mensen aanmelden</p>
                    <form action="process.php" method="POST">
                        <!-- Vul de form tag aan zodat deze informatie naar process.php zal gepost worden -->
                        <input type="number" name="add_people">
                        <hr>
                        <input type="radio" name="location" value="inside"> Binnen<br>
                        <input type="radio" name="location" value="outside"> Buiten
                        <hr>
                        <input type="radio" name="activity" value="drinks"> Drinken<br>
                        <input type="radio" name="activity" value="dance"> Dansen
                        <hr>
                        <input type="submit" class="btn btn-success" value="Voeg toe" name="add">
                    </form>
                </div>

                <div class="col-6">

                    <!--   Deze error dient getoond te worden wanneer de validatie faalt, anders komt dit niet tevoorschijn
            <div id="formError" class="alert alert-danger" role="alert" >
                <strong>Aantal personen</strong> is verplicht en moet een positief getal zijn!
            </div> -->

                    <!--   Deze error dient getoond te worden wanneer het totaal aantal mensen onder 0 zou gaan
            <div id="formError" class="alert alert-danger" role="alert" >
                <strong>Maximum aantal personen aanwezig</strong> kan niet lager dan 0 zijn!
            </div> -->

                    <p class="lead">Mensen afmelden</p>
                    <form action="process.php" method="POST">
                        <!-- Vul de form tag aan zodat deze informatie naar process.php zal gepost worden -->
                        <input type="number" name="remove_people">
                        <hr>
                        <input type="radio" name="location" value="inside"> Binnen<br>
                        <input type="radio" name="location" value="outside"> Buiten
                        <hr>
                        <input type="submit" class="btn btn-warning" value="Trek af" name="remove">
                    </form>
                </div>
            </div>
        </div>
    </main>


</body>

</html>