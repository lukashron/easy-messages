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

namespace LukasHron\EasyMessages;

use LukasHron\EasyMessages\Exceptions\InitException;
use LukasHron\EasyMessages\Session\SessionHandler;

class Messages extends SessionHandler
{
    /** @var string */
    const EASY_MESSAGE_SESSION_IDENTIFIER = 'easy-msg';

    /** @var int */
    const MESSAGE_ARRAY_KEY_TYPE = 0;

    /** @var int */
    const MESSAGE_ARRAY_KEY_MESSAGE = 1;

    private ?string $prefix = null;
    private ?string $postfix = '<br />';
    private string $alertWrapper = '<div class="alert alert-%s" role="alert">%s</div>';

    /**
     * @throws InitException
     */
    public function __construct()
    {
        $this->initSessionData(self::EASY_MESSAGE_SESSION_IDENTIFIER);
    }

    /**
     * Prefix is rendered before alert message.
     *
     * @param string|null $prefix
     */
    public function setPrefix(?string $prefix)
    {
        $this->prefix = $prefix;
    }

    /**
     * Postfix is rendered after alert message.
     *
     * @param string|null $postfix
     */
    public function setPostfix(?string $postfix)
    {
        $this->postfix = $postfix;
    }

    /**
     * Alert HTML wrapper.
     * Example: <div class="alert alert-%s" role="alert">%s</div>
     *
     * @param string $wrapper
     */
    public function setAlertWrapper(string $wrapper)
    {
        $this->alertWrapper = $wrapper;
    }

    /**
     * Add new messages.
     *
     * @param string $message
     * @param string $type
     */
    public function add(string $message, string $type = 'info'): void
    {
        $_SESSION[self::EASY_MESSAGE_SESSION_IDENTIFIER][] = [
            self::MESSAGE_ARRAY_KEY_TYPE => $type,
            self::MESSAGE_ARRAY_KEY_MESSAGE => $message,
        ];
    }

    /**
     * @throws InitException
     */
    public function render(): void
    {
        if ($this->isMessages()) {
            foreach ($this->getDataFromSession(self::EASY_MESSAGE_SESSION_IDENTIFIER) as $message) {

                if ($this->prefix) {
                    echo $this->prefix;
                }

                echo sprintf($this->alertWrapper, $message[self::MESSAGE_ARRAY_KEY_TYPE], $message[self::MESSAGE_ARRAY_KEY_MESSAGE]);

                if ($this->postfix) {
                    echo $this->postfix;
                }

            }
            $this->clean();
        }
    }

    /**
     * Clean all messages.
     */
    public function clean(): void
    {
        $this->setDataToSession(self::EASY_MESSAGE_SESSION_IDENTIFIER, []);
    }

    /**
     * Count messages in session.
     *
     * @throws InitException
     */
    public function count(): int
    {
        return count($this->getDataFromSession(self::EASY_MESSAGE_SESSION_IDENTIFIER));
    }

    /**
     * Is there any messages in session?
     *
     * @return bool
     * @throws InitException
     */
    public function isMessages(): bool
    {
        return $this->count() > 0;
    }
}