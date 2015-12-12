var mysql = require("mysql");

module.exports =  {
    blank: function(){ return {} },
    get: function(id,userid, ret){
        var conn = GetConnection();
        var sql = "SELECT * FROM exercises where userid ='" +userid+"'";
        if(id){
          sql += " WHERE id = " + id;
        }
        conn.query(sql, function(err,rows){
          ret(err,rows);
          conn.end();
        });        
    },
    delete: function(id, ret){
        var conn = GetConnection();
        conn.query("DELETE FROM exercises WHERE id = " + id, function(err,rows){
          ret(err);
          conn.end();
        });        
    },
    save: function(row, ret){
        var sql;
        var conn = GetConnection();
        if (row.id) {
				  sql = " Update exercises "
							+ " Set exercisename=?, date=? ,calories=? , minutes=?,updated=now(),userid=?"
						  + " WHERE id = ? ";
			  }else{
				  sql = "INSERT INTO exercises (exercisename, date, calories,  minutes ,created,userid) VALUES (?, ?, ? ,? , Now(),?)";
				  }

        conn.query(sql, [row.exercisename, row.date, row.calories, row.minutes ,row.userid,row.id],function(err,data){
          if(!err && !row.id){
            row.id = data.insertId;
          }
          ret(err, row);
          conn.end();
        });        
    },
    validate: function(row){
      var errors = {};
      
      if(!row.exercisename) errors.exercisename = "is required"; 
      
      return errors.length ? errors : false;
    }
};  

function GetConnection(){
        var conn = mysql.createConnection({
          host: "localhost",
          user: "arto",
          password: "7177",
          database: "fitnessdb"
        });
    return conn;
}