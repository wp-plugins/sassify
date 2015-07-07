<?php
/**
 * SCSSPHP
 *
 * @copyright 2012-2015 Leaf Corcoran
 *
 * @license http://opensource.org/licenses/gpl-license GPL-3.0
 * @license http://opensource.org/licenses/MIT MIT
 *
 * @link http://leafo.net/scssphp
 */

/* namespace Leafo\ScssPhp\Formatter; */

/* use Leafo\ScssPhp\Formatter; */

/**
 * SCSS expanded formatter
 *
 * @author Leaf Corcoran <leafot@gmail.com>
 */
class Leafo_ScssPhp_Formatter_Expanded extends Leafo_ScssPhp_Formatter
{
    /**
     * {@inheritdoc}
     */
    public function __construct()
    {
        $this->indentLevel = 0;
        $this->indentChar = '  ';
        $this->break = "\n";
        $this->open = ' {';
        $this->close = '}';
        $this->tagSeparator = ', ';
        $this->assignSeparator = ': ';
    }
}
