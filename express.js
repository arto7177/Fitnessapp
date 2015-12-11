var express = require('express'),
    app = express();
var bodyParser = require('body-parser');

var meal = require("./Model/meal");
var exercise= require("./Model/exercise");
var unirest = require('unirest');

app.use(express.static(__dirname + '/public'));
app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());

app.get("/meal", function(req, res){
  
  meal.get(null, function(err, rows){
    res.send(rows);
  })
    
})
.get("/meal/:id", function(req, res){
  
  meal.get(req.params.id, function(err, rows){
    res.send(rows[0]);
  })
  
})
.post("/meal", function(req, res){
  var errors = meal.validate(req.body);
  if(errors){
    res.status(500).send(errors);
    return;
  }
  meal.save(req.body, function(err, row){
      if(err){
        res.status(500).send(err);
        return;
      }
    res.send(row);
  })
})
.delete("/meal/:id", function(req, res){
  
  meal.delete(req.params.id, function(err, rows){
      if(err){
        res.status(500).send(err);
      }else{
        res.send(req.params.id);
      }
  })
  
})
.get("/meal/search/:term", function(req, res){
    unirest.get("https://nutritionix-api.p.mashape.com/v1_1/search/" + req.params.term + "?fields=item_name%2Citem_id%2Cbrand_name%2Cnf_calories%2Cnf_total_fat%2Cnf_serving_size_qty%2Cnf_serving_size_unit")
    .header("X-Mashape-Key", "sHNppTKfrsmsh6PqLnnYTiuP2ao9p1YoSKBjsnzl9FUdLlX0XC")
    .header("Accept", "application/json")
    .end(function (result) {
      res.send(result.body);
    });
    
})
.get("/exercise", function(req, res){
  
  exercise.get(null, function(err, rows){
    res.send(rows);
  })
    
})
.get("/exercise/:id", function(req, res){
  
  exercise.get(req.params.id, function(err, rows){
    res.send(rows[0]);
  })
  
})
.post("/exercise", function(req, res){
  var errors = exercise.validate(req.body);
  if(errors){
    res.status(500).send(errors);
    return;
  }
  exercise.save(req.body, function(err, row){
    res.send(row);
  })
})
.delete("/exercise/:id", function(req, res){
  
  exercise.delete(req.params.id, function(err, rows){
      if(err){
        res.status(500).send(err);
      }else{
        res.send(req.params.id);
      }
  })
  
})

app.listen(process.env.PORT);