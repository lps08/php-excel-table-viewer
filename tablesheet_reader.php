<?php

require_once 'vendor/autoload.php';
require_once 'constants.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

class PhpSheet {

    public $path;

    public function __construct(string $path) {
        $this->path = $path;
    }

    private function readerFromPath() {
        $inputFileType = IOFactory::identify($this->path);
        $reader = IOFactory::createReader($inputFileType);
        $reader->setLoadAllSheets();
        $reader->setReadDataOnly(true);
        $reader->setReadEmptyCells(false);
        $spreadsheet = $reader->load($this->path);

        return $spreadsheet;
    }

    private function normalizeSheet($sheet) {
        $maxCell = $sheet->getHighestRowAndColumn();
        $data = $sheet->rangeToArray('A1:' . $maxCell['column'] . $maxCell['row']);
        $data = array_map('array_filter', $data);
        $data = array_filter($data);

        return array_values($data);
    }

    public function createViewer() {
        $spreadsheet = $this->readerFromPath();
        $writer = IOFactory::createWriter($spreadsheet, WRITER_TYPE);
        $viewer = $writer->save(OUTPUT_WRITER);
        
        return $viewer;
    }

    private function getArrayData() {
        $spreadsheet = $this->readerFromPath();
        $sheet = $spreadsheet->getSheet(0);
        $data = $this->normalizeSheet($sheet);

        return $data;
    }

    public function saveSheet() {
        $data = $this->getArrayData();
        $data_lenght = count($data);
        $listaConvocatoria = $data[0][0];
        $camposPolo = explode(":", $data[2][0])[1];
        $curso = explode(":", $data[3][0])[1];
        $concorrencia = explode(":", $data[4][0])[1];
        
        for ($i=6; $i < $data_lenght; $i++) { 
            $nome = $data[$i][0];
            $cpf = $data[$i][1];
            $rg = $data[$i][2];
            $dataNascimento = $data[$i][3];
            $nomeMae = $data[$i][4];
            $sexo = $data[$i][5];

            // insert the data for each person right here
            // i.e -> daoObjetc->insert(all data through parameters)
            // return true if was success and false if wasn's success
            // I recomend to implement a exception if occurs an error
        }
        return true;
    }
}

?>

<!-- INSERT INTO `importacao` (
  `convocacao_id`, `lista_espera_id`, 
  `ori_cpf`, `cpf`, `ori_polo`, `polo`, 
  `ori_nome`, `nome`, `ori_modalidade_concorrencia`, 
  `modalidade_concorrencia`, `ori_classificacao`, 
  `classificacao`, `ori_media_calculada`, 
  `media_calculada`, `ori_nascimento`, 
  `nascimento`, `ori_concorrencia_original`, 
  `concorrencia_original`, `ori_situacao`, 
  `situacao`, `ori_email`, `email`, 
  `curso`, `ativo`, `cadastro_usuario`, 
  `cadastro_data`
) 
VALUES 
  (
    29, NULL, '".$cpf."', '".$cpf."', 'CAMPO-MAIOR-PI', 
    9, '".utf8_encode($data[0])."', 
    '".utf8_encode($data[0])."', '".$nome_modalidade."', 
    ".$modalidade.", ".$data[2].", ".$data[2].", 
    ".$data[1].", ".$data[1].", '".$nascimento_com_barras."', 
    '".date("Y-m-d", strtotime($data[6]) )."', 
    '".$nome_modalidade."', ".$modalidade.", 
    'A', 'A', '".$data[3]."', '".$data[3]."', 
    2, 'S', 15, NOW()
  );
"; -->