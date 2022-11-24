<?php
include "_header.php";
?>

<style>

    .book {
        transform-style: preserve-3d;
        transform: rotateX(45deg) rotateY(0deg) rotateZ(-45deg);
        transition: transform 1s;
        position: absolute;
        left: 15%;
        top: 0;
        right: 0;
        bottom: 10%;
        margin: auto;
        width: 30em;
        height: 40em;
    }
    .book .side {
        width: 3em;
        height: 40em;
        background: #b36060;
        position: absolute;
        left: -3em;
        top: 0;
        transform-origin: 100% 100%;
        transform: rotateY(-90deg) rotateX(0deg);
    }
    .book .bottom {
        width: 25em;
        height: 3em;
        background: #e2e2e2;
        position: absolute;
        bottom: 0;
        left: 0;
        transform-origin: 100% 100%;
        transform: rotateX(90deg);
    }
    .book .paper,
    .book .shadow {
        width: 25em;
        height: 40em;
        position: absolute;
        top: 0;
        left: 0;
    }
    .book .shadow {
        background: transparent;
        transform: translateZ(-3em);
        box-shadow: -1em 1em 0px 0px #ccc3a9;
        z-index: 1;
    }
    .book .page {
        width: 100%;
        height: 100%;
        position: absolute;
    }
    .book .first .page {
        background: #ef9a9a;
    }
    .book .intro {
        position: absolute;
        width: 90%;
        width: calc(100% - 3em);
        height: 90%;
        height: calc(100% - 3em);
        border: 2em solid #eee;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        margin: auto;
    }
    .book .intro h2 {
        padding: 0.5em 0.5em;
        font-size: 2em;
        color: #fff;
        word-break: break-all;
        text-align: left;
        letter-spacing: 5px;
    }
    .book .intro h1 {
        padding: 0.5em 0.25em;
        font-size: 6em;
        color: #fff;
        word-break: break-all;
    }

</style>

    <div class="v-center"></div>
    <div id="container">
        <div class="book">
            <div class="first paper">
                <div class="page front contents">
                    <div class="intro">
                        <h2>Kütüphane <br> Yönetim <br> Sistemi</h2>
                        <h1>2022</h1>
                    </div>
                </div>
            </div>
            <div class="side"></div>
            <div class="bottom"></div>
            <div class="shadow"></div>
        </div>
    </div>

<script>



</script>

<?php
include "_footer.php";
?>