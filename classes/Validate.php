<?php
class Validate
{
    private $_passed = false,
    $_errors = array(),
    $_db = null;

    public function __construct()
    {
        $this->_db = DB::getInstance();
    }

    public function check($source, $items = array())
    {
        foreach ($items as $item => $rules) {
            foreach ($rules as $rule => $rule_value) {

                if (isset($source[$item])) {
                    $value = $source[$item];
                } else {
                    $value = null; // or some default value
                }

                if ($rule === 'required' && empty($value)) {
                    $this->addError("{$item} ir nepieciešams");
                } else if (!empty($value)) {
                    switch ($rule) {
                        case 'min':
                            if (strlen($value) < $rule_value) {
                                $this->addError("{$item} minimums {$rule_value} simboli");
                            }
                            break;
                        case 'max':
                            if (strlen($value) > $rule_value) {
                                $this->addError("{$item} maksimums {$rule_value} simboli");
                            }
                            break;
                        case 'matches':
                            if ($value != $source[$rule_value]) {
                                $this->addError("{$rule_value} jāsakrīt ar {$item}");
                            }
                            break;
                        case 'unique':
                            $check = $this->_db->get($rule_value, array($item, '=', $value));
                            if (is_object($check) && $check->count()) {
                                $this->addError("{$item} jau eksistē");
                            }
                            break;
                        case 'email':
                            if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                                $this->addError("{$item} jābūt derīgai e-pasta adresei");
                            }
                            break;
                        case 'not_only_numbers':
                            if (ctype_digit($value)) {
                                $this->addError("{$item} nevar saturēt tikai ciparus");
                            }
                            break;
                        case 'no_numbers':
                            if (preg_match('/\d/', $value)) {
                                $this->addError("{$item} nevar saturēt ciparus");
                            }
                            break;
                        case 'only_numbers':
                            if (!ctype_digit($value)) {
                                $this->addError("{$item} nevar saturēt burtus");
                            }
                            break;
                        case 'numeric':
                            if (!is_numeric($value)) {
                                $this->addError("{$item} jābūt skaitlim");
                            }
                            break;
                        case 'picture':
                            $target_dir = "uploads/";
                            $file_name = basename($_FILES["picture"]["name"]);
                            $target_file = $target_dir . $file_name;
                            $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                            if (!in_array($file_type, array('jpg', 'jpeg', 'png', 'gif'))) {
                                $this->addError("{$item} files are only allowed");
                            }
                            break;
                        default:
                            break;
                    }
                }
            }
        }

        if (empty($this->_errors)) {
            $this->_passed = true;
        }
        return $this;
    }

    private function addError($error)
    {
        $this->_errors[] = $error;
    }

    public function errors()
    {
        return $this->_errors;
    }

    public function passed()
    {
        return $this->_passed;
    }
}