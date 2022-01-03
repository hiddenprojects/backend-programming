const db = require('../config/database');

class Student {

  static all() {
    return new Promise((resolve, reject) => {
      const sql = 'SELECT * FROM students';

      db.query(sql, (err, results) => {
        resolve(results);
      });
    })
  }

  static create(data) {
    return new Promise((resolve, reject) => {
      const sql = `INSERT INTO students (nama, nim, jurusan) VALUES (?)`;

      const dataInsert = [
        data.nama,
        data.nim,
        data.jurusan
      ];

      db.query(sql, [dataInsert], (err, results) => {
        if (err) {
          reject(err);
        } else {
          resolve(results);
        }
      });
    });
  }

  static update(id, data) {
    return new Promise((resolve, reject) => {
      const sql = `UPDATE students SET nama = '${data.nama}', nim = '${data.nim}', jurusan = '${data.jurusan}' WHERE id = ${id}`;
      
      db.query(sql, (err, results) => {
        if (err) {
          reject(err);
        } else {
          resolve(results);
        }
      });
    });
  }

  static destroy(id) {
    return new Promise((resolve, reject) => {
      const sql = `DELETE FROM students WHERE id = ${id}`;

      db.query(sql, (err, results) => {
        if (err) {
          reject(err);
        } else {
          resolve(results);
        }
      });
    });
  }

  static show(id) {
    return new Promise((resolve, reject) => {
      const sql = `SELECT * FROM students WHERE id = ${id}`;

      db.query(sql, (err, results) => {
        if (err) {
          reject(err);
        } else {
          resolve(results);
        }
      });
    });
  }

}

module.exports = Student;