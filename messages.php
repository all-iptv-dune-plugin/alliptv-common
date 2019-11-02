<?php

namespace Iptv {
    
    final class AuthDataSerializer
    {
        private $__data = array('');

        private function __construct()
        {}

        /**
         * @return string
         */
        public function dump()
        {
            return call_user_func_array('pack', $this->__data);
        }

        /**
         * @return string
         */
        public function __toString()
        {
            return $this->dump();
        }

        /**
         * @return self
         */
        public static function create()
        {
            return new static();
        }

        /**
         * @param  string $v
         * @return self
         */
        public function model($v)
        {
            if ($v) {
                $size = strlen($v);
                $this->__data[0] .= 'CVa' . $size;
                $this->__data[] = 1;
                $this->__data[] = $size;
                $this->__data[] = $v;
            }
            return $this;
        }
        /**
         * @param  string $v
         * @return self
         */
        public function serial($v)
        {
            if ($v) {
                $size = strlen($v);
                $this->__data[0] .= 'CVa' . $size;
                $this->__data[] = 2;
                $this->__data[] = $size;
                $this->__data[] = $v;
            }
            return $this;
        }
        /**
         * @param  string $v
         * @return self
         */
        public function redirect($v)
        {
            if ($v) {
                $size = strlen($v);
                $this->__data[0] .= 'CVa' . $size;
                $this->__data[] = 3;
                $this->__data[] = $size;
                $this->__data[] = $v;
            }
            return $this;
        }
    }


    final class AuthData
    {
        /**
         * @var string
         */
        public $model = '';
        /**
         * @var string
         */
        public $serial = '';
        /**
         * @var string
         */
        public $redirect = '';

        private $__indices = array(1 => 'model', 2 => 'serial', 3 => 'redirect');

        /**
         * @param string $data
         */
        public function __construct($data)
        {
            if ($data) {
                $size   = strlen($data);
                $offset = 0;
                do {
                    $offset = $this->__parse($data, $offset + 1, ord($data[$offset]));
                } while ($offset < $size);
            }
        }

        private function __parse($data, $offset, $id)
        {
            $field = $this->__indices[$id];
            switch ($id) {

                case 1/*model*/: case 2/*serial*/: case 3/*redirect*/:
                    // string
                    $size = ord($data[$offset]) | (ord($data[++$offset]) << 8) | (ord($data[++$offset]) << 16) | (ord($data[($offset += 2) - 1]) << 24);
                    list(, $this->{$field}) = unpack('a' . $size, substr($data, $offset, $size));
                    $offset += $size;
                    return $offset;
            }
        }

        /**
         * @return string
         */
        public function dump()
        {
            return AuthDataSerializer::create()
              ->model($this->model)
              ->serial($this->serial)
              ->redirect($this->redirect)->dump();
        }

        /**
         * @return string
         */
        public function __toString()
        {
            return $this->dump();
        }
    }
}
namespace Iptv {
    
    final class TokenSerializer
    {
        private $__data = array('');

        private function __construct()
        {}

        /**
         * @return string
         */
        public function dump()
        {
            return call_user_func_array('pack', $this->__data);
        }

        /**
         * @return string
         */
        public function __toString()
        {
            return $this->dump();
        }

        /**
         * @return self
         */
        public static function create()
        {
            return new static();
        }

        /**
         * @param  int $v
         * @return self
         */
        public function expiries($v)
        {
            if ($v) {
                $this->__data[0] .= 'CV';
                $this->__data[] = 1;
                $this->__data[] = $v;
            }
            return $this;
        }
        /**
         * @param  int $v
         * @return self
         */
        public function paid_to($v)
        {
            if ($v) {
                $this->__data[0] .= 'CV';
                $this->__data[] = 2;
                $this->__data[] = $v;
            }
            return $this;
        }
        /**
         * @param  int $v
         * @return self
         */
        public function user_id($v)
        {
            if ($v) {
                $this->__data[0] .= 'CV';
                $this->__data[] = 3;
                $this->__data[] = $v;
            }
            return $this;
        }
        /**
         * @param  string $v
         * @return self
         */
        public function payload($v)
        {
            if ($v) {
                $size = strlen($v);
                $this->__data[0] .= 'CVa' . $size;
                $this->__data[] = 4;
                $this->__data[] = $size;
                $this->__data[] = $v;
            }
            return $this;
        }
        /**
         * @param  string $v
         * @return self
         */
        public function id($v)
        {
            if ($v) {
                $size = strlen($v);
                $this->__data[0] .= 'CVa' . $size;
                $this->__data[] = 5;
                $this->__data[] = $size;
                $this->__data[] = $v;
            }
            return $this;
        }
    }


