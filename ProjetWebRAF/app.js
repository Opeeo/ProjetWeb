
//initialisation du server grace à express
const express = require('express')
const app = express()
const morgan = require('morgan')
const mysql = require('mysql')
const bodyParser = require('body-parser')

app.use(bodyParser.urlencoded({extended: false}))

app.use(express.static('./public'))

app.use(morgan('short'))

const poolLocale = mysql.createPool({
    connectionLimit: 10,
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'projetweb_locale'

})

function getConnectionLocale() {
    return poolLocale

}

const poolCommune = mysql.createPool({
    connectionLimit: 10,
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'projetweb_commune'

})

function getConnectionCommune() {
    return poolCommune

}

app.get("/recupCommandes", (req, res) =>{

    const queryString = "SELECT contenu FROM commandes"
    getConnectionLocale().query(queryString, (err, rows) =>{
    
        if(err){

            console.log("Fetch products error: \n" + err)
            return
        }

        res.json(rows)
        return
    })
})

app.get("/recupCategory", (req, res) =>{

    const queryString = "SELECT DISTINCT(categorie) FROM produits"
    getConnectionLocale().query(queryString, (err, rows) =>{
    
        if(err){

            console.log("Fetch products error: \n" + err)
            return
        }

        res.json(rows)
        return
    })
})

app.get("/recupProduitById/:id", (req, res) =>{

    const id = req.params.id
    const queryString = "SELECT * FROM produits WHERE id = ?"
    getConnectionLocale().query(queryString, [id], (err, rows) =>{
    
        if(err){

            console.log("Fetch products error: \n" + err)
            return
        }

        res.json(rows)
        return
    })
})

app.get("/updatePanier/:userId/:jsonString", (req, res) => {
    
    const userId = req.params.userId
    const jsonString = req.params.jsonString
    const queryString = "UPDATE utilisateurs SET panier = ? WHERE id = ?"

    getConnectionLocale().query(queryString, [jsonString, userId], (err, rows) =>{

        if(err){

            console.log("Fetch users error: \n" + err)
            return
        }
        res.send("1")
        return
    })
})

app.get("/ajoutCommande/:userId/:jsonString/:prix", (req, res) => {
    
    const userId = req.params.userId
    const jsonString = req.params.jsonString
    const prix = req.params.prix
    const date = new Date();
    const emptyJson = "[]"

    const queryInsert = "INSERT INTO commandes(id_utilisateur, contenu, prix, date) VALUES (?, ?, ?, ?)"
    const queryUpdate = "UPDATE utilisateurs SET panier = ?  WHERE id = ?"
    const querySelect = "SELECT id FROM commandes WHERE id_utilisateur = ? ORDER BY id DESC LIMIT 0, 1"

    getConnectionLocale().query(queryInsert, [userId, jsonString, prix, date], (err, rows1) =>{

        if(err){

            console.log("Fetch users error: \n" + err)
            return
        }
    })

    getConnectionLocale().query(queryUpdate, [emptyJson, userId], (err, rows2) =>{

        if(err){

            console.log("Fetch users error: \n" + err)
            return
        }
    })

    getConnectionLocale().query(querySelect, [userId], (err, rows3) =>{

        if(err){

            console.log("Fetch users error: \n" + err)
            return
        }
        res.send(rows3)
        return
    })
})

app.get("/recupProduit", (req, res) =>{

    const queryString = "SELECT * FROM produits"
    getConnectionLocale().query(queryString, (err, rows) => {

        if(err){

            console.log("Fetch products error: \n" + err)
            return
        }

        res.json(rows)
        return
    })
})

app.get("/deleteProduct/:idProduct", (req, res) =>{

    const idProduct = req.params.idProduct
    const queryString = "DELETE FROM produits WHERE id = ?"

    getConnectionLocale().query(queryString, [idProduct], (err,rows, fields) => {
       
        console.log("Deleting product...")

        if(err){

            console.log("Delete error: \n" + err)
            return
        }
        res.send("Suppression du produit")
        return
    })

})

