<?php
class Model_Abstract{
    public function getquerybuilder(){
    return new Lib_sql_Query_Builder;
    }
}
?>