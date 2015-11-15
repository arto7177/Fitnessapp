var global= require("../inc/global");
var mysql = require("mysql");
module.exports ={
    get: function(id,ret){
        var conn=global.getConnection();
        var sql="select * from meals";
        if(id){
            sql+="where id="+id;
        }
        conn.query(sql, function(err,rows){
            if(err) throw err;
            ret(rows);
            conn.end();
        });
    },
    save:function(row,ret){
        var conn=global.getConnection();
        if(row){
            
        }
    }
    
}
