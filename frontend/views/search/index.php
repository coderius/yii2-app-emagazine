<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
use yii\helpers\BaseStringHelper;
use yii\widgets\LinkPager;//для пагинации
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\data\Pagination;
use common\components\helpers\CustomStringHelper;



//$this->params['breadcrumbs'][] = Html::encode($dtoCategory->title);


?>
<h1 class="col-xs-12 h_style_1">Ищем: <small>⟪ <?php echo $q; ?> ⟫ <?= $pageNum ? "<strong>(стр.{$pageNum})</strong>" : ""; ?></small></h1>
<p class="col-xs-12"><small>Всего найдено материалов: <strong><?= $countResults; ?></strong></small></p>
<main class="col-md-9 col-sm-8 col-xs-12 col-xxs-12">

    <?php if($dataProvider->getTotalCount() > 0): ?>

    <?php foreach ($dataProvider->getModels() as $article): ?>
        <article class="art_list_prev row">
            <figure class="col-xs-4 col-xxs-12">
                <a class="art_list_prev-imglink" href="<?= Url::toRoute(['/blog/article', 'alias' => $article->alias]); ?>">
                    <?php
                    echo Html::img(
                            CustomStringHelper::buildSrc(
                                    Yii::$app->params['srcImgArticleBig'], ['id_article' => $article->id,
                                'src' => $article->faceImg
                                    ]
                            ), ['alt' => $article->faceImgAlt,
                        'title' => $article->title,
                        'class' => 'art_list_prev-imglink-img'
                    ]);
                    ?>
                </a>
            </figure>    
            <div class="art_list_prev__cont col-xs-8 col-xxs-12">
                <div class="art_list_prev__cont-head">
                    <ul class="art_list_prev__cont-head-data">
                        <li>
                            <i class="fa fa-comment" aria-hidden="true"></i>
                            <span>0</span>
                        </li>

                        <!--count views-->
                        <li>
                            <i class="fa fa-eye" aria-hidden="true"></i>
                            <span><?php echo $article->viewCount; ?></span>
                        </li>

                        <?php if ($article->hasTags()): ?>
                            <ul class="art_list_prev__cont-head-tags">
                                <?php foreach ($article->getBlogTags()->all() as $tag): ?>
                                    <li><a href="<?= Url::toRoute(['/blog/tag', 'alias' => $tag->alias]); ?>" class="btn btn-default btn-xs"><?= $tag->title; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </ul>

                </div>
                <h2 class="h_style_2"><a href="<?= Url::toRoute(['/blog/article', 'alias' => $article->alias]); ?>"><?= CustomStringHelper::illumination($searchWords, $article->title, 'line-search-result-2'); ?></a></h2>
                <div class="art_list_prev__cont__text">
                    <?php //echo CustomStringHelper::truncate($article->text, 250, $suffix = '...'); ?>
                    <?php echo HtmlPurifier::process(CustomStringHelper::searchTextDecor($article->text, $searchWords, $suffix = '...',35, 35)); ?>
                </div>
                <div class="art_list_prev__cont-footer">
                    <ul class="art_list_prev__cont-footer-data">
                        <?php if ($article->hasCategory()): ?>
                            <li>
                                <i class="fa fa-folder" aria-hidden="true"> Категория :</i>
                                <a href="<?= Url::toRoute(['/blog/category', 'alias' => $article->category->alias]); ?>"><span><?= $article->category->title; ?></span></a>
                            </li>
                        <?php endif; ?>

                        <li>
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <span><?=
                                        Yii::$app->formatter
                                        ->asDatetime($article->createdAt, 'php:l d-F-Y h:i:s ');
                                ?></span>
                        </li>
                    </ul>
                        <?php if ($article->hasSery()): ?>    
                        <ul class="art_list_prev__cont-footer-data art_list_prev-sery">
        <?php foreach ($article->getSeries()->all() as $sery): ?>
                                <li>
                                    <i class="fa fa-book" aria-hidden="true"> Из серии:</i>
                                    <a href="<?= Url::toRoute(['/blog/sery', 'alias' => $sery->alias]); ?>"><span><?= $sery->title; ?></span></a>
                                </li>
                        <?php endforeach; ?>
                        </ul>
    <?php endif; ?>

                </div>
            </div>  

        </article>
    <?php endforeach; ?>

    <?php else: ?>
    
    <p class="h_style_4">Ничего не найдено.</p>
        
    
    <?php endif; ?>
    <!--pagination-->
    <div class="row">
        <div class="col-xs-12">

<?php echo LinkPager::widget($confLinkPager);  ?>


        </div>    
    </div>

</main>
