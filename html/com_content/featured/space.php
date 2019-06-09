<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

JHtml::_('behavior.caption');

// If the page class is defined, add to class as suffix.
// It will be a separate class if the user starts it with a space

// Пройти по все элементам избранного, если новый тэг - добавить в массив тэгов
// а элемент можно добавлять в массив по этому тэгу
// Потом пройтись по тэгам, и если такой тэг у элемента есть - вывести его
// либо вывести из массива сгруппированных элементов
// Другой вариант - вывести блоки по тэгам, которые выбраны в меню,
// потом вывести блоки и с помощью js их расставить в блоки
// либо выводить блоки по тэгам, и в блоки выводить элементы
// можно произвести сортировку по тэгам...
// если параметр меню, то что делать с элементами без тэга или с невыбранным тэгом?
// варианты - выводить в отдельную группу прочие или не выводить вообще

$t = $this->params->get('tags');
$tags = new JHelperTags;

if (!empty($this->intro_items)) : ?>


    <div class="fly_container">

        <?php
        $i = 1;
        foreach ($t as $id) :

            $tagname = $tags->getTagNames([$id]);

            ?>
            <div class="container category_wall normal cw<?php echo $i; ?>">
                <div class="row">
                    <div class="col-12">
                        <h2><?php echo $tagname[0]; ?></h2>
                    </div>

                    <?php foreach ($this->intro_items as $key => &$item) :

                        //if (in_array($tagname, $item->tags)) :
                        foreach ($item->tags->itemTags as $tag) :
                            if ($tag->tag_id == $id) :

                                ?>
                                <div id="fly<?php echo $i . "-" . $key; ?>"
                                     class="col-12 col-sm-6 col-lg-6 col-xl-4 fly">
                                    <?php
                                    $this->item = &$item;
                                    echo $this->loadTemplate('fly');
                                    //print_r($tag);
                                    ?>
                                </div>
                            <?php
                            endif;
                        endforeach;
                    endforeach; ?>

                </div>
                <a class="closeme"><i class="fas fa-times"></i></a>
                <div class="backpane"></div>

            </div>
            <?php
            $i++;
        endforeach;
        ?>

    </div>

<?php endif; ?>
