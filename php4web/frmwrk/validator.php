<?php

namespace frmwrk;
class validator {

    protected $errors = [];

    public function __construct(
        protected array $data,
        protected array $rules = [],
        protected bool $autoRedirection = true,
    ) {
        $this->validate();

        if ( $autoRedirection && !$this->wentThrough() ) {
           
            
            $this->redirectIfFailed();
        }
    }

    public static function url($url) {
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
    }

    public function getErrors() {
        return $this->errors;
    }

    public function fails(): bool {
        return !empty($this->errors);
    }

    public function validate() : void {
        foreach ($this->rules as $field => $rules) {
            $value = trim($this->data[$field] ?? null);
            $this->validateField($field, $value, $rules);
        }
    }

    public function validateField(string $field, mixed $value, string $rules): void {
        $rules = explode('|', $rules);
        foreach ($rules as $rule) {
            $method = 'validate' . ucfirst($rule);
            [ $name ,$param ] = array_pad( explode(':', $rule ), 2, null );
            if (method_exists($this, $method)) {
                $this->$method($field, $value, $param);
            }
            $error =  match ( $name ) {

                'required'  => empty($value)     ?   "$field is required..."    : null,
                'min'       => strlen($value) < (int)$param ? "$field must be at least $param characters..." : null,
                'max'      => strlen($value) > (int)$param ? "$field must be at most $param characters..." : null,
                'url'      => !self::url($value) ? "$field must be a valid URL..." : null,
                'date'     => !preg_match('/^\d{4}-\d{2}-\d{2}$/', $value) ? "$field must be a valid date in YYYY-MM-DD format..." : null,
                'email' =>  filter_var($value, FILTER_VALIDATE_EMAIL) === false ? "$field must be a valid email address..." : null,
                default    => throw new \Exception("Validation rule $name not recognized."),

            };

            if ($error) {
                $this->errors[$field] = $error;

                break;

            }
        }
    }

    public function wentThrough(): bool {
        return empty($this->errors);
    }   

    public function errors() : array {

        return $this->errors;
    }

    public function validateRequired(string $field, mixed $value): void {
        if (empty($value)) {
            $this->errors[$field][] = 'This field is required.';
        }
    }

    protected function redirectIfFailed(): void {

        // $previousURL = $_SERVER['HTTP_REFERER'] ?? '/';
        // $redirectTo = $previousURL;
        // header("Location: " . $redirectTo);
        // exit;
        back();
    }


}