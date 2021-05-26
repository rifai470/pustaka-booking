<?php
class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function laporan_buku_pdf()
    {
        $this->load->library('dompdf_gen');
        $data['buku'] = $this->ModelBuku->getBuku()->result_array();

        $this->load->view('buku/laporan_pdf_buku', $data);
        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();

        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_data_buku.pdf", array('Attachment' => 0));

    }
    public function export_excel()
    {
        $data = array('title' => 'Laporan Buku', 'buku' => $this->ModelBuku->getBuku()->result_array()); 

        $this->load->view('buku/laporan_pdf_buku', $data);
        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();

        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_data_buku.pdf", array('Attachment' => 0));

    }
}
