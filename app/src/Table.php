<?php

namespace HCPSS;

class Table {
    
    /**
     * @var array
     */
    private $data;
    
    public function __construct(array $data) {
        $this->data = $data;
    }
    
    public function __toString() {
        // Find longest string in each column
        $columns = [];
        foreach ($this->data as $row_key => $row) {
            foreach ($row as $cell_key => $cell) {
                $length = strlen($cell);
                if (empty($columns[$cell_key]) || $columns[$cell_key] < $length) {
                    $columns[$cell_key] = $length;
                }
            }
        }
        
        // Output table, padding columns
        $table = '';
        foreach ($this->data as $row_key => $row) {
            foreach ($row as $cell_key => $cell)
                $table .= str_pad($cell, $columns[$cell_key]) . '   ';
                $table .= PHP_EOL;
        }
        return $table;
    }
}
