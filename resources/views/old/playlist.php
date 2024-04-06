<script>
    setInterval(function(){ 
        window.location.href = '<?= base_url("playlist/"); ?>/<?php echo $pid; ?>?ctid=<?php echo $ctid; ?>';
    }, <?php echo $duration; ?>000);
</script>