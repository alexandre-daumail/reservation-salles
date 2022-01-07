<?php

require('../Model/model.php');

function listPosts()
{
    $posts = getPosts();

    require('listPostsView.php');
}