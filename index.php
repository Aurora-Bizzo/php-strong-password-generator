<?php

    function passwordGenerator($lenght)
    {
        $data = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!£$%&/()=?^<>[]{}@§-_+*';

        while(strlen($password) < $lenght)
        {
            $char = $data[rand(0, strlen($data) -1)];
            $password .= $char;
        }

        return $password;
    }

    if (isset($_GET['password_lenght']) && $_GET['password_lenght'] !== '')
    {
        $password = passwordGenerator($_GET ['password_lenght']);
    }
    elseif (isset($_GET['password_lenght']) && $_GET['password_lenght'] === '')
    {
        $error = 'Nessun parametro valido inserito';
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css\style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">

        <div class="row">

            <div class="col-12 d-flex flex-column align-items-center">
                <h1 class="text-muted my-4">Strong Password Generator</h1>
                <h2 class="text-white mb-4">Genera una password sicura</h2>
            </div>

        </div>


        <div class="row">

            <?php if(isset ($error)){  ?>
                <div class="alert alert-info col-8 mx-auto" role="alert">
                    <?php echo $error; ?>
                </div>
            <?php } ?>

        </div>


        <div class="row">

            <div class="col-8 mx-auto p-4 bg-white rounded">

                <form action="./index.php" method="GET">

                    <div class="form-group row">
                        <div class="col-6">
                            <label>Lunghezza password:</label>
                        </div>
                        <div class="col-6">
                            <input type="number" class="rounded" name="password_lenght">
                        </div>
                    </div>
            
                    <div class="form-group row my-3">
                        <div class="col-12">
                            <button class="btn btn-primary">Invia</button>
                            <button class="btn btn-secondary">Annulla</button>
                        </div>
                    </div>

                    <?php if(isset ($password)){  ?>
                    <h3 class="d-flex justify-content-center">
                        La tua password è: <?php echo $password; ?>
                    </h3>
                    <?php } ?>

                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="./js/script.js"></script>
</body>
</html>