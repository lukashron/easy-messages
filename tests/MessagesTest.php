<?php
/*
 * This file is part of the Easy-messages package.
 *
 * (c) Lukas Hron <info@lukashron.cz>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace LukasHron\EasyMessages\Tests;

use LukasHron\EasyMessages\Messages;
use PHPUnit\Framework\TestCase;

final class MessagesTest extends TestCase
{
    public function testInit(): void
    {
        $flashMessages = new Messages();
        $this->assertFalse($flashMessages->init());

        $sessionName = $flashMessages->getEmSessionName();
        $this->assertTrue(strlen($sessionName) > 0);

        unset($_SESSION[$sessionName]);
        $this->assertTrue($flashMessages->init());
    }

    public function testCreateMessage(): void
    {
        $flashMessages = new Messages();
        $this->assertFalse($flashMessages->isMessages());

        $flashMessages->add('msg', 'alert');
        $this->assertTrue($flashMessages->isMessages());

        $flashMessages->clean();
        $this->assertFalse($flashMessages->isMessages());
    }
}