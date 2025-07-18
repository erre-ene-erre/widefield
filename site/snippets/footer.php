</section>
</main>

<footer>
    <?php if($page -> isHomePage() or $is_media): ?>
    <?php else: ?>
        <section class='footer'>
            <div class='footer-content'>
                <?= $site -> footer() ?>
            </div>
        </section>
    <?php endif ?>
    <?= snippet('cart/init') ?>
    <script src="https://unpkg.com/unlazy@0.11.3/dist/unlazy.iife.js" defer init></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.2.1/js.cookie.min.js" ></script>
    <?= js('/assets/js/main.js?v=1.1.4') ?>
    <script>
    if(document.querySelector('.news-container .button')){
        if (!Cookies.get('alert')) { setTimeout(function(){
            newsContainer.classList.add('shown');
            Cookies.set('alert', true, { expires: 1 });
        }, 2000);
        }
    newsButton.addEventListener('click', () =>{closeElement(newsContainer);});
    }
        // Documentation at https://github.com/js-cookie/js-cookie
    </script>
    <?= js('@auto') ?>
</footer>   
</body>
</html>