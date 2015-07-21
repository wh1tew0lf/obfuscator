<?php
namespace phpUnitTutorial\Test;

class ObfuscationTest extends \PHPUnit_Framework_TestCase {
    
    private $sourceDir = '';
    private $resultDir = '';
    
    protected function setUp() {
        parent::setUp();
        $this->sourceDir = implode(DIRECTORY_SEPARATOR, array(
            dirname(__FILE__),
            'sources'
        )) . DIRECTORY_SEPARATOR;
        
        $this->resultDir =  implode(DIRECTORY_SEPARATOR, array(
            dirname(__FILE__),
            'results'
        )) . DIRECTORY_SEPARATOR;
    }

    public function testAll() {
        if (is_dir($this->sourceDir) && (false !== ($files = scandir($this->sourceDir)))) {
            foreach ($files as &$file) {
                if (preg_match('/^test_([0-9]+)\.php$/', $file, $matches)) {
                    $testNumber = (int)$matches[1];
                    $testNumber = ($testNumber > 9) ? $testNumber : "0{$testNumber}"; 
                    
                
                    ob_start();
                    \obfuscator::loadCode("{$this->sourceDir}test_{$testNumber}.php");
                    \obfuscator::obfuscate();
                    ob_end_clean();
        
                    \obfuscator::saveCode("{$this->resultDir}res_{$testNumber}.php");

                    $this->assertFalse(\obfuscator::hasErrors(), 'Errors during abfuscating');

                    ob_start();
                    passthru("php -f {$this->sourceDir}test_{$testNumber}.php", $originalRet);
                    $originalOut = ob_get_clean();

                    ob_start();
                    passthru("php -f {$this->resultDir}res_{$testNumber}.php", $obfuscatedRet);
                    $obfuscatedOut = ob_get_clean();

                    $this->assertEquals($originalRet, $obfuscatedRet, "Return values mismatch: {$originalRet} != {$obfuscatedRet}");

                    $this->assertEquals($originalOut, $obfuscatedOut, "Out mismatch:\nORIGINAL:\n{$originalOut}\n\nOBFUSCATED:\n{$obfuscatedOut}\n");
                }
            }
        }
    }

}