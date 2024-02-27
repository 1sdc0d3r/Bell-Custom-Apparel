require('dotenv').config();
// var http, options, proxy, url;

// http = require("http");

// url = require("url");

// // console.log("url: ", process.env.QUOTAGUARDSTATIC_URL);
// proxy = url.parse(process.env.QUOTAGUARDSTATIC_URL);
// target = url.parse("http://ip.quotaguard.com/");
// // target = url.parse("http://localhost");

// options = {
//     hostname: proxy.hostname,
//     port: proxy.port || 80,
//     path: target.href,
//     headers: {
//         "Proxy-Authorization": "Basic " + (new Buffer(proxy.auth).toString("base64")),
//         "Host": target.hostname
//     }
// };

// http.get(options, function (res) {
//     res.pipe(process.stdout);
//     return console.log("status code", res.statusCode);
// });


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
    console.log(' MySQL Connected');
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
app.get('/:id', (req, res) => {
    let sql = `SELECT * FROM Article WHERE id=${req.params.id}`;

    connection.query(sql, (err, result) => {
        if (err) throw err;
        // console.log(result);
        console.log(`get /${req.params.id}`);
        res.send(result[0]);
    });
});
// console.log()
app.listen(process.env.PORT || 3306, () => console.log(`App is listening on port ${process.env.PORT || 3306}!`))

// module.exports = app;
