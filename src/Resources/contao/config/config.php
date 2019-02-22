<?php

/**
 * This file is part of exotelis/contao-card
 *
 * Copyright (c) 2019 Sebastian Krah
 *
 * @package   exotelis/contao-card
 * @author    Sebatian Krah <exotelis@mailbox.org>
 * @copyright 2019 Sebastian Krah
 */

declare(strict_types=1);

// Content elements
(new Exotelis\Card\Util())->arrayInsertBefore($GLOBALS['TL_CTE']['texts'],'code', array
(
    'card' => 'Exotelis\Card\ContentCard'
));