<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

JHtml::_('bootstrap.framework');

$canEdit = $displayData['params']->get('access-edit');
$articleId = $displayData['item']->id;

$url = JURI::current();

?>

<div class="icons">
    <?php if (empty($displayData['print'])) : ?>

        <?php if ($canEdit || $displayData['params']->get('show_print_icon') || $displayData['params']->get('show_email_icon')) : ?>
            <div class="btn-group hopen dropdown float-right">
                <button class="btn btn-info dropdown-toggle" type="button"
                        id="dropdownMenuButton-<?php echo $articleId; ?>"
                        aria-label="<?php echo JText::_('JUSER_TOOLS'); ?>"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-sticky-note"></i>
                    <span class="caret" aria-hidden="true"></span>
                </button>
                <?php // Note the actions class is deprecated. Use dropdown-menu instead. ?>
                <ul class="dropdown-menu dropdown-menu-right"
                    aria-labelledby="dropdownMenuButton-<?php echo $articleId; ?>">
                    <?php if ($displayData['params']->get('show_print_icon')) : ?>
                        <li class="dropdown-item print-icon">
                            <?php echo JHtml::_('icon.print_popup', $displayData['item'], $displayData['params']); ?>
                        </li>
                    <?php endif; ?>
                    <?php if ($displayData['params']->get('show_email_icon')) : ?>
                        <li class="dropdown-item email-icon"> <?php echo JHtml::_('icon.email', $displayData['item'], $displayData['params']); ?> </li>
                    <?php endif; ?>
                    <?php if ($canEdit) : ?>
                        <li class="dropdown-item edit-icon"> <?php echo JHtml::_('icon.edit', $displayData['item'], $displayData['params']); ?> </li>
                    <?php endif; ?>
                    <li class="dropdown-item vk-icon">
                        <a class="sharepopup" href="http://vk.com/share.php?url=<?php echo $url; ?>">
                            <i class="fab fa-vk"></i>
                            vk.com
                        </a>
                    </li>
                    <li class="dropdown-item fb-icon">
                        <a class="sharepopup" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>&title=<?php echo $displayData["item"]->title; ?>">
                            <i class="fab fa-facebook-f"></i>
                            fb.com
                        </a>
                    </li>
                    <li class="dropdown-item ok-icon">
                        <a class="sharepopup" href="https://connect.ok.ru/offer?url=<?php echo $url; ?>">
                            <i class="fab fa-odnoklassniki"></i>
                            ok.com
                        </a>
                    </li>
                </ul>
            </div>
        <?php endif; ?>

    <?php else : ?>

        <div class="pull-right">
            <?php echo JHtml::_('icon.print_screen', $displayData['item'], $displayData['params']); ?>
        </div>

    <?php endif; ?>

</div>

<div class="cf"></div>