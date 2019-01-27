<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\toDoList;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class createListTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $testList = new toDoList([],"TL-name", "TL_description", "TL-remarks", "1");
        $this->assertEquals(true, $testList->createNewToDoList());
    }
}
