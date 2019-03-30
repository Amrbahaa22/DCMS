<?php if(session('success')): ?>

    <script>
        new Noty({
            type: 'success',
            layout: 'topRight',
            text: "<?php echo e(session('success')); ?>",
            timeout: 2000,
            killer: true
        }).show();
    </script>

<?php endif; ?>

<?php /* C:\Users\amr-bahaa\sw2\newproj\resources\views/partials/_session.blade.php */ ?>