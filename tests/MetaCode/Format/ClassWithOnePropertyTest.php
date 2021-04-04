<?php

namespace MetaCode\Format;

use Reliese\MetaCode\Definition\ClassFunctionDefinition;
use Reliese\MetaCode\Definition\ClassPropertyDefinition;
use Reliese\MetaCode\Definition\ClassDefinition;
use Reliese\MetaCode\Definition\FunctionParameterDefinition;
use Reliese\MetaCode\Enum\PhpTypeEnum;
use TestCase;

/**
 * Class ClassWithOnePropertyTest
 */
class ClassWithOnePropertyTest extends TestCase
{
    public function test()
    {
        $property1 = (new ClassPropertyDefinition('abc', PhpTypeEnum::stringType()))
            ->withGetter()
            ->withSetter();

        $param1 = new FunctionParameterDefinition(
            'mapSource',
            PhpTypeEnum::objectType('App\Model\Jvzoo\AccountModel')
        );

        $param2 = new FunctionParameterDefinition(
            'mapDestination',
            PhpTypeEnum::objectType('App\DataTransportObject\GroupName\AccountDto'),
            true
        );

        $classFunctionDefinition = new ClassFunctionDefinition('mapXToY', PhpTypeEnum::staticTypeEnum(), [$param1, $param2]);

        $classDefinition = new ClassDefinition('TestClassName', '\Nowhere');
        $classDefinition->addProperty($property1);
        $classDefinition->addFunctionDefinition($classFunctionDefinition);

        $classDefinition->addFunctionDefinition(
            $classFunctionDefinition
        );
    }
}