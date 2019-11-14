
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


app.get("/recupPhoto", (req, res) => {

    const queryString = "SELECT * FROM photos"
    getConnectionLocale().query(queryString, (err, rows, fields) => {
            if(err){
                console.log("Insert user error : \n" + err)
                res.sendStatus(500)
                return
            }
             console.log("Fetching photos")

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
            res.send("1")
            return
        }
              
        if(rows == ""){  
            console.log("Working ...")
            getConnectionLocale().query(queryStringAddL, [nom, prenom, email, mdp, "Toulouse", "{}"], (err, rows, fields) => {
                if(err){
                    console.log("Insert user error : \n" + err)
                    return
                }
                console.log("Inserted user with the id : " + rows.insertId);

                
        
                res.end()
            })

        }
        console.log("Failed")
        res.end()

    })

})

app.get("/validation/:email/:mdp", (req, res) => {
    const email = req.params.email
    const newPass = req.params.mdp
    const queryStringChangeP = "UPDATE utilisateurs SET mdp = ?, statut = 1 WHERE mail = ?"
    const queryStringInfoU = "SELECT * FROM utilisateurs WHERE mail = ?"
    const queryStringAddC = "INSERT INTO utilisateurs (nom, prenom, email, statut, id_centre) VALUES (?, ?, ?, ?, (SELECT id FROM centres WHERE nom = \"Toulouse\"))"
    getConnectionLocale().query(queryStringChangeP, [newPass, email], (err, rows) => {
        if(err){
            console.log("Update user error : \n" + err)
            return
        }
        getConnectionLocale().end()
    })
    
   getConnectionLocale().query(queryStringInfoU, [email], (err,rows) => {
        if(err){
            console.log("Update user error : \n" + err)
            return
        }

        console.log(rows)
        $infoUser = rows
        console.log($infoUser)
        getConnectionCommune().query(queryStringAddC, [$infoUser[0].nom, $infoUser[0].prenom, email, $infoUser[0].statut], (err) => {
            if(err){
                console.log("Insert user commune error : \n" + err)
                return
            }
    
        }) 
    })

    res.end()
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

            if(rows == ""){

                res.json(rows)
            }
            else{
                res.send("1")
            }
    })


})

//localhost:3003
app.listen(3003, () => {
    console.log("Server is listening on 3003....")
})