app.get("/recupParticipation/:idEvent", (req, res) => {

    const idEvent = req.params.idEvent

    const queryString = "SELECT id_utilisateur FROM participations WHERE id_evenement = ?"

    getConnectionLocale().query(queryString, [idEvent], (err, rows) => {
        if(err){
            console.log("Fetch events error: \n" + err)
            return
        }
        console.log("Fetching events....")
        res.json(rows)
        return
    })

})

app.get("/addProduct/:nom/:prix/:quant/:url/:category", (req, res) =>{

    const lien = req.params.url
    const nom = req.params.nom
    const quant = req.params.quant
    const prix = req.params.prix
    const category = req.params.category


    const queryString = "INSERT INTO produits(nom, prix, quantite, img, categorie) VALUES (?, ?, ?, ?, ?)"

    getConnectionLocale().query(queryString, [nom, prix, quant, lien, category], (err,rows, fields) => {
       
        console.log("Adding product...")

        if(err){

            console.log("Add error: \n" + err)
            return
        }
        res.send("Produit ajouté")
        return
    })


})

app.get("/addEvent/:nom/:date/:desc/:prix/:url/:rec", (req, res) =>{

    const lien = req.params.url
    const nom = req.params.nom
    const date = req.params.date
    const desc = req.params.desc
    const prix = req.params.prix
    const rec = req.params.rec


    const queryString = "INSERT INTO evenement(nom, date, description, image, recurrence, prix) VALUES (?, ?, ?, ?, ?, ?)"

    getConnectionLocale().query(queryString, [nom, date, desc, lien, rec, prix], (err,rows, fields) => {
       
        console.log("Adding event...")

        if(err){

            console.log("Add error: \n" + err)
            return
        }
        res.send("Evenement ajouter")
        return
    })


})

app.get("/addPhoto/:url/:idEvent/:idUser", (req, res) =>{

    const lien = req.params.url
    const idEvent = req.params.idEvent
    const idUser = req.params.idUser
    const queryString = "INSERT INTO photos(id_utilisateur, id_evenement, lien) VALUES (?, ?, ?)"

    getConnectionLocale().query(queryString, [idUser, idEvent, lien], (err,rows, fields) => {
       
        console.log("Adding photo...")

        if(err){

            console.log("Add error: \n" + err)
            return
        }
        res.send("Ajout de la photo")
        return
    })

})

app.get("/deletePhoto/:idPhoto", (req, res) =>{

    const idPhoto = req.params.idPhoto
    const queryString = "DELETE FROM photos WHERE id = ?"

    getConnectionLocale().query(queryString, [idPhoto], (err,rows, fields) => {
       
        console.log("Deleting photo...")

        if(err){

            console.log("Delete error: \n" + err)
            return
        }
        res.end("Suppression de la photo")
        return
    })

})

app.get("/addComs/:contenu/:idPhoto/:idUser/:date", (req, res) =>{

    const contenu = req.params.contenu
    const idPhoto = req.params.idPhoto
    const idUser = req.params.idUser
    const date = req.params.date
    const queryString = "INSERT INTO commentaires(id_photo, id_utilisateur, contenu, date, cache)) VALUES (?, ?, ?, ?, 0)"

    getConnectionLocale().query(queryString, [idPhoto, idUser, contenu, date], (err,rows, fields) => {
       
        console.log("Adding coms...")

        if(err){

            console.log("Add error: \n" + err)
            return
        }
        res.send("commentaire envoyé")
        return
    })

})

app.get("/deleteComs/:idComs", (req, res) =>{

    const idComs = req.params.idComs
    const queryString = "DELETE FROM commentaires WHERE id = ?"

    getConnectionLocale().query(queryString, [idComs], (err,rows, fields) => {
       
        console.log("Deleting coms...")

        if(err){

            console.log("Delete error: \n" + err)
            return
        }
        res.send("Suppression du commentaire")
        return
    })

})


