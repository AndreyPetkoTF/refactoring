<?php

class ConfigServiceTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \App\Service\ConfigService
     */
    private $entity;

    public function setUp()
    {
        $this->entity = new \App\Service\ConfigService();
    }

    public function testReturnRightConfig()
    {
        // not best example because config can be changed
        $this->assertEquals($this->entity->getConfig('log', 'file'), 'log.db');
    }

    /**
     * @expectedException \App\Exception\WrongConfigKeyException
     */
    public function testShouldThrowAnExceptionWithWrongKey()
    {
        $this->entity->getConfig('log', 'hello');
    }

    public function testCanBeUsedAsString(): void
    {
        $this->assertTrue(is_string((string)$this->entity));
    }
}