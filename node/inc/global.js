var mysql = require("mysql");
module.exports = {
    getConnection:function() {
        var conn = mysql.createConnection({
            host: "localhost",
            user: "arto",
            password: "7177",
            database: "fitnessdb"
        });
    }
};