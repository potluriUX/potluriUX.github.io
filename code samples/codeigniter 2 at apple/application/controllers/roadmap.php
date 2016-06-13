<?php

class Roadmap extends CI_Controller {

    function Roadmap() {
        parent::__construct();
        date_default_timezone_set('America/Chicago');
    }

    function excelreport() {
        // $initiativefs = $this->input->post('initiative_name');
        include 'PHPExcel.php';
        /** PHPExcel_Writer_Excel2007 */
        include 'PHPExcel/Writer/Excel5.php';
        set_error_handler(array('roadmap', 'handle_exception'));
        $objPHPExcel = new PHPExcel();

        $objPHPExcel->getProperties()->setCreator("ravi")
                ->setLastModifiedBy("ravi")
                ->setTitle("PDF  Document")
                ->setSubject("PDF  Document")
                ->setDescription("PDF, generated using PHP classes.")
                ->setKeywords("pdf php")
                ->setCategory("phpexcel pdf file");


// Add some data
        //$this->db->select('exec_summary, proj_description, scope, initiative_number');//,  rollover, executive_sponsor, author, BPR_contact, initiative_name, BHU, type');
        $this->load->model('concept_model');
//$this->db->from('initiative');
        $initiative_array = array();
        $initiative_array = unserialize($this->input->post('names'));

        $initiatives = $this->concept_model->getroadmap($initiative_array);
//echo $this->db->last_query();

        $stringmonth = date("F", mktime(0, 0, 0, (2)));
//echo $stringmonth;
        $years = $this->getfiscalyears();




        $headings = array('', 'Track', 'Name', 'Initiative Number', 'BHU', 'ExecutiveSponsor', 'TrackLead', 'Type', 'Ultimate Gold Impact', 'StartDate', 'EndDate'); //array('Exec Summary', 'Project Desc', 'Scope', 'Initiative Number');

        $rowNumber = 1;
        $col = 'A';
        foreach ($headings as $heading) {
            $objPHPExcel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
            $objPHPExcel->getActiveSheet()->setCellValue($col . $rowNumber, $heading);
            $col++;
        }

        $j = 0;

        $styleArray = array(
            'borders' => array(
                'outline' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                ),
            ),
        );


        foreach ($years as $year) {
            $i = 0;


            if ($j != 1)
                for ($i = 0; $i < 4; $i++) {
                    $objPHPExcel->getActiveSheet()->getStyle($col . $rowNumber)->applyFromArray($styleArray);
                    $objPHPExcel->getActiveSheet()->setCellValue($col . $rowNumber, 'Q' . ($i + 1) . "'" . $year);
                    $col++;
                }
            else
                for ($i = 0; $i < 12; $i++) {
                    $objPHPExcel->getActiveSheet()->getStyle($col . $rowNumber)->applyFromArray($styleArray);
                    $objPHPExcel->getActiveSheet()->setCellValue($col . $rowNumber, 'Q' . (ceil(($i + 1) / 3)) . "'12 " . date("M", mktime(0, 0, 0, ($i - 2))));
                    $col++;
                }
            $j++;
        }

