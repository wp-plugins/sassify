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
 * SCSS compressed formatter
 *
 * @author Leaf Corcoran <leafot@gmail.com>
 */
class Leafo_ScssPhp_Formatter_Compressed extends Leafo_ScssPhp_Formatter
{
    /**
     * {@inheritdoc}
     */
    public function __construct()
    {
        $this->indentLevel = 0;
        $this->indentChar = '  ';
        $this->break = '';
        $this->open = '{';
        $this->close = '}';
        $this->tagSeparator = ',';
        $this->assignSeparator = ':';
    }

    /**
     * {@inheritdoc}
     */
    public function indentStr($n = 0)
    {
        return '';
    }

    /**
     * {@inheritdoc}
     */
    public function blockLines($inner, $block)
    {
        $glue = $this->break . $inner;

        foreach ($block->lines as $index => $line) {
            if (substr($line, 0, 2) === '/*' && substr($line, 2, 1) !== '!') {
                unset($block->lines[$index]);
            } elseif (substr($line, 0, 3) === '/*!') {
                $block->lines[$index] = '/*' . substr($line, 3);
            }
        }

        echo $inner . implode($glue, $block->lines);

        if (!empty($block->children)) {
            echo $this->break;
        }
    }

    /**
     * {@inherit}
     */
    public function format($block)
    {
        return parent::format($block);

        // TODO: we need to fix the 2 "compressed" tests where the "close" is applied
        return trim(str_replace(';}', '}', parent::format($block)));
    }
}
