<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.js">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
</head>
<body>
    <div class="container-fluid">
        <div class="row no-gutter">
          <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
          <div class="col-md-8 col-lg-6">
            <div class="login d-flex align-items-center py-5">
              <div class="container">
                <div class="row">
                  <div class="col-md-9 col-lg-8 mx-auto">
                    <h3 class="login-heading mb-4">Rejoindre votre espace BDE :</h3>
                    <form action="./verifRegister">
                      <div class="form-label-group">
                        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                        <label for="inputEmail">Adresse email</label>
                      </div>
      
                      <div class="form-label-group">
                        <input type="text" id="inputName" class="form-control" placeholder="Name" required>
                        <label for="inputName">Nom</label>
                      </div>

                      <div class="form-label-group">
                        <input type="text" id="inputFirstName" class="form-control" placeholder="First name" required>
                        <label for="inputFirstName">Prénom</label>
                      </div>

                      <!-- Check campus Toulouse ? -->
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="CP" required>
                        <label class="custom-control-label" for="CP">Inscription au campus de Toulouse</label>
                      </div>

                      <!-- Check CGU acceptées ? -->
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="CGU" required>
                        <label class="custom-control-label" for="CGU"><strong><a class="text-dark" href="cgu.php">Conditions générales d'utilisation</a></strong></label>
                      </div>

                      <button class="btn btn-lg btn-dark btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Inscription</button>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</body>
</html>
