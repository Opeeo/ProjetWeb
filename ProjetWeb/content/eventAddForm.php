
<!-- Formulaire d'ajout de produit -->

<div class="container">

    <div class="row add-container">
        <div class="col-md-10 col-lg-9 mx-auto">
            <h3 class="login-heading mb-4">Ajouter un nouvel événement :</h3>

            <!-- TODO: Action du formulaire à modifier -->

            <form action="eventAdd.php" method="post">

                <div class="form-inline text-center">

                    <div style="padding: 0" class="form-label-group col-sm">
                        <input type="text" id="inputName" class="form-control" name="eventName" placeholder="Event name" required autofocus>
                        <label for="inputName">Nom du l'événement</label>
                    </div>
                    <div style="padding: 0" class="form-label-group col-sm">
                        <input class="form-control" type="date" id="inputDate" name="eventDate" placeholder="Event date" required>
                        <label for="inputDate">Date de l'événement</label>
                    </div>


                </div>

                <div class="form-label-group">
                    <textarea type="text" class="form-control" id="inputDesc" name="eventDesc" rows="5" placeholder="Description" required></textarea>
                    <label for="inputDesc">Description de l'événement</label>
                </div>

                <div class="form-label-group">
                    <input type="number" id="inputPrice" class="form-control" name="eventPrice" placeholder="Price" required>
                    <label for="inputPrice">Prix de l'événement (0 pour gratuit)</label>
                </div>

                <div class="form-label-group">
                    <input type="url" id="inputImage" class="form-control" name="eventImage" placeholder="Image" required>
                    <label for="inputImage">Lien image de l'événement</label>
                </div>

                <div style="margin-bottom: 15px" class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="eventReccurence">
                        Evénement reccurent
                    </label>
                </div>


                <button class="btn btn-lg btn-dark btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">PLANIFIER L'EVENEMENT</button>
            </form>
        </div>
    </div>




    <!-- TODO: var_dump pour code bouchoné (à enlever pour version finale) -->
    <?php var_dump($_POST); ?>

</div>

