const { index, store, update, destroy } = require('./Controllers/FruitController.js');

const main = () => {
  index();
  store('Younglex');
  update('0', 'Melon');
  destroy('0');
}

main();