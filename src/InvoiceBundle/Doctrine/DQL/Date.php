<?php
// src/InvoiceBundle/Doctrine/DQL/Date.php
/**
 * Created by Bonface Navade.
 * 12/10/2016
 */

namespace InvoiceBundle\Doctrine\DQL;

use Doctrine\ORM\Query\Lexer;
use Doctrine\ORM\Query\AST\Functions\FunctionNode;

class Date extends FunctionNode {
    /**
     *
     * @var date
     */
    
    public $date;
    
    public function getSql(\Doctrine\ORM\Query\SqlWalker $sqlWalker){
        return "DATE(" . $sqlWalker->walkArithmeticPrimary($this->date) . ")";
    }
    
    public function parse(\Doctrine\ORM\Query\Parser $parser){
        $parser->match(Lexer::T_IDENTIFIER);
        $parser->match(Lexer::T_OPEN_PARENTHESIS);

        $this->date = $parser->ArithmeticPrimary();

        $parser->match(Lexer::T_CLOSE_PARENTHESIS);
    }
}
