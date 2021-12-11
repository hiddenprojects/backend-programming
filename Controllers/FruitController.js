const fruits = require('../Models/fruits.js');

console.log(`Method index - Menampilkan Buah`);
const index = () => {
  for(let fruit of fruits) {
    console.log(fruit);
  }
  console.log('\n');
}

const store = (name) => {
  console.log(`Method store - Menambahkan buah ${name}`);
  fruits.push(name);
  index();
}

const update = (idx, name) => {
  console.log(`Method index - Update data ${idx} menjadi ${name}`);
  fruits[idx] = name;
  index();
}

const destroy = (idx) => {
  console.log(`Method index - Menghapus data ${idx}`);
  fruits.splice(idx, 1);
  index();
}

module.exports = { index, store, update, destroy };