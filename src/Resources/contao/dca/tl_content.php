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

// Add palettes to tl_content
array_push($GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'], 'addCardImage');
$GLOBALS['TL_DCA']['tl_content']['palettes']['card'] = '{type_legend},type,headline;{card_legend},addCardImage,cardTitle,cardSubtitle,cardContent,cardFooterLeft,cardFooterRight;{link_legend},cardUrl,target,titleText;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';

// Add subpalettes to tl_content
$GLOBALS['TL_DCA']['tl_content']['subpalettes']['addCardImage'] = 'singleSRC';

// Add fields to tl_content
$GLOBALS['TL_DCA']['tl_content']['fields']['addCardImage'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['addImage'],
    'exclude'                 => true,
    'inputType'               => 'checkbox',
    'eval'                    => array('submitOnChange'=>true),
    'sql'                     => "char(1) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_content']['fields']['cardTitle'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['cardTitle'],
    'exclude'                 => true,
    'search'                  => false,
    'inputType'               => 'text',
    'eval'                    => array('mandatory'=>true, 'maxlength'=>100, 'tl_class'=>'w50 clr'),
    'sql'                     => "varchar(100) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_content']['fields']['cardSubtitle'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['cardSubtitle'],
    'exclude'                 => true,
    'search'                  => false,
    'inputType'               => 'text',
    'eval'                    => array('maxlength'=>100, 'tl_class'=>'w50'),
    'sql'                     => "varchar(100) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_content']['fields']['cardContent'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['cardContent'],
    'exclude'                 => true,
    'search'                  => false,
    'inputType'               => 'textarea',
    'eval'                    => array('mandatory'=>true, 'rte'=>'tinyMCE', 'helpwizard'=>true, 'tl_class'=>'clr'),
    'explanation'             => 'insertTags',
    'sql'                     => "mediumtext NULL"
);
$GLOBALS['TL_DCA']['tl_content']['fields']['cardFooterLeft'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['cardFooterLeft'],
    'exclude'                 => true,
    'search'                  => false,
    'inputType'               => 'text',
    'eval'                    => array('maxlength'=>100, 'tl_class'=>'w50'),
    'sql'                     => "varchar(100) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_content']['fields']['cardFooterRight'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['cardFooterRight'],
    'exclude'                 => true,
    'search'                  => false,
    'inputType'               => 'text',
    'eval'                    => array('maxlength'=>100, 'tl_class'=>'w50'),
    'sql'                     => "varchar(100) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_content']['fields']['cardUrl'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['MSC']['url'],
    'exclude'                 => true,
    'search'                  => true,
    'inputType'               => 'text',
    'eval'                    => array('rgxp'=>'url', 'decodeEntities'=>true, 'maxlength'=>255, 'dcaPicker'=>true, 'addWizardClass'=>false, 'tl_class'=>'w50'),
    'sql'                     => "varchar(255) NOT NULL default ''"
);