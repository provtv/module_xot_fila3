<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Tests\Unit\Model\Update;

use Modules\Xot\Actions\Model\Update\MorphOneAction;
use Tests\TestCase;

/**
 * Class MorphOneActionTest.
 *
 * @covers \Modules\Xot\Actions\Model\Update\MorphOneAction
 */
final class MorphOneActionTest extends TestCase
{
    private MorphOneAction $morphOneAction;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->morphOneAction = new MorphOneAction();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->morphOneAction);
    }

    public function testExecute(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
