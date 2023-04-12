var mysqpl = require('mysql');
var connection = mysqpl.createConnection({
    host : 'localhost',
    user : 'root',
    password : '',
    database : 'desserthash'
});

module.exports= {
    getAllData: function(sql,callback){
        connection.query(sql, function(error,result){
            if(error){
                callback(null);
            }else{
                callback(result);
            }
        });
    },
    getData: function(sql,callback){
        connection.query(sql,function(error,result){
            if (error) {
                callback(null);
            }else{
                callback(result);
            }
        });
    }
}
