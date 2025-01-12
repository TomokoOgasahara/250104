<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>求人一覧</title>
    <link rel="stylesheet" href="<?php echo e(asset('/recruit.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="title">    
    <div class="title1">STEM GATE</div>
    <div class="title2">企業データを活用して理工系女子の就職をワンストップでサポート</div>
    </div>

    <div class="form-container">
        <div class="pagename">求人一覧</div>

        <?php $__currentLoopData = $recruits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recruit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="content">
            <div class="workplace_image">
                <img src="<?php echo e(asset('storage/' . $recruit->workplace_image)); ?>" alt="職場イメージ">
            </div>
            <div class="recruit-info">
                <h2><?php echo e($recruit->comp_name); ?></h2>
                <p><strong><?php echo e($recruit->job_title); ?></strong></p>
                <ul>
                    <li><strong>専門:</strong> <?php echo e($recruit->speciality); ?></li>
                    <li><strong>勤務地:</strong><?php echo e($recruit->location); ?></li>
                    <li><strong>キーワード:</strong> <?php echo e($recruit->keyword); ?></li>
                    <li><strong>特色:</strong> <?php echo e($recruit->features); ?></li>
                    <li><strong>雇用形態:</strong> <?php echo e($recruit->employment_type); ?></li>
                    <li><strong>業務内容:</strong> <?php echo e($recruit->job_description); ?></li>
                    <li><strong>応募資格:</strong> <?php echo e($recruit->qualifications); ?></li>
                    <li><strong>待遇:</strong> <?php echo e($recruit->compensation); ?></li>
                    <li><strong>やりがい:</strong> <?php echo e($recruit->job_satisfaction); ?></li>
                    <li><strong>在宅勤務:</strong> <?php echo e($recruit->remote_work); ?></li>
                    <li><strong>採用の背景:</strong> <?php echo e($recruit->hiring_background); ?></li>
                </ul>
                <a href="<?php echo e($recruit->url); ?>" class="register-btn" target="_blank">詳細ページ</a>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>


    <footer class="copyright">
        &copy; 2024 Wom-tech All Rights Reserved.
    </footer>
</html><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/gs-laravel/resources/views/recruit.blade.php ENDPATH**/ ?>