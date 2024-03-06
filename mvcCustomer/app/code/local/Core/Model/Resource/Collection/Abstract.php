<?php

class Core_Model_Resource_Collection_Abstract
{
    protected $_resource = null;
    protected $_select = [];
    protected $_data = [];
    protected $_isLoaded = false;
    protected $_modelClass = null;
    public function setResource(Core_Model_Resource_Abstract $resource)
    {
        $this->_resource = $resource;
        return $this;
    }
    public function setModelClass($modelClass)
    {
        $this->_modelClass = $modelClass;
    }
    public function select()
    {
        $this->_select['FROM'] = $this->_resource->getTableName();
        return $this;
    }

    public function addGroupBy($field)
    {
        $this->_select['GROUP BY'] = $field;
        return $this;
    }

    public function addOrderBy($field, $direction = 'ASC')
    {
        $this->_select['ORDER BY'] = "{$field} {$direction}";
        return $this;
    }

    public function setLimit($limit, $offset = 0)
    {
        $this->_select['LIMIT'] = "LIMIT {$offset}, {$limit}";
        return $this;
    }
    public function addFieldToFilter($field, $value)
    {
        $this->_select['WHERE'][$field][] = $value;
        return $this;
    }

    public function load()
    {
        $sql = "SELECT * FROM {$this->_select['FROM']}";
        if (isset($this->_select["WHERE"])) {
            $whereCondition = [];
            foreach ($this->_select["WHERE"] as $column => $value) {
                foreach ($value as $_value) {
                    if (!is_array($_value)) {
                        $_value = array('eq' => $_value);
                    }
                    foreach ($_value as $_condition => $_v) {
                        if (is_array($_v)) {
                            $_v = array_map(function ($v) {
                                return "'{$v}'";
                            }, $_v);
                            $_v = implode(',', $_v);
                        }
                        switch ($_condition) {
                            case 'eq':
                                $whereCondition[] = "{$column} = '{$_v}'";
                                break;
                            case 'in':
                                $whereCondition[] = "{$column} IN ({$_v})";
                                break;
                            case 'like':
                                $whereCondition[] = "{$column} LIKE '{$_v}'";
                                break;
                            case 'gt':
                                $whereCondition[] = "{$column} > {$_v}";
                                break;
                            case 'lt':
                                $whereCondition[] = "{$column} < {$_v}";
                                break;
                            case 'lte':
                                $whereCondition[] = "{$column} <= {$_v}";
                                break;
                            case 'gte':
                                $whereCondition[] = "{$column} >= {$_v}";
                                break;
                            case 'neq':
                                $whereCondition[] = "{$column} <> {$_v}";
                                break;
                        }
                    }
                }
            }
            $sql .= " WHERE " . implode(" AND ", $whereCondition);

            // print_r($whereCondition);
        }
        if (!empty($this->_select['GROUP BY'])) {
            $sql .= " GROUP BY {$this->_select['GROUP BY']}";
        }

        if (!empty($this->_select['ORDER BY'])) {
            $sql .= " ORDER BY {$this->_select['ORDER BY']}";
        }

        if (!empty($this->_select['LIMIT'])) {
            $sql .= " {$this->_select['LIMIT']}";
        }
        // echo $sql;
        $result = $this->_resource->getAdapter()->fetchAll($sql);
        foreach ($result as $row) {
            $this->_data[] = Mage::getModel($this->_modelClass)->setData($row);
        }
        $this->_isLoaded = true;

        return $this;
        // print_r($this->_data);
    }
    public function getData()
    {
        if (!$this->_isLoaded) {
            $this->load();
        }
        return $this->_data;
    }
    public function getFirstItem()
    {
        $this->load();
        return(isset($this->_data[0])) ? $this->_data[0] : null;
    }
}
