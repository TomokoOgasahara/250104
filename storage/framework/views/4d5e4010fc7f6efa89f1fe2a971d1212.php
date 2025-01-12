<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>口コミ一覧</title>
    <link rel="stylesheet" href="<?php echo e(asset('review.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="title">    
    <div class="title1">STEM GATE</div>
    <div class="title2">企業データを活用して理工系女子の就職をワンストップでサポート</div>
    </div>

<!-- 企業リストの表示 -->
<div class="form-container">
        <form method="GET" action="<?php echo e(url('/review')); ?>">
            <label for="comp_name" class="sentaku">企業名を選択してください:</label>
            <select name="comp_name" id="comp_name" required>
                <option value="">--選択してください--</option>
                <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($company->comp_name); ?>" 
                            <?php echo e(request('comp_name') === $company->comp_name ? 'selected' : ''); ?>>
                        <?php echo e($company->comp_name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <button type="submit" class="button1">検索</button>
        </form>
    </div>

    <div class="pagename">口コミ一覧</div>

        <?php if($review && $review->isNotEmpty()): ?>
        <?php $__currentLoopData = $review; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reviews): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="review-card">
            <div class="review-header">
                <h3><?php echo e($reviews->name); ?> さん</h3>
                <div class="review-rating">
                    クチコミ総合評価 
                    <span class="stars">
                        <?php echo e(str_repeat('★', $reviews->growth_potential)); ?>

                        <?php echo e(str_repeat('☆', 5 - $reviews->growth_potential)); ?>

                    </span>
                </div>
            </div>
            <div class="review-details">
                回答者: <?php echo e($reviews->employment_status); ?>／<?php echo e($reviews->speciality); ?>／<?php echo e($reviews->years_of_service); ?>／<?php echo e($reviews->age_group); ?>／<?php echo e($reviews->employment_type); ?>

            </div>
            <div class="review-comment">
                <?php echo e($reviews->reviews); ?>

            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <p>口コミデータがありません。</p>
    <?php endif; ?>
    </div>

    <footer class="copyright">
        &copy; 2024 Wom-tech All Rights Reserved.
    </footer>
</html><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/gs-laravel/resources/views/review.blade.php ENDPATH**/ ?>