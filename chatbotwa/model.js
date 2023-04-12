const db = require("./db");

module.exports = {
    dessertList: function (callback){
        var sql = "SELECT * FROM produk";
        db.getAllData(sql, function(result){
            if(result==null){
            callback(false);
            }else{
            callback(result);
            }
        });
    },
    orderList: function(callback){
        var sql = "SELECT no_order,nama_produk,id_produk,ukuran,qty FROM rincian"
        db.getData(sql,function(result){
            if (result==null) {
                callback(false);
            }else{
                callback(result)
            }
        })
    },
    readNoOrder: function(param, callback){
        var sql = `SELECT rincian.no_order, ukuran, nama_produk, qty,harga,total_harga, pesanan.total,pesanan.nama,pesanan.alamat,pesanan.no_telp FROM rincian JOIN pesanan ON rincian.no_order = pesanan.no_order WHERE rincian.no_order='${param}'` 
        console.log('SQL: ', sql)
        
        db.getData(sql,function(result){
            if(result==null){
                callback(false);
            }else{
                callback(result);
            }
        })
    }

}