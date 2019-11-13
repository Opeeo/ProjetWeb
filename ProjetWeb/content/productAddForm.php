
<!-- Formulaire d'ajout de produit -->

                <div class="container">

                    <div class="row add-container">
                        <div class="col-md-10 col-lg-9 mx-auto">
                            <h3 class="login-heading mb-4">Ajouter un nouveau produit à la boutique :</h3>

                            <!-- TODO: Action du formulaire à modifier -->

                            <form action="productAdd.php" method="post">
                                <div class="form-label-group">
                                    <input type="text" id="inputName" class="form-control" name="productName" placeholder="Product name" required autofocus>
                                    <label for="inputName">Nom du produit</label>
                                </div>

                                <div class="form-label-group">
                                    <textarea type="text" class="form-control" id="inputDesc" name="productDesc" rows="5" placeholder="Description" required></textarea>
                                    <label for="inputDesc">Description produit</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="number" id="inputPrice" class="form-control" name="productPrice" placeholder="Price" required>
                                    <label for="inputPrice">Prix du produit (en €)</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="url" id="inputImage" class="form-control" name="productImage" placeholder="Image" required>
                                    <label for="inputImage">Lien image du produit</label>
                                </div>

                                <button class="btn btn-lg btn-dark btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">AJOUTER PRODUIT</button>
                            </form>
                        </div>
                    </div>


                    <!-- TODO: var_dump pour code bouchoné (à enlever pour version finale) -->
                    <?php var_dump($_POST); ?>

                </div>

