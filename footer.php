    </main>
    <?php
    wp_footer();
    $key = false;
    $key = get_option('cookie_key');
    if($key===false){$key = '2016-by-wkwkrnht';}
    if(get_post_format()==='link'){
        echo'
        <script>var targets = document.querySelectorAll(".format-link .article-main a");for(var i = 0; i < targets.length; i++){var target = targets[i];target.classList.add("embedly-card");}</script>
        <script async="" charset="UTF-8" src="//cdn.embedly.com/widgets/platform.js"></script>';
    }
    ?>
    <script>
        (function(){
            if(992 >= window.innerWidth){
                var menu = document.getElementById("menu-wrap");
                menu.classList.add("none");
                document.getElementById("menu-toggle").onclick = function(){
                    menu.classList.toggle("none");
                    menu.classList.toggle("block");
                };
            }
            if((new Date()).getHours() >= 21 || (new Date()).getHours() < 6 ){
                document.body.className += " night-mode";
            }
        })();
        (function(){
            var targetElements = document.getElementsByClassName("twitter-tweet");
            for ( var i = 0, l = targetElements.length; l > i; i++ ) {
	            var targetElement = targetElements[i] ;
	            targetElement.classList.add("tw-align-center");
            }
        })();
        (function(){
            var wpCss = document.getElementById("wpcss");
            if (wpCss === null) {
                return;
            }
            var wpCssL = wpCss.length;
            for ( i = 0; i < wpCssL; i++ ) {
                var wpStyle = document.createElement("style");
                wpStyle.textContent = wpCss[i].textContent.replace(/\s{2,}/g,"");
                document.head.appendChild(wpStyle);
            }
        })();
        (function(){
            var key = "<?php echo $key;?>";
            function getCookie(key){
                var s,e;
                var c = document.cookie + ";";
                var b = c.indexOf(key,0);
                if(b!=-1){
                    c = c.substring(b,c.length);
                    s = c.indexOf("=",0) + 1;
                    e = c.indexOf(";",s);
                    return(unescape(c.substring(s,e)));
                }
                return("");
            }
            function setCookie(key,n){
                var myDate = new Date();
                myDate.setTime(myDate.getTime() + 6 * 30 * 24 * 60 * 60 * 1000);
                document.cookie = " " + key + "=" + escape(n) + ";expires=" + myDate.toGMTString();
            }
            var n = getCookie(key);
            if(n === ""){
                window.alert("このサイトでは、よりよいサイト運営のためにCookieを使用しています。そこでお預かりした情報は、各提携先と共有する場合があります。ご了承ください。");
            }
            n++;
            setCookie(key,n);
        })();
    </script>
    <?php $txt=false;$txt=get_option('footer_txt');if($txt!==false){echo $txt;}?>
</body>
</html>
