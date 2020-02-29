import Sequelize from '../../node_modules/sequelize/index.js';
import database from './database.js';

const Student = database.define(
  'contendants',
  {
    discordid: {
      type: Sequelize.TEXT
    },
    discordname: {
        type: Sequelize.TEXT
    },
    summonername: {
        type: Sequelize.TEXT
    },
    matchsplayed: {
        type: Sequelize.NUMBER
    },
    matchwon: {
        type: Sequelize.NUMBER
    },
    points: {
        type: Sequelize.NUMBER
    },
      summonerid:{
        type: Sequelize.TEXT
      }

  },
  { timestamps: false }
);

module.exports = Student;