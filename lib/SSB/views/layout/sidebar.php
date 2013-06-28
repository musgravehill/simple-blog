<?php

$Community = new lib\SSB\models\Community;
$communities = $Community->getCommunities();
echo '<table class="table-condensed table">';
foreach ($communities as $community) {
    echo '<tr>';
    echo '<td>
                <img class="img-circle" style="height: 32px;" src="/uploads/community/logo/64x64/'.$community->id.'.jpg" title="'.$community->name.'" alt="'.$community->name.'">
            </td>';
    echo '<td>
                <a class="sidebar-community-name" href="/community/'.$community->url_name.'/">'.$community->name.'</a>
            </td>';
    echo '</tr>';
}
echo '</table>';
?>
<style>
    .sidebar-community-name{
        padding:0px;
        margin: 5px 0px 0px 0px;
        color:#003300;
        display: inline-block;
        font-weight: bold;
    }
    .sidebar-community-tag{
        padding:4px;
        color:#003300;
        display: inline-block;
        font-weight: bold;
    }
</style>
<?php
$Tag = new lib\SSB\models\Tag;
$tags = $Tag->getTags();
echo '<div class="well" title="теги">';
foreach ($tags as $tag) {
    echo '<a title="записи по тегу: '.$tag->name.'" href="/tags/'.$tag->name.'" class="sidebar-community-tag">';
    echo $tag->name;
    echo '</a>';
}
echo '<div>';
?>
