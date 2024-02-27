// app.js file.
require('dotenv').config();
var express = require('express');
var app = express();
var mysql = require('mysql2');
const cors = require("cors")
app.use(cors())

app.listen(process.env.PORT, () => console.log(`App is listening on port ${process.env.PORT}!`))

// 1. Require the connection to the database.
var connection = mysql.createConnection({
    host: process.env.DATABASE_HOST,
    user: process.env.DATABASE_USER,
    password: process.env.DATABASE_PASSWORD,
    database: process.env.DATABASE_NAME
})
connection.connect((err => {
    if (err) throw err;
    console.log('MySQL Connected');
}));

// 2. Make the GET requests.
app.get('/', (req, res) => {
    let sql = 'SELECT * FROM Article';

    connection.query(sql, (err, result) => {
        if (err) throw err;
        // console.log(result);
        console.log('get /')
        res.send(result);
    });
});

module.exports = app;