app.get("/isUserInEvent/:idUser/:idEvent", (req, res) => {


    const idUser = req.params.idUser
    const idEvent = req.params.idEvent

    const queryStringIsInsc = "SELECT * FROM participations WHERE id_evenement = ? AND id_utilisateur = ?" 

    getConnectionLocale().query(queryStringIsInsc, [idEvent, idUser], (err,rows, fields) => {
       
        console.log("Fetching user....")

        if(err){

            console.log("Fetch events error: \n" + err)
            return
        }
        if(rows != ""){

            res.send("Trouvé !") 
        }

        res.end()
    })


})

app.get("/inscEvent/:idEvent/:idUser", (req, res) => {

    const idEvent = req.params.idEvent
    const idUser = req.params.idUser
    const queryStringInsc = "INSERT INTO participations(id_evenement, id_utilisateur) VALUES (?, ?)" 

    getConnectionLocale().query(queryStringInsc, [idEvent, idUser], (err,rows, fields) => {
        if(err){
            console.log("Fetch events error: \n" + err)
            return
        }
        res.send("1")
        return
    })


})

app.get("/desinscEvent/:idEvent/:idUser", (req, res) => {

    const idEvent = req.params.idEvent
    const idUser = req.params.idUser
    const queryStringInsc = "DELETE FROM participations WHERE id_evenement = ? AND id_utilisateur = ?" 

    getConnectionLocale().query(queryStringInsc, [idEvent, idUser], (err,rows, fields) => {
        if(err){
            console.log("Fetch events error: \n" + err)
            return
        }
        res.send("1")
        return
    })


})

app.get("/recupUsers/:id", (req, res) => {

    const idUser = req.params.id
    const queryString = "SELECT nom, prenom FROM utilisateurs WHERE id = ?"
    getConnectionLocale().query(queryString, [idUser], (err, rows) =>{
       
       console.log("Fetching user....")
        if(err){
            console.log("Fetch user error: \n" + err)
            return
        }
        
        res.json(rows)
        return
    })
})
app.get("/recupEvent", (req, res) => {

    
    const queryString = "SELECT * FROM evenement"

    getConnectionLocale().query(queryString, (err, rows) => {
        if(err){
            console.log("Fetch events error: \n" + err)
            return
        }
        console.log("Fetching events....")
        res.json(rows)
        return
    })

})

app.get("/recupPhoto", (req, res) => {

    
    const queryString = "SELECT * FROM photos"

    getConnectionLocale().query(queryString, (err, rows) => {
        if(err){
            console.log("Fetch photos error: \n" + err)
            return
        }
        console.log("Fetching photos....")
        res.json(rows)
        return
    })

})


app.get("/recupComs", (req, res) => {

    
    const queryString = "SELECT * FROM commentaires"

    getConnectionLocale().query(queryString, (err, rows) => {
        if(err){
            console.log("Fetch coms error: \n" + err)
            return
        }
        console.log("Fetching coms....")
        res.json(rows)
        return
    })

})

app.get("/inscription/:email/:nom/:prenom/:mdp", (req ,res) => {
    console.log("Creating a new user....")
    const email = req.params.email
    const nom = req.params.nom
    const prenom = req.params.prenom
    const mdp = req.params.mdp
    const queryStringAddL = "INSERT INTO utilisateurs (nom, prenom, mail, mdp, centre, statut, panier) VALUES (?, ?, ?, ?, ?, 0, ?)"
    const queryStringVerif ="SELECT * FROM utilisateurs WHERE mail = ?"
    getConnectionLocale().query(queryStringVerif, [email], (err,rows,fields) => {
        if(err){
            console.log("Insert user error : \n" + err)
            
            return
        }

        if(rows == ""){  
            console.log("Working ...")
            getConnectionLocale().query(queryStringAddL, [nom, prenom, email, mdp, "Toulouse", "[{}]"], (err, rows, fields) => {
                if(err){
                    console.log("Insert user error : \n" + err)
                    
                    return
                }
                console.log("Inserted user with the id : " + rows.insertId)

                res.send("1")
            })

        } else {
            res.send("2")
            console.log("User already registered")
        }
       return

    })

})