        $rowNumber = 2;
        $prevcap = '';
        $prevsubcap = '';
        $sumrow = array();
        $array_month = array(0 => 2, 1 => 3, 2 => 4, 3 => 4, 4 => 5, 5 => 6, 6 => 6, 7 => 7, 8 => 8, 9 => 0, 10 => 1, 11 => 2);
        foreach ($initiatives->result() as $row) {
            $diff = strtotime(date("M", mktime(0, 0, 0, ($row->start_date_month + 1))) . ' ' . $row->startyear) - strtotime('October ' . (date('Y') - 1));


            $offset = $this->getoffset($row->start_date_month, $row->startyear, $years[0]);

            $offset1 = $offset;

            if ($offset > 3 && $offset < 8) {

                $offset1 = $offset1 + $array_month[$row->start_date_month];
                //echo $offset . 'm ' .$offset1 .'r'. $array_month[$row->start_date_month];
            } elseif ($offset > 7) {
                $offset1 = $offset1 + 8;
            } else {
                $offset1 = $offset;
            }

            $offset = $this->getoffset($row->end_date_month, $row->endyear, $years[0]);

            $offset2 = $offset;



            if ($offset > 3 && $offset < 8) {

                $offset2 = $offset2 + $array_month[$row->end_date_month];
                //	echo $offset2 .'r'. $array_month[$row->end_date_month];
            } elseif ($offset > 7) {
                $offset2 = $offset2 + 8;
            } else {
                $offset2 = $offset;
            }
            if ($offset1 >= 0 && $offset2 < 20) {


                $col = 1;
                if ($row->capabilities != $prevcap) {

                    $styleArray = array(
                        'font' => array(
                            'bold' => true,
                        )
                    );
                    $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($col, $rowNumber)->applyFromArray($styleArray);
                    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $rowNumber, strtoupper($row->capabilities));
                    $rowNumber++;
                }
                /*  foreach($row as $cell) {

                  $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $rowNumber,$cell);
                  // $objPHPExcel->getActiveSheet()->getColumnDimension("$col")->setAutoSize(true);
                  $col++;
                  } */

                if ($row->subcapabilities != $prevsubcap) {
                    $styleArray = array(
                        'font' => array(
                            'bold' => true,
                            'italic' => true
                        )
                    );
                    if ($row->subcapabilities) {
                        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($col, $rowNumber)->applyFromArray($styleArray);
                    }
                    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $rowNumber, $row->subcapabilities);

                    if ($row->subcapabilities) {

                        $rowNumber++;
                    }
                }


                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $rowNumber, $row->track);
                $col++;
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $rowNumber, $row->name);
                $col++;
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $rowNumber, $row->initiative_number);
                $col++;
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $rowNumber, $row->BHU);
                $col++;
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $rowNumber, $row->exec_sponsor_name);
                $col++;
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $rowNumber, $row->tracklead);
                $col++;
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $rowNumber, $row->type);
                $col++;
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $rowNumber, $row->ultimate_gold_impact);
                $col++;
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $rowNumber, date("M", mktime(0, 0, 0, ($row->start_date_month + 1))) . ',' . $row->startyear);
                $col++;
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $rowNumber, date("M", mktime(0, 0, 0, ($row->end_date_month + 1))) . ',' . $row->endyear);
                $col++;






                $offset1 = $col + $offset1;


                $offset2 = $col + $offset2;




                if ($offset1 > 10 && $offset2 < 31)
                    for ($i = $offset1; $i <= $offset2; $i++) {
                        $grandsumrow[$i] += $row->BPR_analyst + $row->BPR_pm;
                        $grandpmsum[$i] += $row->BPR_pm;
                        $grandanalystsum[$i] += $row->BPR_analyst;
                        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($i, $rowNumber, $row->BPR_analyst + $row->BPR_pm);
                        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($i, $rowNumber)->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
                        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($i, $rowNumber)->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
                        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($i, $rowNumber)->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
                        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($i, $rowNumber)->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);

                        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($i, $rowNumber)->getFill()
                                ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                                ->getStartColor()->setARGB('c0c0c0');
                    }

                $col++;
                $rowNumber++;
                //   $objPHPExcel->getActiveSheet()->setCellValue('B5', '=SUM(M2:M60)');
                $prevcap = $row->capabilities;
                $prevsubcap = $row->subcapabilities;
            }
        }
        $i = 0;
           foreach ($grandanalystsum as $key => $value) {
           $i++;
           if($i == 1)
           		$firstcol = $key;
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($key, $rowNumber, $value);
        }
          $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($firstcol-4, $rowNumber, 'Analyst Sum');
         $rowNumber++;
           $i = 0;
           foreach ($grandpmsum as $key => $value) {
            $i++;
           if($i == 1)
           		$firstcol = $key;
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($key, $rowNumber, $value);
        }
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($firstcol-4, $rowNumber, 'PM Sum');
         $rowNumber++;
         
           $i = 0;
         foreach ($grandsumrow as $key => $value) {
          $i++;
           if($i == 1)
           		$firstcol = $key;
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($key, $rowNumber, $value);
        }
          $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($firstcol-4, $rowNumber, 'Grand Total');
        $rowNumber++;
//$objPHPExcel->getActiveSheet()->->freezePane('A2');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        header('Content-Disposition: attachment;filename="Roadmap.xlsx"');

        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        restore_error_handler();
//echo "Saved";
    }

    function getfiscalyears() {

        $fiscalyears = array();

        if (ceil(date("m") / 3) != 4) {
            $fiscalyears[0] = date('y');
            $fiscalyears[1] = date('y') + 1;
            $fiscalyears[2] = date('y') + 2;
        } else {
            $fiscalyears[0] = date('y') + 1;
            $fiscalyears[1] = date('y') + 2;
            $fiscalyears[2] = date('y') + 3;
        }

        return $fiscalyears;
    }

    function getoffset($start_date_month, $startyear, $year) {

        $tm = mktime(0, 0, 0, $start_date_month + 1, 1, $startyear);
//echo ceil(date("m", $tm)/3);
        if (ceil(date("m", $tm) / 3) == 4)
            $offset = ceil(date("m", $tm) / 3) * ($startyear - 2000 - $year + 1);
        else
            $offset = 4 * ($startyear - 2000 - $year ) + ceil(date("m", $tm) / 3);

        return $offset;
    }

    function handle_exception($errorno, $errorstr) {
        switch ($errorno) {
            case E_USER_WARNING: {
                    break;
                }
            default: {
                    break;
                }
        }
    }

    function urlsf() {
        $this->load->helper(array('email', 'form'));
        $this->load->view("urlsview");
    }

}

