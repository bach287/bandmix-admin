<?php
//news
Breadcrumbs::for('home', function ($trail) {
	$trail->push('Home', route('home'));
});


Breadcrumbs::for('news', function ($trail) {
	$trail->parent('home');
	$trail->push('Tin tức', route('news.index'));
});

Breadcrumbs::for('news.edit', function ($trail, $news) {
    $trail->parent('news');
    $trail->push($news->title, route('news.edit',$news->id));
});

Breadcrumbs::for('news.show', function ($trail,$news) {
    $trail->parent('news');
    $trail->push($news->title, route('news.show',$news->id));
});

Breadcrumbs::for('news.create', function ($trail) {
	$trail->parent('news');
	$trail->push('Tạo mới', route('news.create'));
});
//categories
Breadcrumbs::for('categories', function ($trail) {
    $trail->parent('home');
    $trail->push('Danh mục', route('categories.index'));
});

Breadcrumbs::for('categories.create', function ($trail) {
    $trail->parent('categories');
    $trail->push('Tạo mới', route('categories.create'));
});
Breadcrumbs::for('categories.edit', function ($trail,$category) {
    $trail->parent('categories');
    $trail->push($category->name, route('categories.edit',$category->id));
});
//members
Breadcrumbs::for('members', function ($trail) {
    $trail->parent('home');
    $trail->push('Thành viên', route('members.index'));
});
Breadcrumbs::for('members.show', function ($trail,$member) {
    $trail->parent('members');
    $trail->push('Thông tin người dùng', route('members.show',$member->id));
});
Breadcrumbs::for('members.edit', function ($trail,$member) {
    $trail->parent('members');
    $trail->push($member->name, route('members.edit',$member->id));
});

//Events
Breadcrumbs::for('events', function ($trail) {
    $trail->parent('home');
    $trail->push('Sự kiện', route('events.index'));
});
Breadcrumbs::for('events.create', function ($trail) {
    $trail->parent('events');
    $trail->push('Tạo sự kiện', route('events.create'));
});
Breadcrumbs::for('events.edit', function ($trail, $event) {
    $trail->parent('events');
    $trail->push('Sự kiện', route('events.edit',$event->id));
});
Breadcrumbs::for('events.show', function ($trail, $event) {
    $trail->parent('events');
    $trail->push('Sự kiện', route('events.edit',$event->id));
});

//Band
Breadcrumbs::for('bands', function ($trail) {
    $trail->parent('home');
    $trail->push('Band', route('bands.index'));
});
Breadcrumbs::for('bands.show', function ($trail,$band) {
    $trail->parent('bands');
    $trail->push('Thông tin band', route('bands.show',$band->id));
});
