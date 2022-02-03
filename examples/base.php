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

require_once __DIR__ . '/../vendor/autoload.php';

$flashMessage = new \LukasHron\EasyMessages\Messages();
$flashMessage->add('Danger', 'danger');
$flashMessage->add('Info', 'info');
$flashMessage->add('Warning', 'warning');
$flashMessage->render();