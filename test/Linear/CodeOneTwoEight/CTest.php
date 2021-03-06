<?php
/**
 * CTest.php
 *
 * @since       2015-02-21
 * @category    Library
 * @package     Barcode
 * @author      Nicola Asuni <info@tecnick.com>
 * @copyright   2015-2015 Nicola Asuni - Tecnick.com LTD
 * @license     http://www.gnu.org/copyleft/lesser.html GNU-LGPL v3 (see LICENSE.TXT)
 * @link        https://github.com/tecnick.com/tc-lib-barcode
 *
 * This file is part of tc-lib-barcode software library.
 */

namespace Test\Linear\CodeOneTwoEight;

/**
 * Barcode class test
 *
 * @since       2015-02-21
 * @category    Library
 * @package     Barcode
 * @author      Nicola Asuni <info@tecnick.com>
 * @copyright   2015-2015 Nicola Asuni - Tecnick.com LTD
 * @license     http://www.gnu.org/copyleft/lesser.html GNU-LGPL v3 (see LICENSE.TXT)
 * @link        https://github.com/tecnick.com/tc-lib-barcode
 */
class CTest extends \PHPUnit_Framework_TestCase
{
    protected $obj = null;

    public function setUp()
    {
        //$this->markTestSkipped(); // skip this test
        $this->obj = new \Com\Tecnick\Barcode\Barcode;
    }

    public function testGetGrid()
    {
        $bobj = $this->obj->getBarcodeObj('C128C', '0123456789');
        $grid = $bobj->getGrid();
        $expected = "110100111001100110110011101101110101110110001000010110011011011110100001101001100011101011\n";
        $this->assertEquals($expected, $grid);

        $bobj = $this->obj->getBarcodeObj('C128C', chr(241).'0123456789');
        $grid = $bobj->getGrid();
        $expected = "11010011100111101011101100110110011101101110101110110001000010110011011011110111101101101100"
            ."011101011\n";
        $this->assertEquals($expected, $grid);
    }

    public function testInvalidLength()
    {
        $this->setExpectedException('\Com\Tecnick\Barcode\Exception');
        $this->obj->getBarcodeObj('C128C', '12345678901');
    }

    public function testInvalidChar()
    {
        $this->setExpectedException('\Com\Tecnick\Barcode\Exception');
        $this->obj->getBarcodeObj('C128C', '1A2345678901');
    }
}
