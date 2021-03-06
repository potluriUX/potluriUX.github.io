'use strict';

/**
 * Module dependencies.
 */
var mongoose = require('mongoose'),
	errorHandler = require('./errors.server.controller'),
	Department = mongoose.model('Department'),
    _ = require('lodash');

var crud = require('./crud.server.controller')('Assignment', 'name');

module.exports = crud;
