
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
    const queryStringInsc = "INSERT INTO participation(id_event, id_utilisateur) VALUES (?, ?)" 

    getConnectionLocale().query(queryStringInsc, [idEvent, idUser], (err,rows, fields) => {
        if(err){
            console.log("Fetch events error: \n" + err)
            return
        }
        res.send("1")

    })


})

app.get("/desinscEvent/:idEvent/:idUser", (req, res) => {

    const idEvent = req.params.idEvent
    const idUser = req.params.idUser
    const queryStringInsc = "DELETE FROM participation WHERE id_evenement = ? AND id_utilisateur = ?" 

    getConnectionLocale().query(queryStringInsc, [idEvent, idUser], (err,rows, fields) => {
        if(err){
            console.log("Fetch events error: \n" + err)
            return
        }
        res.send("1")

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
            getConnectionLocale().query(queryStringAddL, [nom, prenom, email, mdp, "Toulouse", "{}"], (err, rows, fields) => {
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