<?php
session_start();
$tipo_cubo = $_SESSION['tipo_cubo'];
class Scrambler
{
    private $faces = array('U', 'D', 'L', 'R', 'F', 'B');
    
    public function __construct()
    {
        $this->length = 25;
        $this->chance_prime = 25;
        $this->chance_double = 25;
        $this->chance_wide = 0;
        $this->chance_two = 0;
        $this->chance_three = 0;
    }
    
    public function setLength($value)
    {
        $this->length = $value;
    }

    public function setWide($value)
    {
        $this->chance_wide = $value;
    }

    public function setTwo($value)
    {
        $this->chance_two = $value;
    }

    public function setThree($value)
    {
        $this->chance_three = $value;
    }
    
    public function generate()
    {
        $last = null;
        do {
            $move = $this->faces[array_rand($this->faces)];
            if ($move != $last) {
                $last = $move;
                $rand = mt_rand(0, 100);
                if ($rand <= $this->chance_wide and $this->chance_wide != 0){
                    $move = strtolower($move);
                }
                $rand = mt_rand(0, 100);
                if ($rand <= $this->chance_two and $this->chance_two != 0){
                    $move = "2".$move;
                } elseif ($rand <= $this->chance_two + $this->chance_three and $this->chance_three != 0){
                    $move = "3".$move;
                }
                $rand = mt_rand(0, 100);
                if ($rand <= $this->chance_prime) {
                    $move .= "'";
                } elseif ($rand <= $this->chance_prime + $this->chance_double) {
                    $move .= '2';
                }
                $scramble[] = $move;
            }
        } while (count($scramble) < $this->length);
        return implode(' ', $scramble);
    }
}

class pira_Scrambler
{
    private $faces = array('U', 'L', 'R', 'B');
    
    public function __construct()
    {
        $this->length = 25;
        $this->chance_prime = 25;
    }
    
    public function generate()
    {
        $last = null;
        do {
            $move = $this->faces[array_rand($this->faces)];
            if ($move != $last) {
                $last = $move;
                $rand = mt_rand(0, 100);
                if ($rand <= $this->chance_prime) {
                    $move .= "'";
                }
                $scramble[] = $move;
            }
        } while (count($scramble) < $this->length);
        return implode(' ', $scramble);
    }
}

class mega_Scrambler
{
    private $faces = array('R', 'D');
    
    public function __construct()
    {
        $this->length = 10;
        $this->chance_plus = 50;
        $this->chance_prime = 25;
    }
    
    public function generate()
    {
        do {
            $move = 'R';
            $rand = mt_rand(0, 100);
            if ($rand <= $this->chance_plus) {
                $move .= "++";
            } else {
                $move .= "--";  
            }
            $scramble[] = $move;
            $move = 'D';
            $rand = mt_rand(0, 100);
            if ($rand <= $this->chance_plus) {
                $move .= "++";
            } else {
                $move .= "--";  
            }
            $scramble[] = $move;
        } while (count($scramble) < $this->length);
        $rand = mt_rand(0, 100);
        if ($rand <= 50) {
            $move = 'U';
        } else {
            $move = "U'";
        }
        array_push($scramble, $move);
        return implode(' ', $scramble);
    }
}

class two_scrambler
{
    private $faces = array('U','R', 'F');
    
    public function __construct()
    {
        $this->length = 25;
        $this->chance_prime = 25;
        $this->chance_double = 25;
    }
    
    public function generate()
    {
        $last = null;
        do {
            $move = $this->faces[array_rand($this->faces)];
            if ($move != $last) {
                $last = $move;
                $rand = mt_rand(0, 100);
                if ($rand <= $this->chance_prime) {
                    $move .= "'";
                } elseif ($rand <= $this->chance_prime + $this->chance_double) {
                    $move .= '2';
                }
                $scramble[] = $move;
            }
        } while (count($scramble) < $this->length);
        return implode(' ', $scramble);
    }
}

class skewb_Scrambler
{
    private $faces = array('F', 'L', 'R', 'B');
    
    public function __construct()
    {
        $this->length = 25;
        $this->chance_prime = 25;
    }
    
    public function generate()
    {
        $last = null;
        do {
            $move = $this->faces[array_rand($this->faces)];
            if ($move != $last) {
                $last = $move;
                $rand = mt_rand(0, 100);
                if ($rand <= $this->chance_prime) {
                    $move .= "'";
                }
                $scramble[] = $move;
            }
        } while (count($scramble) < $this->length);
        return implode(' ', $scramble);
    }
}

function gerarMedia5($x1, $x2, $x3, $x4, $x5) {

    $max = max($x1, $x2, $x3, $x4, $x5);
    $min = min($x1, $x2, $x3, $x4, $x5);

    if ($max == $x1) {

        if ($min == $x2) {
            $media_5 = ($x3 + $x4 + $x5) / 3;
        }
    
        if ($min == $x3) {
            $media_5 = ($x2 + $x4 + $x5) / 3;
        }
    
        if ($min == $x4) {
            $media_5 = ($x3 + $x2 + $x5) / 3;
        }
    
        if ($min == $x5) {
            $media_5 = ($x3 + $x2 + $x4) / 3;
        }
    }
    
    if ($max == $x2) {
    
        if ($min == $x1) {
            $media_5 = ($x3 + $x2 + $x5) / 3;
        }
    
        if ($min == $x3) {
            $media_5 = ($x1 + $x4 + $x5) / 3;
        }
    
        if ($min == $x4) {
            $media_5 = ($x3 + $x1 + $x5) / 3;
        }
    
        if ($min == $x5) {
            $media_5 = ($x3 + $x1 + $x4) / 3;
        }
    }
    
    if ($max == $x3) {
    
        if ($min == $x1) {
            $media_5 = ($x4 + $x2 + $x5) / 3;
        }
    
        if ($min == $x2) {
            $media_5 = ($x1 + $x4 + $x5) / 3;
        }
    
        if ($min == $x4) {
            $media_5 = ($x1 + $x2 + $x5) / 3;
        }
    
        if ($min == $x5) {
            $media_5 = ($x1 + $x2 + $x4) / 3;
        }
    
    }
    
    if ($max == $x4) {
    
        if ($min == $x1) {
            $media_5 = ($x3 + $x2 + $x5) / 3;
        }
    
        if ($min == $x2) {
            $media_5 = ($x3 + $x1 + $x5) / 3;
        }
    
        if ($min == $x3) {
            $media_5 = ($x1 + $x2 + $x5) / 3;
        }
    
        if ($min == $x5) {
            $media_5 = ($x3 + $x2 + $x1) / 3;
        }
    }
    
    if ($max == $x5) {
    
        if ($min == $x1) {
            $media_5 = ($x3 + $x2 + $x4) / 3;
        }
    
        if ($min == $x2) {
            $media_5 = ($x3 + $x1 + $x4) / 3; 
        }
    
        if ($min == $x3) {
            $media_5 = ($x1 + $x2 + $x4) / 3;
        }
    
        if ($min == $x4) {
            $media_5 = ($x3 + $x2 + $x1) / 3;
        }
    
    }
    return $media_5;
}