app.get("/verification/:email/:mdp", (req, res)=> {
    console.log("Try to find the user with : " + req.params.email + " as Email")

    const email = req.params.email
    const mdp = req.params.mdp
    const queryString = "SELECT * FROM utilisateurs WHERE mail = ? AND mdp = ?"

    getConnectionLocale().query(queryString, [email, mdp], (err, rows, fields) => {
            if(err){
                console.log("Fetch error : \n" + err)
                return
            }
            console.log("Fetch succes !")

            if(rows != ""){
                $infoUser = rows
                res.send("2")
            }
            else{
                res.send("1")
            }
    })
    return
})

app.get("/oublieMdp/:email/:mdp", (req, res)=> {
    console.log("Try to find the user with : " + req.params.email + " as Email")

    const email = req.params.email
    const mdp = req.params.mdp
    const queryStringInfoU = "SELECT * FROM utilisateurs WHERE mail = ?"
    const queryStringChangeP = "UPDATE utilisateurs SET mdp = ?, statut = 0 WHERE mail = ?"

    getConnectionLocale().query(queryStringInfoU, [email, mdp], (err, rows, fields) => {
        if(err){
            console.log("Fetch error : \n" + err)
            return
        }
        console.log("Fetch succes !")

        if(rows == ""){
            $infoUser = rows
            res.send("1")
            return
        }
        getConnectionLocale().query(queryStringChangeP, [mdp, email], (err, rows) => {
            if(err){
                console.log("Fetch error : \n" + err)
                return
            }
        })
    })
    res.send("2")
    return
})

app.get("/validation/:email/:mdp", (req, res) => {
    const email = req.params.email
    const newPass = req.params.mdp
    const queryStringChangeP = "UPDATE utilisateurs SET mdp = ?, statut = ? WHERE mail = ?"
    const queryStringInfoU = "SELECT * FROM utilisateurs WHERE mail = ?"
    const queryStringAddC = "INSERT INTO utilisateurs (nom, prenom, mail, statut, id_centre) VALUES (?, ?, ?, ?, 1)"
    const queryStringChangeC = "UPDATE utilisateurs SET statut = ?, id_centre = 1 WHERE mail = ?"
    let statut = 1
    if(!email.includes("viacesi")){
        statut = 2
    }
    getConnectionLocale().query(queryStringChangeP, [newPass, statut, email], (err, rows) => {
        if(err){
            console.log("Update user error : \n" + err)
            res.send("1")
            return
        }
    })

   getConnectionLocale().query(queryStringInfoU, [email], (err,rows) => {
        if(err){
            console.log("Update user error : \n" + err)
            res.send("1")
            return
        }

        console.log(rows)
        $infoUser = rows
        console.log($infoUser)

        getConnectionCommune().query(queryStringInfoU, [email], (err,rows2) => {
            if(err){
                console.log("Get user error : \n" + err)
                res.send("1")
                return
            }
            if(rows2 == ""){

                getConnectionCommune().query(queryStringAddC, [$infoUser[0].nom, $infoUser[0].prenom, email, $infoUser[0].statut], (err) => {
                    if(err){
                        console.log("Insert user commune error : \n" + err)
                        res.send("1")
                        return
                    }

                }) 

            } else {
                getConnectionCommune().query(queryStringChangeC, [statut, email], (err) => {
                    if(err){
                        console.log("Update user commune error : \n" + err)
                        res.send("1")
                        return
                    }
                })
            }
        })
    })
    res.send("2")
    return
})

app.get("/connexion/:email", (req, res)=> {
    console.log("Try to find the user with : " + req.params.email + " as Email")

    const email = req.params.email
    const queryString = "SELECT * FROM utilisateurs WHERE mail = ?"

    getConnectionLocale().query(queryString, [email], (err, rows, fields) => {
            if(err){
                console.log("Fetch error : \n" + err)
                return
            }
            console.log("Fetch succes !")

            if(rows != ""){

                res.json(rows)
            }
            else{
                res.send("1")
            }
    })
    return

})

//localhost:3003
app.listen(3003, () => {
    console.log("Server is listening on 3003....")
})