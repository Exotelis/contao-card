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

namespace Exotelis\Card;

use Contao;

/**
 * Front end content element "card".
 *
 * @property String     $addCardImage
 * @property String     $cardTitle
 * @property String     $cardSubtitle
 * @property String     $cardContent
 * @property String     $cardFooterLeft
 * @property String     $cardFooterRight
 * @property String     $cardUrl
 * @author   Sebastian Krah <exotelis@mailbox.org>
 */
class ContentCard extends Contao\ContentElement
{
    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'ce_card';

    /**
     * Show the car in the back end
     *
     * @return string
     */
    public function generate()
    {
        if (TL_MODE == 'BE')
        {
            return '<strong>Card:</strong>' . $this->cardTitle; // TODO Translation
        }
        return parent::generate();
    }

    /**
     * Generate the content element
     */
    protected function compile()
    {
        $this->Template->title = $this->cardTitle;
        $this->Template->subtitle = $this->cardSubtitle;

        $this->cardContent = Contao\StringUtil::toHtml5($this->cardContent);
        $this->Template->text = Contao\StringUtil::encodeEmail($this->cardContent);

        $this->Template->footerleft = $this->cardFooterLeft;
        $this->Template->footerright = $this->cardFooterRight;

        // Image
        $this->Template->addImage = false;
        if ($this->addCardImage && $this->singleSRC != '') {
            $objModel = Contao\FilesModel::findByUuid($this->singleSRC);
            if ($objModel !== null && \is_file(Contao\System::getContainer()->getParameter('kernel.project_dir') . '/' . $objModel->path)) {
                $this->singleSRC = $objModel->path;
                $this->addImageToTemplate($this->Template, $this->arrData, null, null, $objModel);
            }
        }

        // Url
        if (substr($this->cardUrl, 0, 7) == 'mailto:') {
            $this->cardUrl = Contao\StringUtil::encodeEmail($this->cardUrl);
        } else {
            $this->cardUrl = \ampersand($this->cardUrl);
        }

        $this->Template->href = $this->cardUrl;
        if ($this->titleText) {
            $this->Template->linkTitle = Contao\StringUtil::specialchars($this->titleText);
        }
        // Override the link target
        $this->Template->target = '';
        if ($this->target) {
            $this->Template->target = ' target="_blank" rel="noopener"';
        }

        // Unset the title attributes in the back end (see #6258)
        if (TL_MODE == 'BE') {
            $this->Template->title = '';
            $this->Template->linkTitle = '';
        }
    }
}