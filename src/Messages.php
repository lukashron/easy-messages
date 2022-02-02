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

/**
 * Class Messages
 * @package LukasHron\EasyMessages
 */
class Messages
{
    /** @var string */
    const _EM_SESSION_NAME = 'easy-msg';

    private string $prefix = '';
    private string $postfix = '<br />';
    private string $alertWrapper = '<div class="alert alert-%s" role="alert">%s</div>';

    /**
     * Messages session init.
     */
    public function __construct()
    {
        $this->init();
    }

    /**
     * @return bool
     */
    public function init(): bool
    {
        if (! isset($_SESSION[self::_EM_SESSION_NAME])) {
            $_SESSION[self::_EM_SESSION_NAME] = [];
            return true;
        } else {
            return false;
        }
    }
    /**
     * @param string $prefix
     */
    public function setPrefix(string $prefix)
    {
        $this->prefix = $prefix;
    }

    /**
     * @param string $postfix
     */
    public function setPostfix(string $postfix)
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
        $_SESSION[self::_EM_SESSION_NAME][] = [
            '0' => $type,
            '1' => $message,
        ];
    }

    /**
     * Render all messages.
     */
    public function render(): void
    {
        if ($this->isMessages()) {
            foreach ($_SESSION[self::_EM_SESSION_NAME] as $message) {
                echo $this->prefix;
                echo sprintf($this->alertWrapper, $message[0], $message[1]);
                echo $this->postfix;
            }

            $this->clean();
        }
    }

    /**
     * Clean all messages.
     */
    public function clean(): void
    {
        $_SESSION[self::_EM_SESSION_NAME] = [];
    }

    /**
     * @return bool
     */
    public function isMessages(): bool
    {
        return isset($_SESSION[self::_PREFIX]);
    }
}