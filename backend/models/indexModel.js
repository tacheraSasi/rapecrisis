const mongoose = require('mongoose');
const Schema = mongoose.Schema;

// Example MongoDB schema
const IndexSchema = new Schema({
    name: String,
    age: Number
});

module.exports = mongoose.model('Index', IndexSchema);
