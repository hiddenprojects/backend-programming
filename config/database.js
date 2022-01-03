const mysql = require('mysql');

require('dotenv').config();

const {
  DB_HOST,
  DB_USER,
  DB_PASS,
  DB_NAME
} = process.env;

const db = mysql.createConnection({
  host: DB_HOST,
  user: DB_USER,
  password: DB_PASS,
  database: DB_NAME
});

db.connect((err) => {
  if (err) {
    console.log(`Error connecting to database, ${err.stack}`);
    return;
  } else {
    console.log('Connected to database');
    return;
  }
});

module.exports = db;