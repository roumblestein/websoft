"use strict"

var express = require('express');
var router = express.Router();
var path = require("path");

router.get("/", (req, res) => {
    res.send("Hello World");
});

router.get("/lotto", (req, res) => {
    var lottoNumbers = new Array(7);
    for (var i = 0; i < lottoNumbers.length; i++){
        lottoNumbers[i] = Math.floor(Math.random() * 32)
    }
     res.send(lottoNumbers);
});

router.get("/report", function(req, res) {
    res.sendFile(path.join(__dirname+'/report.html'))
});

module.exports = router;