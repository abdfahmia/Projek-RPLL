<?php



/**
 * 
 */
class Cart extends CI_Controller
{
    public function index()
    {
        $data['produk'] = $this->M_produk->tampil();
        $this->load->model('M_produk');
        $this->load->view('cart', $data);
    }

    public function tambah($id)
    {
        $this->load->model('M_produk');
        $produk = $this->M_produk->tambahcart($id);
        $data = array(
            'id' => $produk->id_produk,
            'qty'     => 1,
            'price'   => $produk->harga,
            'name'    => $produk->nama_produk,
            'options' => array('Size' => $produk->ukuran)
        );
        $this->cart->insert($data);
        redirect('home');
    }
    public function deletecart($rowid)
    {
        $this->cart->remove($rowid);
        redirect('cart');
    }
    public function cekout()
    {

        $this->load->view('cekout');
        $data['produk'] = $this->M_produk->tampil();
        $this->load->model('M_produk');
    }
    public function sukses()
    {
        if ($this->cart->total() == "") {
            redirect(base_url());
        }
        $nama = $this->input->post('nama');
        $no_telp = $this->input->post('no_telp');
        $alamat = $this->input->post('alamat');
        $data = array(
            'nama' => $nama,
            'no_telp' => $no_telp,
            'alamat' => $alamat
        );


        $list = '';
        $no = 1;
        foreach ($this->cart->contents() as $a) {
            $list .= '*' . $no++ . '.' . $a['name'] . '*%0A';
            if ($this->cart->has_options($a['rowid']) == TRUE) {

                foreach ($this->cart->product_options($a['rowid']) as $option_name => $option_value) {
                    $list .= 'Ukuran           : ' . $option_value . '%0A';
                }
            }


            $list .= 'Jumlah            : ' . $a['qty'] . '%0A';
            $list .= 'Harga Satuan  : Rp ' . number_format($a['price'], 0, '.', '.') . '%0A';
            $list .= 'Harga Total     : Rp ' . number_format($a['subtotal'], 0, '.', '.') . '%0A';
        }
        $list .= '%0A';
        $list .= 'Total Belanja : Rp ' . number_format($this->cart->total(), 0, '.', '.') . '%0A';
        $list .= '-------------------------%0A';
        $list .= 'Data Penerima%0A';
        $list .= '-------------------------%0A';
        $list .= '*Nama             :*%20' . $nama . '%0A';
        $list .= '*No. Telepon   :*%20' . $no_telp . '%0A';
        $list .= '*Alamat           :*%20' . $data['alamat'] . '%0A%0A';
        $list .= 'Harga Belum Termasuk Ongkir';
        $this->cart->destroy();
        redirect("https://api.whatsapp.com/send/?phone=6282111176680&text=Halo kak, saya ingin order. %0A%0A" . $list);
    }
    public function tes()
    {
    }
}
