<?php

namespace App\Filter;

abstract class ApiFilter {
    
    abstract protected function setColumnsQuery();
    abstract protected function getColumnsQuery();

}