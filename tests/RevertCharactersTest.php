<?php

use App\Src\RevertCharacters;
use PHPUnit\Framework\TestCase;

class RevertCharactersTest extends TestCase
{
    protected string $textTest;
    protected string $textTestResult;

    public function setUp(): void
    {
        $this->textTest = 'Привет! Давно не виделись.';
        $this->textTestResult = 'Тевирп! Онвад ен ьсиледив.';
        $this->revertCharacters = new RevertCharacters();

    }

    public function testHandle() {
        $this->assertEquals( $this->textTestResult, $this->revertCharacters->handle($this->textTest) );
    }
}
