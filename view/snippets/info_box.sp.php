<?php if (isset($info)) { ?>
    <div id="ib_info_box">
        <div>&#x2139;</div>
        <div><?= $info ?></div>
    </div>
    <script id=ib_info_script>
        setTimeout(() => {
            document.querySelector('#ib_info_box').classList.add('ib_fadeout');
            setTimeout((info_box) => {
                document.querySelector('#ib_info_box').remove();
                document.querySelector('#ib_info_script').remove();
            }, 300);
        }, 1E4); // =10s
    </script>
<?php } ?>