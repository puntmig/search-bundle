<?php

/*
 * This file is part of the Apisearch Bundle.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Feel free to edit as you please, and have fun.
 *
 * @author Marc Morera <yuhu@mmoreram.com>
 */

declare(strict_types=1);

namespace Apisearch\Tests\Functional\DependencyInjection;

use Apisearch\Tests\Functional\ApisearchBundleFunctionalTest;

/**
 * Class DisableCommandsTest.
 */
class DisableCommandsTest extends ApisearchBundleFunctionalTest
{
    /**
     * Load commands.
     *
     * @return bool
     */
    protected static function loadCommands(): bool
    {
        return false;
    }

    /**
     * Test that commands are not loaded.
     */
    public function testCommandsAreDisabled()
    {
        $content = static::runCommand([
            'command' => 'apisearch:create-index',
            'app-name' => 'app123name',
            'index-name' => 'index123name',
            '--env' => 'prod',
            '-v' => true,
        ]);

        $this->assertTrue(
            false !== strpos($content, 'There are no commands defined in the "apisearch" namespace')
        );
    }
}
