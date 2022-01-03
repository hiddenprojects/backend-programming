const Student = require('../models/Student');

class StudentController {
  async index(req, res) {
    const students = await Student.all();

    const data = {
      message: 'Menampilkan semua data students',
      data: students
    };

    res.json(data);
  }

  async store(req, res) {
    const student = await Student.create(req.body);

    const data = {
      message: 'Menambahkan data students',
      data: student
    };

    res.json(data);
  }

  async update(req, res) {
    const student = await Student.update(req.params.id, req.body);

    const data = {
      message: 'Mengubah data students',
      data: student
    };

    res.json(data);
  }

  async destroy(req, res) {
    const student = await Student.destroy(req.params.id);

    const data = {
      message: 'Menghapus data students',
      data: student
    };

    res.json(data);
  }

  async show(req, res) {
    const student = await Student.show(req.params.id);

    const data = {
      message: 'Menampilkan data students',
      data: student
    };

    res.json(data);
  }
}

const object = new StudentController();
module.exports = object;