/**  @Ravi  Use the following PHP Excel functions-------------------- for your programs
  function testexcel()
  {
  include 'PHPExcel.php';
  PHPExcel_Writer_Excel2007
  include 'PHPExcel/Writer/Excel5.php';

  // Create new PHPExcel object

  $objPHPExcel = new PHPExcel();

  // Set properties

  $objPHPExcel->getProperties()->setCreator("BazZ");
  $objPHPExcel->getProperties()->setLastModifiedBy("BazZ");
  $objPHPExcel->getProperties()->setTitle("TestExcel");
  $objPHPExcel->getProperties()->setSubject("");

  // Set row height
  $objPHPExcel->getActiveSheet()->getRowDimension(1)->setRowHeight(50);
  $objPHPExcel->getActiveSheet()->getRowDimension(2)->setRowHeight(25);

  // Set column width
  $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
  $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
  $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
  $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(40);
  $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
  $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
  $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
  $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(10);
  $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
  $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
  $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
  $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
  $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
  $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);

  //Merge cells (warning: the row index is 0-based)
  $objPHPExcel->getActiveSheet()->mergeCellsByColumnAndRow(0,1,13,1);
  $objPHPExcel->getActiveSheet()->mergeCellsByColumnAndRow(0,2,13,2);
  $objPHPExcel->getActiveSheet()->mergeCellsByColumnAndRow(0,3,0,5);
  $objPHPExcel->getActiveSheet()->mergeCellsByColumnAndRow(1,3,1,5);
  $objPHPExcel->getActiveSheet()->mergeCellsByColumnAndRow(2,3,3,3);
  $objPHPExcel->getActiveSheet()->mergeCellsByColumnAndRow(2,4,2,5);
  $objPHPExcel->getActiveSheet()->mergeCellsByColumnAndRow(3,4,3,5);
  $objPHPExcel->getActiveSheet()->mergeCellsByColumnAndRow(4,3,4,5);
  $objPHPExcel->getActiveSheet()->mergeCellsByColumnAndRow(5,3,5,5);
  $objPHPExcel->getActiveSheet()->mergeCellsByColumnAndRow(6,3,6,5);
  $objPHPExcel->getActiveSheet()->mergeCellsByColumnAndRow(7,3,9,3);
  $objPHPExcel->getActiveSheet()->mergeCellsByColumnAndRow(7,4,7,5);
  $objPHPExcel->getActiveSheet()->mergeCellsByColumnAndRow(8,4,9,4);
  $objPHPExcel->getActiveSheet()->mergeCellsByColumnAndRow(10,3,10,5);
  $objPHPExcel->getActiveSheet()->mergeCellsByColumnAndRow(11,3,11,5);
  $objPHPExcel->getActiveSheet()->mergeCellsByColumnAndRow(12,3,12,5);
  $objPHPExcel->getActiveSheet()->mergeCellsByColumnAndRow(13,3,13,5);

  //Modify cell's style
  $objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray(
  array(
  'font' => array(
  'name'         => 'Times New Roman',
  'bold'         => true,
  'italic'    => false,
  'size'        => 20
  ),
  'alignment' => array(
  'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
  'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
  'wrap'       => true
  )
  )
  );

  $objPHPExcel->getActiveSheet()->getStyle('A2')->applyFromArray(
  array(
  'font' => array(
  'name'         => 'Times New Roman',
  'bold'         => true,
  'italic'    => false,
  'size'        => 14
  ),
  'alignment' => array(
  'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
  'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
  'wrap'       => true
  )
  )
  );

  $objPHPExcel->getActiveSheet()->duplicateStyleArray(
  array(
  'font' => array(
  'name'         => 'Times New Roman',
  'bold'         => true,
  'italic'    => false,
  'size'        => 12
  ),
  'borders' => array(
  'top'        => array('style' => PHPExcel_Style_Border::BORDER_DOUBLE),
  'bottom'    => array('style' => PHPExcel_Style_Border::BORDER_DOUBLE),
  'left'        => array('style' => PHPExcel_Style_Border::BORDER_DOUBLE),
  'right'        => array('style' => PHPExcel_Style_Border::BORDER_DOUBLE)
  ),
  'alignment' => array(
  'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
  'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
  'wrap'       => true
  )
  ),
  'A3:N5'
  );

  // Add some data

  $objPHPExcel->setActiveSheetIndex(0);

  $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Try PHPExcel with CodeIgniter');
  $objPHPExcel->getActiveSheet()->SetCellValue('A2',"Subtitle here");

  $objPHPExcel->getActiveSheet()->SetCellValue('A3',"No.");
  $objPHPExcel->getActiveSheet()->SetCellValue('B3',"Name");
  $objPHPExcel->getActiveSheet()->SetCellValue('C3',"Number");
  $objPHPExcel->getActiveSheet()->SetCellValue('C4',"Code");
  $objPHPExcel->getActiveSheet()->SetCellValue('D4',"Register");
  $objPHPExcel->getActiveSheet()->SetCellValue('E3',"Space (M2)");
  $objPHPExcel->getActiveSheet()->SetCellValue('F3',"Year");
  $objPHPExcel->getActiveSheet()->SetCellValue('G3',"Location");

  // Rename sheet

  $objPHPExcel->getActiveSheet()->setTitle('Try PHPExcel with CodeIgniter');

  // Save Excel 2003 file

  $objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);
  $objWriter->save($_SERVER['DOCUMENT_ROOT'] . '/uploads/kiba.xls');
  }
 * */