    final class Token
    {
        /**
         * @var int
         */
        public $expiries = 0;
        /**
         * @var int
         */
        public $paid_to = 0;
        /**
         * @var int
         */
        public $user_id = 0;
        /**
         * @var string
         */
        public $payload = '';
        /**
         * @var string
         */
        public $id = '';

        private $__indices = array(1 => 'expiries', 2 => 'paid_to', 3 => 'user_id', 4 => 'payload', 5 => 'id');

        /**
         * @param string $data
         */
        public function __construct($data)
        {
            if ($data) {
                $size   = strlen($data);
                $offset = 0;
                do {
                    $offset = $this->__parse($data, $offset + 1, ord($data[$offset]));
                } while ($offset < $size);
            }
        }

        private function __parse($data, $offset, $id)
        {
            $field = $this->__indices[$id];
            switch ($id) {

                case 1/*expiries*/: case 2/*paid_to*/: case 3/*user_id*/:
                    // uint32
                    $this->{$field} = ord($data[$offset]) | (ord($data[++$offset]) << 8) | (ord($data[++$offset]) << 16) | (ord($data[($offset += 2) - 1]) << 24);
                    return $offset;

                case 4/*payload*/: case 5/*id*/:
                    // string
                    $size = ord($data[$offset]) | (ord($data[++$offset]) << 8) | (ord($data[++$offset]) << 16) | (ord($data[($offset += 2) - 1]) << 24);
                    list(, $this->{$field}) = unpack('a' . $size, substr($data, $offset, $size));
                    $offset += $size;
                    return $offset;
            }
        }

        /**
         * @return string
         */
        public function dump()
        {
            return TokenSerializer::create()
              ->expiries($this->expiries)
              ->paid_to($this->paid_to)
              ->user_id($this->user_id)
              ->payload($this->payload)
              ->id($this->id)->dump();
        }

        /**
         * @return string
         */
        public function __toString()
        {
            return $this->dump();
        }
    }
}
namespace Iptv {
    
    final class TokenContainerSerializer
    {
        private $__data = array('');

        private function __construct()
        {}

        /**
         * @return string
         */
        public function dump()
        {
            return call_user_func_array('pack', $this->__data);
        }

        /**
         * @return string
         */
        public function __toString()
        {
            return $this->dump();
        }

        /**
         * @return self
         */
        public static function create()
        {
            return new static();
        }

        /**
         * @param  int $v
         * @return self
         */
        public function expiries($v)
        {
            if ($v) {
                $this->__data[0] .= 'CV';
                $this->__data[] = 1;
                $this->__data[] = $v;
            }
            return $this;
        }
        /**
         * @param  string $v
         * @return self
         */
        public function token($v)
        {
            if ($v) {
                $size = strlen($v);
                $this->__data[0] .= 'CVa' . $size;
                $this->__data[] = 2;
                $this->__data[] = $size;
                $this->__data[] = $v;
            }
            return $this;
        }
    }


    final class TokenContainer
    {
        /**
         * @var int
         */
        public $expiries = 0;
        /**
         * @var string
         */
        public $token = '';

        private $__indices = array(1 => 'expiries', 2 => 'token');

        /**
         * @param string $data
         */
        public function __construct($data)
        {
            if ($data) {
                $size   = strlen($data);
                $offset = 0;
                do {
                    $offset = $this->__parse($data, $offset + 1, ord($data[$offset]));
                } while ($offset < $size);
            }
        }

        private function __parse($data, $offset, $id)
        {
            $field = $this->__indices[$id];
            switch ($id) {

                case 1/*expiries*/:
                    // uint32
                    $this->{$field} = ord($data[$offset]) | (ord($data[++$offset]) << 8) | (ord($data[++$offset]) << 16) | (ord($data[($offset += 2) - 1]) << 24);
                    return $offset;

                case 2/*token*/:
                    // string
                    $size = ord($data[$offset]) | (ord($data[++$offset]) << 8) | (ord($data[++$offset]) << 16) | (ord($data[($offset += 2) - 1]) << 24);
                    list(, $this->{$field}) = unpack('a' . $size, substr($data, $offset, $size));
                    $offset += $size;
                    return $offset;
            }
        }

        /**
         * @return string
         */
        public function dump()
        {
            return TokenContainerSerializer::create()
              ->expiries($this->expiries)
              ->token($this->token)->dump();
        }

        /**
         * @return string
         */
        public function __toString()
        {
            return $this->dump();
        }
    }
}