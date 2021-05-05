<?php

namespace App\Libraries;

/**
 * Gerenciador de DataTables para CodeIgniter (Requer PHP ^7.2)
 *
 * @package		CodeIgniter 4
 * @subpackage	Libraries
 * @category	View Tools
 * @author		Paulo - paulo@cliqueti.com.br
 * @version     V1.0 (07/2020)
 *
 */
class Cidatagrid {

    private $columns;
    private $colClass;
    private $contentRow;
    private $idTable;

    public function __construct(bool $dataTable=false, string $class=null) {
        if(empty($class)){
            $this->colClass = "table ".($dataTable ? "data-table" : "");
        } else {
            $this->colClass = $class;
        }
    }

    public function setIdTable(string $id): Cidatagrid {
        $this->idTable = $id;
        return $this;
    }

    public function setHeaders(array $columns) {
        /* Persiste Colunas */
        $this->columns = $columns;

        /* Inicia a construção do Header da Tabela */
        echo "<table class=\"{$this->colClass}\" id=\"{$this->idTable}\"> \r\n";
        echo "    <thead>\r\n";
        echo "        <tr>\r\n";

        /* Povoa Colunas */
        foreach ($columns as $column){
            if(!empty($column)){
                echo "            <th>{$column}</th>\r\n";
            }
        }

        /* Finaliza a Contrução do Header da Tabela */
        echo "        </tr>\r\n";
        echo "    </thead>\r\n";
        echo "<tbody> \r\n";
    }

    public function content(string $content) {
        $this->contentRow[] = "            <td>{$content}</td>";
        if(count($this->columns) == count($this->contentRow)){
            /* Imprime Linha */
            echo "         <tr>\r\n";
            echo implode("\r\n", $this->contentRow);
            echo "         </tr>\r\n";
            /* Reinicia Contagem */
            $this->contentRow = null;
        }
    }

    public function close() {
        echo "</tbody> \r\n";
        echo "</table> \r\n";
    }

}