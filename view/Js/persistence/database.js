import Sequelize from '../../node_modules/sequelize/index.js';
// your credentials
let DATABASE_URL = 'postgres://admin:pkmn3612@127.0.0.1:5432/proyecto';

const database = new Sequelize(DATABASE_URL);

module.exports = database;