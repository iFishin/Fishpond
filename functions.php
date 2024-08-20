<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form)
{
    // 创建一个文本输入框，用于设置站点 LOGO 地址
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text(
        'logoUrl',
        null,
        null,
        _t('✨站点 LOGO 地址✨'),
        _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO')
    );

    // 将站点 LOGO 地址字段添加到表单中
    $form->addInput($logoUrl);

    // 创建一个复选框，用于设置侧边栏显示选项
    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox(
        'sidebarBlock',
        [
            'ShowRecentPosts'    => _t('显示最新文章'),
            'ShowRecentComments' => _t('显示最近回复'),
            'ShowCategory'       => _t('显示分类'),
            'ShowArchive'        => _t('显示归档'),
            'ShowOther'          => _t('显示其它杂项')
        ],
        ['ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive', 'ShowOther'],
        _t('🔔侧边栏显示🔔')
    );

    // 将侧边栏显示选项字段添加到表单中
    $form->addInput($sidebarBlock->multiMode());

    // 创建一个文本输入框，用于设置 GitHub 链接
    $githubLink = new Typecho_Widget_Helper_Form_Element_Text(
        'githubLink',
        null,
        '',
        _t('🎉 GitHub 链接🎉'),
        _t('输入您的 GitHub 链接')
    );
    $form->addInput($githubLink);


    // 创建一个文本输入框，用于设置 主页文本
    $homeText = new Typecho_Widget_Helper_Form_Element_Text(
        'homeText',
        null,
        '',
        _t('🎈主页文本🎈'),
        _t('输入您的 主页文本 ，用空格分隔多个关键词')
    );
    $form->addInput($homeText);


    // 创建一个复选框，用于控制是否允许评论
    $allowComment = new Typecho_Widget_Helper_Form_Element_Radio(
        'allowComment',
        ['1' => _t('允许评论'), '0' => _t('禁止评论')],
        '1',
        _t('是否允许评论'),
        _t('在这里选择是否允许评论')
    );
    $form->addInput($allowComment);




    // 创建一个footer扩展输入框，用于设置 footer 扩展
    $footerExtend = new Typecho_Widget_Helper_Form_Element_Textarea(
        'footerExtend',
        null,
        null,
        _t('🎀footer扩展🎀'),
        _t('在这里填入 footer 扩展（HTML）')
    );
    $form->addInput($footerExtend);

}



