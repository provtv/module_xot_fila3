<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Tests\Unit\Model\Store;

use Modules\Xot\Actions\Model\Store\HasManyDeepAction;
use Tests\TestCase;

/**
 * Class HasManyDeepActionTest.
 *
 * @covers \Modules\Xot\Actions\Model\Store\HasManyDeepAction
 */
final class HasManyDeepActionTest extends TestCase
{
    private HasManyDeepAction $hasManyDeepAction;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->hasManyDeepAction = new HasManyDeepAction();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->hasManyDeepAction);
    }

    public function testExecute(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
