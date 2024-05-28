<?php
/*
 * This file is part of the Easy-messages package.
 *
 * (c) Lukas Hron <info@lukashron.cz>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare (strict_types=1);

namespace LukasHron\EasyMessages\Session;

use LukasHron\EasyMessages\Exceptions\InitException;

abstract class SessionHandler
{
    /**
     * @throws InitException
     */
    public function initSessionData(string $identifier): void
    {
        if (isset($_SESSION[$identifier])) {
            throw new InitException('Session data already exists.');
        }

        $this->setDataToSession($identifier, []);
    }

    /**
     * @throws InitException
     */
    public function getDataFromSession(string $identifier): array
    {
        if (!isset($_SESSION[$identifier])) {
            throw new InitException('Session data does not initialized yet.');
        }

        if (!is_array($_SESSION[$identifier])) {
            throw new InitException('Session data is not an array.');
        }

        return $_SESSION[$identifier];
    }

    public function setDataToSession(string $identifier, array $data): void
    {
        $_SESSION[$identifier] = $data;
    }
}