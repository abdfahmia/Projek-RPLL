const fs = require('fs');
const { send } = require('process'); 
const { Client, MessageMedia } = require('whatsapp-web.js');
const qrcode = require('qrcode-terminal'); //pertemuan 2
const { type } = require('os');
const { readNoOrder } = require('./model');
const dessert = require('./model');
const convertRupiah = require('rupiah-format')



const SESSION_FILE_PATH = './session.json'
let sessionCfg
//pertemuan 3


// pertemuan 4
if (fs.existsSync(SESSION_FILE_PATH)) {
    sessionCfg = require(SESSION_FILE_PATH);
};

const client = new Client( {
    puppeteer : {
        headless: true
    },
    session: sessionCfg
});

client.initialize();

client.on('authenticated', function (session) {
    console.log('Session ' + session);
    sessionCfg = session;
    fs.writeFile(SESSION_FILE_PATH, JSON.stringify(session), function (err) {
            console.log(err);
    });
});

client.on('auth_failure', (msg) => {
    console.error('AUTH Error', msg);
})
// tutup pertemuan

// const media = MessageMedia.fromFilePath('./img/1choco.jpg');
// const media1 = MessageMedia.fromFilePath('./img/2milk.jpg');
// const media2 = MessageMedia.fromFilePath('./img/3tiramisu.jpg');
// const media3 = MessageMedia.fromFilePath('./img/4redv.jpg');

// qr
client.on('qr', (qr) => {
    // Generate and scan this code with your phone
    console.log('QR RECEIVED', qr);
    qrcode.generate(qr, { small: true })
});

// saat client ready
client.on('ready', () => {
    console.log('Client is ready!');
});

// pertemuan 3
client.on('message', async msg => {
    console.log('MESSAGE RECEIVED', msg );

    var body = (msg.body || '').toLowerCase();
    console.log("BODY: ", body)
    console.log("INCLUDES: ", body.includes('no order saya'))
    if(body.includes('no order saya')){
        const orderNo=body.split('*no order saya :* ')
        const param = orderNo[1]
        console.log('Order No: ', JSON.stringify(orderNo))
        if(orderNo.length>1){
            dessert.readNoOrder(param, function(result){
                console.log('RESULT: ', result)
                if(result && result != null){
                    if(typeof result !== 'undefined'){
                        let pesan='';
                        let nama = result.nama;
                        let alamat = result.alamat;
                        let no_telp = result.no_telp;
                        var total=0;
                        for(var a=0; a<result.length; a++){
                            total=result[0].total;
                            nama=result[0].nama;
                            alamat = result[0].alamat
                            no_telp = result[0].no_telp;
                            let namaProduk = result[a].nama_produk;
                            let ukuran = result[a].ukuran;
                            let qty = result[a].qty;
                            let harga = result[a].harga;
                            let totalHarga = result[a].total_harga;
                            
                            let rupiah = convertRupiah.convert(totalHarga);
                            let rupiah1 = convertRupiah.convert(harga);
                            var rupiah2 = convertRupiah.convert(total);
                            
                            
                            pesan +=(namaProduk+ '\n Ukuran : ' + ukuran + '\n Jumlah : ' + qty  + '\n Harga Satuan : ' + rupiah1 + '\n Harga Total : ' + rupiah + '\n' )+'\n'
                            
                        }
                        msg.reply(pesan +'*Grand Total :* '+rupiah2 + '\n-------------------\nData Penerima\n-------------------\n*Nama:* '+nama+'\n*Alamat :* '+alamat+'\n*No Telp :* '+no_telp+'\nApakah anda akan melanjutkan pesanan anda ? \nJawab *ya* atau *tidak*')
                    }
                }
            })  
        }else if(msg.body == 'ya'){
            msg.reply('Kamu belum memberikan nomor orderan, silahkan masukan no orderan dulu ya 👋')
        }
    }else if(msg.body == 'ya' || msg.body == 'Ya'){
        msg.reply('Baik pesanan anda kami proses, mohon di tunggu ya, Terima kasih 😊')
    }else if(msg.body == 'tidak' || msg.body == 'Tidak'){
        msg.reply('Yah gak jadi pesen ni kak 😢,gak apa deh, kami tunggu ya di pesanan selanjutnya ya 😊 ')
    }else if(msg.body == 'ya') {
        msg.reply('Maaf kami belum mengerti maksud anda :(')
    }
    
    });

// {
//     var noOrder = null;
//     var namaProduk = null;
//     var ukuran = null;
//     var qty = null;
//     dessert.orderList(function(result){
//         if(result && result != null){
//             if(typeof result!=='undefined'){
//                 for(var i=0; i<result.length; i++){
//                     noOrder = result[i].no_order;
//                                 namaProduk = result[i].nama_produk;
//                                 ukuran = result[i].ukuran;
//                                 qty = result[i].qty;
//                                 msg.reply('No oder anda :' + noOrder + '\nnama produk :' + namaProduk+ '\ndengan ukuran :' + ukuran + '\n jumlah pesanan :' +qty);
//                             }
//                         }
//                     }
//                 });
// };
            



// switch (msg.body) {
//     case 'transaksi':
//         msg.reply('Selamat datang di dessert by Desserthash.id, untuk nominal pembayaran anda yakni \n ');
            //         case '1':
            //         dessert.dessertList(function(result){    
            //             if(result && result != null){
            //             if(typeof result!=='undefined'){
            //                 for(var i=0; i<result.length; i++){
            //                     var media1 = MessageMedia.fromFilePath('./path/' +result[i].gambar);
            //                     var namaProduk = result[i].nama_produk;
            //                     client.sendMessage(msg.from,media1,{caption: 'Nama produk =' + namaProduk});
            //                 }
            //             }
            //             }
                    
            //         });
            //         break;
            //         case '2':
//             msg.reply('test')
//         break;
// }