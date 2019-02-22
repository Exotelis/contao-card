<?php

/**
 * This file is part of exotelis/contao-card
 *
 * Copyright (c) 2019 Sebastian Krah
 *
 * @package   exotelis/contao-card
 * @author    Sebatian Krah <exotelis@mailbox.org>
 * @copyright 2019 Sebastian Krah
 * @license   https://github.com/Exotelis/contao-card/blob/master/LICENSE LGPL-3.0
 */

declare(strict_types=1);

namespace Exotelis\Card;

/**
 * Class Util
 *
 * Util Class
 *
 * @author   Sebastian Krah <exotelis@mailbox.org>
 */
class Util
{
    /**
     * Inserts a new key/value before a specific the key in the array.
     *
     * @param array  $arrCurrent An array to insert in to.
     * @param String $arrKey     The key to insert before.
     * @param mixed  $arrNew     An value to insert.
     */
    public function arrayInsertBefore(&$arrCurrent, $arrKey, $arrNew) {
        if(!\is_array($arrCurrent)) {
            $arrCurrent = $arrNew;
            return;
        }

        if (!\array_key_exists($arrKey, $arrCurrent)) {
            return;
        }

        $index = 0;
        foreach ($arrCurrent as $key => $value) {
            if ($arrKey === $key) {
                break;
            }
            $index++;
        }

        \array_insert($arrCurrent, $index, $arrNew);
    }

    /**
     * Inserts a new key/value after a specific the key in the array.
     *
     * @param array  $arrCurrent An array to insert in to.
     * @param String $arrKey     The key to insert before.
     * @param mixed  $arrNew     An value to insert.
     */
    public function arrayInsertAfter(&$arrCurrent, $arrKey, $arrNew) {
        if(!\is_array($arrCurrent)) {
            $arrCurrent = $arrNew;
            return;
        }

        if (!\array_key_exists($arrKey, $arrCurrent)) {
            return;
        }

        $index = 0;
        foreach ($arrCurrent as $key => $value) {
            if ($arrKey === $key) {
                break;
            }
            $index++;
        }

        \array_insert($arrCurrent, $index + 1, $arrNew);
    }
}