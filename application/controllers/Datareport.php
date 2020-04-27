<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datareport extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_report');
	}

	# region penjualan
	public function penjualan() {
        $data['userdata'] 	= $this->userdata;
        
		$data['page'] 		= "Datareport/penjualan";
		$data['judul'] 		= "Data Report Penjualan";
        $data['deskripsi'] 	= "";

		$this->template->views('datareport/penjualan/home', $data);
	}

	public function getDataPenjualan() {
		$param 	= $this->input->post();
		$result = $this->M_report->getDataPenjualan($param);

		$data['controller'] = $this;
		$data['datatable'] = $result;
		return $this->load->view('datareport/penjualan/list_data', $data);
	}

	public function exportExcelPenjualan(){
		$param 	= [
			'startdate' => $this->uri->segment(3),
			'enddate' => $this->uri->segment(4)
		];
		$result = $this->M_report->getDataPenjualan($param);

		// Load plugin PHPExcel nya    
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';

		// Panggil class PHPExcel nya    
		$excel = new PHPExcel();

		// Settingan awal fil excel
		$excel->getProperties()->setCreator('My Notes Code')
								->setLastModifiedBy('My Notes Code')
								->setTitle("Data Penjualan")
								->setSubject("Penjualan")
								->setDescription("Laporan Penjualan")
								->setKeywords("Data Siswa");

		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = array(
		'font' => array('bold' => true), // Set font nya jadi bold
		'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		),
		'borders' => array(
		'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
		'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
		'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
		'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
		)
		);

		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = array(
							'alignment' => array(
								'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
							),
							'borders' => array(
								'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
								'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
								'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
								'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
							)
		);

		$excel->setActiveSheetIndex(0)->setCellValue('A1', "LAPORAN DATA PENJUALAN"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

		$excel->setActiveSheetIndex(0)->setCellValue('A2', date('d M Y',strtotime($param['startdate']))." s/d ". date('d M Y',strtotime($param['enddate']))); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A2:E2'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(10); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

		// Buat header tabel nya pada baris ke 4
		$excel->setActiveSheetIndex(0)->setCellValue('A4', "NO"); // Set kolom A4 dengan tulisan "NO"
		$excel->setActiveSheetIndex(0)->setCellValue('B4', "NO TRASAKSI"); // Set kolom B4 dengan tulisan "NIS"
		$excel->setActiveSheetIndex(0)->setCellValue('C4', "TANGGAL"); // Set kolom C4 dengan tulisan "NAMA"
		$excel->setActiveSheetIndex(0)->setCellValue('D4', "KETERANGAN"); // Set kolom D4 dengan tulisan "JENIS KELAMIN"
		$excel->setActiveSheetIndex(0)->setCellValue('E4', "TOTAL BELANJA"); // Set kolom E4 dengan tulisan "ALAMAT"

		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E4')->applyFromArray($style_col);

		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 5; // Set baris pertama untuk isi tabel adalah baris ke 5
		$isTotal = 0;
		foreach($result as $ket => $val){ // Lakukan looping pada variabel siswa
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $val->NO_Transaksi);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, date('d M Y',strtotime($val->DATE)));
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, strtoupper($val->Keterangan));
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, self::FormatNumber($val->Total_HargaJual));

			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);

			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
			$isTotal += $val->Total_HargaJual;
		}

		// total 
		$row_total = $numrow;
		$excel->setActiveSheetIndex(0)->setCellValue('A'.$row_total, "TOTAL"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A'.$row_total.':D'.$row_total); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A'.$row_total)->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A'.$row_total)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
		$excel->getActiveSheet()->setCellValue('E'.$row_total, self::FormatNumber($isTotal));
		$excel->getActiveSheet()->getStyle('A'.$row_total.':E'.$row_total)->applyFromArray($style_row);

		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E

		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Laporan Data Penjualan");
		$excel->setActiveSheetIndex(0);

		header('Content-Type: application/vnd.ms-excel');
		$file_name = "Laporan_Penjualan_".date("Y-m-d").".xls";
		header("Content-Disposition: attachment; filename=$file_name");
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');;
	}

	# region keuntungan
	public function keuntungan() {
        $data['userdata'] 	= $this->userdata;
        
		$data['page'] 		= "Datareport/keuntungan";
		$data['judul'] 		= "Data Report Keuntungan";
        $data['deskripsi'] 	= "";

		$this->template->views('datareport/keuntungan/home', $data);
	}

	public function getDataKeuntungan() {
		$param 	= $this->input->post();
		$result = $this->M_report->getDataPenjualan($param);

		$data['controller'] = $this;
		$data['datatable'] = $result;
		return $this->load->view('datareport/keuntungan/list_data', $data);
	}

	public function exportExcelKeuntungan(){
		$param 	= [
			'startdate' => $this->uri->segment(3),
			'enddate' => $this->uri->segment(4)
		];
		$result = $this->M_report->getDataPenjualan($param);

		// Load plugin PHPExcel nya    
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';

		// Panggil class PHPExcel nya    
		$excel = new PHPExcel();

		// Settingan awal fil excel
		$excel->getProperties()->setCreator('My Notes Code')
								->setLastModifiedBy('My Notes Code')
								->setTitle("Data Keuntungan")
								->setSubject("Keuntungan")
								->setDescription("Laporan Keuntungan")
								->setKeywords("Data Siswa");

		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = array(
		'font' => array('bold' => true), // Set font nya jadi bold
		'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		),
		'borders' => array(
		'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
		'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
		'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
		'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
		)
		);

		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = array(
							'alignment' => array(
								'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
							),
							'borders' => array(
								'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
								'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
								'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
								'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
							)
		);

		$excel->setActiveSheetIndex(0)->setCellValue('A1', "LAPORAN DATA KEUNTUNGAN"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:G1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

		$excel->setActiveSheetIndex(0)->setCellValue('A2', date('d M Y',strtotime($param['startdate']))." s/d ". date('d M Y',strtotime($param['enddate']))); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A2:G2'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(10); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

		// Buat header tabel nya pada baris ke 4
		$excel->setActiveSheetIndex(0)->setCellValue('A4', "NO"); // Set kolom A4 dengan tulisan "NO"
		$excel->setActiveSheetIndex(0)->setCellValue('B4', "NO TRASAKSI"); // Set kolom B4 dengan tulisan "NIS"
		$excel->setActiveSheetIndex(0)->setCellValue('C4', "TANGGAL"); // Set kolom C4 dengan tulisan "NAMA"
		$excel->setActiveSheetIndex(0)->setCellValue('D4', "KETERANGAN"); // Set kolom D4 dengan tulisan "JENIS KELAMIN"
		$excel->setActiveSheetIndex(0)->setCellValue('E4', "TOTAL HARGA BELI"); // Set kolom E4 dengan tulisan "ALAMAT"
		$excel->setActiveSheetIndex(0)->setCellValue('F4', "TOTAL HARGA JUAL");
		$excel->setActiveSheetIndex(0)->setCellValue('G4', "KEUNTUNGAN");

		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A4:G4')->applyFromArray($style_col);

		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 5; // Set baris pertama untuk isi tabel adalah baris ke 5
		$isTotalHargaBeli = 0;
		$isTotalHargaJual = 0;
		foreach($result as $ket => $val){ // Lakukan looping pada variabel siswa
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $val->NO_Transaksi);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, date('d M Y',strtotime($val->DATE)));
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, strtoupper($val->Keterangan));
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, self::FormatNumber($val->Total_HargaBeli));
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, self::FormatNumber($val->Total_HargaJual));
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, self::FormatNumber($val->Total_HargaJual-$val->Total_HargaBeli));

			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A'.$numrow.':G'.$numrow)->applyFromArray($style_row);

			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
			$isTotalHargaBeli += $val->Total_HargaBeli; 
            $isTotalHargaJual += $val->Total_HargaJual;
		}

		// space kosong
		$row_total = $numrow;
		$excel->setActiveSheetIndex(0)->setCellValue('A'.$row_total, ""); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A'.$row_total.':G'.$row_total);

		// total 
		$row_total = $numrow+1;
		$excel->getActiveSheet()->mergeCells('A'.$row_total.':D'.$row_total);
		$excel->setActiveSheetIndex(0)->setCellValue('E'.$row_total, "TOTAL"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('E'.$row_total.':G'.$row_total); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('E'.$row_total)->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('E'.$row_total)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
		
		// label total per item
		$row_total = $numrow+2;
		$excel->getActiveSheet()->mergeCells('A'.$row_total.':D'.$row_total);
		$excel->setActiveSheetIndex(0)->setCellValue('E'.$row_total, "HARGA BELI");
		$excel->setActiveSheetIndex(0)->setCellValue('F'.$row_total, "HARGA JUAL");
		$excel->setActiveSheetIndex(0)->setCellValue('G'.$row_total, "KEUNTUNGAN");
		$excel->getActiveSheet()->getStyle('E'.$row_total.':G'.$row_total)->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('E'.$row_total.':G'.$row_total)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

		# set value
		$row_total = $numrow+3;
		$excel->getActiveSheet()->mergeCells('A'.$row_total.':D'.$row_total);
		$excel->getActiveSheet()->setCellValue('E'.$row_total, self::FormatNumber($isTotalHargaBeli));
		$excel->getActiveSheet()->setCellValue('F'.$row_total, self::FormatNumber($isTotalHargaJual));
		$excel->getActiveSheet()->setCellValue('G'.$row_total, self::FormatNumber($isTotalHargaJual-$isTotalHargaBeli));
		$excel->getActiveSheet()->getStyle('E'.$row_total.':G'.$row_total)->applyFromArray($style_row);

		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);

		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Laporan Data Keuntungan");
		$excel->setActiveSheetIndex(0);

		header('Content-Type: application/vnd.ms-excel');
		$file_name = "Laporan_Keuntungan_".date("Y-m-d").".xls";
		header("Content-Disposition: attachment; filename=$file_name");
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');;
	}

	# region general
	public function detailTransaksi() {
		$param = $this->uri->segment(3);
		$result = $this->M_report->getDetailTransaksi($param);

		$data['page'] 		= "Datareport/transaksi";
		$data['judul'] 		= "Detail Transaksi";
		$data['deskripsi'] 	= "";
		$data['userdata'] 	= $this->userdata;
		
		$data['controller'] = $this;;
		$data['datatable'] = $result;
		$this->template->views('datareport/detail_transaksi', $data);
	}

	public function FormatNumber($nilai,$decimal=0,$point=".",$thousands=",", $type_data=""){

        $return = 0;
        if(is_numeric($nilai)){
            if($type_data=="ind"){
                $return = number_format($nilai, $decimal, ",", ".");
            }
            else{
                $return = number_format($nilai, $decimal, $point, $thousands);
            }
        }

        return $return;
    }
}