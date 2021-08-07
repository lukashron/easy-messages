<?php

declare (strict_types=1);

namespace LukasHron\EasyMessages;

/**
 * Class Messages
 * @package LukasHron\EasyMessages
 */
class Messages
{
    /** @var string */
    const _PREFIX = 'easy-msg';

    private string $prefix = '';
    private string $postfix = '<br />';
    private string $alertWrapper = '<div class="alert alert-%s" role="alert">%s</div>';

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
        $_SESSION[self::_PREFIX][] = [
            '0' => $type,
            '1' => $message,
        ];
    }

    /**
     * Render all messages.
     */
    public function render(): void
    {
        foreach ($_SESSION[self::_PREFIX] as $message) {
            echo $this->prefix;
            echo sprintf($this->alertWrapper, $message[0], $message[1]);
            echo $this->postfix;
        }

        $this->clean();
    }

    /**
     * Clean all messages.
     */
    private function clean(): void
    {
        $_SESSION[self::_PREFIX] = [];
    }
}