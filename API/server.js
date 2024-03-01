require('dotenv').config();

// app.js file.
var express = require('express');
var app = express();
var mysql = require('mysql2');
const cors = require("cors")
app.use(cors())

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
app.get('/api', (req, res) => {
    let sql = 'SELECT * FROM Article';
    const id = req.query.id;

    if (id) sql += ` WHERE id=${id}`;

    connection.query(sql, (err, result) => {
        if (err) throw err;
        // console.log('get /')
        id ? res.send(result[0]) :
            res.send(result);
    });
});

app.listen(0, () => {
    // console.log("server data ", server)
    console.log(`Server listening.`);
});
// module.exports = app;
