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

use LukasHron\EasyMessages\Exceptions\InitException;
use LukasHron\EasyMessages\Messages;
use PHPUnit\Framework\TestCase;

final class MessagesTest extends TestCase
{
    private static Messages $flashMessages;

    public static function setUpBeforeClass(): void
    {
        self::$flashMessages = new Messages();
    }

    public function testInit(): void
    {
        $this->assertTrue(isset($_SESSION[Messages::EASY_MESSAGE_SESSION_IDENTIFIER]));
    }

    /**
     * @throws InitException
     */
    public function testCreateMessage(): void
    {
        $this->assertFalse(self::$flashMessages->isMessages());

        self::$flashMessages->add('msg', 'alert');
        $this->assertTrue(self::$flashMessages->isMessages());

        self::$flashMessages->clean();
        $this->assertFalse(self::$flashMessages->isMessages());
    }
}