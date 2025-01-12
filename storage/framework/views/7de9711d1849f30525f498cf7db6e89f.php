<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>イベント一覧</title>
    <link rel="stylesheet" href="<?php echo e(asset('/event.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="title">    
    <div class="title1">STEM GATE</div>
    <div class="title2">企業データを活用して理工系女子の就職をワンストップでサポート</div>
    </div>

    <div class="form-container">
        <div class="pagename">イベント一覧</div>

        <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="content">
            <div class="event-image">
            <img src="<?php echo e(asset('storage/' . $event->event_image)); ?>" alt="イベント画像">
            </div>
            <div class="event-info">
                <h2><?php echo e($event->event_title); ?></h2>
                <p><?php echo e($event->explanation); ?></p>
                <ul>
                    <li>イベント日: <?php echo e($event->date); ?></li>
                    <li>形式: <?php echo e($event->on_off); ?></li>
                    <li>時間: <?php echo e($event->start_time); ?> - <?php echo e($event->end_time); ?></li>
                    <li>参加企業: <?php echo e($event->comp_name); ?></li>
                </ul>
                <a href="<?php echo e($event->event_link); ?>" class="register-btn" target="_blank">申し込み</a>
            </div>
            <style>
             .register-btn {
                background-color: #4281C8;
             }
            </style>

        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>


    <footer class="copyright">
        &copy; 2024 Wom-tech All Rights Reserved.
    </footer>
</html><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/gs-laravel/resources/views/event.blade.php ENDPATH**/ ?>