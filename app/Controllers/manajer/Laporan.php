<?php

namespace App\Controllers\Manajer;

use CodeIgniter\RESTful\ResourceController;
use App\Libraries\PDF;

class Laporan extends ResourceController
{
	protected $modelName = "App\Models\Proyek_Model";
	protected $format = "json";
	
    public function __construct() {
        helper(['general']);
        $this->db = \Config\Database::connect();
        $this->pekerjaan = new \App\Models\Pekerjaan_Model();
        $this->detail = new \App\Models\Detail_Model();
    }
	public function index()
	{
		return view('admin/laporan');
	}
	
	public function read()
    {
        $result = $this->model->get()->getResult();
        foreach ($result as $key => $proyek) {
            $proyek->proyek_id = enkrip($proyek->id);
            $proyek->progress = 0;
            $proyek->pekerjaans = $this->pekerjaan->asObject()->where('proyek_id', $proyek->id)->findAll();
            foreach ($proyek->pekerjaans as $key => $pekerjaan) {
                $pekerjaan->bobotDetail = 0;
                $pekerjaan->bobotTercapai = 0;
                $pekerjaan->details = $this->detail->asObject()->where('pekerjaan_id', $pekerjaan->id)->findAll();
                foreach ($pekerjaan->details as $key => $detail) {
                    $pekerjaan->bobotDetail = $detail->bobot;
                    if($detail->status=='1'){
                        $pekerjaan->bobotTercapai += $detail->bobot;
                        $proyek->progress += $pekerjaan->bobot * ($detail->bobot/100);
                    }
                }
            }
        }
        return $this->respond($result);
    }
    
	public function getData($id=null)
    {
        $result = (object)$this->model->find(dekrip($id));
        $result->progress = 0;
        $result->pekerjaans = $this->pekerjaan->asObject()->where('proyek_id', $result->id)->findAll();
        foreach ($result->pekerjaans as $key => $pekerjaan) {
            $pekerjaan->bobotDetail = 0;
            $pekerjaan->bobotTercapai = 0;
            $pekerjaan->details = $this->detail->asObject()->where('pekerjaan_id', $pekerjaan->id)->findAll();
            foreach ($pekerjaan->details as $key => $detail) {
                $pekerjaan->bobotDetail = $detail->bobot;
                if($detail->status=='1'){
                    $pekerjaan->bobotTercapai += $detail->bobot;
                    $result->progress += $pekerjaan->bobot * ($detail->bobot/100);
                }
            }
        }
        
        return $result;
    }

    public function download()
    {
        $id = $this->request->getGet('id');
        $data = $this->getData($id);
        $pdf = new PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('TCPDF Example 003');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->setPrintHeader(true);
		$pdf->setPrintFooter(true);
        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

        // ---------------------------------------------------------

        // set font
        $pdf->SetFont('times', 'BI', 12);
                
        $html = view('download1', (array)$data);
        $pdf->AddPage('P', 'A4');
        $pdf->writeHTML($html, true, false, true, false, '');
        foreach ($data->pekerjaans as $key => $value) {
            $html = view('download', (array)$value);
            $pdf->AddPage('P', 'A4');
            $pdf->writeHTML($html, true, false, true, false, '');
        }
        $this->response->setContentType('application/pdf');
        $pdf->Output(date('dmyhis').'.pdf', 'i');
    }
}